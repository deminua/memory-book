@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

<div class="col-md-12">

@empty(!$node->image->first())<img class="pull-left" style="max-width: 200px; margin:0px 20px 20px 0px;" src="/storage/{{ $node->image->first()->uri }}">@endempty

			<h1>{{ $node->title }}</h1>

			@isset($node->birthdate)<p><b>Дата рождения:</b> {{ $node->birthdate }}</p>@endisset
			@isset($node->birthplace)<p><b>Место рождения:</b> {{ $node->birthplace }}</p>@endisset

			@isset($node->deaddate)<p><b>Дата смерти:</b> {{ $node->deaddate }}</p>@endisset
			@isset($node->deadplace)<p><b>Место смерти:</b> {{ $node->deadplace }}</p>@endisset

			@isset($node->education)<p><b>Образование:</b> {{ $node->education }}</p>@endisset

			@foreach($node->taxonomy->groupby('vocabulary_id') as $data)
				<p>
				<b>{{ $data->first()->vocabulary->name }}:</b>				

				@foreach ($data as $term)
					{{ $term->name }}{{ $loop->first ? '' : ', ' }}
				@endforeach

				</p>

			@endforeach
</div>



        <div class="col-md-12">

			<div>{!! nl2br($node->body) !!}</div>


@empty(!$node->gallery)
	@foreach($node->gallery as $photo)
		<img width="128px" src="/storage/{{ $photo->uri }}">
	@endforeach
@endempty

@empty(!$node->info)<hr><i>Источник: {{ $node->info }}</i></p>@endempty


        </div>
    </div>
</div>
@endsection
