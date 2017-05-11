@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row node-memorybook">


<div class="col-sm-12"><h1 class="title" id="page-title">{{ $node->title }}</h1></div>


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
							<div class=" col-sm-6">
								<a data-lightbox="roadtrip" href="/storage/{{ $photo->uri }}" data-lightbox="image-{{ $photo->id }}" data-title="{{ $node->title }}"><img src="{{ route('imagecache', ['gallery', $photo->uri]) }}"></a>
							</div>
						@endforeach
						</div>
					</div>
					@endempty

				</div>


			
			


    </div>
</div>
@endsection
