@extends('dashboard.layouts.master',['title'=>'المقالات'])
@section('content')




    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h4 class="mb-0"> المقالات</h4>
            </div>

        </div>
    </div>
    <!-- widgets -->
    <div class="row">


        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
{{--                    <button type="button" class="btn btn-secondary float-right mb-1" data-toggle="modal" data-target="#exampleModal"--}}
{{--                            title="اضافة">--}}
{{--                        <i class="fa fa fa-plus-circle"></i>--}}
{{--                    </button>--}}


                    <div class="table-responsive">


                        <table id="datatable"
                               class="table table-striped table-bordered p-0 dataTable"
                               role="grid" aria-describedby="datatable_info">

                            <thead>

                            <tr>
                                <td class="">#</td>
                                <td class="">العنوان</td>
                                <td class="">التفاصيل</td>
                                <td class="">الكاتب</td>
                                <td class=""> التعليقات</td>
                                <td class="">المشاهدات</td>
                                <td class="">الحالة</td>
                                <td class="">خيارات</td>
                            </tr>

                            </thead>

                        </table>

                    </div>
                </div>
            </div>
        </div>



    </div>


    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="form" action="#">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تفاصيل المقال</h5>
                        <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">عنوان المقال</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  readonly="" name="title" id="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">الكاتب</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  readonly="" name="by" id="by">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">التفاصيل</label>
                            <div class="col-sm-9">
                               <textarea  readonly class="form-control"  name="details" id="details">
                               </textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>

            </form>
        </div>
    </div>




    <!--=================================
     wrapper -->

    <!--=================================
     footer -->

    @push('js')
     @include('dashboard.article.js')
    @endpush
@stop
