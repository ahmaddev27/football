@extends('dashboard.layouts.master',['title'=>'الرسائل'])
@section('content')




    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h4 class="mb-0"> رسائل الزوار</h4>
            </div>

        </div>
    </div>
    <!-- widgets -->
    <div class="row">



        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatable"
                               class="table table-striped table-bordered p-0 dataTable"
                               role="grid" aria-describedby="datatable_info">

                            <thead>

                            <tr>
                                <td class="">#</td>
                                <td class="w-5">الاسم</td>
                                <td class="w-25">العنوان</td>
                                <td class="w-25">الرسالة</td>
                                <td class="">البريد</td>
                                <td class="w-5">خيارات</td>
                            </tr>

                            </thead>

                        </table>

                    </div>
    </div>
    </div>
    </div>



    </div>



    <!--=================================
     wrapper -->

    <!--=================================
     footer -->

    @push('js')
     @include('dashboard.inbox.js')

    @endpush
@stop
