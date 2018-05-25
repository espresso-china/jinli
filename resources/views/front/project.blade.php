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

        <div class="swiper-slide m1 no-swiping" data-index="2" id="arr">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m04.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000"/>

            <div class="home-f ani" data-slide-in="at 200 from fadeIn use swing during 1000"></div>
            @foreach($floors as $key=>$v)
                <div class="ani home-f{!! $key+1 !!} floor" data-id="{!! $v->id !!}" data-slide-in="at 200 from zoomIn use swing during 1000">{!! $v->name !!}</div>
            @endforeach
            <input type="hidden" name="floorid" id="floorid">
        </div>
    @for($i=1;$i<=$nums;$i++)
        <div class="swiper-slide m1 s no-swiping">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/project/'.$type.'/'.$i.'.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000" style="top: 40px;"/>
            <ul class="list">
                <?php $a='w'.$i;?>
                @foreach(${$a} as $key=>$v)
                    <li class="ani" data-slide-in="at 200 from zoomIn use swing during 1000" data-val="{!! $v->id !!}">
                        <img src="{!! asset($v->thumb)!!}" alt=""/>
                        <div class="tag">{!! $v->remark !!}</div>
                    </li>
                @endforeach
            </ul>

            <input type="hidden" name="q{!! $i !!}" value="" class="answer">
        </div>
    @endfor
        <div class="swiper-slide m1 result" data-index="2">
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/1.jpg')!!}" alt="" class="ani designer"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/home/m-r1.png')!!}" alt="" class="ani mr-1"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <div class="name">
                <h2 id="name"></h2>
                <p>根据以上所选兴趣，主案兴趣与您相似</p>
            </div>
            <div class="ewmDiv"></div>
            <div class="ewm"></div>

            <img src="{!! asset('assets/topic/images/home/m-r2.png')!!}" alt="" class="ani mr-2"  data-slide-in="at 200 from zoomIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/home/m-r3.png')!!}" alt="" class="ani mr-3"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
        </div>
    </div>
    <input type="hidden" name="type" value="{!! App\Models\DesignerWorks::TYPE_G !!}">
    <input type="hidden" name="stype" value="{!! $type !!}">
</form>
<script>
    var show_list = [
        {url: '{!! asset('assets/topic/images/logo.png')!!}', type: 0},
    ];
    var nums={!! $nums !!}
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
        $('.floor').click(function () {
            $('#floorid').val($(this).attr('data-id'));
            mySwiper.slideNext();
        })
        $('.list li').click(function () {
            $(this).closest('.s').find('.answer').val($(this).attr('data-val'));

            console.log(mySwiper.activeIndex);
            if(mySwiper.activeIndex==nums){
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
                    }
                });
            }
            mySwiper.slideNext();
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