
<?php
	include "db/reg.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

	<title>Register</title>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script>

	function validation()
	{
			var name = document.forms["Register"]["userName"].value;
			var email = document.forms["Register"]["email"].value;
			var password = document.forms["Register"]["password"].value;
			if(name == null || name=="")
			{
				alert("Please enter user name !");
				return false;
			}
			if(email == null || email == "")
			{
				alert("Please enter user email !");
				return false;
			}
			if(password == null || password == "")
			{
				alert("Please enter password !");
				return false;
			}
	}
	</script>

</head>

<body>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="login.php"  id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="register.php" class="active" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" method="post" role="form"  style="display: block;">
									<div class="form-group">
										<input type="text" name="userName" id="username" tabindex="1" class="form-control" placeholder="User Name" value="">
									</div>
									<div class="form-group">
										<input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="E-mail" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Sign up">
											</div>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>