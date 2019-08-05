<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<title>Pusher</title>
</head>
<body>
	<div class="container">
		<h1>OS Vote</h1>
		<p>Vote for your favorite OS to develop on</p>
		<form id="vote-form">
			<p>
				<input type="radio" name="os" id="windows" value='Windows'>
				<label for="windows">Windows</label>
			</p>
			<p>
				<input type="radio" name="os" id="macos" value='Macos'>
				<label for="macos">Macos</label>
			</p>
			<p>
				<input type="radio" name="os" id="linux" value='Linux'>
				<label for="linux">Linux</label>
			</p>
			<p>
				<input type="radio" name="os" id="other" value='Other'>
				<label for="other">Something Else</label>
			</p>
			<input type="submit" value='Vote' class='btn'>
		</form>
		<br><br>

		<div id='chartContainer' style='height:300px;width:100%'></div>
	</div>
	
	<script
  src="http://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/4.2.2/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
    
</body>
</html>