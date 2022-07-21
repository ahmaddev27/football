<script src="{{asset('dashboard/js/jquery-validation/dist/jquery.validate.js')}}"
        type="text/javascript"></script>

<script src="{{asset('dashboard/js/jquery-validation/dist/localization/messages_ar.js')}}"
        type="text/javascript"></script>



<script>

    $(function() {
        $("#form").validate({
            rules: {
                title: {
                    required: true,
                },
                link: {
                    required: true,
                },

                category_id: {
                    required: true,
                },

            },

            submitHandler: function(form) {
                form.submit();
            }
        });



    });

</script>






<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script>
    $('select').select2({width: '50%', placeholder: "ادخل تصنيف الخبر", allowClear: true});
</script>

