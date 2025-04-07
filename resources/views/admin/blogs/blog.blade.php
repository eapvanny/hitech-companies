@extends('admin.layouts.master')


@section('title')
    <title> {{ __('Blogs') }} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Blogs')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>
    </div>


    {{-- Message from execute manager  --}}
    <div class="row">
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
                            <div class="card-title" style="width: fit-content">{{__('Blogs')}}</div>
                            <div class="card-tools" style="width: fit-content">
                                <a class="btn btn-label-info btn-round btn-sm hover-btn " id="update-btn" data-content="Post a new blog"
                                    href="{{ route('blog.post') }}">
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

                            @foreach ($blogs as $blog)

                                <div class="card me-4">
                                   
                                    <div class="image w-100">
                                        <img src="{{ asset($blog->img) }}" width="100%">
                                    </div>
                                    <div class="content">
                                        <div class="header fs-6 fw-bold">{{ $blog->title }}</div>
                                        <div class="meta">
                                            <i class="star icon ui yellow"></i>
                                            <i class="star icon ui yellow"></i>
                                            <i class="star icon ui yellow"></i>
                                            <i class="star icon ui yellow"></i>
                                        </div>
                                        <div class="description" style="font-size: 10px">
                                            {!! $blog->short_text !!}
                                        </div>
                                    </div>
                                    <div class="extra content align-items-center">
                                        <span class="left floated">
                                            @if ($blog->active_status == 1)
                                                <a class="ui blue tag label">Active</a>
                                            @else
                                                <a class="ui red tag label">Inactive</a>
                                            @endif
                                        </span>
                                        <span class="right floated">
                                            <div class="circular ui icon button ui icon top left right bottom pointing dropdown">
                                                <i class="ellipsis vertical icon" id="menu"></i>
                                                <div class="menu" id="menu">
                                                    <div class="header">Actions</div>
                                                    <a href="{{ route('blog.showdetail', ['id' => $blog->id]) }}" class="text-black item">Detail</a>
                                                    
                                                    @if (@Auth::user()->role == 'superadmin')

                                                    <div class="item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModelMessage{{$blog->id}}">Delete</div>

                                                    @endif

                                                    <a href="{{ route('blog.edit', ['id'=>$blog->id]) }}" class="text-black item">Edit/Update</a>
                                                    <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#activeStatusMessage{{$blog->id}}">Enable {{$blog->active_status == '0'? 'active' : 'inactive'}}</div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>

                                @if (@Auth::user()->role == 'superadmin')
                                
                                {{-- Delete modal  --}}
                                <div class="modal fade modal-sm" id="deleteModelMessage{{$blog->id}}"  tabindex="-1" aria-labelledby="deleteModelMessage{{$blog->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModelMessage{{$blog->id}}Label">Delete verify</h1>
                                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                            </div>
                                            <form action="{{ route('blog.delete', ['id'=> $blog->id]) }}" method="POST">
                                                <div class="modal-body text-center">
                                                    @csrf
                                                    <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete blog form<span class="fs-4 text-primary d-block text-center mt-2">{{ ucfirst($blog->author) }}</span></label>
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
                                <div class="modal fade modal-sm" id="activeStatusMessage{{$blog->id}}"  tabindex="-1" aria-labelledby="activeStatusMessage{{$blog->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="activeStatusMessage{{$blog->id}}Label">Enable active/inactive </h1>
                                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                        </div>
                                        <form action="{{ route('blog.status', ['id'=> $blog->id]) }}" method="POST">
                                            <div class="modal-body text-center">
                                                    @csrf
                                                    <label for="" class="fw-bold text-center w-100">Do you want to
                                                        @if ($blog->active_status == '0')
                                                            <span class="text-primary">Enable active</span>
                                                        @else
                                                            <span class="text-danger">Enable inactive</span>
                                                        @endif
                                                        blog from<span class="fs-4 text-primary d-block text-center mt-2"> {{ ucfirst($blog->author) }}</span></label>
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

            $('#blog').addClass('active');
            // $('#homepagecollapse').addClass('collapse show');
            // $('.society').addClass('active');

        });
    </script>
@endsection