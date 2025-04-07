@extends('admin.layouts.master')


@section('title')
    <title>{{__('Permissions')}} | Hi-Tech</title>
@endsection

@section('css')
    <style>

    </style>
@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Permissions')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Permission lists')}}</div>
                        <div class="card-tools">
                            {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                <span class="btn-label">
                                <i class="fa fa-pencil"></i>
                                </span>
                                Export
                            </a>  --}}
                            <a type="button" data-bs-toggle="modal" data-bs-target="#addPermissionModal" class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Add new permission">
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
                                    <th>Created date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            
                            @php
                                $i = 1;
                            @endphp
                            <tbody>
                                @foreach ($permissions as $c)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $c->name }}</td>
                                        <td>{{ $c->created_at }}</td>
                                        <td class="text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#updatePermissionModal{{ $c->id }}"><i class="edit icon text-primary"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#deletePermissionModal{{ $c->id }}"><i class="trash alternate icon text-danger"></i></a>
                                        </td>
                                    </tr>

                                    {{-- update permission modal  --}}
                                    <div class="modal fade modal-md" id="updatePermissionModal{{$c->id}}"  tabindex="-1" aria-labelledby="updatePermissionModal{{$c->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-top">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="updatePermissionModal{{$c->id}}Label">Edit/Update permission</h1>
                                                </div>
                                                <div class="modal-body ui form" id="permission_form">
                                                    <form action="{{ url('/admin/permissions/'. $c->id . '/update') }}" method="POST" autocomplete="off" id="" class="">
                                                        {{-- @method('PUT') --}}
                                                        @csrf
                                                        <label for="name" class="fw-bold fs-5">Permission name <span class="text-danger">*</span></label>
                                                        <div class="ui field left icon input w-100 d-block mt-2" >
                                                            <i class="ui shield alternate icon"></i>
                                                            <input type="text" class="w-100" placeholder="Enter permission name" id="name" name="name" value="{{ $c->name }}">
                                                        </div>
                                                        <div class="ui error message"></div>
                                                        <div class="text-end">
                                                            <button type="button" class="mini ui red button me-2" data-bs-dismiss="modal"><i class="times icon"></i>Close</button>
                                                            <button type="submit" class="mini ui blue button"><i class="plus icon"></i>Add</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    {{-- delete user modal --}}
                                    <div class="modal fade modal-md" id="deletePermissionModal{{$c->id}}"  tabindex="-1" aria-labelledby="deletePermissionModal{{$c->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deletePermissionModal{{$c->id}}Label">Delete permission</h1>
                                                </div>
                                                <div class="modal-body ui form" id="delete_permission{{ $c->id }}">
                                                    <form action="{{ url('/admin/permissions/'. $c->id. '/delete') }}" method="post" autocomplete="off" id="">
                                                        @csrf
                                                        <label for="" class="fw-bold fs-5">
                                                            <span class="text-danger">Delete</span> permission <b class = "text-primary"> {{$c->name}}</b></label>
                                                        <div class="ui field left icon input w-100 d-block mt-2" >
                                                            <i class="key icon"></i>
                                                            <input type="password" class="w-100" placeholder="Enter super admin password *" id="password" name="password">
                                                        </div>
                                                        <div class="ui label w-80 d-block my-3 fw-normal">
                                                            <small class="d-block mb-2 text-danger"><b>Note!</b></small>
                                                            <small>
                                                                <ul>
                                                                    <li class="pb-1">Enter super admin password to delete permission.</li>
                                                                    <li class="pb-1">Only super admin can delete permission.</li>
                                                                    <li>Permission will be delete forever.</li>
                                                                </ul>
                                                            </small>
                                                        </div>

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
    <div class="modal fade modal-md" id="addPermissionModal"  tabindex="-1" aria-labelledby="addPermissionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addPermissionModalLabel">Add permission</h1>
                </div>
                <div class="modal-body ui form" id="permission_form">
                    <form action="{{ url('/admin/permissions') }}" method="POST" autocomplete="off" id="" class="">
                        {{-- @method('PUT') --}}
                        @csrf
                        <label for="name" class="fw-bold fs-5">Permission name <span class="text-danger">*</span></label>
                        <div class="ui field left icon input w-100 d-block mt-2" >
                            <i class="ui shield alternate icon"></i>
                            <input type="text" class="w-100" placeholder="Enter permission name" id="name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="ui error message"></div>
                        <div class="text-end">
                            <button type="button" class="mini ui red button me-2" data-bs-dismiss="modal"><i class="times icon"></i>Close</button>
                            <button type="submit" class="mini ui blue button"><i class="plus icon"></i>Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
       
@endsection

@section('js')

    <script>
        $('#permission_form')
        .form({
            on: 'blur',
            fields: {
                name: {
                    identifier: 'name',
                    rules: [
                    {
                        type   : 'empty',
                        prompt : 'Please enter a permission name'
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

    @foreach ($permissions as $c){
        <script>
            $('#deletePermissionModal'+{{ $c->id }})
            .form({
                on: 'blur',
                fields: {
                    password: {
                        identifier: 'password',
                        rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please enter a opterator password'
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
    }
        
    @endforeach
@endsection