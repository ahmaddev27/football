<script src="{{asset('dashboard/js/bootstrap-datatables/jquery.dataTables.min.js')}}"></script>
<!-- plugins-jquery -->
<script src="{{asset('dashboard/js/bootstrap-datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('dashboard/js/jquery-validation/dist/jquery.validate.js')}}"
        type="text/javascript"></script>

<script src="{{asset('dashboard/js/jquery-validation/dist/localization/messages_ar.js')}}"
        type="text/javascript"></script>


<script>
    $('#summernote').summernote({
        height: 150,                 // set editor height
        focus: true,
        placeholder: 'ادخل محتوى الصفحة',
    });
</script>



{{--Data Table--}}
<script type="text/javascript">

    var url = "{{ route('dashboard.page.list') }}";
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
                {data: 'title', name: 'title'},
                {data: 'details', name: 'details'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });


    });


</script>



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


