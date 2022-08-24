@extends('dashboard.layouts.master',['title'=>'الفيديوهات'])
@section('content')
        <div class="page-title">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h4 class="mb-0"> مكتبة الفيديوهات</h4>
            </div>

        </div>
    </div>
    <!-- widgets -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form>
                        <div class="row">
                    <div class="col-9">
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="search">
                            <option value="">جميع التصنيفات</option>

                            @foreach(championship(null) as $c)
                                <option value="{{$c['name']}}"{{request()->search ==$c['name'] ? 'selected' : ''}} value="{{request()->search}}">{{$c['name']}}</option>
                            @endforeach
                        </select>

                    </div>
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> تصفية </button>
                            <a href="{{route('dashboard.video.create')}}" class="button x-small float-right ml-1" title="اضافة">
                                <i class="fa fa fa-plus-circle"></i>
                            </a>

                    </div>

                    </form>

                    <div class="row">
                        <div class="col-xl-12 mb-30">

                            @if($videos->count()==0)
                                <h4 class="text-center mt-5 text-muted">لا يوجد فيديوهات !</h4>
                            @else
                                <div class="card-body">
                                    <h5 class="card-title">الفيديوهات</h5>
                                    <div class="row">
                                        @foreach($videos as $video)
                                            <div class="col-xl-4 mb-60">
                                                <div class="pricing-table active">
                                                    <div class="card-header">
                                                        <a href="#" id="view"
                                                           data-toggle="modal" data-target="#exampleModal" model_id="{{$video->id}}"
                                                           title="عرض">
                                                        <img class="img img-thumbnail" id="image"
                                                             src="{{asset($video->image)}}">
                                                        </a>
                                                    </div>
                                                    <div class="pricing-top">
                                                        <div class="pricing-title">
                                                            <h6 class="mb-15">{{str_limit($video->title,80)    }}</h6>
                                                            <p class="float-right">{{$video->championship}} - <span><i
                                                                        class="ti-eye"></i></span> {{$video->views}}
                                                            </p>

                                                        </div>

                                                        <div class="modal-footer text-center">
                                                            <a href="#" id="view" class="x-small float-right mb-1"
                                                               data-toggle="modal" data-target="#exampleModal" model_id="{{$video->id}}"
                                                               title="عرض">
                                                               </a>
                                                             <button id="delete" route="{{route('dashboard.video.destroy')}}" model_id="{{$video->id}}" class="btn btn-danger float-left"><i
                                                                    class="ti-trash"></i></button>
                                                            <a href="{{route('dashboard.video.edit',$video->id)}}" class="btn btn-info float-left"><i
                                                                    class="fa fa-edit"></i></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>

                            @endif
                        </div>
                    </div>
                    <div class="text-center justify-content-center">
                        {{$videos->appends(request()->query())->links('vendor.pagination.simple-tailwind')}}

                    </div>
                </div>

            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">عنوان الفيديو</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body ">
                        <iframe id="link" width="100%" height="415" src=""
                                title="YouTube video player" frameborder="5"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>

                        </iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button gray x-small" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>


        </div>
    </div>



    <!--=================================
     wrapper -->

    <!--=================================
     footer -->

    @push('js')

        {{--Delete --}}
        <script>

            $(document).on("click", '#delete', function (e) {
                e.preventDefault();
                var model_id = $(this).attr('model_id');
                var route = $(this).attr('route');

                swal({
                    title: 'هل انت متأكد من الحذف ?',
                    text: "بمجرد التأكيد سيتم الحذف نهائيا!",
                    type: 'warning',
                    confirmButtonText: 'نعم , احذف',
                    confirmButtonColor: '#ef4343',
                    showCancelButton: true,
                    cancelButtonText: 'لا , الغاء',
                    cancelButtonColor: '#343a40',
                }).then(function (result) {
                    if (result.value) {

                        $.ajax({

                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id': model_id,
                            },
                            url: route,
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


        {{--get Data to modal--}}
        <script>
            $(document).on('click', '#view', function(){
                var id = $(this).attr("model_id");
                $.ajax({
                    url:"{{route('video.ajax.data')}}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data)
                    {

                        $('#exampleModalLabel').text(function() {
                            return data.title;
                        });
                        $('#link').attr('src',data.link);


                    }
                })
            });
        </script>



    @endpush
@stop
