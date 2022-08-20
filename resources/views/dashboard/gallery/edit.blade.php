@extends('dashboard.layouts.master',['title'=>'تعديل البوم '])
@section('content')
@push('css')
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
    />

@endpush
    <div class="page-title">
        <div class="row">
            <div class="col-sm-12 mb-3">

                <h4 class="mb-0"> تعديل البوم  </h4>
                <a href="{{route('dashboard.gallery.index')}}" type="button" class="button x-small float-right mb-1"
                   title="قائمة الالبومات">
                    <i class="ti ti-list"></i>
                </a>


            </div>

        </div>
    </div>
    <!-- widgets -->

        <div class="row">

            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">عنوان الالبوم</label>
                            <input type="text" onchange="myChangeFunction(this)" class="form-control"
                                   name="description" id="input"
                                   value="{{$gallery->description}}" placeholder="ادخل العنوان">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 mt-3">

                                    <form class="dropzone" method="post" id="dropzone" enctype="multipart/form-data"
                                        action=" {{route('dashboard.gallery.images.edit-upload')}}">
                                        @csrf
                                        <input type="hidden" name="description" id="description" value="{{$gallery->description}}">
                                        <input type="hidden" name="id" id="id" value="{{$gallery->id}}">
                                        <div class="dz-message" data-dz-message>
                                             <span style="font-size:50px;color: #3371cd">
                                                 <i class="ti-gallery"></i>
                                            </span>
                                            <span style="font-family: Cairo;color: #3371cd">اضغط للادراج او اسقط الصور هنا </span>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                @if($gallery->images()->exists())

                        <div class="container">
                            <div class="row justify-content-center" id="gallery" data-toggle="modal" data-target="#exampleModal">

                                @foreach($gallery->images as $key=>$image)

                                    <div class="col-lg-2 mb-2  mt-5 mb-lg-0">
                                        <button class="btn btn-danger btn-sm m-1" id="delete" data-id="{{$image->id}}" ><i class="fa fa-trash"></i></button>
                                        <a data-fancybox="gallery" data-src="{{asset($image->image)}}">
                                            <img class="w-100 shadow-1-strong rounded mb-4"  style="height:80px; border-image: linear-gradient(green, blue) 27;" src="{{asset($image->image)}}" />
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                @endif


                </div>

            </div>
        </div>


    <!--=================================
     wrapper -->

    <!--=================================
     footer -->

    @push('js')


        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>

        <script type="text/javascript">
            function myChangeFunction(input1) {
                var input2 = document.getElementById('description');
                input2.value = input1.value;
            }
        </script>

        <script type="text/javascript">


            Dropzone.options.dropzone =
                {

                    images:jQuery.parseJSON('{!! json_encode($gallery->images) !!}'),
                    maxFilesize: 50,
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
                    timeout: 10000,
                    addRemoveLinks: true,
                    dictRemoveFile: "حذف الصورة",
                    dictCancelUpload: "الغاء",


                    removedfile: function(file) {
                            var name = file.name;

                        var desc=document.getElementById('description').value;
                        $.ajax({

                            type: 'POST',
                            url: '{{ route("dashboard.gallery.images.delete") }}',
                            data: {filename: name, description:desc, "_token": "{{ csrf_token() }}"},
                            success: function (data){
                                swal(
                                    'تم الحذف !',
                                    'تم حذف الصورة',
                                    'success',
                                )
                            },
                            error: function(data) {
                                swal(
                                    'يوجد خطأ !',
                                    'error'
                                )
                            }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },



                    error: function(data)
                    {
                        swal(
                            'يوجد خطأ !',
                           'يرجى ادخال اسم الالبوم',
                            'error'

                        )
                    }
                };
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
        <script>
            // Customization example
            Fancybox.bind('[data-fancybox="gallery"]', {
                infinite: false
            });
        </script>



        <script>

            $(document).on("click",'#delete',function (e){
                e.preventDefault();
                var id = $(this).attr('data-id');

                swal({
                    title: 'هل انت متأكد من الحذف ?',
                    text: "بمجرد التأكيد سيتم الحذف نهائيا!",
                    type: 'warning',
                    confirmButtonText: 'نعم , احذف',
                    confirmButtonColor: '#ef4343',
                    showCancelButton: true,
                    cancelButtonText: 'لا , الغاء',
                    cancelButtonColor: '#343a40',
                }).then(function(result){
                    if (result.value) {

                        $.ajax({

                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id': id,

                            },
                            url: '{{route('dashboard.gallery.image.delete')}}',
                            type: "json",
                            method: "post",


                            success: function (data) {
                                swal(
                                    'تم الحذف !',
                                    data.message,
                                    'success'

                                )

                                setTimeout(function()
                                {
                                    location.reload();
                                }, 1000);


                            },
                        })

                    } else if (result.dismiss === 'cancel') {
                        swal(
                            'تم الالغاء',
                            'لم يتم الحذف',
                            'error',

                        )
                    }
                });
            });

        </script>


        @include('dashboard.gallery.js')

    @endpush
@stop
