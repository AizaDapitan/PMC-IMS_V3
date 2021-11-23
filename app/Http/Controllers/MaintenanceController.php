<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Hash;
use DB;
use Storage;
use File;
use Auth;

use App\supplier;
use App\PO;
use App\users;
use App\AuditLogs;
use Faker\Test\Provider\en_ZA\CompanyTest;
use App\Role;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function user_index()
    {
        $users = users::where('id', '>', 5)->orderBy('id', 'desc')->paginate(10);

        return view('maintenance.users', compact('users'));
    }

    public function user_create()
    {

        $roles = Role::where('active', '1')->get();
        return view('maintenance.user_create', compact(
            'roles'
        ));
    }

    public function user_store(Request $req)
    {
        $data = $req->all();

        $employee = explode(' : ', $req->employee_data);
dd($req->employee_data);
        $selected_modules = $data['modules'];

        $values = "";

        foreach ($selected_modules as $key => $module) {
            $values .= $module . '|';
            $modules = rtrim($values, '|');
        }
        $user = users::create([
            'domainAccount' => $req->domain,
            'name'          => $employee[0],
            'password'      => Hash::make('password', array('rounds' => 12)),
            'isActive'      => 1,
            'role'          => $req->role,
            'dept'          => $employee[1],
            'access_rights' => $modules,
            'remember_token' => str_random(10)
        ]);


        $notification = array(
            'message' => 'User has been added successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('users.index')->with('notification', $notification);
    }
    public function user_edit(Request $request, $id)
    {
        $user = users::find($id);
        $roles = Role::where('active', '1')->get();
        return view('maintenance.user_edit', compact(
            'roles',
            'user',
        ));
    }
    public function destroyUser(Request $r)
    {
        users::find($r->uid)->delete();

        return response()->json();
    }

    public function editUser(Request $r)
    {
        $a = '';
        foreach (($r->access) as $rc) {
            $a    .=  ($rc . "|");
            $ar = rtrim($a, '|');
        }
        $data = users::find($r->uid)->update([
            'name'          => $r->name,
            'domainAccount' => $r->domain,
            'role'          => $r->role,
            'dept'          => $r->dept,
            'access_rights' => $ar
        ]);

        if ($data) {
            $notification = array(
                'message' => 'User successfully updated . . .',
                'alert-type' => 'info'
            );
        } else {
            $notification = array(
                'message' => 'User updation failed . . .',
                'alert-type' => 'warning'
            );
        }

        return back()->with('notification', $notification);
    }

    public function profile($id)
    {
        $user = users::find($id);

        return view('maintenance.profile', compact('user'));
    }

    public function change_password(Request $req)
    {
        $user = users::find($req->user_id);

        if (Hash::check($req->current, $user->password)) {
            $user->update(['password' => \Hash::make($req->password_new, array('rounds' => 12))]);

            $notification = array(
                'message' => 'Password has been changed.',
                'alert-type' => 'info'
            );

            return redirect()->route('logout');
        } else {
            $notification = array(
                'message' => 'Incorrect password.',
                'alert-type' => 'warning'
            );

            return back()->with('notification', $notification);
        }
    }
}
