@extends('layouts.app')

@section('pagecss')
<link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<div class="page-content">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Users</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/dashboard">Dashboard</a>
            </li>
            <li>
                <a href="javascript:;">Settings</a>
            </li>
            <li class="active">Users</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title" id="title">
                    <div class="caption">
                        <i class="fa fa-list font-blue-hoki"></i>
                        <span class="caption-subject font-blue-hoki bold uppercase"> List Of Users</span>
                    </div>
                    <a href="{{ route('user.create') }}" class="btn btn-info pull-right">Create User</a>
                </div>
                <br>
                <table class="user_tbl table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Assigned Modules</th>
                        <th>Department</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td>{{ strtoupper($u->name) }}</td>
                                <td>{{ strtoupper($u->domainAccount) }}</td>
                                <td>{{ strtoupper($u->role) }}</td>
                                <td>{!! \App\users::modules($u->id) !!}</td>
                                <td class="text-uppercase">{{ $u->dept }}</td>
                                <td>
                                    <div class="btn-toolbar margin-bottom-2">
                                        <div class="btn-group btn-group-sm btn-group-solid">
                                            <a href="#" data-uid="{{ $u->id }}" class="btn btn-sm btn-danger button">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pull-right">{{ $users->links() }}&nbsp;</div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
<script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/pages/scripts/components-select2.min.js') }}" type="text/javascript"></script>

<script>

    $(document).on('click', '.button', function (e) {
        e.preventDefault();
        var id = $(this).data('uid');

        swal({
            title: "Are you sure?",
            text: 'This user will be removed permanently!',
            type: "warning",
            confirmButtonClass: "btn-success",
            confirmButtonText: "Yes, delete it!",
            showCancelButton: true
        },
        function() {
            $.ajax({
                type: "POST",
                url: "/deleteUser",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'uid':id
                },
                success: function (data) {
                    $('.payment'+id).remove();
                    swal({
                        title: "Deleted",
                        text: 'User has been deleted permanently.',
                        type: "success",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    window.setTimeout(function(){location.reload()},1000)
                }         
            });
        });
    });
</script>
@endsection