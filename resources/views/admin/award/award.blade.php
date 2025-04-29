@extends('admin.layouts.master')


@section('title')
    <title>{{__('Quality Award')}} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Quality Award')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Quality Award post lists')}}</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> --}}
                        <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Post new award"
                            href="{{ route('award.post') }}">
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

                                @foreach ($datas as $social)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td style="width: 100px">
                                            @if (!empty($social->img) && is_array($social->img) && isset($social->img[0]))
                                                <img src="{{ asset($social->img[0]) }}" width="100px" alt="Award Image">
                                            @else
                                                <img src="{{ asset('images/placeholder.jpg') }}" width="100px" alt="No Image">
                                            @endif
                                        </td>
                                        <td>
                                            {{$social->title_en}}
                                        </td>
                                        
                                        <td class="w-50px">
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
                                        <td class="w-100px"><small>{{ $social->created_at }}</small></td>
                                        <td class="right aligned top w-10">
                                            <div class="circular ui icon button ui icon top left right bottom pointing dropdown">
                                                <i class="cog icon" id="menu{{ $social->id }}"></i>
                                                <div class="menu" id="menu{{ $social->id }}">
                                                    <div class="header">Actions</div>
                                                    <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#detailModel{{$social->id}}">Detail</div>
                                                    @if (@Auth::user()->role == 'superadmin')

                                                    <div class="    item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModel{{$social->id}}">Delete</div>
                                                    
                                                    @endif
                                                    <a href="{{ route('award.edit', ['id'=>$social->id]) }}" class="text-black item">Edit/Update</a>
                                                    <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#activeStatus{{$social->id}}">Enable {{ ($social->active_status == '0') ? 'active' : 'inactive' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>   

                                     {{-- Detail modal  --}}
                                     <div class="modal fade modal-md" id="detailModel{{$social->id}}"  tabindex="-1" aria-labelledby="detailModel{{$social->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 me-3" id="detailModel{{$social->id}}Label">{{__('Post detail')}} 
                                                    @if ($social->active_status == 1)
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
                                                    @if (!empty($social->img) && is_array($social->img) && isset($social->img[0]))
                                                        <img src="{{ asset('storage/' . $social->img[0]) }}" alt="Thumbnail" class="mx-auto d-block" style="width:60%">
                                                    @else
                                                        <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image" class="mx-auto d-block" style="width:60%">
                                                    @endif
                                                
                                                    <div class="ui horizontal divider text-primary">
                                                        Khmer
                                                    </div>
                                                    <p class="fw-bold fs-5">{{ $social->title_kh }}</p>
                                                    <p>{{ $social->description_kh }}</p>
                                                
                                                    <div class="ui horizontal divider text-primary">
                                                        English
                                                    </div>
                                                    <p class="fw-bold fs-5">{{ $social->title_en }}</p>
                                                    <p>{{ $social->description_en }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @if (@Auth::user()->role == 'superadmin')

                                    {{-- Delete modal  --}}
                                    <div class="modal fade modal-sm" id="deleteModel{{$social->id}}"  tabindex="-1" aria-labelledby="deleteModel{{$social->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModel{{$social->id}}Label">Delete verify</h1>
                                            </div>
                                            <form action="{{ route('award.delete', ['id'=> $social->id]) }}" method="POST">
                                                <div class="modal-body text-center">
                                                        @csrf
                                                        <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete <span class="fs-4 text-primary d-block text-center mt-2">{{ ucfirst($social->title_kh) }}</span></label>
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
                                    <div class="modal fade modal-sm" id="activeStatus{{$social->id}}"  tabindex="-1" aria-labelledby="activeStatus{{$social->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="activeStatus{{$social->id}}Label">Enable active/inactive </h1>
                                            </div>
                                            <form action="{{ route('award.status', ['id'=> $social->id]) }}" method="POST">
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

            $('#homepage').addClass('active');
            $('#homepagecollapse').addClass('collapse show');
            $('.award').addClass('active');

        });
    </script>
@endsection