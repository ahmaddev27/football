<!DOCTYPE html>
<html lang="ar">
<head>
    <title>{{setting('name')}} | {{@$title}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('front.css')


    <!--===============================================================================================-->
</head>
<body class="animsition" style="direction: rtl">

@include('front.header')
@include('front.champions-slider')




@yield('main')




@include('front.footer')
<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
</div>


@include('front.js')


</body>
</html>
