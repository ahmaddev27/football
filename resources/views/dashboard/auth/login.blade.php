<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title>  فوتبول - لوحة التحكم | تسجيل الدخول</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Cairo', sans-serif;
        }

         *{
             font-family: 'Cairo';

         }
        .error{
            color:#f25555;
        }
    </style>
    <!-- css -->
    <link href="{{asset('dashboard/css/style.css') }}" rel="stylesheet">

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
login-->

    <section class="height-100vh d-flex align-items-center page-section-ptb login">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                     style="background-image:  url({{asset(\App\Models\Setting::where('key','icon')->first()->value)}});">
                    <div class="login-fancy">
                        <h2 class="text-white mb-20">مرحبا بعودتك!</h2>
                        <p class="mb-20 text-white">{{\App\Models\Setting::where('key','welcome')->first()->value}}.</p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 class="mb-30">تسجيل الدخول</h3>

                        <form id="form" method="POST" action="{{route('dashboard.login')}}">
                            @csrf
                            <div class="section-field mb-20">
                                <label class="mb-10" for="name">البريدالالكتروني*</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>

                            <div class="section-field mb-20">
                                <label class="mb-10" for="Password">كلمة المرور * </label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>
                            <div class="section-field">
                                <div class="text-center">
                                    <button class="button"><span>دخول</span><i class="fa fa-check"></i></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
login-->

</div>
<!-- jquery -->
<script src="{{ asset('dashboard/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ asset('dashboard/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script src="{{asset('dashboard/js/custom.js') }}"></script>


<script src="{{asset('dashboard/js/jquery-validation/dist/jquery.validate.js')}}"
        type="text/javascript"></script>

<script src="{{asset('dashboard/js/jquery-validation/dist/localization/messages_ar.js')}}"
        type="text/javascript"></script>




<script>

    $(function() {

        $("#form").validate({
            rules: {
                name: {
                    required: true,
                },
                password: {
                    required: true,
                },
                action: "required"
            },

        });
    });

</script>



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
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>



</body>

</html>
