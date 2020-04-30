<!DOCTYPE html> 
<html>
<head>
	<title>Etisalat Nigeria | Preorder </title>
		
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/sky-forms.css">
	<link rel="stylesheet" href="css/sky-forms-green.css">
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="css/sky-forms-ie8.css">
	<![endif]-->
	
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/jquery.maskedinput.min.js"></script>
	<!--[if lt IE 10]>
		<script src="js/jquery.placeholder.min.js"></script>
	<![endif]-->		
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="js/sky-forms-ie8.js"></script>
	<![endif]-->
	
</head>
	<body class="bg-green">
		<div class="body">			
		
			<!-- Green color scheme -->
			<form action="" class="sky-form">
				<header>
					<a href="http://www.etisalat.com.ng"><img name="headermenu_r1_c1" src="images/etisalat.jpg" width="220" height="62" border="0" id="headermenu_r1_c1" alt="" /></a>
				</header>
				
				<fieldset>
					
					<section>
						<label class="select">
							<select name="country">
								<option value="0" selected disabled>Title</option>
								<option value="1">Miss</option>
								<option value="2">Mr</option>
								<option value="3">Mrs</option>
								<option value="4">Dr</option>
								<option value="5">Chief</option>
							<select>
							<i></i>
						</label>
					</section>	
					
					<div class="row">
						<section class="col col-6">
							<label class="input">
								<i class="icon-prepend fa fa-user"></i>
								<input type="text" name="fname" placeholder="First name">
							</label>
						</section>
						<section class="col col-6">
							<label class="input">
								<i class="icon-prepend fa fa-user"></i>
								<input type="text" name="lname" placeholder="Last name">
							</label>
						</section>
					</div>
					
					<div class="row">
						<section class="col col-6">
							<label class="input">
								<i class="icon-prepend fa fa-envelope"></i>
								<input type="email" name="email" placeholder="E-mail">
							</label>
						</section>
						<section class="col col-6">
							<label class="input">
								<i class="icon-prepend fa fa-phone"></i>
								<input type="tel" name="phone" placeholder="Phone">
							</label>
						</section>
					</div>
									
				</fieldset>
				
				<fieldset>
					<section>
						<label class="label">Select</label>
						<label class="select">
							<select>
								<option value="0">Choose name</option>
								<option value="1">Alexandra</option>
								<option value="2">Alice</option>
								<option value="3">Anastasia</option>
								<option value="4">Avelina</option>
							</select>
							<i></i>
						</label>
					</section>
					
					<section>
						<label class="label">Multiple select</label>
						<label class="select select-multiple">
							<select multiple>
								<option value="1">Alexandra</option>
								<option value="2">Alice</option>
								<option value="3">Anastasia</option>
								<option value="4">Avelina</option>
								<option value="5">Basilia</option>
								<option value="6">Beatrice</option>
								<option value="7">Cassandra</option>
								<option value="8">Clemencia</option>
								<option value="9">Desiderata</option>
							</select>
						</label>
						<div class="note"><strong>Note:</strong> hold down the ctrl/cmd button to select multiple options.</div>
					</section>
				</fieldset>
				
				<fieldset>					
					<section>
						<label class="label">Textarea</label>
						<label class="textarea">
							<textarea rows="3"></textarea>
						</label>
						<div class="note"><strong>Note:</strong> height of the textarea depends on the rows attribute.</div>
					</section>
					
					<section>
						<label class="label">Textarea resizable</label>
						<label class="textarea textarea-resizable">
							<textarea rows="3"></textarea>
						</label>
					</section>
					
					<section>
						<label class="label">Textarea expandable</label>
						<label class="textarea textarea-expandable">
							<textarea rows="3"></textarea>
						</label>
						<div class="note"><strong>Note:</strong> expands on focus.</div>
					</section>
				</fieldset>
				
				<fieldset>
					<section>
						<label class="label">Columned radios</label>
						<div class="row">
							<div class="col col-4">
								<label class="radio"><input type="radio" name="radio" checked><i></i>Alexandra</label>
								<label class="radio"><input type="radio" name="radio"><i></i>Alice</label>
								<label class="radio"><input type="radio" name="radio"><i></i>Anastasia</label>
							</div>
							<div class="col col-4">
								<label class="radio"><input type="radio" name="radio"><i></i>Avelina</label>
								<label class="radio"><input type="radio" name="radio"><i></i>Basilia</label>
								<label class="radio"><input type="radio" name="radio"><i></i>Beatrice</label>
							</div>
							<div class="col col-4">
								<label class="radio"><input type="radio" name="radio"><i></i>Cassandra</label>
								<label class="radio"><input type="radio" name="radio"><i></i>Clemencia</label>
								<label class="radio"><input type="radio" name="radio"><i></i>Desiderata</label>
							</div>
						</div>						
					</section>
					
					<section>
						<label class="label">Inline radios</label>
						<div class="inline-group">
							<label class="radio"><input type="radio" name="radio-inline" checked><i></i>Alexandra</label>
							<label class="radio"><input type="radio" name="radio-inline"><i></i>Alice</label>
							<label class="radio"><input type="radio" name="radio-inline"><i></i>Anastasia</label>
							<label class="radio"><input type="radio" name="radio-inline"><i></i>Avelina</label>
							<label class="radio"><input type="radio" name="radio-inline"><i></i>Beatrice</label>
						</div>
					</section>
				</fieldset>
				
				<fieldset>
					<section>
						<label class="label">Columned checkboxes</label>
						<div class="row">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>Alexandra</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Alice</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anastasia</label>
							</div>
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Avelina</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Basilia</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Beatrice</label>
							</div>
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Cassandra</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Clemencia</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Desiderata</label>
							</div>
						</div>
					</section>
					
					<section>
						<label class="label">Inline checkboxes</label>
						<div class="inline-group">
							<label class="checkbox"><input type="checkbox" name="checkbox-inline" checked><i></i>Alexandra</label>
							<label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>Alice</label>
							<label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>Anastasia</label>
							<label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>Avelina</label>
							<label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>Beatrice</label>
						</div>
					</section>
				</fieldset>
				
				<fieldset>
					<div class="row">
						<section class="col col-5">
							<label class="label">Toggles based on radios</label>
							<label class="toggle"><input type="radio" name="radio-toggle" checked><i></i>Alexandra</label>
							<label class="toggle"><input type="radio" name="radio-toggle"><i></i>Anastasia</label>
							<label class="toggle"><input type="radio" name="radio-toggle"><i></i>Avelina</label>
						</section>
						
						<div class="col col-2"></div>
						
						<section class="col col-5">				
							<label class="label">Toggles based on checkboxes</label>
							<label class="toggle"><input type="checkbox" name="checkbox-toggle" checked><i></i>Cassandra</label>
							<label class="toggle"><input type="checkbox" name="checkbox-toggle"><i></i>Clemencia</label>
							<label class="toggle"><input type="checkbox" name="checkbox-toggle"><i></i>Desiderata</label>	
						</section>
					</div>
				</fieldset>
				
				<fieldset>					
					<section>
						<label class="label">Ratings with different fa fas</label>
						<div class="rating">
							<input type="radio" name="stars-rating" id="stars-rating-5">
							<label for="stars-rating-5"><i class="fa fa-star"></i></label>
							<input type="radio" name="stars-rating" id="stars-rating-4">
							<label for="stars-rating-4"><i class="fa fa-star"></i></label>
							<input type="radio" name="stars-rating" id="stars-rating-3">
							<label for="stars-rating-3"><i class="fa fa-star"></i></label>
							<input type="radio" name="stars-rating" id="stars-rating-2">
							<label for="stars-rating-2"><i class="fa fa-star"></i></label>
							<input type="radio" name="stars-rating" id="stars-rating-1">
							<label for="stars-rating-1"><i class="fa fa-star"></i></label>
							Stars
						</div>
						
						<div class="rating">
							<input type="radio" name="trophies-rating" id="trophies-rating-7">
							<label for="trophies-rating-7"><i class="fa fa-trophy"></i></label>
							<input type="radio" name="trophies-rating" id="trophies-rating-6">
							<label for="trophies-rating-6"><i class="fa fa-trophy"></i></label>
							<input type="radio" name="trophies-rating" id="trophies-rating-5">
							<label for="trophies-rating-5"><i class="fa fa-trophy"></i></label>
							<input type="radio" name="trophies-rating" id="trophies-rating-4">
							<label for="trophies-rating-4"><i class="fa fa-trophy"></i></label>
							<input type="radio" name="trophies-rating" id="trophies-rating-3">
							<label for="trophies-rating-3"><i class="fa fa-trophy"></i></label>
							<input type="radio" name="trophies-rating" id="trophies-rating-2">
							<label for="trophies-rating-2"><i class="fa fa-trophy"></i></label>
							<input type="radio" name="trophies-rating" id="trophies-rating-1">
							<label for="trophies-rating-1"><i class="fa fa-trophy"></i></label>
							Trophies
						</div>	
						
						<div class="rating">
							<input type="radio" name="asterisks-rating" id="asterisks-rating-10">
							<label for="asterisks-rating-10"><i class="fa fa-asterisk"></i></label>
							<input type="radio" name="asterisks-rating" id="asterisks-rating-9">
							<label for="asterisks-rating-9"><i class="fa fa-asterisk"></i></label>
							<input type="radio" name="asterisks-rating" id="asterisks-rating-8">
							<label for="asterisks-rating-8"><i class="fa fa-asterisk"></i></label>
							<input type="radio" name="asterisks-rating" id="asterisks-rating-7">
							<label for="asterisks-rating-7"><i class="fa fa-asterisk"></i></label>
							<input type="radio" name="asterisks-rating" id="asterisks-rating-6">
							<label for="asterisks-rating-6"><i class="fa fa-asterisk"></i></label>
							<input type="radio" name="asterisks-rating" id="asterisks-rating-5">
							<label for="asterisks-rating-5"><i class="fa fa-asterisk"></i></label>
							<input type="radio" name="asterisks-rating" id="asterisks-rating-4">
							<label for="asterisks-rating-4"><i class="fa fa-asterisk"></i></label>
							<input type="radio" name="asterisks-rating" id="asterisks-rating-3">
							<label for="asterisks-rating-3"><i class="fa fa-asterisk"></i></label>
							<input type="radio" name="asterisks-rating" id="asterisks-rating-2">
							<label for="asterisks-rating-2"><i class="fa fa-asterisk"></i></label>
							<input type="radio" name="asterisks-rating" id="asterisks-rating-1">
							<label for="asterisks-rating-1"><i class="fa fa-asterisk"></i></label>
							Asterisks
						</div>
						<div class="note"><strong>Note:</strong> you can use more than 300 vector icons for rating.</div>
					</section>
				</fieldset>
				
				<footer>
					<button type="submit" class="button">Submit</button>
					<button type="button" class="button button-secondary" onclick="window.history.back();">Back</button>
				</footer>
			</form>
			<!--/ Green color scheme -->			
		</div>
	</body>
</html>