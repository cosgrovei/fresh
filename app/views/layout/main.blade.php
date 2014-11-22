<!DOCTYPE html>
<html>
	<head>

		<title>WA</title>
		
		{{ HTML::style('css/style.css') }}
		{{ HTML::style('css/jquery-ui.min.css') }}
		{{ HTML::style('http://localhost/css/jquery.ui.datepicker.css') }}
		{{ HTML::style('http://localhost/css/jquery.timepicker.css') }}
		{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js')}}
		{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js') }}
		<!-- <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">-->

	</head>
	<body>
		<div id="wrapper">
				<div id="heading">
					<img src="http://localhost/img/redlabel.png"/>
					<div id="container">
						JAPANESE KITCHEN
					</div>
				</div>
				<nav id="navigation">			
					@include('layout.navigation')
				</nav>
				<div id="content">
					@yield('content')
				</div>
				<footer>
					@include('layout.footer')
				</footer>
		</div>
	</body>
</html>