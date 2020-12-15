@extends('layout')

@section('content')


<main>

	<div class="container">

		<div class="gallery">

			@foreach($photos as $photos=>$photo)
				<div class="gallery-item" tabindex="0">

					<img src={{$photo['largeImageURL']}} class="gallery-image" alt="">

					<div class="gallery-item-info">

						<h1>teste</h1>

					</div>

				</div>
			@endforeach

		</div>
		<!-- End of gallery -->

		{{-- <div class="loader"></div> --}}

	</div>
	<!-- End of container -->

</main>
<!-- partial -->

@endsection