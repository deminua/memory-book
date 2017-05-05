@extends('layouts.app')
@section('content')

<div class="container">
    <div class="node-memorybook">




	{!! Form::model($node, ['route' => ['node.edit', $node], 'files' => true], ['class'=>'form-horizontal']) !!}

<div class="row">


<div class="col-sm-6">

	  <div class="row form-group">
	   {!! Form::label('Фамилия Имя Отчество', null, ['for' => 'title', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('title', null, ['class'=>'form-control', 'id'=>'title']) !!}</div>
	  </div>

	  <hr style="margin-bottom: 15px; margin-top: 0px;">

	  <div class="row form-group">
	   {!! Form::label('birthdate', null, ['for' => 'birthdate', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('birthdate', null, ['class'=>'form-control', 'id'=>'birthdate']) !!}</div>
	  </div>

	  <div class="row form-group">
	   {!! Form::label('birthplace', null, ['for' => 'birthplace', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('birthplace', null, ['class'=>'form-control', 'id'=>'birthplace']) !!}</div>
	  </div>

	  <hr style="margin-bottom: 15px; margin-top: 0px;">

	  <div class="row form-group">
	   {!! Form::label('deaddate', null, ['for' => 'deaddate', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('deaddate', null, ['class'=>'form-control', 'id'=>'deaddate']) !!}</div>
	  </div>

	  <div class="row form-group">
	   {!! Form::label('deadplace', null, ['for' => 'deadplace', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('deadplace', null, ['class'=>'form-control', 'id'=>'deadplace']) !!}</div>
	  </div>

	  <hr style="margin-bottom: 15px; margin-top: 0px;">

	  <div class="row form-group">
	   {!! Form::label('education', null, ['for' => 'education', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('education', null, ['class'=>'form-control', 'id'=>'education']) !!}</div>
	  </div>

	  <div class="row form-group">
	   {!! Form::label('body', null, ['for' => 'body', 'class'=>'col-sm-12 control-label']) !!}
	   <div class="col-sm-12">{!! Form::textarea('body', null, ['class'=>'form-control', 'id'=>'body']) !!}</div>
	  </div>

	  <div class="row form-group">
	   {!! Form::label('info', null, ['for' => 'info', 'class'=>'col-sm-12 control-label']) !!}
	   <div class="col-sm-12">{!! Form::text('info', null, ['class'=>'form-control', 'id'=>'info']) !!}</div>
	  </div>

</div>

<div class="col-sm-6"  style="border-left: 1px #c2c2c2 solid;">
	  @foreach($vocabulary as $v)
	  <div class="row form-group">
	   	{!! Form::label($v->name, null, ['for' => $v->machine_name, 'class'=>'col-sm-6 control-label']) !!}
	   	<div class="col-sm-6">

	   		@if($node->taxonomy->where('vocabulary_id', $v->id)->first())
	   			{!! Form::text('vocabulary['.$v->id.']', $node->taxonomy->where('vocabulary_id', $v->id)->first()->name, ['class'=>'form-control', 'id'=>$v->machine_name, 'placeholder'=>$v->description]) !!}
	   		@else
	   			{!! Form::text('vocabulary['.$v->id.']', null, ['class'=>'form-control', 'id'=>$v->machine_name, 'placeholder'=>$v->description]) !!}
	   		@endif
	  	</div>
	 </div>
	  @endforeach

		

	  <div class="row form-group">
	   <label class="col-sm-12 text-right">{{ Form::checkbox('status') }} Опубликовано</label>
	  </div>
</div>

	
	 

</div>




<hr>


<div class="row">
	<div class="col-sm-4" style="background:#eee; height:40px; margin-bottom: 10px; padding: 10px;"><b>Фотография</b></div>
	<div class="col-sm-8" style="background:#eee; height:40px; margin-bottom: 10px; padding: 10px;">{{ Form::file('image', ['accept'=>'image/*']) }}</div>
</div>

@empty(!$node->image)
<div class="row">
	@foreach($node->image as $image)
		<div class="col-sm-2">

		<div class="btn-group" style="position: absolute; margin-left:5px; margin-top:5px;">
		  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		  </button>
		  <ul class="dropdown-menu">
		    <li><a href="#">Включить</a></li>
		    <li role="separator" class="divider"></li>
		    <li><a href="#">Удалить</a></li>
		  </ul>
		</div>

		<a data-lightbox="image-{{ $image->id }}" data-title="{{ $node->title }}" href="/storage/{{ $image->uri }}" title="{{ $node->title }}">
		<img src="{{ route('imagecache', ['small', $image->uri]) }}">
		</a>	

		</div>
	@endforeach
</div>
@endempty




<hr>



<div class="row">
	<div class="col-sm-4" style="background:#eee; height:40px; margin-bottom: 10px; padding: 10px;"><b>Галерея</b></div>
	<div class="col-sm-8" style="background:#eee; height:40px; margin-bottom: 10px; padding: 10px;">{{ Form::file('gallery', ['accept'=>'image/*', 'multiple']) }}</div>
</div>

@empty(!$node->gallery)
<div class="row">
	@foreach($node->gallery as $photo)
		<div class="col-sm-2">

		<div class="btn-group" style="position: absolute; margin-left:5px; margin-top:5px;">
		  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		  </button>
		  <ul class="dropdown-menu">
		    <li><a href="#">Включить</a></li>
		    <li role="separator" class="divider"></li>
		    <li><a href="#">Удалить</a></li>
		  </ul>
		</div>

		<a data-lightbox="photo-{{ $photo->id }}" data-title="{{ $node->title }}" href="/storage/{{ $photo->uri }}" title="{{ $node->title }}">
		<img src="{{ route('photocache', ['small', $photo->uri]) }}">
		</a>	

		</div>
	@endforeach
</div>
@endempty


<hr>





<center>{{ Form::submit('Сохранить') }}</center>
	



	{!! Form::close() !!}




			
			


    </div>
</div>
@endsection
