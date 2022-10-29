<!DOCTYPE html>
<html lang="ar">
<head>
    <title>{{setting('name')}} | {{@$title}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('front.layouts.css')


    <!--===============================================================================================-->
</head>
<body class="animsition" style="direction: rtl">

@include('front.layouts.header')

@include('front.layouts.champions-slider')


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



@yield('main')




@include('front.layouts.footer')
<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
</div>


@include('front.layouts.js')


</body>
</html>
