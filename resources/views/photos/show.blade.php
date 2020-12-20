@extends('layout')




@section('content')


<main>
	

	<div class="container">

		<div class="gallery">

			@foreach($photos as $element)
				<div class="gallery-item" tabindex="0">

					<img src={{ "/storage/" . $element->photo}} class="gallery-image" alt="">
					 <img src="{{ base64_decode($element->thumb) }}" alt="" >

				</div>
			@endforeach

		</div>

	</div>
	<!-- End of container -->

</main>
<!-- partial -->

@endsection


