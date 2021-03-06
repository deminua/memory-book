<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Книга Памяти') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('/node_modules/lightbox2/css/lightbox.min.css') }}">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K9S2ZMD');</script>
<!-- End Google Tag Manager -->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>



</head>


<body class="html front not-logged-in one-sidebar sidebar-second page-node page-node- page-node-11 node-type-page sff-7 slff-7 hff-7 pff-7 form-style-1">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9S2ZMD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div id="app">

    <div id="toTop" class=""><i class="fa fa-angle-up"></i></div>


<div id="header-top" class="clearfix">
    <div class="container">
        <div id="header-top-inside" class="clearfix">
        <div class="row">
            <div class="col-md-8">
                <div id="header-top-left" class="clearfix">
                <div class="header-top-area">
                <div class="region region-header-top-left">
                <div id="block-search-form" class="block block-search clearfix">
                <div class="content">
                    <form action="/search" method="post" id="search-block-form" accept-charset="UTF-8">
                    {{ csrf_field() }}
                        <div>
                        <div class="container-inline">
                        <div class="form-item form-type-textfield form-item-search-block-form">
                        <input onblur="if (this.value == '') {this.value = 'Введите имя для поиска...';}" onfocus="if (this.value == 'Введите имя для поиска...') {this.value = '';}" type="text" id="edit-search-block-form--2" name="q" value="Введите имя для поиска..." size="15" maxlength="128" class="form-text form-autocomplete ui-autocomplete-processed ui-autocomplete-input" data-sa-theme="minimal" autocomplete="off">
                        <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                        <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all" id="ui-id-1" tabindex="0" data-sa-theme="minimal" style="display: none;"></ul>
                        </div>

                        <div class="form-actions form-wrapper" id="edit-actions"><input value="" type="submit" id="edit-submit" name="op" class="form-submit"></div>

                        </div>
                        </div>
                    </form>
                </div>
                </div>
                </div>
                </div>
                </div>
            </div>

            <div class="col-md-4">
                <div id="header-top-right" class="clearfix">
                    <div class="header-top-area">
                        <div class="region region-header-top-right">
                            <div id="block-menu-menu-top-right" class="block block-menu clearfix">
                                <div class="content">
                                    <div class="header-top-meanmenu-wrapper" style="display: block;">
                                    <nav>
                                        <ul class="menu">
                                            <li class="first last leaf"><a href="/node/create">Добавить в книгу</a></li>
                                            <li><a href="http://babenko.kr.ua/ru/contact" title="Контакты">Контакты</a></li>
                                        </ul>
                                    </nav>
                                    </div>
                                 </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
</div>






<header id="header" class="clearfix">

<div class="container">
    <div class="clearfix">
        <div class="row">
        <div class="col-md-4">
        <div id="header-inside-left" class="clearfix">
        <div id="logo" class=""><a href="/" title="Главная" rel="home"> <img src="/image/logo.png" alt="Главная"> </a></div>

        <div id="site-name"><a href="{{ route('node.index') }}" title="Главная">Книга Памяти</a></div>

        <div id="site-slogan">1941-1945 </div>
        </div>
        </div>

        <div class="col-md-8">
        <div id="header-inside-right" class="clearfix">
        <div id="main-navigation" class="clearfix">
            <nav role="navigation">
                <div class="region region-navigation">
                    <div class="block block-system block-menu clearfix">
                        <div class="content">
                        <div class="meanmenu-wrapper" style="display: block; ">
                        <ul class="menu">
                        <li><a href="/">О проекте</a></li>
                        <li><a href="{{ route('node.index') }}" title="Книга памяти">Книга памяти</a></li>
                        <li><a href="/term/438" title="Освободители Кривого Рога">Освободители Кривого Рога</a></li>
                        <li><a href="/gallery" title="Галерея">Галерея</a></li>


@if (!Auth::guest())
<li>
<div>
  <a style="cursor: pointer" data-toggle="dropdown" class="dropdown-toggle">{{ Auth::user()->name }} <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="{{ route('admin.index') }}">Пользователи</a></li>
      <li><a href="{{ route('node.noPublic') }}">Не опубликовано</a></li>
      <li><a href="{{ route('tt.index') }}">Термины</a></li>
      <li class="divider"></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выход
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
   </ul>
</div>
</li>
@endif




                        </ul>
                        </div>
                         </div>
                     </div>
                </div>
            </nav>
        </div>
        </div>
        </div>
        </div>
    </div>
</div>

</header>

@if (session('status'))
<div class="container">
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
</div>
@endif

@yield('content')

<div id="bottom-content" class="clearfix">
<div class="container">
<div id="bottom-content-inside" class="clearfix">
<div class="bottom-content-area">
<div class="row">
<div class="col-md-12">
<div class="region region-bottom-content">
<div id="block-block-7" class="block block-block clearfix">
    <div class="content">
        <p>Проект "Книга Памяти Кривой Рог" действует на постоянной основе.<br>Фотографии архива также будут размещены на наших страницах в Facebook и ВКонтакте в альбомах под названием «Книга памяти».</p>
        <p></p>
        <center>
        <h3>Никто не забыт, ничто не забыто!</h3>
        </center>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>




<div id="footer-top" class="clearfix two-regions">
    <div class="container">
        <div id="footer-top-inside" class="clearfix">
            <div class="row">
                <div class="col-sm-6">
                    <div id="footer-top-left" class="clearfix">
                    <div class="footer-top-area">
                    <div class="region region-footer-top-left">
                    <div id="block-block-2" class="block block-block clearfix">
                    <div class="content">
                    <div id="newsletter-form">
                    <div class="row">
                    <div class="col-lg-5"><span class="text">Официальный<br> проект</span></div>

                    <div class="col-lg-7 text-center"><a href="http://babenko.kr.ua" title="Общественная организация «За рідне місто»"><img style="height:60px;" src="/image/logo-za-ridne-misto.png" alt="Общественная организация «За рідне місто»"></a></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div id="footer-top-right" class="clearfix">
                    <div class="footer-top-area">
                    <div class="region region-footer-top-right">
                    <div id="block-block-1" class="block block-block clearfix">
                    <div class="content"><ul class="social-bookmarks"><li class="text">«За рідне місто»<br> в социальных сетях</li><li><a href="https://www.facebook.com/groups/748817538544509/?pnref=lhc"><i class="fa fa-facebook"></i></a></li><li><a href="https://vk.com/club81250728"><i class="fa fa-vk"></i></a></li></ul> </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
        </div>
        </div>
    </div>
</div>




<footer id="footer" class="clearfix hidden-xs">
    <div class="container">
    <div class="row">
    <div class="col-sm-6">
    <div class="footer-area">
    <div class="region region-footer-second">
    <div id="block-views-gallery-icon-block" class="block block-views clearfix"><h2 class="title">Новые записи</h2>
    <div class="content">
    <div class="view view-gallery-icon view-id-gallery_icon view-display-id-block">
    <div class="view-content">

@foreach($latestNodes->get() as $latestNode)
    <a title="{{ $latestNode->title }}" href="{{ route('node.show', $latestNode->id) }}">{{ $latestNode->title }}</a><br>
@endforeach

    </div>
    </div>
     </div>
     </div>
    </div>
    </div>
    </div>



    <div class="col-sm-6">
    <div class="footer-area">
    <div class="region region-footer-third">
    <div id="block-views-gallery-block-1" class="block block-views clearfix"><h2 class="title">Галерея</h2>
    <div class="content">
    <div class="view view-gallery view-id-gallery view-display-id-block_1">
    <div class="view-content">
    <div id="views-bootstrap-grid-2" class="views-bootstrap-grid-plugin-style">

        @foreach($gallery->get() as $n)

            <div class="row">
                <strong><a title="{{ $n->title }}" href="{{ route('node.show', $n->id) }}">
                    <div>
                        @foreach($n->gallery2main as $g)
                        <img src="{{ route('imagecache', ['gallerymini', $g->uri]) }}">
                        @endforeach
                    </div>
                {{ $n->title }}</a></strong>
            </div>
        @endforeach

    </div>
    </div>
    </div>
     </div>
     </div>
    </div>
    </div>
    </div>

    </div>
    </div>
</footer>


<div id="subfooter" class="clearfix">
<div class="container">
<div id="subfooter-inside" class="clearfix">
<div class="row">
<div class="col-md-4">
<div class="subfooter-area left">
<div class="region region-sub-footer-left">
<div id="block-block-6" class="block block-block clearfix">
<div class="content"><p>2015, 2017 Powered by <a title="Dem" href="http://dem.pp.ua">Dem</a>,<br>ресурс общественной организации «<a title="За рідне місто" href="http://babenko.kr.ua">За рідне місто</a>» г.Кривой Рог, Украина</p></div>
</div>
</div>
</div>
</div>

<div class="col-md-8">
<div class="subfooter-area right">
<div class="region region-footer">
<div id="block-block-8" class="block block-block clearfix">
<div class="content"><p>Все права на материалы принадлежат их авторам, редакция сайта не несет ответственность за материалы, размещенные на данном ресурсе. <br><br>© 2015-2017 <a title="Книга Памяти" href="http://memory-book.info">Книга Памяти</a> Кривой Рог</p></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>






    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('/node_modules/lightbox2/js/lightbox.min.js') }}"></script>



</body>
</html>

