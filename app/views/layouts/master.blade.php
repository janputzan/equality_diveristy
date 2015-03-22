<!DOCTYPE html>
<html>
<head>
	<title>Equality and Diversity</title>

	{{ HTML::style('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/css/materialize.min.css') }}

	{{ HTML::style('assets/css/styles.css') }}

</head>
<body>

	<header>
		
		@yield('header')

	</header>

	<div class="container main-height">


		@include('partials._flash')

		@yield('content')
	
	</div>

	<footer class="container footer_bg">
		
		@yield('footer')

	</footer>

	{{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}
	{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/js/materialize.min.js') }}


	{{ HTML::script('assets/js/app.js') }}

</body>
</html>
