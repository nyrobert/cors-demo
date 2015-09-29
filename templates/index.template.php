<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CORS demo</title>
	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>CORS demo <small>with Slim and jQuery</small></h1>
		</div>

		<div id="UserWidget">
			<p>User is not logged in.</p>
			<button type="button" class="btn btn-primary" data-mode="logIn">Log in</button>
		</div>
	</div>

	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<script src="bower_components/jquery-cookie/jquery.cookie.js"></script>
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/app.js"></script>
</body>
</html>
