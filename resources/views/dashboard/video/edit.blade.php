@extends('dashboard.layouts.master',['title'=>'تعديل فيديو '])
@section('content')
    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/tagin@2.0.2/dist/tagin.min.css">
        <script src="https://unpkg.com/tagin@2.0.2/dist/tagin.min.js"></script>
    @endpush
    <div class="page-title">
        <div class="row">
            <div class="col-sm-12 mb-3">

                <h4 class="mb-0"> تعديل فيديو  </h4>
                <a href="{{route('dashboard.video.index')}}" type="button" class="button x-small float-right mb-1"
                   title="الاخبار">
                    <i class="ti ti-list"></i>
                </a>

            </div>

        </div>
    </div>
    <!-- widgets -->
    <form action="{{route('dashboard.video.update',$video->id)}}"method="post" enctype="multipart/form-data" id="form">
        @csrf
        <div class="row">

            <div class="col-xl-8 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان الفيديو</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$video->title}}"
                                   placeholder="ادخل عنوان الفيديو">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">لينك اليوتيوب</label>
                            <input type="text" class="form-control" name="link" id="link" value="{{$video->link}}"
                                   placeholder="ادخل لينك الفيديو">
                        </div>

                        <div class="form-group justify-content-center">
                            <iframe width="100%"  height="300px" src="{{$video->link}}"></iframe>
                        </div>


                            <div class="form-group">
                                <label for="category">تصنيف الفيديو</label> <br>
                                <select id="category" class="form-control" name="championship">
                                    @foreach(championship(null) as $champion)
                                        <option value="{{$champion['name']}}"{{$champion['name']==$video->champion?'selected':''}}>{{$champion['name']}}</option>
                                    @endforeach
                                </select>
                            </div>



                        </div>
                </div>
            </div>


            <div class="col-xl-4 mb-30">
                <div class="card card-statistics ">

                    <div class="card-body">
                        <img src="{{asset($video->image)}}"
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
