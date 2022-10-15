@extends('dashboard.layouts.master',['title'=>'الاخبار'])
@section('content')




    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h4 class="mb-0"> الاخبار</h4>
            </div>

        </div>
    </div>
    <!-- widgets -->
    <div class="row">


        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a  href="{{route('dashboard.post.create')}}" class="button x-small float-right mb-1" title="اضافة">
                        <i class="fa fa fa-plus-circle"></i>
                    </a>




                    <div class="table-responsive">


                        <table id="datatable"
                               class="table table-striped table-bordered p-0 dataTable"
                               role="grid" aria-describedby="datatable_info">

                            <thead>

                            <tr>
                                <th class="w-5">

                                    <input type="checkbox" id="checkAll" >

                                    <a href="#" type="button" class='btn btn-danger btn-sm text-center'
                                       id='delete_record'
                                    ><i class="fa fa-trash"></i>

                                    </a>


                                </th>

                                <td class="w-25">العنوان</td>
                                <td class="w-25">الوصف</td>
                                <td class="w-5">التصنيف</td>
                                <td class="w-5">المشاهدات</td>
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
        <script src="{{asset('dashboard/js/bootstrap-datatables/jquery.dataTables.min.js')}}"></script>
        <!-- plugins-jquery -->
        <script src="{{asset('dashboard/js/bootstrap-datatables/dataTables.bootstrap4.min.js')}}"></script>
        {{--Data Table--}}



        <script type="text/javascript">

            var url = "{{ route('dashboard.post.list') }}";
            $(document).ready(function () {



                $('#datatable').DataTable({
                    'processing': true,
                    'serverSide': true,
                    ajax:{
                        url: url,
                    },
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.12.0/i18n/ar.json'
                    },

                    columns:[
                        {data: 'check', name: 'checkbox',searchable:false ,orderable: false,"className": "text-center",},
                        {data: 'title', name: 'title',"className": "text-center",},
                        {data: 'description',"className": "text-center", name: 'description'},
                        {data: 'category', name: 'category',orderable: false, searchable: false,"className": "text-center",},
                        {data: 'views', name: 'views',"className": "text-center",},
                        {data: 'action', name: 'action', orderable: false, searchable: false,"className": "text-center",},
                    ],
                });


            });


        </script>

        {{--Delete --}}
        <script>

            $(document).on("click",'#delete',function (e){
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
                }).then(function(result){
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

                                $('#datatable').DataTable().ajax.reload();

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




        {{-- delete all selected--}}


        <script type="text/javascript">


                $('#checkAll').on('click', function(e) {

                   $(".checkbox").prop('checked',$(this).prop('checked'));
                });

        </script>


        <script>

            $(document).on("click",'#delete_record',function (){
                var id=[];

                $('.checkbox:checked').each(function (){
                    id.push($(this).val());
                });


                if (id.length <= 0){
                    swal(
                        'حدد عنصر واحد على الاقل',
                        'لم يتم الحذف ',
                        'info',

                    )

            } else   swal({
                    title: 'هل انت متأكد ؟',
                    text: "لن تكون قادر على استعادته !",
                    type: 'warning',
                    confirmButtonText: 'حذف',
                    confirmButtonColor: '#f4516c',
                    showCancelButton: true,
                    cancelButtonText: 'الغاء',
                    cancelButtonColor: '#343a40',
                }).then(function(result){
                    if (result.value) {

                        $.ajax({
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id': id,
                            },

                            url:'{{route('dashboard.post.destroyall')}}',
                            type: "json",
                            method: "post",

                            success: function (data) {
                                swal(
                                    'تم الحذف !',
                                    data.message,
                                    'success'

                                )

                                $('#datatable').DataTable().ajax.reload();


                            },
                        })


                    }
              });





            });

        </script>




    @endpush
@stop
