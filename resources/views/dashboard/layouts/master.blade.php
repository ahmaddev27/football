<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{setting('name')}} - لوحة التحكم | {{@$title}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{setting('icon')}}" />


    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/style.css')}}" />

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
@stack('css')
    <style>
        *{
            font-family: 'Cairo';

        }
        .error{
            color:#f25555;
        }
    </style>
</head>

<body>

<div class="wrapper">

    <!--=================================
     preloader -->

    <div id="pre-loader">
        <img src="{{asset('dashboard/images/pre-loader/loader-01.svg')}}" alt="">
    </div>

    <!--=================================
     preloader -->


    <!--=================================
     header start-->

@include('dashboard.layouts.header')

<!--=================================
     header End-->

    <!--=================================
     Main content -->

    <div class="container-fluid">
        <div class="row">
            <!-- Left Sidebar start-->
        @include('dashboard.layouts.sidebar')
        <!-- Left Sidebar End-->

            <!--=================================
             Main content -->

            <!--=================================
           wrapper -->

            <div class="content-wrapper">
                @if ($errors->any())

                    <div role="alert" class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-danger alert-dismissible fade show">
                        <div class="m-alert__text">
                            <strong>يوجد خطأ !</strong>
                            <div class="card-body">
                                @foreach ($errors->all() as $error)
                                    <strong>  {{ $error }} </strong> <br>
                                @endforeach
                            </div>

                        </div>
                        <div class="m-alert__close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>

                @endif
            @yield('content')



            <footer class="bg-white p-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-center text-md-left">
                            <p class="mb-0"> <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> جميع الحقوق محفوظة ل  <a href="#"> فوتبول </a>  </p>
                        </div>
                    </div>

                </div>
            </footer>


        </div><!-- main content wrapper end-->

        </div>
    </div>
</div>

<!--=================================
 footer -->



<!--=================================
 jquery -->

<!-- jquery -->
<script src="{{asset('dashboard/js/jquery-3.3.1.min.js')}}"></script>

<!-- plugins-jquery -->
<script src="{{asset('dashboard/js/plugins-jquery.js')}}"></script>


<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('6932c3caa23271edb2a1', {
        cluster: 'ap2',
        encrypted: true
    });

    var channel = pusher.subscribe('notification');


</script>

<script src="{{asset('dashboard/pusherNotifications.js')}}"> </script>

<!-- plugin_path -->
<script>
    var plugin_path = '{{asset('dashboard/js')}}'+'/';

</script>




<!-- custom -->
<script src="{{asset('dashboard/js/custom.js')}}"></script>

<script>
    @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    switch(type) {
        case'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case'error':
            toastr.error("{{Session::get('message')}}","error");
            break;
    }
    @endif
</script>


<script>

    $(document).on("click", "#markReadAll", function(e){

        var route =  $(this).attr('data-route');

        $.ajax({

            url: route,
            type: "get",
            dataType: "JSON",

            success: function (data) {
                swal("تمت العملية", data.message, data.icon);
                setTimeout(function()
                {
                    location.reload();
                }, 1000);

            },





        })

    });
</script>

<script>

    $(document).on("click", "#read", function(e){
        var route =  $(this).attr('data-route');
        var id =  $(this).attr('data-id');
        $.ajax({
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
            },
            url: route,
            type: "post",
            dataType: "JSON",
        })

    });
</script>




@stack('js')



</body>
</html>
