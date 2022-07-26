
<!-- Footer -->
<footer>
    <div class="bg2 p-t-40 p-b-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <a href="index.html">
                            <img class="max-s-full" src="{{asset(setting('image'))}}"  alt="{{asset(setting('name'))}} ">
                        </a>
                    </div>

                    <div>
                        <p class="f1-s-1 cl11 p-b-16">
                            {{(setting('description'))}}
                        </p>

                        <p class="f1-s-1 cl11 p-b-16">
                          <i class="fa fa-phone ml-3"></i><strong> {{setting('number')}}</strong>
                        </p>
                        <p class="f1-s-1 cl11 p-b-16">
                          <i class="fa fa-envelope ml-3"></i><strong> {{setting('email')}}</strong>
                        </p>

                        <div class="p-t-15">
                            <a target="_blank" href="{{setting('facebook')}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-facebook-f"></span>
                            </a>

                            <a target="_blank" href="{{setting('twitter')}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-twitter"></span>
                            </a>


                            <a target="_blank" href="{{@setting('instagram')}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-instagram"></span>
                            </a>

                            <a  target="_blank" href="{{@setting('youtube')}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-youtube"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 p-b-20 text-center">
                    <div class="size-h-2 ">
                        <a href="#">
                            <h5 class="f1-m-7 cl0">
                                الاخبار
                            </h5>

                        </a>
                    </div>

                    <div class="size-h-2 ">
                        <a href="{{route('matches')}}">
                        <h5 class="f1-m-7 cl0">
                           المباريات
                        </h5>

                        </a>
                    </div>

                    <div class="size-h-2 ">

                        <a href="{{route('videos')}}">
                        <h5 class="f1-m-7 cl0">

                            فيديوهات
                        </h5>

                        </a>
                    </div>


                    <div class="size-h-2 ">

                        <a href="{{route('galleries')}}">
                            <h5 class="f1-m-7 cl0">

                                الصور
                            </h5>

                        </a>
                    </div>


                </div>


                <div class="col-sm-4 col-lg-4 p-b-20">
                    <ul class="m-t--12">

                       @foreach(categories()->take(5) as $category)
                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="{{route('search')}}/?search={{$category->id}}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                {{$category->name}}
                            </a>
                        </li>
                        @endforeach

                    </ul>


                </div>


            </div>
        </div>
    </div>

    <div class="bg11">
        <div class="container size-h-4 flex-c-c p-tb-15">





            <span class="f1-s-1 cl0 ">




                <ul class="m-t--12 ">

                       <li class=" p-rl-5 p-tb-10"style="display: inline">
                            <a href="{{route('contact')}}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                               للاعلان معنا
                            </a>
                        </li>

                          @foreach(pages() as $page)
                        <li class=" p-rl-5 p-tb-10" style="display: inline">
                            <a href="{{route('pages',$page->id)}}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                              {{$page->title}} </a>
                        </li>

                         @endforeach



                    </ul>
				</span>

        </div>
    </div>
</footer>
