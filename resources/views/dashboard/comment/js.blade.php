<script src="{{asset('dashboard/js/bootstrap-datatables/jquery.dataTables.min.js')}}"></script>
<!-- plugins-jquery -->
<script src="{{asset('dashboard/js/bootstrap-datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('dashboard/js/jquery-validation/dist/jquery.validate.js')}}"
        type="text/javascript"></script>

<script src="{{asset('dashboard/js/jquery-validation/dist/localization/messages_ar.js')}}"
        type="text/javascript"></script>



{{--Data Table--}}
<script type="text/javascript">

    var url = "{{ route('dashboard.comment.list') }}";
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
                {data: 'body', name:'body'},
                {data: 'user_id', name: 'user_id', orderable: false, searchable: false},
                {data: 'article_id', name: 'article_id', orderable: false, searchable: false},
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



{{--get Data to show--}}
<script>
    $(document).on('click', '#show', function(){
        var id = $(this).attr("model_id");
        $.ajax({
            url:"{{route('dashboard.comment.ajax.data')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                $('#by').val(data.user.name);
                $('#title').val(data.article.title);
                $('#body').val(data.body);

            }
        })
    });
</script>


