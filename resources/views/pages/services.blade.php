@extends('layouts.app')

@section('services')
	<h1>This is Services Page</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem temporibus corporis laborum vitae possimus vero, eum fuga reiciendis nesciunt odio ipsa excepturi magnam minus molestias illo dolorum. Aliquam, architecto, possimus.</p>

	@if(count($services) > 0)
	<ul class ='list-group'>
		@foreach($services as $service)
			<li class='list-group-item'>{{$service}}</li>
		@endforeach
	</ul>
	@endif
@endsection