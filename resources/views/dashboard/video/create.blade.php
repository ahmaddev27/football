@extends('dashboard.layouts.master',['title'=>'فيديو جديد'])
@section('content')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/tagin@2.0.2/dist/tagin.min.css">
    <script src="https://unpkg.com/tagin@2.0.2/dist/tagin.min.js"></script>
@endpush
    <div class="page-title">
        <div class="row">
            <div class="col-sm-12 mb-3">

                <h4 class="mb-0"> اضافة فيديو  جديد</h4>
                <a href="{{route('dashboard.video.index')}}" type="button" class="button x-small float-right mb-1"
                   title="الاخبار">
                    <i class="ti ti-list"></i>
                </a>

            </div>

        </div>
    </div>
    <!-- widgets -->
    <form action="{{route('dashboard.video.store')}}"method="post" enctype="multipart/form-data" id="form">
        @csrf
        <div class="row">

            <div class="col-xl-8 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان الفيديو</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="ادخل عنوان الفيديو">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">لينك اليوتيوب</label>
                            <input type="text" class="form-control" name="link" id="link"
                                   placeholder="ادخل لينك الفيديو">
                        </div>


                        <div class="form-group">
                            <label for="category">تصنيف الفيديو</label> <br>
                            <select id="category" class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                </div>
            </div>


            <div class="col-xl-4 mb-30">
                <div class="card card-statistics ">

                    <div class="card-body">
                        <img src="{{asset('dashboard/img.png')}}"
                             id="image" class="img-fluid img-thumbnail">
                        <div class="custom-file">

                            <input type="file" name="image"  accept="image/*" class="custom-file-input" onchange="readURL(this);" id="customFileLang" lang="ar">
                            <label class="custom-file-label" for="customFileLang">اختر صورة الفيديو</label>
                        </div>
                    </div>

                </div>

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


        <script type="text/javascript">
            function readURL(input){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image')
                            .attr('src', e.target.result)
                            .width(370)
                            .height(170);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        @include('dashboard.video.js')

    @endpush
@stop
