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
	<link type="text/css" rel="stylesheet" href="{{asset('bootstrap.min.css')}}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('style.css')}}" />

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

								<div class="col-md-3">
									<div class="form-header">
										<h2>Book Now</h2>
									</div>
								</div>
								<div class="col-md-7">
									<div class="row no-margin">
										<div class="col-md-4">
											<div class="form-group">
												<form name="a" method="get" action="searchMail">
													<input type="text" name="mail_address">
											
													<input type="submit" value="Check">
											
												</form>
											
												@isset($reservation_table)
											
													@foreach($reservation_table as $res_t)

                                                      <div class="text">
											
														{{$res_t["id"]}} <br>
														{{$res_t["id_r"]}} <br>
														{{$res_t["id_c"]}} <br>
														{{$res_t["from"]}} <br>
														{{$res_t["to"]}} <br>

                                                        </div>
											
														<a href="editReservationForms?id={{$res_t['id']}}&from={{$res_t['from']}}&to={{$res_t['to']}}"><input type="submit" value="Edit"></a>
														<a href="canceledReservationDelete?id={{$res_t['id']}}"><input type="submit" value="Delete"></a> <br>
											
													@endforeach
											
												@endisset
											
												@if ($res===true)
											
												<form name="a" method="get" action="editReservation">
											
												<label for="typeRoom">Room type: </label>
												<input type="number" name="typeRoom" value="{{$roomType}}">
												<label for="from"> From:  </label>
												<input type="date" name="from" value="{{$from_d}}">
												<label for="to"> To: </label>
												<input type="date" name="to" value="{{$to_d}}">
												<input type="hidden" name="id" value="{{$id_u}}">
                                                <input type="hidden" name="from_d" value="{{$from_d}}">
                                                <input type="hidden" name="to_d" value="{{$to_d}}">
											
												<input type="submit" value="Save">
												</form>
												@endif
											
												@isset($reservations)
											
													@foreach($reservations as $res)
											
														{{$res->id}} <br>
														{{$res->id_r}} <br>
														{{$res->id_c}} <br>
														{{$res->from}} <br>
														{{$res->to}} <br>
												
													@endforeach
											
												@endisset
											

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
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>