@extends('front.layouts.index',['title'=>'تسجيل دخول'])
<!-- Post -->
@section('main')


    <section class="bg0 p-b-140 p-t-10">


        <div class="container">
                <div class="text-center row bg13 p-4 m-4 justify-content-center">
                    <ul class="nav justify-content-center">
                        <li class="nav-item f1-m-1 cl2 hov-cl10 trans-03">
                            <h5>تسجيل دخول</h5>

                    </ul>
                </div>
                <div class="card-body ">
                <form method="POST"  action="{{ route('login') }}">
                    @csrf


                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label float-l">البريد الالكتروني</label>

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
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block bg10">
                                تسجيل
                            </button>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>

                            <label for="password-confirm" class="col-md-6 col-form-label text-md-end">ليس لديك حساب ؟ <a href="{{route('register')}}">تسجيل عضوية جديدة</a> </label>
                    </div>



                </form>

        </div>
        </div>


    </section>

    @push('js')

    @endpush
@stop
