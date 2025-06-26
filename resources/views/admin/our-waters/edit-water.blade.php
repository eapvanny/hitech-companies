@extends('admin.layouts.master')


@section('title')
    <title>Edit our water | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Edit/Update our water')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Edit/Update our water')}}</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> --}}
                        {{-- <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Add social media"
                        type="button" data-bs-toggle="modal" data-bs-target="#update-company">
                            <span class="btn-label">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            Add new
                        </a> --}}
                        </div>
                    </div>
                </div>
               

                <div class="card-body">
                    <div class="chart-container" style="min-height: auto">
                        <form method="post" action="{{ route('water.doEdit', ['id'=> $social->id]) }}" autocomplete="off">
                            <div class="container">
                                <div class="row p-4">
                                    <div class="col-sm12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="ui form">
                                            <div class="field">
                                                @csrf
        
                                                <label for="bottle" class="fw-bold mt-2">Water bottle <span class="text-danger">*</span></label>
                                                <select class="ui search dropdown" id="bottle" name="bottle">
                                                        {{-- <option ><i class="globe icon"></i> Facebook</option> --}}
                                                        {{-- <option value="">Select water bottle</option> --}}
                                                        <option value="250ml" {{ ($social->bottle == '250ml') ? 'selected': '' }}><i class="circle icon"></i>250 ml Drinking Water</option>
                                                        <option value="350ml" {{ ($social->bottle == '350ml') ? 'selected': '' }}><i class="circle icon"></i>350 ml Drinking Water</option>
                                                        <option value="600ml" {{ ($social->bottle == '600ml') ? 'selected': '' }}><i class="circle icon"></i>600 ml Drinking Water</option>
                                                        <option value="1500ml" {{ ($social->bottle == '1500ml') ? 'selected': '' }}><i class="circle icon"></i>1500 ml Drinking Water</option>
                                                        <option value="20L" {{ ($social->bottle == '20L') ? 'selected': '' }}><i class="circle icon"></i>20 L Drinking Water</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <p class="ui horizontal divider">
                                            {{-- <i class="tag icon"></i> --}}
                                            Khmer
                                        </p>
                                        
                                        <label for="title_kh" class="fw-bold mt-2">Title in Khmer<span class="text-danger">*</span></label>
                                        <div class="ui input w-100">
                                            {{-- <i class="i cursor icon"></i> --}}
                                            <input type="text" placeholder="Enter title in Khmer" id="title_kh" name="title_kh" value="{{ $social->title_kh }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>
        
                                        <div class="ui form">
                                            <div class="field">
                                                <label for="description_kh" class="fw-bold mt-2">Description in Khmer <span class="text-danger">*</span></label>
                                                <textarea rows="4"  placeholder="Description in Khmer" name="description_kh">{{ $social->description_kh }}</textarea>
                                            </div>
                                        </div>

                                        <p class="ui horizontal divider">
                                            {{-- <i class="tag icon"></i> --}}
                                            English
                                        </p>

                                        <label for="title" class="fw-bold mt-2">Title in English<span class="text-danger">*</span></label>
                                        <div class="ui input w-100">
                                            {{-- <i class="i cursor icon"></i> --}}
                                            <input type="text" placeholder="Enter title" id="title" name="title" value="{{ $social->title }}">
                                            {{-- <a class="ui tag label"> link </a> --}}
                                        </div>
        
                                        <div class="ui form">
                                            <div class="field">
                                                <label for="description" class="fw-bold mt-2">Description in English <span class="text-danger">*</span></label>
                                                <textarea rows="4"  placeholder="Description" name="description">{{ $social->description }}</textarea>
                                            </div>
                                        </div>
        
        
                                        <div class="ui toggle checkbox px-0 mt-2">
                                            <input type="checkbox" value="1" id="checkBox" name="active_status" {{ ($social->active_status == 1)? 'checked' : '' }}>
                                            <label for="checkBox">Enable active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('our-water') }}" class="btn btn-secondary btn-sm me-3">Back</a>
                                <button type="submit" class="btn btn-success btn-sm save-btn">Edit/Update</button>
                            </div>
                        </form>
                        
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
            // console.log($('.item.active.selected').val());


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

            $('#ourwater').addClass('active');
            // $('#homepagecollapse').addClass('collapse show');
            // $('.society').addClass('active');

        });
    </script>
@endsection