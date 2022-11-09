
<style>

    a{
        text-decoration:none;
    }

    .content-info {
        background: #f9f9f9;
        padding: 40px 0;
        background-size: cover !important;
        background-position: top center !important;
        background-repeat: no-repeat !important;
        position: relative;
        padding-bottom: 100px;
    }


    .MultiCarousel {
        float: left;
        overflow: hidden;
        padding: 15px;
        width: 100%;
        position: relative;
    }

    .MultiCarousel .MultiCarousel-inner {
        transition: 1s ease all;
        float: left;
    }

    .MultiCarousel .MultiCarousel-inner .item {
        float: left;
    }

    .MultiCarousel .MultiCarousel-inner .item > div {
        text-align: center;
        padding: 10px;
        margin: 10px;
        background: #f1f1f1;
        color: #666;
    }

    .MultiCarousel .leftLst, .MultiCarousel .rightLst {
        position: absolute;
        border-radius: 50%;
        top: calc(50% - 20px);
    }

    .MultiCarousel .leftLst {
        right: 0;
    }

    .MultiCarousel .rightLst {
        left : 0;
    }

    .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over {
        pointer-events: none;
        background: #ccc;
    }
</style>

<section class="" style="background-color: #f1f1f1;">
    <div class="container">
        <div class="row">
            <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                <div class="MultiCarousel-inner">


                    @php $x=0; @endphp

                    @foreach(championship(null) as $i => $value)

                        @if($x<7)
                        <div class="item">

                            <div class="pad15" style="background-color:#f1f1f1;">
                                <a href="{{route('standing',$i)}}" style="color: #1B1C1D;text-decoration: none">
                                    <p class="lead"><img src=" {{@$value['logo']}}"style="width:60px"></p>
                                    <p class="f1-m-1 cl2 hov-cl10 trans-03">{{$value['name']}}</p>

                                </a>
                            </div>
                        </div>
                        @endif

                      @php $x++; @endphp


                        @endforeach



                </div>
                <button class="btn btn-primary rightLst  mr-5 "> > </button>
                <button class="btn btn-primary leftLst  ml-5"> < </button>


            </div>
        </div>


    </div>
</section>



