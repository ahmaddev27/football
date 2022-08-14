@extends('dashboard.layouts.master',['title'=>'تعديل خبر '])
@section('content')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/tagin@2.0.2/dist/tagin.min.css">
    <script src="https://unpkg.com/tagin@2.0.2/dist/tagin.min.js"></script>
@endpush
    <div class="page-title">
        <div class="row">
            <div class="col-sm-12 mb-3">

                <h4 class="mb-0"> تعديل خبر </h4>
                <a href="{{route('dashboard.post.index')}}" type="button" class="button  x-small float-right mb-1"
                   title="الاخبار">
                    <i class="ti ti-list"></i>
                </a>


            </div>

        </div>
    </div>
    <!-- widgets -->
    <form action="{{route('dashboard.post.update',$post->id)}}"method="post" enctype="multipart/form-data" id="form">
        @csrf
        <div class="row">

            <div class="col-xl-8 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان الخبر</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}"
                                   placeholder="ادخل عنوان الخبر">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">وصف الخبر</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{$post->description}}"
                                   placeholder="ادخل وصف الخبر">
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="tags">التاجات</label>
                                    <input type="text" name="tags" value="{{$post->tags}}" class="form-control tagin">
                                </div>

                            </div>

                        </div>
                            <div class="form-group">
                                <div class="row">
                                <div class="col-6">
                                    <label for="category">تصنيف الخبر</label> <br>
                                    <select id="category" class="form-control" name="category_id">
                                        <option>اختار التصنيف</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"{{$post->category_id==$category->id?'selected':''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="category">الدوري</label> <br>
                                    <select id="championship" class="form-control" name="championship[]">
                                        <option>اختار الدوري</option>
                                        @foreach(championship(null) as $x)
                                            <option value="{{$x['name']}}">{{$x['name']}}</option>

                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-12 mt-3">
                                    <textarea id="summernote" name="details" >{{$post->details}}</textarea>
                                </div>

                            </div>
                            </div>






                    </div>
                </div>
            </div>


            <div class="col-xl-4 mb-30">
                <div class="card card-statistics ">

                    <div class="card-body">
                        <img src="{{asset($post->image)}}" id="image" class="img-fluid img-thumbnail">
                        <div class="custom-file">
                            <input type="file" name="image"  accept="image/*" class="custom-file-input" onchange="readURL(this);" id="customFileLang" lang="ar">
                            <label class="custom-file-label" for="customFileLang">اختر صورة الخبر</label>
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

        <!-- Or using option: -->
        <script>
            const tagin = new Tagin(document.querySelector('.tagin'), {
                placeholder: 'اضف'
            })
        </script>

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

        @include('dashboard.post.js')

    @endpush
@stop
