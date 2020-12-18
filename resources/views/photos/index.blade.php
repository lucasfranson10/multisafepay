@extends('layout')

@section('content')


<main>
	

	<div class="container">

		<div class="gallery">

			@foreach($photos as $photos=>$photo)
				<div class="gallery-item" tabindex="0">

					<img src={{$photo['largeImageURL']}} class="gallery-image" alt="">

					{{-- <div class="gallery-item-info">

						<h1>teste</h1>

					</div> --}}

					<div>
						<form id="saveForm" name="saveForm" method="POST" action="/save">
							@csrf
							<input type="json" name="photo" value={{json_encode($photo['largeImageURL'])}} hidden/>
							<button type="submit" class="button">Save photo</button>
						</form>
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
