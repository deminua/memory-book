@extends('layouts.app')

@section('content')

@include('banner')


<div id="page" class="clearfix" style="margin-top: 0px;">
<div id="main-content">
<div class="container">
<div class="row"><section class="col-md-8">
<div id="main" class="clearfix"><h1 class="title" id="page-title">О проекте</h1>
<div class="tabs"></div>

<div class="region region-content">
<div id="block-system-main" class="block block-system clearfix">
<div class="content"><article id="node-11" class="node node-page clearfix node-mt" about="/content/o-proekte" typeof="foaf:Document">
<div class="node-main-content full-width clearfix"><header><span property="dc:title" content="О проекте" class="rdf-meta element-hidden"></span></header>
<div class="content">
<div class="field field-name-body field-type-text-with-summary field-label-hidden">
<div class="field-items">
<div class="field-item even" property="content:encoded"><p>Общественная организация «За рідне місто» создает электронный архив «Книга памяти», в который войдут портреты ветеранов Великой Отечественной Войны. Проект создан по инициативе и при поддержке главы организации <a title="Бабенко Ольга Владимировна" href="http://babenko.kr.ua">Бабенко Ольги Владимировны</a> и будет действовать на постоянной основе.</p><p>Мы приглашаем вас принять участие в проекте: включите в базу данных сохранившиеся у вас фотографии тех, кто принимал участие в боевых действиях, побывал в оккупации, трудился в тылу. С вашей помощью мы хотим собрать информацию о наших героях: о солдатах, отважно сражавшихся на фронте, об отважных врачах и медсестрах, исполнявших свой долг под свистом пуль, о стойких рабочих, трудившихся на заводах – обо всех, кто с честью выстоял тяготы военных лет.</p><p>Для того чтобы добавить фотографию в «Книгу памяти», отправьте нам сканированную копию снимка и укажите в анкете краткие биографические данные ветерана: имя и возраст (на сегодняшний день или на дату смерти), чин воевавшего и информацию о наградах (если он был награжден).</p><p>Если вы не можете сделать электронные копии фотографии или у вас нет доступа к сети, обратитесь за помощью в офис нашей районной или городской организации.</p></div>
</div>
</div>
 </div>
 </div>
</article> </div>
</div>
</div>
</div>
</section><aside class="col-md-4 fix-sidebar-second"><section id="sidebar-second" class="sidebar clearfix">
<div class="region region-sidebar-second">
<div id="block-block-5" class="block block-block clearfix"><h2 class="title">Прием данных</h2>
<div class="content"><p>Для подачи данных в «Книга памяти» перейдите по <a href="/node/create">ссылке</a>, заполните все поля и после проверки администрацией сайта данные будут опубликованы, либо обратитесь в ближайшую общественную приемную «За рідне місто» в г.Кривой Рог.</p><p>Адреса приемных «За рідне місто» в г.Кривой Рог вы можете узнать <a href="http://babenko.kr.ua/ru/contact">тут</a>.</p><p>Также работает «горячая линия» «За рідне місто»»: <b>+38 068 775 65 38</b></p></div>
</div>

<div id="block-views-gallery-icon-block-1" class="block block-views clearfix">
<div class="content">
<div class="view view-gallery-icon view-id-gallery_icon view-display-id-block_1 hidden-xs view-dom-id-ddbce108eda898bfcdcb3e244fa79249">
<div class="view-content">
<div id="views-bootstrap-grid-1" class="views-bootstrap-grid-plugin-style">



<div class="row">
@foreach($mainNodes->get() as $mainNode)
	<div class="col col-sm-3">
	<span class="views-field views-field-field-image">
	<span class="field-content">
	<a title="{{ $mainNode->title }}" href="{{ route('node.show', $mainNode->id) }}">
    <img src="{{ route('imagecache', ['mini', $mainNode->image->first()->uri]) }}"></a>
	</span>
	</span>
	</div>
@endforeach
</div>

</div>
</div>
</div>
 </div>
 </div>
</div>
</section></aside></div>
</div>
</div>
</div>



@endsection