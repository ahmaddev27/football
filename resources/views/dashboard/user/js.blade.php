<script src="{{asset('dashboard/js/bootstrap-datatables/jquery.dataTables.min.js')}}"></script>
<!-- plugins-jquery -->
<script src="{{asset('dashboard/js/bootstrap-datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('dashboard/js/jquery-validation/dist/jquery.validate.js')}}"
        type="text/javascript"></script>

<script src="{{asset('dashboard/js/jquery-validation/dist/localization/messages_ar.js')}}"
        type="text/javascript"></script>



{{--Data Table--}}
<script type="text/javascript">

    var url = "{{ route('dashboard.user.list') }}";
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

                {data: 'email', name: 'email'},
                {data: 'name', name: 'name'},
                {data: 'comments', name: 'comments'},
                {data: 'articles', name: 'articles'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });


    });


</script>


<script>

    $(function() {

        $("#form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 4
                },
                action: "required"
            },
            messages: {
                pName: {
                    required: "Please enter some data",
                    minlength: "Your data must be at least 8 characters"
                },
                action: "Please provide some data"
            },
            submitHandler: function(form){

                let name = $('#name').val();

                $.ajax({
                    data: {
                        "_token": "{{ csrf_token() }}",
                        name:name,

                    },
                    url: "{{route('dashboard.category.store')}}",
                    type: "post",
                    dataType: "JSON",
                    success: function (data) {
                        swal("تم", data.message, "success");
                    },

                    error: function (data) {
                        swal("خطأ!",'فشل حفظ البيانات', "error");
                    },
                })


                $('form input:not([type="submit"])').keydown((e) => {
                    if (e.keyCode === 13) {
                        e.preventDefault();
                        return false;
                    }
                    return true;
                });

                $('#datatable').DataTable().ajax.reload();
                $('input[type="text"]').val('');

            }
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







{{--get Data to edit--}}
<script>
    $(document).on('click', '#edit', function(){
        var id = $(this).attr("model_id");
        $.ajax({
            url:"{{route('dashboard.category.ajax.data')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                $('#editid').val(data.id);
                $('#editname').val(data.name);

            }
        })
    });
</script>



<script>

    $(function() {

        $("#editform").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 4
                },
                action: "required"
            },
            messages: {
                pName: {
                    required: "Please enter some data",
                    minlength: "Your data must be at least 8 characters"
                },
                action: "Please provide some data"
            },
            submitHandler: function(form){

                let name = $('#editname').val();
                let id = $('#editid').val();

                $.ajax({
                    data: {
                        "_token": "{{ csrf_token() }}",
                        name:name,
                        id:id,

                    },
                    url: "{{route('dashboard.category.update')}}",
                    type: "post",
                    dataType: "JSON",
                    success: function (data) {
                        swal("تم", data.message, "success");
                    },

                    error: function (data) {
                        swal("خطأ!",'فشل حفظ البيانات', "error");
                    },
                })


                $('form input:not([type="submit"])').keydown((e) => {
                    if (e.keyCode === 13) {
                        e.preventDefault();
                        return false;
                    }
                    return true;
                });

                $('#datatable').DataTable().ajax.reload();
                $('input[type="text"]').val('');

            }
        });
    });

</script>
