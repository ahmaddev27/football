@extends('dashboard.layouts.master',['title'=>'الصفحات'])
@section('content')




    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h4 class="mb-0"> الصفحات</h4>
            </div>

        </div>
    </div>
    <!-- widgets -->
    <div class="row">


        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a type="button" class="btn btn-secondary float-right mb-1"    href="{{route('dashboard.page.create')}}"                         title="اضافة">
                        <i class="fa fa fa-plus-circle"></i>
                    </a>


                    <div class="table-responsive">


                        <table id="datatable"
                               class="table table-striped table-bordered p-0 dataTable"
                               role="grid" aria-describedby="datatable_info">

                            <thead>

                            <tr>
                                <td class="">#</td>
                                <td class="">العنوان</td>
                                <td class="">التفاصيل</td>
                                <td class="">خيارات</td>
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
     @include('dashboard.page.js')
    @endpush
@stop
