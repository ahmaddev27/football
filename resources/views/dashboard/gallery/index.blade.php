@extends('dashboard.layouts.master',['title'=>'مكتبة الصور'])
@section('content')




    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h4 class="mb-0"> مكتبة الصور</h4>
            </div>

        </div>
    </div>
    <!-- widgets -->
    <div class="row">


        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a  href="{{route('dashboard.gallery.create')}}" class="button x-small float-right mb-1" title="اضافة">
                        <i class="fa fa fa-plus-circle"></i>
                    </a>


                    <div class="table-responsive">


                        <table id="datatable"
                               class="table table-striped table-bordered p-0 dataTable"
                               role="grid" aria-describedby="datatable_info">

                            <thead>

                            <tr>
                                <td class="">#</td>
                                <td class="w-50">الوصف</td>
                                <td class="">عدد الصور</td>
                                <td class="">المشاهدات</td>
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

            var url = "{{ route('dashboard.gallery.list') }}";
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
                        {data: 'DT_RowIndex', name: 'id',},
                        {data: 'description', name: 'description'},
                        {data: 'images', name: 'images'},
                        {data: 'views', name: 'views'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
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




    @endpush
@stop
