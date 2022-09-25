@extends('front.layouts.index',['title'=>'كتابة مقال جديد'])
<!-- Post -->

@section('main')


    <section class="bg0 p-b-140 p-t-10">


        <div class="container">
            <div class="text-center row bg13 p-4 m-4 justify-content-center">
                <ul class="nav justify-content-center">
                    <li class="nav-item f1-m-1 cl2 hov-cl10 trans-03">
                        <h5>مقال جديد</h5>

                </ul>
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('article') }}">
                    @csrf


                    <div class="row mb-3">
                        <label for="title" class="col-md-3 col-form-label float-l">العنوان </label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-2 col-form-label text-md-end">التفاصيل</label>

                        <div class="col-md-8">

                            <textarea  rows="5" id="summernote" name="details" ></textarea>


                            @error('details')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>



                    <div class="row mb-3 mt-3  text-left">
                        <label for="password" class="col-md-3 col-form-label text-md-end"></label>

                        <div class="col-md-6 ">
                            <button type="submit" class="btn-block btn btn-success btn-lg bg10">حفظ</button>
                        </div>
                    </div>




                </form>

            </div>
        </div>


    </section>


@stop







@push('js')

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'ادخل تفاصيل المقال',
            tabsize: 5,
            height: 200,
        });
    </script>



@endpush
