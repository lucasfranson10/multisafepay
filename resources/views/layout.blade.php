<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>MultiSafePay Interview</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link href="/css/default.css" rel="stylesheet" />
  <link rel="stylesheet" href="/styles/dist/notifications.css" type="text/css">
  <script src="/styles/dist/notifications.js" type="text/javascript"></script>
</head>
<body>
<header>
	<div class="container">
    <div class="topnav">
      <a class= "{{ Request::path() === '/' ? "active" : "" }}" href="/">Home</a>
      <a class="{{ Request::path() === 'saved' ? "active" : "" }}" href="/saved">Photos</a>
      <div class="search-container">
        <form action="/">
          <input class="inputSea" type="text" placeholder="Search..." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
  </div>
  <!-- End of container -->
</header>
    @yield('content')
    @yield('script') 
      
</body>
</html>
