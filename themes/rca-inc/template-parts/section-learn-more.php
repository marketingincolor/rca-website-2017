<?php 

?>
<div id="learn-more-form-container">
		<div class="row" >
			<div class="small-10 small-offset-1 columns text-center">
				<h1>I'm interested in Learning More About RCA</h1>
			</div>
		</div>
		<div class="row">
			<div class="small-10 small-offset-1">
				<form>
					    <legend></legend>
					    <div class="large-4 columns">
					    	<input type="text" name="first_name" id="" placeholder="First Name*" required><i class="fa fa-user" aria-hidden="true"></i>
					    </div>
					    <div class="large-4 columns">
					    	<input type="text" name="first_name" id="" placeholder="Last Name*" required><i class="fa fa-user" aria-hidden="true"></i>
					    </div>
					    <div class="large-4 columns">
					    	<input type="text" name="phone_number" id="" placeholder="Phone Number*" required><i class="fa fa-phone" aria-hidden="true"></i>
					    </div>
					    <div class="large-4 columns">
					 			<input type="email" name="email_address" id="" placeholder="Email Address*" required><i class="fa fa-envelope" aria-hidden="true"></i>
					    </div>
						<div class="large-4 columns">
					    	<input type="text" name="address" id="" placeholder="Address*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="large-4 columns">
					    	<input type="text" name="city" id="" placeholder="City*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="large-4 columns">
							<input type="text" name="state" id="" placeholder="State*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="large-4 columns">
					    	<input type="text" name="country" id="" placeholder="Country*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="large-4 columns">
					    	<input type="text" name="zip_code" id="" placeholder="Zip Code*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="large-12 columns">
					    	<input type="text" name="company" id="" placeholder="Company*" required><i class="fa fa-briefcase" aria-hidden="true"></i>
						</div>
						<div class="large-12 columns">
							<input type="text" name="industry" id="" placeholder="Industry*" required><i class="fa fa-building-o" aria-hidden="true"></i>
						</div>
						<div class="large-12 columns">
							<label for=""><i class="fa fa-comments-o" aria-hidden="true"></i> Comments/Questions*</label>
							<textarea name="" id="" cols="30" rows="4" required></textarea>
						</div>
						<div class="large-12 columns">
							<input type="submit" value="Submit">
						</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		var $form = $('#learn-more-form-container');
		$form.find('input,textarea').on('keyup',function(){
			if($(this).is(":valid")){
				$(this).next('i').css({'color':'white'});
				$(this).prev('label,label i').css({'color':'white'});
				$(this).prev('label').find('i').css({'color':'white'});
			}else{
				$(this).next('i').css({'color':'rgba(255,255,255,0.4)'});
				$(this).prev('label').css({'color':'rgba(255,255,255,0.4)'});
				$(this).prev('label').find('i').css({'color':'rgba(255,255,255,0.4)'});
			}
		});
	</script>
	