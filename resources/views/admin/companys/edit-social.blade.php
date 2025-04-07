@extends('admin.layouts.master')


@section('title')
    <title> Edit social media | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Edit Social media')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Edit Social media')}}</div>
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
                        <form action="{{ route('social.doedit', ['id'=>$social->id]) }}" method="post"  autocomplete="off">
                            <div class="container">
                                <div class="row p-4">
                                    <div class="col-sm12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="ui form">
                                            <div class="field">
                                                @csrf
                                                <label for="social" class="fw-bold mt-2">Social media</label>
                                                <select name="social" class="ui fluid search dropdown" id="social">
                                                    <option value="">Select social media</option>
                                                    <option value="facebook" id="facebook" {{ ($social->social =='facebook')?'selected': '' }}><i class="facebook icon"></i>Facebook</option>
                                                    <option value="instagram" id="instagram" {{ ($social->social =='instagram')?'selected': '' }}><i class="instagram icon"></i>Instagram</option>
                                                    <option value="twitter" id="twitter" {{ ($social->social =='twitter')?'selected': '' }}><i class="twitter icon"></i>Twitter</option>
                                                    <option value="youtube" id="youtube" {{ ($social->social =='youtube')?'selected': '' }}><i class="youtube icon"></i>Youtube</option>
                                                </select>

                                                {{-- <input type="radio" class="d-" name="social" value="facebook" id="facebook" {{ ($social->social =='facebook')?'checked': '' }}>
                                                <input type="radio" class="d-" name="social" value="instagram" id="instagram" {{ ($social->social =='instagram')?'checked': '' }}>
                                                <input type="radio" class="d-" name="social" value="twitter" id="twitter" {{ ($social->social =='twitter')?'checked': '' }}>
                                                <input type="radio" class="d-" name="social" value="youtube" id="youtube" {{ ($social->social =='youtube')?'checked': '' }}> --}}
                                            </div>
                                        </div>
                                        
                                        <label for="link_social" class="fw-bold mt-2">link</label>
                                        <div class="ui right labeled left icon input w-100">
                                            <i class="linkify icon"></i>
                                            <input type="url" placeholder="Enter link" id="link_social" name="link_social" value="{{ $social->link_social }}">
                                            <a class="ui tag label">
                                            link
                                            </a>
                                        </div>

                                        <div class="ui toggle checkbox px-0 mt-2">
                                            <input type="checkbox" value="1" id="check{{$social->id}}" {{ ($social->active_status =='1')?'checked': '' }} name="active_status">
                                            <label for="check{{$social->id}}">Enable active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('company.social') }}" class="btn btn-warning btn-sm me-3">Back</a>
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

            $('#settings').addClass('active');
            $('#settingcollapse').addClass('collapse show');
            $('.socialmedia').addClass('active');

        });
    </script>
@endsection