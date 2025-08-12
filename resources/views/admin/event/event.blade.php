@extends('admin.layouts.master')


@section('title')
    <title>{{__('Event')}} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Event')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Main Event Photo')}}</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> --}}
                        <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Post new event"
                            href="{{ route('event-main-photo.post') }}">
                            <span class="btn-label">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            New post
                        </a>
                        </div>
                    </div>
                </div>
               

                <div class="card-body">
                    <div class="chart-container" style="min-height: auto">
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th class="w-10">No.</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Created at</th>
                                    <th class="w-10"></th>
                                </tr>
                            </thead>
                            @php
                                $i = 1;
                            @endphp
                            <tbody>
                                @foreach ($mainEvents as $mainEvent)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td style="width: 100px">
                                            <img src="{{ asset($mainEvent->img) }}" width="100px" alt="">
                                        </td>
                                        <td>
                                            {{$mainEvent->title_en}}
                                        </td>
                                        
                                        <td class="w-100px"><small>{{ $mainEvent->created_at }}</small></td>
                                        <td class="right aligned top w-10">
                                            <div class="circular ui icon button ui icon top left right bottom pointing dropdown">
                                                <i class="cog icon" id="menu{{ $mainEvent->id }}"></i>
                                                <div class="menu" id="menu{{ $mainEvent->id }}">
                                                    <div class="header">Actions</div>
                                                    <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#detailModel{{$mainEvent->id}}">Detail</div>
                                                    @if (@Auth::user()->role == 'superadmin')

                                                    <div class="    item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModel{{$mainEvent->id}}">Delete</div>
                                                    
                                                    @endif
                                                    <a href="{{ route('event-main-photo.edit', ['id'=>$mainEvent->id]) }}" class="text-black item">Edit/Update</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>   

                                     {{-- Detail modal  --}}
                                     <div class="modal fade modal-md" id="detailModel{{$mainEvent->id}}"  tabindex="-1" aria-labelledby="detailModel{{$mainEvent->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 me-3" id="detailModel{{$mainEvent->id}}Label">{{__('Post detail')}} 
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset($mainEvent->img) }}" alt="Thumbnail" class="mx-auto d-block" style="width:60%">
                                                    <div class="ui horizontal divider text-primary">
                                                        Khmer
                                                    </div>
                                                    <p class="fw-bold fs-5">{{$mainEvent->title_kh}}</p>
                                                    <p>{{$mainEvent->des_kh}}</p>

                                                    <div class="ui horizontal divider text-primary">
                                                        English
                                                    </div>
                                                    <p class="fw-bold fs-5">{{$mainEvent->title_en}}</p>
                                                    <p>{{$mainEvent->des_en}}</p>

                                                    
                                                    {{-- <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete <span class="fs-4 text-primary d-block text-center mt-2">Bottle {{ ucfirst($event->bottle) }}</span></label> --}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @if (@Auth::user()->role == 'superadmin')

                                    {{-- Delete modal  --}}
                                    <div class="modal fade modal-sm" id="deleteModel{{$mainEvent->id}}"  tabindex="-1" aria-labelledby="deleteModel{{$mainEvent->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModel{{$mainEvent->id}}Label">Delete verify</h1>
                                            </div>
                                            <form action="{{ route('event-main-photo.delete', ['id'=> $mainEvent->id]) }}" method="POST">
                                                <div class="modal-body text-center">
                                                        @csrf
                                                        <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete <span class="fs-4 text-primary d-block text-center mt-2">{{ ucfirst($mainEvent->title_kh) }}</span></label>
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
                                @endforeach

                            </tbody>
                        </table>
                          
                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Event post lists')}}</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> --}}
                        <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Post new event"
                            href="{{ route('event.post') }}">
                            <span class="btn-label">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            New post
                        </a>
                        </div>
                    </div>
                </div>
               

                <div class="card-body">
                    <div class="chart-container" style="min-height: auto">
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th class="w-10">No.</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    {{-- <th>Description</th> --}}
                                    <th class="w-50px">Active status</th>
                                    <th>Created at</th>
                                    <th class="w-10"></th>
                                </tr>
                            </thead>
                            @php
                                $i = 1;
                            @endphp
                            <tbody>

                                @foreach ($datas as $event)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td style="width: 100px">
                                            <img src="{{ asset($event->img) }}" width="100px" alt="">
                                        </td>
                                        <td>
                                            {{$event->title_en}}
                                        </td>
                                        
                                        <td class="w-50px">
                                            @if ($event->active_status == '0')
                                            <div class="ui mini label red">
                                                <i class="times circle icon"></i> Inactive
                                            </div>
                                            @else
                                            <div class="ui mini label blue">
                                                <i class="check circle icon"></i> Active
                                            </div>
                                            @endif
                                            
                                        </td>
                                        <td class="w-100px"><small>{{ $event->created_at }}</small></td>
                                        <td class="right aligned top w-10">
                                            <div class="circular ui icon button ui icon top left right bottom pointing dropdown">
                                                <i class="cog icon" id="menu{{ $event->id }}"></i>
                                                <div class="menu" id="menu{{ $event->id }}">
                                                    <div class="header">Actions</div>
                                                    <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#detailModel{{$event->id}}">Detail</div>
                                                    @if (@Auth::user()->role == 'superadmin')

                                                    <div class="    item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModel{{$event->id}}">Delete</div>
                                                    
                                                    @endif
                                                    <a href="{{ route('event.edit', ['id'=>$event->id]) }}" class="text-black item">Edit/Update</a>
                                                    <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#activeStatus{{$event->id}}">Enable {{ ($event->active_status == '0') ? 'active' : 'inactive' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>   

                                     {{-- Detail modal  --}}
                                     <div class="modal fade modal-md" id="detailModel{{$event->id}}"  tabindex="-1" aria-labelledby="detailModel{{$event->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 me-3" id="detailModel{{$event->id}}Label">{{__('Post detail')}} 
                                                    @if ($event->active_status == 1)
                                                        <span class="ui blue tag label">
                                                           Active
                                                        </span>
                                                    @else
                                                        <span class="ui red tag label">
                                                            Inactive
                                                        </span>
                                                    @endif</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset($event->img) }}" alt="Thumbnail" class="mx-auto d-block" style="width:60%">
                                                    <div class="ui horizontal divider text-primary">
                                                        Khmer
                                                    </div>
                                                    <p class="fw-bold fs-5">{{$event->title_kh}}</p>
                                                    <p>{{$event->des_kh}}</p>

                                                    <div class="ui horizontal divider text-primary">
                                                        English
                                                    </div>
                                                    <p class="fw-bold fs-5">{{$event->title_en}}</p>
                                                    <p>{{$event->des_en}}</p>

                                                    
                                                    {{-- <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete <span class="fs-4 text-primary d-block text-center mt-2">Bottle {{ ucfirst($event->bottle) }}</span></label> --}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @if (@Auth::user()->role == 'superadmin')

                                    {{-- Delete modal  --}}
                                    <div class="modal fade modal-sm" id="deleteModel{{$event->id}}"  tabindex="-1" aria-labelledby="deleteModel{{$event->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModel{{$event->id}}Label">Delete verify</h1>
                                            </div>
                                            <form action="{{ route('event.delete', ['id'=> $event->id]) }}" method="POST">
                                                <div class="modal-body text-center">
                                                        @csrf
                                                        <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete <span class="fs-4 text-primary d-block text-center mt-2">{{ ucfirst($event->title_kh) }}</span></label>
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
                                    <div class="modal fade modal-sm" id="activeStatus{{$event->id}}"  tabindex="-1" aria-labelledby="activeStatus{{$event->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="activeStatus{{$event->id}}Label">Enable active/inactive </h1>
                                            </div>
                                            <form action="{{ route('event.status', ['id'=> $event->id]) }}" method="POST">
                                                <div class="modal-body text-center">
                                                        @csrf
                                                        <label for="" class="fw-bold text-center w-100">Do you want to
                                                            @if ($event->active_status == '0')
                                                                <span class="text-primary">Enable active</span>
                                                            @else
                                                                <span class="text-danger">Enable inactive</span>
                                                            @endif
                                                            to<span class="fs-4 text-primary d-block text-center mt-2">{{ ucfirst($event->title_en) }}</span></label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
                                                </div>
                                            </form>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endforeach

                            </tbody>
                        </table>
                          
                    </div>
                    <div id="myChartLegend"></div>
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
            $('#event').dropdown();
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

            $('#event').addClass('active');
            $('#homepagecollapse').addClass('collapse show');
            $('.event').addClass('active');

        });
    </script>
@endsection