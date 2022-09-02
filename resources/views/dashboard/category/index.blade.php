@extends('dashboard.layouts.master',['title'=>'التصنيفات'])
@section('content')




    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h4 class="mb-0"> التصنيفات</h4>
            </div>

        </div>
    </div>
    <!-- widgets -->
    <div class="row">



        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <button type="button" class="button  x-small float-right mb-1" data-toggle="modal" data-target="#exampleModal"
                            title="اضافة">
                        <i class="fa fa fa-plus-circle"></i>
                    </button>


                    <div class="table-responsive">


                        <table id="datatable"
                               class="table table-striped table-bordered p-0 dataTable"
                               role="grid" aria-describedby="datatable_info">

                            <thead>

                            <tr>
                                <td class="">#</td>
                                <td class="w-50">العنوان</td>
                                <td class="">عدد الاخبار</td>

                                <td class="w-25">خيارات</td>
                            </tr>

                            </thead>

                        </table>

                    </div>
    </div>
    </div>
    </div>



    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="form" action="#">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة تنصيف جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">عنوان التصنيف</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name" placeholder="ادخل عنوان التصنيف">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="button x-small">حفظ</button>
                    <button type="button" class="button gray x-small" data-dismiss="modal">اغلاق</button>
                </div>
            </div>

            </form>
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="editform" action="#">
                <input type="hidden" id="editid" value="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل تنصيف </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">عنوان التصنيف</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="editname" placeholder="ادخل عنوان التصنيف">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="button x-small">حفظ</button>
                    <button type="button" class="button gray x-small" data-dismiss="modal">اغلاق</button>
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
     @include('dashboard.category.js')

    @endpush
@stop
