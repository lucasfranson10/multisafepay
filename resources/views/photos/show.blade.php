@extends('layout')




@section('content')


<main>
	

	<div class="container">

		<div class="gallery">

			@foreach($photos as $element)
				<div class="gallery-item" tabindex="0">

					<img src={{ "/storage/" . $element->photo}} class="gallery-image-saved" alt="">
					<img src="{{ base64_decode($element->thumb) }}" alt="" >

					<form action={{ route('photos.download', $element)}} method="GET">
						@csrf
						<button type="submit" value="Download" class="button">Download</button>
					</form>

				</div>
			@endforeach

		</div>

	</div>
	<!-- End of container -->

</main>
<!-- partial -->

@endsection


