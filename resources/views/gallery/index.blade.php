@extends('main')

@section('content')



<div class="container">
    <div class="row">


        <div class="col-md-12">




<center>
<ul class="pagination">
	@foreach ($alphabet as $a)
		{!! $a !!}
	@endforeach
</ul>
</center>

        <div class="col-md-12"><h1>Галерея</h1></div>


        @foreach ($nodes as $node)



<div class="node node-memorybook node-teaser col-xs-12 col-sm-4 col-md-4 col-lg-4">

<h2><a title="{{ $node->title }}" href="{{ route('node.show', $node) }}">{!! $node->title !!}</a></h2>


<div class="field-type-image">

	@if($node->image->first())
		<a title="{{ $node->title }}" href="{{ route('node.show', $node) }}"><img src="{{ route('imagecache', ['gallery', $node->image->first()->uri]) }}"></a>
	@else
		<a title="{{ $node->title }}" href="{{ route('node.show', $node) }}"><img src="/image/no-photo.jpg"></a>
	@endif

</div>


<div class="years">{{ $node->years() }}</div>


</div>

  
  



        @endforeach



        
        

        </div>

        <div class="col-md-12"><center>{{ $nodes->links() }}</center></div>
        
    </div>
</div>


@endsection
