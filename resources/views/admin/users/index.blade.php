@extends('admin.layouts.master')


@section('title')
    <title>{{__('Users')}} | Hi-Tech</title>
@endsection

@section('css')
    <style>

    </style>
@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Manage users')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('User lists')}}</div>
                        <div class="card-tools">
                            {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                <span class="btn-label">
                                <i class="fa fa-pencil"></i>
                                </span>
                                Export
                            </a>  --}}
                            <a href="{{ route('user.add') }}" class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Add new user">
                                <span class="btn-label">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                Add new
                            </a>
                        </div>

                    </div>
                </div>

                <div class="card-body ">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th class="text-center">Role</th>
                                    <th>Created date</th>
                                    <td></td>
                                </tr>
                            </thead>
                            
                            @php
                                $i = 1;
                            @endphp
                            <tbody>
                                @foreach ($users as $c)
                                    <tr>
                                        <td class="{{ $c->active_status == 0 ? 'text-danger' : '' }}" >{{$i++}}</td>
                                        <td class="{{ $c->active_status == 0 ? 'text-danger' : '' }}" >{{ $c->name }}</td>
                                        <td class="{{ $c->active_status == 0 ? 'text-danger' : '' }}" >{{ $c->email }}</td>
                                        <td class="text-center {{ $c->active_status == 0 ? 'text-danger' : '' }}">
                                            @if ($c->role == 'superadmin')
                                                <p>
                                                    <i class="fas fa-user-shield" style="color: #1061b3;"></i>
                                                </p>
                                            @else
                                                <p>
                                                    <i class="fas fa-user" style="color: #ed9911;"></i>
                                                </p>
                                            @endif
                                        </td>
                                        <td class="{{ $c->active_status == 0 ? 'text-danger' : '' }}">{{ $c->created_at }}</td>
                                        <td class="text-end">
                                             <div class="dropdown">
                                                <button class="circular ui icon button" type="button" id="dropdownMenuButton{{ $c->id }}" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="ellipsis horizontal icon"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $c->id }}">
                                                    {{-- <a class="dropdown-item" href="{{ route('user.edit', ['id'=>$c->id]) }}"><span class="btn btn-warning btn-sm p-1 rounded-1"><i class="shield icon"></i> Add/Edit permission</a></span> --}}
                                                    <a class="dropdown-item text-success" href="{{ route('user.edit', ['id'=>$c->id]) }}"><i class="edit outline icon"></i> Edit account</a>
                                                    <a class="dropdown-item text-primary" type="button" data-bs-toggle="modal" data-bs-target="#resetPasswordModal{{$c->id}}"><i class="sync alternate icon"></i> Reset password</a>
                                                    <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#blockUserModal{{$c->id}}"><i class="ban icon"></i> Block/Unblock</a>
                                                    <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{$c->id}}"><i class="trash alternate outline icon"></i> Delete account</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Reset password modal  --}}
                                    <div class="modal fade modal-md" id="resetPasswordModal{{$c->id}}"  tabindex="-1" aria-labelledby="resetPasswordModal{{$c->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="resetPasswordModal{{$c->id}}Label">Reset password</h1>
                                                </div>
                                                <div class="modal-body ui form" id="operator_pass{{ $c->id }}">
                                                    <form action="{{ route('user.resetPass', ['id'=> $c->id]) }}" method="post" autocomplete="off" id="">
                                                        @csrf
                                                        <label for="" class="fw-bold fs-5">Reset password for <b class="text-primary"> {{$c->name}}</b></label>
                                                        <div class="ui field left icon input w-100 d-block mt-2" >
                                                            <i class="key icon"></i>
                                                            <input type="password" class="w-100" placeholder="Enter operator password *" id="password" name="password">
                                                        </div>
                                                        <div class="ui label w-80 d-block my-3 fw-normal">
                                                            <small class="d-block mb-2 text-danger"><b>Note!</b></small>
                                                            <small>
                                                                <ul>
                                                                    <li class="pb-1">Enter opterator password to reset user password.</li>
                                                                    <li>User password reset default: <span class="text-primary fw-bold">666666</span></li>
                                                                </ul>
                                                            </small>
                                                        </div>
                                                        {{-- <div class="ui error message mb-4"></div> --}}

                                                        <div class="text-end">
                                                            <button type="button" class="mini ui red button me-2" data-bs-dismiss="modal"><i class="times icon"></i>Close</button>
                                                            <button type="submit" class="mini ui blue button"><i class="sync alternate icon"></i>Yes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    {{-- Block user modal --}}
                                    <div class="modal fade modal-md" id="blockUserModal{{$c->id}}"  tabindex="-1" aria-labelledby="blockUserModal{{$c->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="blockUserModal{{$c->id}}Label">Block/Unblock user account</h1>
                                                </div>
                                                <div class="modal-body ui form" id="block_user{{ $c->id }}">
                                                    <form action="{{ route('user.block', ['id'=> $c->id]) }}" method="post" autocomplete="off" id="">
                                                        @csrf
                                                        <label for="" class="fw-bold fs-5">
                                                            @if ($c->active_status == 1)
                                                                <span class="text-danger">Block</span> 
                                                            @else
                                                                <span>Unblock</span> 
                                                            @endif
                                                            user account <b class = "text-primary"> {{$c->name}}</b></label>
                                                        <div class="ui field left icon input w-100 d-block mt-2" >
                                                            <i class="key icon"></i>
                                                            <input type="password" class="w-100" placeholder="Enter operator password *" id="password" name="password">
                                                        </div>
                                                        <div class="ui label w-80 d-block my-3 fw-normal">
                                                            <small class="d-block mb-2 text-danger"><b>Note!</b></small>
                                                            <small>
                                                                <ul>
                                                                    <li class="pb-1">Enter opterator password to Block/Unblock user account.</li>
                                                                    {{-- <li>User password reset default: <span class="text-primary fw-bold">666666</span></li> --}}
                                                                </ul>
                                                            </small>
                                                        </div>
                                                        {{-- <div class="ui error message mb-4"></div> --}}

                                                        <div class="text-end">
                                                            <button type="button" class="mini ui red button me-2" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="mini ui blue button">{{ $c->active_status == 1 ? 'Block' : 'Unblock' }} </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- delete user modal --}}
                                    <div class="modal fade modal-md" id="deleteUserModal{{$c->id}}"  tabindex="-1" aria-labelledby="deleteUserModal{{$c->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteUserModal{{$c->id}}Label">Delete user account</h1>
                                                </div>
                                                <div class="modal-body ui form" id="delete_user{{ $c->id }}">
                                                    <form action="{{ route('user.delete', ['id'=> $c->id]) }}" method="post" autocomplete="off" id="">
                                                        @csrf
                                                        <label for="" class="fw-bold fs-5">
                                                            <span class="text-danger">Delete</span> user account <b class = "text-primary"> {{$c->name}}</b></label>
                                                        <div class="ui field left icon input w-100 d-block mt-2" >
                                                            <i class="key icon"></i>
                                                            <input type="password" class="w-100" placeholder="Enter super admin password *" id="password" name="password">
                                                        </div>
                                                        <div class="ui label w-80 d-block my-3 fw-normal">
                                                            <small class="d-block mb-2 text-danger"><b>Note!</b></small>
                                                            <small>
                                                                <ul>
                                                                    <li class="pb-1">Enter super admin password to delete user account.</li>
                                                                    <li class="pb-1">Only super admin can delete user account.</li>
                                                                    <li>User account will be delete forever.</li>
                                                                    {{-- <li>User password reset default: <span class="text-primary fw-bold">666666</span></li> --}}
                                                                </ul>
                                                            </small>
                                                        </div>
                                                        {{-- <div class="ui error message mb-4"></div> --}}

                                                        <div class="text-end">
                                                            <button type="button" class="mini ui red button me-2" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="mini ui blue button">Yes delete </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
   @foreach ($users as $c)
        <script>
            $('#operator_pass'+{{ $c->id }})
            .form({
                on: 'blur',
                fields: {
                    password: {
                        identifier: 'password',
                        rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please enter a password'
                        },
                        // {
                        //   type   : 'minLength[6]',
                        //   prompt : 'Your password must be at least {ruleValue} characters'
                        // }
                        ]
                    },
                }
            });
        </script>

        <script>
            $('#block_user'+{{ $c->id }})
            .form({
                on: 'blur',
                fields: {
                    password: {
                        identifier: 'password',
                        rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please enter a password'
                        },
                        // {
                        //   type   : 'minLength[6]',
                        //   prompt : 'Your password must be at least {ruleValue} characters'
                        // }
                        ]
                    },
                }
            });
        </script>

        <script>
            $('#delete_user'+{{ $c->id }})
            .form({
                on: 'blur',
                fields: {
                    password: {
                        identifier: 'password',
                        rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please enter a password'
                        },
                        // {
                        //   type   : 'minLength[6]',
                        //   prompt : 'Your password must be at least {ruleValue} characters'
                        // }
                        ]
                    },
                }
            });
        </script>
   @endforeach
    <script>
        $(document).ready(function () {           
            $('#company_logo').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#pre_img').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            // $('#sidebar-menu li').remoeClass('active');
            // $('#sidebar-menu li ul li').remoeClass('active collapse');

            $('#users').addClass('active');
            // $('#settingcollapse').addClass('collapse show');
            // $('.socialmedia').addClass('active');

        });
    </script>
@endsection