@extends('admin.layouts.master')


@section('title')
    <title> {{ __('About us') }} | Hi-Tech</title>
@endsection

@section('css')
    <style>
        .image{
            width: 290px;
            height: 207.047px;
            overflow: hidden;
        }
        .description p span{
            font-size: small;
        }
    </style>
@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{ __('About us') }}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>
    </div>

    {{-- Our comapny part  --}}
    <div class="row">
        <div class="ui">
            <div class="column">
                <div class="ui raised segment">
                    @if ($about->active_status == 1)
                        <a class="ui blue ribbon label">{{ __('Active') }}</a>
                    @else
                        <a class="ui red ribbon label">{{ __('Inactive') }}</a>
                    @endif
                    <div class="card-header">
                        <div class="card-head-row align-items-center d-flex justify-content-between">
                            <div class="card-title" style="width: fit-content">{{__('Our company')}}</div>
                            <div class="card-tools" style="width: fit-content">
                                <a class="btn btn-label-info btn-round btn-sm hover-btn " id="update-btn" data-content="Edit our company"
                                    href="{{ route('ourcompany.edit') }}">
                                    <span class="btn-label">
                                        <i class="far fa-edit"></i>
                                    </span>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>                  
                                
                    {{-- <br> --}}
                    {{-- <div class="card-body"> --}}
                        <div class="chart-container mt-3" id="bg-header" style="min-height: 450px; background-image: url({{ asset('backends/assets/img/about/about-image-header.jpg') }})">
                            <div class="bg-text col-sm-12 col-md-11 col-lg-11 col-xl-11">
                                <div class="overflow">
                                    {!! $about->description_kh !!}
                                    <p class="ui horizontal divider text-white mt-2">
                                        English
                                        {{-- <i class="tag icon"></i>
                                        Description --}}
                                    </p>
                                    {!! $about->description_en !!}
                                    
                                </div>
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>


    {{-- Message from execute manager  --}}
    <div class="row mt-5">
        <div class="ui">
            <div class="column">
                <div class="ui raised segment">
                    {{-- @if ($about->active_status == 1)
                        <a class="ui blue ribbon label">{{ __('Active') }}</a>
                    @else
                        <a class="ui red ribbon label">{{ __('Inactive') }}</a>
                    @endif --}}
                    <div class="card-header">
                        <div class="card-head-row align-items-center d-flex justify-content-between">
                            <div class="card-title" style="width: fit-content">{{__('Message from Manager')}}</div>
                            <div class="card-tools" style="width: fit-content">
                                <a class="btn btn-label-info btn-round btn-sm hover-btn " id="update-btn" data-content="Post a new message"
                                    href="{{ route('message.add') }}">
                                    <span class="btn-label">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    New post
                                </a>
                            </div>
                        </div>
                    </div>                  
                                
                    <div class="chart-container mt-3" style="min-height: auto;">                          
                        <div class="ui cards">

                            @foreach ($messages as $message)

                                <div class="card me-4">
                                    <div class="image w-100">
                                        <img src="{{ asset($message->img) }}" width="100%">
                                    </div>
                                    <div class="content">
                                        <div class="header fs-6 fw-bold">{{ $message->em_name }}</div>
                                        <div class="meta">
                                            <i class="star icon ui yellow"></i>
                                            <i class="star icon ui yellow"></i>
                                            <i class="star icon ui yellow"></i>
                                            <i class="star icon ui yellow"></i>
                                        </div>
                                        <div class="description" style="font-size: 10px">
                                            {!! $message->message_kh !!}
                                        </div>
                                    </div>
                                    <div class="extra content align-items-center">
                                        <span class="left floated">
                                            @if ($message->active_status == 1)
                                                <a class="ui blue tag label">Active</a>
                                            @else
                                                <a class="ui red tag label">Inactive</a>
                                            @endif
                                        </span>
                                        <span class="right floated">
                                            <div class="circular ui icon button ui icon top left right bottom pointing dropdown">
                                                <i class="cog icon" id="menu"></i>
                                                <div class="menu" id="menu">
                                                    <div class="header">Actions</div>
                                                    @if (@Auth::user()->role == 'superadmin')

                                                    <div class="item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModelMessage{{$message->id}}">Delete</div>

                                                    @endif

                                                    <a href="{{ route('message.edit', ['id'=>$message->id]) }}" class="text-black item">Edit/Update</a>
                                                    <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#activeStatusMessage{{$message->id}}">Enable</div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>

                                @if (@Auth::user()->role == 'superadmin')
                                
                                {{-- Delete modal  --}}
                                <div class="modal fade modal-sm" id="deleteModelMessage{{$message->id}}"  tabindex="-1" aria-labelledby="deleteModelMessage{{$message->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModelMessage{{$message->id}}Label">Delete verify</h1>
                                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                        </div>
                                        <form action="{{ route('message.delete', ['id'=> $message->id]) }}" method="POST">
                                            <div class="modal-body text-center">
                                                @csrf
                                                <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete message from <span class="fs-4 text-primary d-block text-center mt-2">{{ ucfirst($message->em_name) }}</span></label>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger btn-sm">Yes delete</button>
                                            </div>
                                        </form>
                                        
                                        </div>
                                    </div>
                                </div>

                                @endif

                                {{-- Active Status modal  --}}
                                <div class="modal fade modal-sm" id="activeStatusMessage{{$message->id}}"  tabindex="-1" aria-labelledby="activeStatusMessage{{$message->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="activeStatusMessage{{$message->id}}Label">Enable active/inactive </h1>
                                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                        </div>
                                        <form action="{{ route('message.status', ['id'=> $message->id]) }}" method="POST">
                                            <div class="modal-body text-center">
                                                    @csrf
                                                    <label for="" class="fw-bold text-center w-100">Do you want to
                                                        @if ($message->active_status == '0')
                                                            <span class="text-primary">Enable active</span>
                                                        @else
                                                            <span class="text-danger">Enable inactive</span>
                                                        @endif
                                                        message from<span class="fs-4 text-primary d-block text-center mt-2"> {{ ucfirst($message->em_name) }}</span></label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                            </div>
                                        </form>
                                        
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Company vision  --}}
    <div class="row mt-5">
        <div class="ui">
            <div class="column">
                <div class="ui raised segment">
                    @if ($vision_mission->active_status == 1)
                        <a class="ui blue ribbon label">{{ __('Active') }}</a>
                    @else
                        <a class="ui red ribbon label">{{ __('Inactive') }}</a>
                    @endif
                    <div class="card-header">
                        <div class="card-head-row align-items-center d-flex justify-content-between">
                            <div class="card-title" style="width: fit-content">{{__('Our Vision and Mission')}}</div>
                            <div class="card-tools" style="width: fit-content">
                                <a class="btn btn-label-info btn-round btn-sm hover-btn " id="update-btn" data-content="Edit vission and mission"
                                    href="{{ route('visionmission.edit') }}">
                                    <span class="btn-label">
                                        <i class="far fa-edit"></i>
                                    </span>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>                  
                                
                    {{-- <br> --}}
                    {{-- <div class="card-body"> --}}
                        <div class="chart-container mt-3 row" >
                            <div class="col-md-6">
                                {{-- <h6 class="ui horizontal divider header">
                                    <i class="tag icon"></i>
                                    KHMER
                                </h6> --}}
                                {!! $vision_mission->text_kh!!}
                            </div>
                            <div class="col-md-6">
                                {{-- <h6 class="ui horizontal divider header">
                                    <i class="tag icon"></i>
                                    ENGLISH
                                </h6> --}}
                                {!! $vision_mission->text_en !!}
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>



    {{-- CORE VALUES part  --}}
    <div class="row mt-5">
        <div class="ui">
            <div class="column">
                <div class="ui raised segment">
                    {{-- @if ($vision_mission->active_status == 1)
                        <a class="ui blue ribbon label">{{ __('Active') }}</a>
                    @else
                        <a class="ui red ribbon label">{{ __('Inactive') }}</a>
                    @endif --}}
                    <div class="card-header">
                        <div class="card-head-row align-items-center d-flex justify-content-between">
                            <div class="card-title" style="width: fit-content">{{__('Core Values')}}</div>
                            <div class="card-tools" style="width: fit-content">
                                <a class="btn btn-label-info btn-round btn-sm hover-btn " id="update-btn" data-content="Post new core value"
                                    href="{{ route('corevalue.add') }}">
                                    <span class="btn-label">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    New post
                                </a>
                            </div>
                        </div>
                    </div>                  
                                
                    {{-- <br> --}}
                    {{-- <div class="card-body"> --}}
                        <div class="chart-container mt-3" >
                            <table class="ui celled table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($core_values as $social)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $social->title_kh }}
                                            </td>
                                            <td>
                                                {{ $social->description_kh }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $social->title_en }}
                                            </td>
                                            <td>
                                                {{ $social->description_en }}
                                            </td>
                                            <td style="width: 120px">
                                                @if ($social->active_status == '0')
                                                <div class="ui mini label red">
                                                    <i class="times circle icon"></i> Inactive
                                                </div>
                                                @else
                                                <div class="ui mini label blue">
                                                    <i class="check circle icon"></i> Active
                                                </div>
                                                @endif
                                                
                                            </td>
                                            <td><small>{{ $social->created_at }}</small></td>
                                            <td class="right aligned top">
                                                <div class="circular ui icon button ui icon top left right bottom pointing dropdown">
                                                    <i class="cog icon" id="menu{{ $social->id }}"></i>
                                                    <div class="menu" id="menu{{ $social->id }}">
                                                        <div class="header">Actions</div>
                                                        
                                                        @if (@Auth::user()->role == 'superadmin')

                                                        <div class="item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModelCoreValue{{$social->id}}">Delete</div>
                                                        
                                                        @endif
                                                        
                                                        <a href="{{ route('corevalue.edit', ['id'=>$social->id]) }}" class="text-black item">Edit/Update</a>
                                                        <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#activeStatusCoreValue{{$social->id}}">Enable {{ ($social->active_status == '0') ? 'active' : 'inactive' }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>   

                                        @if (@Auth::user()->role == 'superadmin')

                                        {{-- Delete modal  --}}
                                        <div class="modal fade modal-sm" id="deleteModelCoreValue{{$social->id}}"  tabindex="-1" aria-labelledby="deleteModelCoreValue{{$social->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModelCoreValue{{$social->id}}Label">Delete verify</h1>
                                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                                </div>
                                                <form action="{{ route('corevalue.delete', ['id'=> $social->id]) }}" method="POST">
                                                    <div class="modal-body text-center">
                                                            @csrf
                                                            <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete <span class="fs-4 text-primary d-block text-center mt-2">{{ ucfirst($social->title_en) }}</span></label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger btn-sm">Yes delete</button>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                            </div>
                                        </div>

                                        @endif


                                        {{-- Active Status modal  --}}
                                        <div class="modal fade modal-sm" id="activeStatusCoreValue{{$social->id}}"  tabindex="-1" aria-labelledby="activeStatusCoreValue{{$social->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="activeStatusCoreValue{{$social->id}}Label">Enable active/inactive </h1>
                                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                                </div>
                                                <form action="{{ route('corevalue.status', ['id'=> $social->id]) }}" method="POST">
                                                    <div class="modal-body text-center">
                                                            @csrf
                                                            <label for="" class="fw-bold text-center w-100">Do you want to
                                                                @if ($social->active_status == '0')
                                                                    <span class="text-primary">Enable active</span>
                                                                @else
                                                                    <span class="text-danger">Enable inactive</span>
                                                                @endif
                                                                to<span class="fs-4 text-primary d-block text-center mt-2">{{ ucfirst($social->title_en) }}</span></label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>



    {{-- Accreditation​ part  --}}
    <div class="row mt-5">
        <div class="ui">
            <div class="column">
                <div class="ui raised segment">
                    {{-- @if ($about->active_status == 1)
                        <a class="ui blue ribbon label">{{ __('Active') }}</a>
                    @else
                        <a class="ui red ribbon label">{{ __('Inactive') }}</a>
                    @endif --}}
                    <div class="card-header">
                        <div class="card-head-row align-items-center d-flex justify-content-between">
                            <div class="card-title" style="width: fit-content">{{__('Accreditation')}}</div>
                            <div class="card-tools" style="width: fit-content">
                                <a class="btn btn-label-info btn-round btn-sm hover-btn " id="update-btn" data-content="Post a new Accreditation"
                                    href="{{ route('accreditation.add') }}">
                                    <span class="btn-label">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    New post
                                </a>
                            </div>
                        </div>
                    </div>                  
                                
                    <div class="chart-container mt-3" style="min-height: auto;">                          
                        <div class="ui cards">

                            @foreach ($accreditations as $accreditation)

                                <div class="card me-4">
                                    <div class="image w-100">
                                        <img src="{{ asset($accreditation->logo) }}" width="100%">
                                    </div>
                                    <div class="content">
                                        <div class="header fs-6 fw-bold">{{ $accreditation->name_kh }}</div>
                                        <div class="header fs-6 fw-normal mt-2">{{ $accreditation->name_en }} 
                                            @if ($accreditation->active_status == 1)
                                                <a class="ui blue tag label">Active</a>
                                            @else
                                                <a class="ui red tag label">Inactive</a>
                                            @endif
                                        </div>
                                        
                                        <div class="description" style="font-size: 10px">
                                            {{-- {!! $message->message_kh !!} --}}
                                        </div>
                                    </div>
                                    <div class="extra content align-items-center">
                                        <div class="extra content">
                                            <div class="ui two buttons">
                                                <a href="{{ route('accreditation.edit', ['id' => $accreditation->id]) }}" class="ui green button">Edit/Update</a>
                                                @if (@Auth::user()->role == 'superadmin')

                                                <a class="ui inverted red button" type="button" data-bs-toggle="modal" data-bs-target="#deleteModelAccrediation{{$accreditation->id}}">Delete</a>
                                            
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                {{-- Delete modal  --}}
                                <div class="modal fade modal-sm" id="deleteModelAccrediation{{$accreditation->id}}"  tabindex="-1" aria-labelledby="deleteModelAccrediation{{$accreditation->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModelAccrediation{{$accreditation->id}}Label">Delete verify</h1>
                                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                            </div>
                                            <form action="{{ route('accreditation.delete', ['id'=> $accreditation->id]) }}" method="POST">
                                                <div class="modal-body text-center">
                                                    @csrf
                                                    <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete accreditation <span class="fs-4 text-primary d-block text-center mt-2">{{ ucfirst($accreditation->name_en) }}</span></label>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger btn-sm">Yes delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                {{-- Active Status modal  --}}
                                {{-- <div class="modal fade modal-sm" id="activeStatusMessage{{$message->id}}"  tabindex="-1" aria-labelledby="activeStatusMessage{{$message->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="activeStatusMessage{{$message->id}}Label">Enable active/inactive </h1>
                                        </div>
                                        <form action="{{ route('message.status', ['id'=> $message->id]) }}" method="POST">
                                            <div class="modal-body text-center">
                                                    @csrf
                                                    <label for="" class="fw-bold text-center w-100">Do you want to
                                                        @if ($message->active_status == '0')
                                                            <span class="text-primary">Enable active</span>
                                                        @else
                                                            <span class="text-danger">Enable inactive</span>
                                                        @endif
                                                        message from<span class="fs-4 text-primary d-block text-center mt-2"> {{ ucfirst($message->em_name) }}</span></label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                            </div>
                                        </form>
                                        
                                        </div>
                                    </div>
                                </div> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    


    

@endsection

@section('js')

    <script>
        function select (e){
            alert(this.val());

        };
    </script>

    <script>
        $(document).ready(function () { 
            $('#social').dropdown();
            // var selectUpdateValue = $('.item.active.selected').val();
            console.log($('.item.active.selected').val());


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

            $('#about').addClass('active');
            $('#aboutpage').addClass('collapse show');
            $('.company').addClass('active');

        });
    </script>
@endsection