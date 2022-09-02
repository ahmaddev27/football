@extends('dashboard.layouts.master',['title'=>'الاشعارات'])
@section('content')

        <div class="page-title">



            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h4 class="mb-0"> الاشعارات </h4>
                </div>

            </div>
        </div>
        <!-- widgets -->
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block">
                                <h5 class="card-title pb-0 border-0">جميع الاشعارات</h5>
                            </div>


                        </div>
                        <div class="table-responsive mt-15">
                            <table class="table center-aligned-table mb-0">
                                <thead>
                                <tr class="text-dark">
                                    <th>#</th>
                                    <th>العنوان</th>
                                    <th>التاريخ </th>
                                    <th>الساعة </th>
                                    <th>الرابط</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($notifications as $n)
                                <tr>
                                    <td  class="">{{$loop->index+1}}</td>
                                    <td>{{$n->data['title']}}</td>
                                    <td><label class="badge badge-{{$n->read_at?'dark':'success'}}">{{$n->data['date']}}</label></td>
                                    <td><a  href="#" class="btn btn-outline-{{$n->read_at?'dark':'success'}} btn-sm">{{$n->data['time']}}</a></td>
                                    <td><a  id="read" data-id="{{$n->id}}" data-route="{{route('dashboard.notification.read')}}" target="_blank" href="/{{$n->data['url']}}" class="btn btn-outline-{{$n->read_at?'dark':'success'}} btn-sm"><i class="ti ti-world"></i> </a></td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="text-center justify-content-center m-5">
                            {{$notifications->appends(request()->query())->links('vendor.pagination.simple-tailwind')}}

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!--=================================
         wrapper -->

        <!--=================================
         footer -->



@stop
