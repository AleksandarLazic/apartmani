<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		@include('assets.bootstrap')
		@include('assets.css')
		<title></title>
	</head>
	<body>
		<div class="container">
  			<div class="row row-centered">
  				<div class="col-md-4"></div>
  				<div class="col-md-4 col-centered">
  					<div class="inner">
  						<div class="logo"><p>Wicked Team</p></div>
						<form method="post" action="{{ route('login.post') }}">
 							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
						<div class="form-group">
							<input type="text" class='form-control' name="username" 
							placeholder="Username">
						</div>
						<div class="form-group">
							<input type="password" class='form-control' name="password" 
							placeholder="Password">
						</div>
						<input type="submit" value="Login" class = 'btn btn-default'>						
						</form>
					</div>
  				</div>
  			</div>
		</div>
	</body>
</html>