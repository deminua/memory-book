@extends('layouts.app')
@section('content')

<div class="container">
    <div class="node-memorybook">




	{!! Form::open(['route' => ['node.store'], 'files' => true], ['class'=>'form-horizontal']) !!}

<div class="row">


<div class="col-sm-6">

	  <div class="row form-group">
	   {!! Form::label(__('node.fullname'), null, ['for' => 'title', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('title', null, ['class'=>'form-control', 'required'=>'required', 'id'=>'title']) !!}</div>
	  </div>

	  <hr style="margin-bottom: 15px; margin-top: 0px;">

	  <div class="row form-group">
	   {!! Form::label(__('node.birthdate'), null, ['for' => 'birthdate', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('birthdate', null, ['class'=>'form-control', 'id'=>'birthdate']) !!}</div>
	  </div>

	  <div class="row form-group">
	   {!! Form::label(__('node.birthplace'), null, ['for' => 'birthplace', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('birthplace', null, ['class'=>'form-control', 'id'=>'birthplace']) !!}</div>
	  </div>

	  <hr style="margin-bottom: 15px; margin-top: 0px;">

	  <div class="row form-group">
	   {!! Form::label(__('node.deaddate'), null, ['for' => 'deaddate', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('deaddate', null, ['class'=>'form-control', 'id'=>'deaddate']) !!}</div>
	  </div>

	  <div class="row form-group">
	   {!! Form::label(__('node.deadplace'), null, ['for' => 'deadplace', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('deadplace', null, ['class'=>'form-control', 'id'=>'deadplace']) !!}</div>
	  </div>

	  <hr style="margin-bottom: 15px; margin-top: 0px;">

	  <div class="row form-group">
	   {!! Form::label(__('node.education'), null, ['for' => 'education', 'class'=>'col-sm-5 control-label']) !!}
	   <div class="col-sm-7">{!! Form::text('education', null, ['class'=>'form-control', 'id'=>'education']) !!}</div>
	  </div>

	  <div class="row form-group">
	   {!! Form::label(__('node.body'), null, ['for' => 'body', 'class'=>'col-sm-12 control-label']) !!}
	   <div class="col-sm-12">{!! Form::textarea('body', null, ['class'=>'form-control', 'id'=>'body']) !!}</div>
	  </div>

	  <div class="row form-group">
	   {!! Form::label(__('node.info'), null, ['for' => 'info', 'class'=>'col-sm-12 control-label']) !!}
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

		

</div>

	
	 

</div>




<div class="row">
	<div class="col-sm-4" style="background:#eee; height:40px; margin-bottom: 10px; padding: 10px;"><b>{{ __('node.photo') }}</b></div>
	<div class="col-sm-8" style="background:#eee; height:40px; margin-bottom: 10px; padding: 10px;">{{ Form::file('image', ['accept'=>'image/*']) }}</div>
</div>



<div class="row">
	<div class="col-sm-4" style="background:#eee; height:40px; margin-bottom: 10px; padding: 10px;"><b>Галерея</b></div>
	<div class="col-sm-8" style="background:#eee; height:40px; margin-bottom: 10px; padding: 10px;">{{ Form::file('gallery[]', ['accept'=>'image/*', 'multiple']) }}</div>
</div>


<center>{{ Form::submit('Сохранить') }}</center>
	
	{!! Form::close() !!}




			
			


    </div>
</div>
@endsection
