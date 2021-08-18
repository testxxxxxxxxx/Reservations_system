<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>System Rezerwacji pokoi</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Alegreya:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('style.css') }}">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
							<div class="row no-margin">
							<form name="a" method="get" action="insertCustomers">
								<div class="col-md-3">
									<div class="form-header">
										<h2>Book Now</h2>
									</div>
								</div>
								<div class="col-md-7">
									<div class="row no-margin">
										<div class="col-md-4">
											<div class="form-group">
												<!-- <form name="a" method="get" action="insertCustomers"> -->

													<label for="firstname"> Firstname: </label>
													<input type="text" name="firstname">
													<label for="surname"> Surname: </label>
													<input type="text" name="surname" require>
													<label for="number_phone"> Number phone: </label>
													<input type="number" name="number_phone">
													<label for="address"> Address: </label>
													<input type="text" name="address" require>
													<label for="mail_address"> Mail address: </label>
													<input type="email" name="mail_address">
													<label for="from">From: </label>
													<input type="date" name="from">
													<label for="to">To: </label>
													<input type="date" name="to">
													<label for="typeRoom"> Room type: </label>
													<input type="number" name="typeRoom">
											
													<input type="submit" value="Reservation" class="submit-btn">     
											
												</form>
											</div>

										</div>
										
										</div>

									</div>
								</div>

								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>