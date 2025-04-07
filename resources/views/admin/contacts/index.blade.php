@extends('admin.layouts.master')


@section('title')
    <title>{{__('Contacts')}} | Hi-Tech</title>
@endsection

@section('css')

@endsection


@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
        <h3 class="fw-bold mb-3">{{__('Contacts')}}</h3>
        <h6 class="op-7 mb-2"> {{ config('app.company') }} </h6>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">{{__('Contact lists')}}</div>
                        <div class="card-tools">
                        {{-- <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a> 
                        <a class="btn btn-label-info btn-round btn-sm hover-btn" id="update-btn" data-content="Edit company information"
                        type="button" data-bs-toggle="modal" data-bs-target="#update-company">
                            <span class="btn-label">
                                <i class="far fa-edit"></i>
                            </span>
                            Edit
                        </a>--}}
                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <div class="chart-container" style="min-height: auto">
                        <div class="table-responsive">
                            <table
                              id="basic-datatables"
                              class="display table table-striped table-hover"
                            >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email address</th>
                                        <th>Subject</th>
                                        <th>Submit date</th>
                                        <td></td>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email address</th>
                                        <th>Subject</th>
                                        <th>Phone number</th>
                                        <th>Submit date</th>
                                    </tr>
                                </tfoot> --}}
                                @php
                                    $i = 1;
                                @endphp
                                <tbody>
                                    @foreach ($userContacts as $c)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $c->email }}</td>
                                            <td>{{ $c->subject }}</td>
                                            <td>{{ $c->created_at }}</td>
                                            <td>
                                                <a class="ui teal label" type="button" data-bs-toggle="modal" data-bs-target="#detailContactModal{{$c->id}}">
                                                    <i class="far fa-eye me-1"></i> Detail
                                                </a>
                                            </td>
                                        </tr>

                                        {{-- Detail modal  --}}
                                        <div class="modal fade modal-md" id="detailContactModal{{$c->id}}"  tabindex="-1" aria-labelledby="detailContactModal{{$c->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-top">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="detailContactModal{{$c->id}}Label">Contact detail</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <i class="user icon"></i>
                                                            </div>
                                                            <div class="col-11">
                                                                <p>{{ $c->name }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-1">
                                                                <i class="mail icon"></i>
                                                            </div>
                                                            <div class="col-11">
                                                                <p class="ui text-primary">{{ $c->email }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-1">
                                                                <i class="pencil alternate icon"></i>
                                                            </div>
                                                            <div class="col-11">
                                                                <p>{{ $c->subject }} </p>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-1">
                                                                <i class="phone icon"></i>
                                                            </div>
                                                            <div class="col-11">
                                                                <p>{{ $c->phone }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-1">
                                                                <i class="calendar alternate outline icon"></i>
                                                            </div>
                                                            <div class="col-11">
                                                                <p>{{ $c->created_at }}</p>
                                                            </div>
                                                        </div>
                                                        {{-- <hr> --}}
                                                        <div class="row mt-3">
                                                            <div class="col-1">
                                                                <i class="rocketchat icon"></i>
                                                            </div>
                                                            <div class="col-11">
                                                                <div class="ui label fw-normal">
                                                                    <p>{{ $c->description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="mini ui teal button" data-bs-dismiss="modal"><i class="times icon"></i>Close</button>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    @endforeach

                                </tbody>
                            </table>
                          </div>
                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        // $(document).on('click','.save-btn', function (e) {
        //     e.preventDefault();

        //     var data = {
        //         'logo' : $('#pre_img').val(),
        //         'address' : $('#address').text(),
        //         'location_link' : $('#map_link').val(),
        //         'company_email' : $('#email').val(),
        //         'company_phone' : $('#phone').val(),
        //         'copy_right' : $('#copyright').val(),

        //     }
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax(){
        //         type:'POST',
        //         url: '/company-save',
        //         data: data,
        //         dataType: 'json',
        //         success: function(respone){
        //             console.log(respone);
        //         }
        //     }
        //     console.log(data);
        // });
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
        <script>
            $(document).ready(function(){
                // $('#sidebar-menu li').remoeClass('active');
                // $('#sidebar-menu li ul li').remoeClass('active collapse');
    
                $('#contact').addClass('active');
                // $('#aboutpage').addClass('collapse show');
                // $('.company').addClass('active');
    
            });
        </script>
@endsection