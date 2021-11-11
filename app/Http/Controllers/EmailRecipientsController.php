<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmailRecipient;


class EmailRecipientsController extends Controller {


	public function index() {

		$recipients = EmailRecipient::all();

		return view('email-recipients.index', compact('recipients'));

	}


	public function create() {

		return view('email-recipients.create');

	}

	public function store(Request $request) {

		EmailRecipient::create($request->except('_token'));

		return redirect('/ims/email-recipients');

	}

	public function edit(Request $request, $id) {

		$recipient = EmailRecipient::find($id);

		return view('email-recipients.edit', compact('recipient'));

	}

	public function update(Request $request, $id) {

		$recipient = EmailRecipient::find($id);

		$recipient->update($request->except('_token'));

		return redirect('/ims/email-recipients');

	}

	public function destroy($id) {

		$recipient = EmailRecipient::find($id);

		$recipient->delete();

		return "deleted";

	}

}