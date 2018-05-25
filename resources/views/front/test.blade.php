<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="{!! asset('assets/topic/css/animate.min.css')!!}" rel="stylesheet">
    <link href="{!! asset('assets/topic/css/cover.css')!!}" rel="stylesheet">
    <script type="text/javascript" src="{!! asset('assets/topic/js/meta640.js')!!}"></script>
</head>
<body>
<div class="loading">0%</div>
<div class="page_tip"><p>本应用不支持横屏显示</p></div>
<div class="swiper-container" id="main">
    <div class="swiper-wrapper">
        <div class="swiper-slide m1" data-index="0">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from FadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from slideIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/m1.png')!!}" alt="" class="ani m10"  data-slide-in="at 200 from slideIn use swing during 1000"/>

            <a href="{!! route('front.test.home') !!}"><img src="{!! asset('assets/topic/images/m1-2.png')!!}" alt="" class="ani m1-2"  data-slide-in="at 400 from zoomIn use swing during 1000" id="jia"/></a>

            <img src="{!! asset('assets/topic/images/m1-3.png')!!}" alt="" class="ani m1-3"  data-slide-in="at 1000 from zoomIn use swing during 1000" id="gong"/>
        </div>

        <div class="swiper-slide m1" data-index="1">
            <img src="{!! asset('assets/topic/images/logo.png')!!}" alt="" class="ani logo" data-slide-in="at 0 from fadeIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/m1-1.png')!!}" alt="" class="ani m1-1"  data-slide-in="at 200 from fadeIn use swing during 1000"/>

            <img src="{!! asset('assets/topic/images/project/m.png')!!}" alt="" class="ani home-01"  data-slide-in="at 200 from zoomIn use swing during 1000" style="top: 40px;"/>

            <img src="{!! asset('assets/topic/images/project/m1.png')!!}" alt="" class="ani project-01 typeID" data-url="{!! route('front.test.project',['type'=>1]) !!}" data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/project/m2.png')!!}" alt="" class="ani project-02 typeID" data-url="{!! route('front.test.project',['type'=>2]) !!}"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/project/m3.png')!!}" alt="" class="ani project-03 typeID" data-url="{!! route('front.test.project',['type'=>3]) !!}"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/project/m4.png')!!}" alt="" class="ani project-04 typeID" data-url="{!! route('front.test.project',['type'=>4]) !!}"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/project/m5.png')!!}" alt="" class="ani project-05 typeID" data-url="{!! route('front.test.project',['type'=>5]) !!}"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/project/m6.png')!!}" alt="" class="ani project-06 typeID" data-url="{!! route('front.test.project',['type'=>6]) !!}"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/project/m7.png')!!}" alt="" class="ani project-07 typeID" data-url="{!! route('front.test.project',['type'=>7]) !!}"  data-slide-in="at 200 from zoomIn use swing during 1000"/>
            <img src="{!! asset('assets/topic/images/project/m8.png')!!}" alt="" class="ani project-08 typeID" data-url="{!! route('front.test.project',['type'=>8]) !!}"  data-slide-in="at 200 from zoomIn use swing during 1000"/>

        </div>
    </div>
</div>
<script>
    var show_list = [
        {url: '{!! asset('assets/topic/images/m1.png')!!}', type: 0},
        {url: '{!! asset('assets/topic/images/m1-1.png')!!}', type: 0},
        {url: '{!! asset('assets/topic/images/m1-2.png')!!}', type: 0},
        {url: '{!! asset('assets/topic/images/m1-3.png')!!}', type: 0}
    ];
</script>
<script type="text/javascript" src="{!! asset('assets/topic/js/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/topic/js/lmy-main.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/topic/js/swiper.animate.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/topic/js/common.js?v=1') !!}"></script>
<script type="text/javascript">
    $(function () {

    })
</script>
</body>
</html>