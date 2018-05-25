<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <link href="{!! asset('assets/topic/css/animate.min.css')!!}" rel="stylesheet">
    <link href="{!! asset('assets/topic/css/cover.css')!!}" rel="stylesheet">
    <script type="text/javascript" src="{!! asset('assets/topic/js/meta640.js')!!}"></script>
</head>
<body>
<div class="loading">0%</div>
<div class="page_tip"><p>本应用不支持横屏显示</p></div>
<form class="swiper-container" id="main">
    <div class="swiper-wrapper">

        <div class="swiper-slide m1" data-index="1">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m02.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000" style="top:35px"/>

            <img src="{!! asset('assets/topic/images/home/m031.png')!!}" alt="" class="ani home-02 stype" data-id="1"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/home/m032.png')!!}" alt="" class="ani home-03 stype" data-id="2" data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/home/m033.png')!!}" alt="" class="ani home-04 stype" data-id="3" data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/home/m034.png')!!}" alt="" class="ani home-05 stype" data-id="4" data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/home/m035.png')!!}" alt="" class="ani home-06 stype" data-id="5" data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <input type="hidden" name="stype" id="stype">

        </div>

        <div class="swiper-slide m1" data-index="2">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m04.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000"/>

            <div class="home-f ani" data-slide-in="at 200 from fadeIn use swing during 1000"></div>
            @foreach($floors as $key=>$v)
                <div class="ani home-f{!! $key+1 !!} floor" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="{!! $v->id !!}">{!! $v->name !!}</div>
            @endforeach
            <input type="hidden" name="floorid" id="floorid">
        </div>

        <div class="swiper-slide m1" data-index="3">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m-4.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <ul class="list">
                @foreach($w1 as $key=>$v)
                <li class="ani" data-slide-in="at 200 from zoomIn use swing during 1000">
                    <img src="{!! asset($v->thumb)!!}" alt=""/>
                    <div class="tag">{!! $v->remark !!}</div>
                </li>
                @endforeach
            </ul>
            <input type="hidden" name="q1" value="" class="answer">

        </div>

        <div class="swiper-slide m1" data-index="3">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m-5.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <ul class="list">
                @foreach($w2 as $key=>$v)
                    <li class="ani" data-slide-in="at 200 from zoomIn use swing during 1000">
                        <img src="{!! asset($v->thumb)!!}" alt=""/>
                        <div class="tag">{!! $v->remark !!}</div>
                    </li>
                @endforeach
            </ul>
            <input type="hidden" name="q2" value="" class="answer">

        </div>

        <div class="swiper-slide m1" data-index="3">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m-6.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <ul class="list">
                @foreach($w3 as $key=>$v)
                    <li class="ani" data-slide-in="at 200 from zoomIn use swing during 1000">
                        <img src="{!! asset($v->thumb)!!}" alt=""/>
                        <div class="tag">{!! $v->remark !!}</div>
                    </li>
                @endforeach
            </ul>
            <input type="hidden" name="q3" value="" class="answer">

        </div>
        <div class="swiper-slide m1" data-index="3">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m-7.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <ul class="list">
                @foreach($w4 as $key=>$v)
                    <li class="ani" data-slide-in="at 200 from zoomIn use swing during 1000">
                        <img src="{!! asset($v->thumb)!!}" alt=""/>
                        <div class="tag">{!! $v->remark !!}</div>
                    </li>
                @endforeach
            </ul>
            <input type="hidden" name="q4" value="" class="answer">

        </div>
        <div class="swiper-slide m1" data-index="3">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m-8.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <ul class="list">
                @foreach($w5 as $key=>$v)
                    <li class="ani" data-slide-in="at 200 from zoomIn use swing during 1000">
                        <img src="{!! asset($v->thumb)!!}" alt=""/>
                        <div class="tag">{!! $v->remark !!}</div>
                    </li>
                @endforeach
            </ul>
            <input type="hidden" name="q5" value="" class="answer">

        </div>
        <div class="swiper-slide m1" data-index="3">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m-9.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <ul class="list">
                @foreach($w6 as $key=>$v)
                    <li class="ani" data-slide-in="at 200 from zoomIn use swing during 1000">
                        <img src="{!! asset($v->thumb)!!}" alt=""/>
                        <div class="tag">{!! $v->remark !!}</div>
                    </li>
                @endforeach
            </ul>
            <input type="hidden" name="q6" value="" class="answer">

        </div>
        <div class="swiper-slide m1" data-index="3">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m-10.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <ul class="list">
                @foreach($w7 as $key=>$v)
                    <li class="ani" data-slide-in="at 200 from zoomIn use swing during 1000">
                        <img src="{!! asset($v->thumb)!!}" alt=""/>
                        <div class="tag">{!! $v->remark !!}</div>
                    </li>
                @endforeach
            </ul>
            <input type="hidden" name="q7" value="" class="answer">

        </div>

        <div class="swiper-slide m1" data-index="2">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m-11.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000"/>

            <div class="home-f ani" data-slide-in="at 200 from fadeIn use swing during 1000"></div>

            <div class="ani home-f1 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="1">钓鱼</div>
            <div class="ani home-f2 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="2">自驾</div>
            <div class="ani home-f3 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="3">乐队</div>
            <div class="ani home-f4 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="4">历史</div>
            <div class="ani home-f5 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="5">看书</div>
            <div class="ani home-f6 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="6">旅行</div>
            <div class="ani home-f7 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="7">绘画</div>
            <div class="ani home-f8 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="8">摄影</div>
            <div class="ani home-f9 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="9">汽车</div>
            <div class="ani home-f10 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="10">品酒</div>
            <div class="ani home-f11 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="11">烹饪</div>
            <div class="ani home-f12 love" data-slide-in="at 200 from zoomIn use swing during 1000" data-id="12">高尔夫</div>
            <input type="hidden" name="love" value="" id="love">

        </div>


        <div class="swiper-slide m1 result" data-index="2">
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/1.jpg')!!}" alt="" class="ani designer"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/home/m-r1.png')!!}" alt="" class="ani mr-1"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <div class="name">
                <h2>杨凯</h2>
                <p>根据以上所选兴趣，主案兴趣与您相似</p>
            </div>
            <div class="ewmDiv"></div>
            <div class="ewm"></div>

            <img src="{!! asset('assets/topic/images/home/m-r2.png')!!}" alt="" class="ani mr-2"  data-slide-in="at 200 from zoomIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m-r3.png')!!}" alt="" class="ani mr-3"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
        </div>
    </div>
    <input type="hidden" name="type" value="{!! App\Models\DesignerWorks::TYPE_J !!}">
</>
<script>
    var show_list = [
        {url: '{!! asset('assets/topic/images/logo.png')!!}', type: 0},
    ];
</script>
<script type="text/javascript" src="{!! asset('assets/topic/js/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/topic/js/lmy-main.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/topic/js/swiper.animate.min.js') !!}"></script>
<script type="text/javascript">
    /*自定义移动端点击事件*/
    $.fn.tap = function(dom,_f){
        var _this = $(this);
        _this.on("touchstart", dom, function(ev) {

            var isClick = true;
            _this.on("touchmove", dom, function() {
                isClick = false;
            });
            _this.on("touchend", dom, function(ev1) {
                if(isClick){
                    _f.call(this, ev, ev1);
                }
                _this.off("touchmove touchend", dom);
            });
        });
    }

    function screen_tip(){
        if(!$("input").is(":focus")){
            var $tip = $('.page_tip');
            if($(window).width() > $(window).height()){
                $tip.css('display','table');
            }else{
                $tip.hide();
            }
        }
    }
    screen_tip();
    $(window).resize(function(){
        screen_tip();
    });
    function init(){
        $(window).load(function(){
            //$('script').remove();
        });

        $('.loading').fadeOut(800, function(){
            $(this).remove();
        });


        var mySwiper = new Swiper ('#main', {
            onInit: function(swiper){
                swiperAnimateCache(swiper);
                swiperAnimate(swiper);
            },
            onSlideChangeStart:function (swiper) {
                switch (swiper.activeIndex) {

                }
            },
            onSlideChangeEnd: function(swiper){
                swiperAnimate(swiper);
                switch (swiper.activeIndex) {

                }
            },
            onTouchStart: function(swiper,even){
                swiper.unlockSwipeToPrev();
                swiper.unlockSwipeToNext();
            },
            lazyLoadingClass : 'my-lazy',
            noSwiping : true,
            noSwipingClass : 'no-swiping',
            direction : 'vertical',
            lazyLoading : true
        })
        $('.stype').click(function () {
            $('.stype').val($(this).attr('data-id'));
            mySwiper.slideNext();
        })
        $('.floor').click(function () {
            $('.stype').val($(this).attr('data-id'));
            mySwiper.slideNext();
        })
        $('.love').click(function () {
            $('#love').val($(this).attr('data-id'));

            $.ajax({
                url: '{!! route('front.test.save') !!}',
                type: 'POST',
                dataType: 'JSON',
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
                data: $('#main').serialize(),
                success: function (result) {
                    $('#name').html(result.data.name);
                    $('.ewm').html('<img src="'+result.data.ewm+'">');
                    $('.designer').attr('src',result.data.thumb)
                    mySwiper.slideNext();
                }
            });

        })
    }

    $(document).ready(function() {
        lmy_progress(
            show_list,
            function(e, index, total){
                $('.loading').html(parseInt(index*100/total)+'%');
            },
            function(){
                init();
            }
        );


    });

</script>
</body>
</html>