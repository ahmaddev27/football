@extends('dashboard.layouts.master',['title'=>'صفحة جديدة '])
@section('content')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/tagin@2.0.2/dist/tagin.min.css">
    <script src="https://unpkg.com/tagin@2.0.2/dist/tagin.min.js"></script>
@endpush
    <div class="page-title">
        <div class="row">
            <div class="col-sm-12 mb-3">

                <h4 class="mb-0"> اضافة صفحة جديدة</h4>
                <a href="{{route('dashboard.page.index')}}" type="button" class="button x-small float-right mb-1"
                   title="الاخبار">
                    <i class="ti ti-list"></i>
                </a>


            </div>

        </div>
    </div>
    <!-- widgets -->
    <form action="{{route('dashboard.page.store')}}"method="post" enctype="multipart/form-data" id="form">
        @csrf
        <div class="row">

            <div class="col-xl-8 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم الصفحة</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="ادخل  اسم الصفحة">

                        </div>


                            </div>

                                <div class="col-12 mt-3">
                                    <textarea id="summernote" name="details"></textarea>
                                </div>

                            </div>

                        </div>







            <div class="col-xl-4 mb-30">

                <div class="card card-statistics mt-3 ">
                    <div class="card-body">
                        <button type="submit" class="button btn-block">حفظ</button>
                    </div>
                </div>

            </div>
            </div>

    </form>


    <!--=================================
     wrapper -->

    <!--=================================
     footer -->

    @push('js')


        @include('dashboard.page.js')

    @endpush
@stop
