@extends('front.layouts.index',['title'=>$page->title])
<!-- Post -->

@section('main')



    <section class="bg0 p-b-140 p-t-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-30">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-70">

                            <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                                {{$page->title}}
                            </h3>

                            <p class="f1-s-11 cl6 p-b-25">
                                {!! $page->details !!}
                            </p>


                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>


@stop







@push('js')




@endpush
