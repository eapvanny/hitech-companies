@extends('admin.layouts.master')


@section('title')
    <title>Social media | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">Social media</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Social media lists</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> --}}
                        <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Add social media"
                        type="button" data-bs-toggle="modal" data-bs-target="#update-company">
                            <span class="btn-label">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            Add new
                        </a>
                        </div>
                    </div>
                </div>
               

                <div class="card-body">
                    <div class="chart-container" style="min-height: auto">
                        {{-- <div class="table-responsive"> --}}
                            <table class="ui celled table">
                                <thead>
                                  {{-- <tr><th colspan="3">
                                        Git Repository
                                    </th>
                                    </tr> --}}
                                </thead>
                                <tbody>
                                    @foreach ($socials as $social)
                                        <tr>
                                            <td>
                                            <i class="{{ $social->social }} icon"></i> {{ ucfirst($social->social) }}
                                            </td>
                                            <td><i class="linkify icon"></i> <a href="{{ $social->link_social }}" target="_blank" class="link"  data-content="{{ $social->link_social }}">Link</a></td>
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

                                                        <div class="item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModel{{$social->id}}">Delete</div>
                                                    
                                                    @endif
                                                        
                                                        <a href="{{ route('social.edit', ['id'=>$social->id]) }}" class="text-black item">Edit/Update</a>
                                                        <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#activeStatus{{$social->id}}">Enable {{ ($social->active_status == '0') ? 'active' : 'inactive' }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>   

                                        @if (@Auth::user()->role == 'superadmin')


                                        {{-- Delete modal  --}}
                                        <div class="modal fade modal-sm" id="deleteModel{{$social->id}}"  tabindex="-1" aria-labelledby="deleteModel{{$social->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="deleteModel{{$social->id}}Label">Delete verify</h1>
                                                  {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                                </div>
                                                <form action="{{ route('social.delete', ['id'=> $social->id]) }}" method="POST">
                                                    <div class="modal-body text-center">
                                                            @csrf
                                                            <label for="" class="fw-bold text-danger text-center w-100">Do you want to delete <span class="fs-4 text-primary d-block text-center mt-2">{{ ucfirst($social->social) }}</span></label>
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
                                                  {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                                </div>
                                                <form action="{{ route('social.status', ['id'=> $social->id]) }}" method="POST">
                                                    <div class="modal-body text-center">
                                                            @csrf
                                                            <label for="" class="fw-bold text-center w-100">Do you want to
                                                                @if ($social->active_status == '0')
                                                                    <span class="text-primary">Enable active</span>
                                                                @else
                                                                    <span class="text-danger">Enable inactive</span>
                                                                @endif
                                                                to<span class="fs-4 text-primary d-block text-center mt-2">{{ ucfirst($social->social) }}</span></label>
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
                        {{-- </div> --}}
                        
                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- ------------ Modal ADD --------------- --}}
        <div class="modal fade " id="update-company" tabindex="-1" aria-labelledby="update-company" aria-hidden="true">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Add social media')}}</h1>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                {{-- <div class="modal-body">

                </div> --}}
                <form method="post" action="{{ route('social.save') }}" autocomplete="off">
                    <div class="container">
                        <div class="row p-4">
                            <div class="col-sm12 col-md-12 col-lg-12 col-xl-12">
                                <div class="ui form">
                                    <div class="field">
                                        @csrf

                                        <label for="Social" class="fw-bold mt-2">Social media</label>
                                        <select class="ui search dropdown" name="social">
                                                {{-- <option ><i class="globe icon"></i> Facebook</option> --}}
                                                <option value="">Select social media</option>
                                                <option value="facebook"><i class="facebook icon"></i> Facebook</option>
                                                <option value="instagram"><i class="instagram icon"></i> Instagram</option>
                                                <option value="twitter"><i class="twitter icon"></i>Twitter</option>
                                                <option value="youtube"><i class="youtube icon"></i> Youtube</option>
                                        </select>
                                    </div>
                                </div>
                                                                
                                <label for="link_social" class="fw-bold mt-2">link</label>
                                <div class="ui right labeled left icon input w-100">
                                    <i class="linkify icon"></i>
                                    <input type="url" placeholder="Enter link" id="link_social" name="link_social" value="{{ old('link_social') }}">
                                    <a class="ui tag label"> link </a>
                                </div>

                                <div class="ui toggle checkbox px-0 mt-2">
                                    <input type="checkbox" value="1" id="checkBox" name="active_status">
                                    <label for="checkBox">Enable active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm save-btn">Save</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    {{-- ------------ END Modal ADD --------------- --}}


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