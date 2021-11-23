@extends('layouts.app')

@section('pagecss')
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

<link href="{{env('APP_URL')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{env('APP_URL')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<style>
    .bootstrap-tagsinput {
        position: relative;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        display: inline-block;
        padding: 10px 6px;
        color: #555;
        vertical-align: middle;
        border-radius: 4px;
        max-width: 100%;
        width: 100%;
        line-height: 30px;
        cursor: pointer;
    }

    .label-info {
        background-color: #ffffff;
    }

    .select2-container--bootstrap .select2-selection--single {
        height: 44px !important;
    }

    .select2-container--bootstrap .select2-selection--multiple .select2-selection__rendered {
        height: 41px;
    }
</style>
@endsection

@section('content')
<div class="page-content">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li>
                <!-- <a href="/dashboard">Dashboard</a> -->
                <a href="{{ route('ims.dashboard') }}">Dashboard</a>
            </li>
            <li>
                <a href="/ims/purchasing">Purchasing</a>
            </li>
            <li class="active">Suppliers</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">Edit User</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form autocomplete="off" action="{{ route('user.store') }}" method="post" class="horizontal-form">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Name <i class="text-danger">*</i></label>
                                        <input class="form-control input-lg" required type="text" id="input2" name="employee_data" value="{{$user['name']}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Username <i class="text-danger">*</i></label>
                                        <input required type="text" name="domain" class="form-control input-lg" value="{{$user['domainAccount']}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Role <i class="text-danger">*</i></label>
                                        <select name="role_id" id="role_id" class="form-control select2">
                                            @foreach($roles as $role)
                                            <option value="{{ $role['id'] }}" {{ ($role['id'] == $user['roleid']) ? 'selected' : '' }}>{{ $role['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Assigned Modules <i class="text-danger">*</i></label>
                                       <?php
                                        $accessrights = explode("|", $user->access_rights);
            ?>
                                        <select  name="modules[]" id="multiple" class="form-control select2-multiple" multiple>
                                        @foreach($accessrights as $accessright)
                                           
                                            <option value="admin"  {{ ($accessright.contains("admin")) ? 'selected' : '' }}>Admin</option>
                                          
                                            @if($accessright == "purchasing")
                                            <option value="purchasing"  {{ ($accessright == "purchasing") ? 'selected' : '' }}>Purchasing</option>
                                            @else
                                            <option value="purchasing">Purchasing</option>
                                            @endif
                                            @if($accessright == "accounting")
                                            <option value="accounting"  {{ ($accessright == "accounting") ? 'selected' : '' }}>Accounting</option>
                                            @else
                                            <option value="accounting">Accounting</option>
                                            @endif
                                            @if($accessright == "logistics")
                                            <option value="logistics"  {{ ($accessright == "logistics") ? 'selected' : '' }}>Logistics</option>
                                            @else
                                            <option value="logistics">Logistics</option>
                                            @endif
                                            @if($accessright == "receiving")
                                            <option value="receiving"  {{ ($accessright == "receiving") ? 'selected' : '' }}>Receiving</option>
                                            @else
                                            <option value="receiving">Receiving</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn blue">
                                <i class="fa fa-check"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
<script src="{{env('APP_URL')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="{{env('APP_URL')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>

<script src="{{env('APP_URL')}}/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="{{env('APP_URL')}}/assets/global/plugins/typeahead.js/typeahead.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        var employees = {
            !!\App\ users::employee_lookup() !!
        }

        var employees = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: employees
        });


        $('#input2').tagsinput({
            maxTags: 1,
            typeaheadjs: ({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'employees',
                source: employees
            })
        });
    });
</script>
@endsection