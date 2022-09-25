@extends('front.layouts.index',['title'=>'تسجيل عضوية جديدة'])
<!-- Post -->
@section('main')


    <section class="bg0 p-b-140 p-t-10">


        <div class="container">
            <div class="text-center row bg13 p-4 m-4 justify-content-center">
                <ul class="nav justify-content-center">
                    <li class="nav-item f1-m-1 cl2 hov-cl10 trans-03">
                        <h5>تسجيل عضوية جديدة</h5>

                </ul>
            </div>
            <div class="card-body ">
                <form method="POST"  action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">الاسم</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">البريد الالكتروني</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">كلمة المرور</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">تأكيد كلمة المرور</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block bg10">
                                تسجيل
                            </button>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>

                        <label for="password-confirm" class="col-md-6 col-form-label text-md-end"> لديك حساب ؟ <a href="{{route('login')}}">تسجيل الدخول</a> </label>
                    </div>



                </form>

            </div>
        </div>


    </section>

    @push('js')

    @endpush
@stop
