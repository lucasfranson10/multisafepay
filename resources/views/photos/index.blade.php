@extends('layout')

@section('content')


<main>
	

	<div class="container">

		<div class="gallery">

			@foreach($photos as $photos=>$photo)
				<div class="gallery-item" tabindex="0">

					<img src={{$photo['largeImageURL']}} class="gallery-image" alt="">

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

	</div>
	<!-- End of container -->

</main>
<!-- partial -->

@endsection

@section('script')
	<script>
		var message = '{{Session::get('alert')}}';
		var exist = '{{Session::has('alert')}}';
		if(exist){
			var title = "Notification";
			var position = "nfc-bottom-right";
			var duration = 3000;
			var theme = "success";
			var closeOnClick = false;
			var displayClose = false;

			if(!message) {
				message = 'You did not enter a message...';
			}

			window.createNotification({
				closeOnClick: closeOnClick,
				displayCloseButton: displayClose,
				positionClass: position,
				showDuration: duration,
				theme: theme
			})({
				title: title,
				message: message
			});
		}
	</script>
@endsection
