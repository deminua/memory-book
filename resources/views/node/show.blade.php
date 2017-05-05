@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row node-memorybook">


<div class="col-sm-12"><h1 class="title" id="page-title">{{ $node->title }}</h1></div>

@empty(!$node->image->first())
				<div class="col-sm-3 text-center">
					<div class="field-type-image">
						<div class="field-item even">

						<a data-lightbox="image-{{ $node->image->first()->id }}" data-title="{{ $node->title }}" href="/storage/{{ $node->image->first()->uri }}" title="{{ $node->title }}">
						<img src="{{ route('imagecache', ['large', $node->image->first()->uri]) }}">
						</a>
						</div>


						<div class="years">{{ $node->years() }}</div>
					</div>
				</div>
@endempty
				<div class="col-sm-9 vars ">
					<div class="field">


								@isset($node->birthdate)<p><b>Дата рождения:</b> {{ $node->birthdate }}</p>@endisset
								@isset($node->birthplace)<p><b>Место рождения:</b> {{ $node->birthplace }}</p>@endisset

								@isset($node->deaddate)<p><b>Дата смерти:</b> {{ $node->deaddate }}</p>@endisset
								@isset($node->deadplace)<p><b>Место смерти:</b> {{ $node->deadplace }}</p>@endisset

								
								@isset($node->education)
									@if($node->education != 'null')
										<p><b>Образование:</b> {{ $node->education }}</p>
									@endif
								@endisset
								

								@foreach($node->taxonomy->groupby('vocabulary_id') as $data)
									<p>
									<b>{{ $data->first()->vocabulary->name }}:</b>				

									@foreach ($data as $term)
										{{ $term->name }}{{ $loop->first ? '' : ', ' }}
									@endforeach

									</p>

								@endforeach

								@empty(!$node->body)<p>{!! nl2br($node->body) !!}</p>@endempty

					</div>
				</div>


				<div id="biografy" class="clearfix col-sm-12">
					
					@empty(!$node->info)
					<div class="field field-name-body field-type-text-with-summary field-label-hidden">
					<div class="field-item even"><i>Источник: {{ $node->info }}</i></div>
					</div>
					@endempty

					@empty(!$node->gallery)
					<div class="field field-name-field-gallery field-type-image field-label-hidden">
						<div class="field-items">
						@foreach($node->gallery as $photo)
							<div class=" col-sm-3">
								<a data-lightbox="roadtrip" href="/storage/{{ $photo->uri }}" data-lightbox="image-{{ $photo->id }}" data-title="{{ $node->title }}"><img src="{{ route('imagecache', ['medium', $photo->uri]) }}"></a>
							</div>
						@endforeach
						</div>
					</div>
					@endempty

				</div>


			
			


    </div>
</div>
@endsection
