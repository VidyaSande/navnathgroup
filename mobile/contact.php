<?php include_once("header.php"); ?>

			<div class="main-wrapper">

				<div class="container-fluid">
   <div class="row">
	<img src="assets/images/strawberry.jpg" class="img-responsive">
   </div>
</div>

				<section class="page-content no-padding">
					<div class="mid-space"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-offset-1 col-md-10 col-sm-12">
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="contact-info">
											<h3>Head Office</h3>
											<div class="small-space"></div>
											<p><i class="fa fa-location-arrow"></i>Navnath Group <br>Navnath Infrastructure Private Limited <br>B-101 Shrirang Niwas, Gokhale roa <br>Mulund East, Mumbai, Maharashtra, INDIA, PIN 400081</p>	
											<p><i class="fa fa-envelope"></i>Email: <a href="mailto:connect@navnathinfra.com">connect@navnathinfra.com</a></p>									
											<p><i class="fa fa-phone"></i>Phone: <a href="#">022 21631682, +91 9769022996</a></p>
											<br>
											<h3>Branch Office</h3>
											<div class="small-space"></div>
											<p><i class="fa fa-location-arrow"></i>Plot 7, Navnath Ashish, Kokamb aali <br>NKamp Dapoli, Ratnagiri, Maharashtra, INDIA, PIN 415712</p>
											<p><i class="fa fa-phone"></i>Phone: <a href="#">+91 7875643375</a></p>									
										</div>
									</div>
									<div class="col-md-8 col-sm-12">
										<h3>Contact Form</h3>
										<div class="small-space"></div>
										<form role="form" action="contact-us.php" method="POST" class="contact-form" id="contact">
											<div class="row">
												<div class="col-sm-12">
													<div id="result"></div>
												</div>
												<div class="col-sm-6">
													<input name="uname" type="text" class="form-control" placeholder="Name">
												</div>												
												<div class="col-sm-12">
													<input name="email" type="email" class="form-control" placeholder="Email">
												</div>
												<div class="col-sm-12">
													<input name="phone" type="number" class="form-control" placeholder="Phone Number">
												</div>
												<div class="col-sm-12">
													<textarea name="message" class="form-control" placeholder="Comments" rows="7"></textarea>
												</div>
											</div>
											<button type="submit" name="send" class="button default" id="submit-btn">
												<span class="pre-submit">Register</span>
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="section-space"></div>
					
				</section> <!-- /.page-content -->

				
			

    <script type="text/javascript">
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);
    
        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
              // How zoomed in you want the map to start at (always required)
              zoom: 11,
              zoomControl: true,

              // The latitude and longitude to center the map (always required)
              center: new google.maps.LatLng(40.6700, -73.9400), // New York

              disableDoubleClickZoom: false,
              scrollwheel: false,
              mapTypeControl: false,
              streetViewControl: false,

              // How you would like to style the map. 
              // This is where you would paste any style found on Snazzy Maps.
              mapTypeId: google.maps.MapTypeId.TERRAIN,
          		styles: [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"}]}]        
          	};

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.6700, -73.9400),
                map: map,
                title: 'Snazzy!'
            });
        }
    </script>

    <script type="text/javascript">
		    $(document).ready(function() {
		        $("#submit-btn").click(function() { 
		            
		            //Get input field values
		            var first_name       = $('input[name=name-id]').val(); 
		            var last_name      = $('input[name=surname-id]').val();
		            var user_email      = $('input[name=email-id]').val();
		            var user_message    = $('textarea[name=message]').val();
		            
		            
		            // Do simple validations of the values entered
		            var proceed = true;
		            if(first_name==""){ 
		                $('input[name=name-id]').css('border-color','red'); 
		                proceed = false;
		            }
		            if(last_name==""){ 
		                $('input[name=surname-id]').css('border-color','red'); 
		                proceed = false;
		            }
		            if(user_email==""){ 
		                $('input[name=email-id]').css('border-color','red'); 
		                proceed = false;
		            }
		            
		            if(user_message=="") {  
		                $('textarea[name=message]').css('border-color','red'); 
		                proceed = false;
		            }
		    
		            // Check if we can proceed
		            if(proceed) 
		            {
		                // Data to be sent to server
		                post_data = {'firstName':first_name, 'lastName':last_name, 'userEmail':user_email, 'userMessage':user_message};
		                
		                // Ajax post data to server
		                $.post('contact-form.html', post_data, function(response){  
		                    
		                    // Load json data from server and output message     
		                    if(response.type == 'error')
		                    {
		                        output = '<div class="alert alert-danger">'+response.text+'</div>';
		                    }else{
		                    
		                        output = '<div class="alert alert-success">'+response.text+'</div>';
		                        
		                        // Reset values in all input fields
		                        $('#contact input').val(''); 
		                        $('#contact textarea').val(''); 
		                    }
		                    
		                    $("#result").hide().html(output).slideDown();
		                }, 'json');
		                
		            }
		        });
		        
		        // Reset previously set border colors and hide all message on .keyup()
		        $("#contact input, #contact textarea").keyup(function() { 
		            $("#contact input, #contact textarea").css('border-color',''); 
		            $("#result").slideUp();
		        });
		        
		    });
		</script>

		 
<?php include_once("footer.php"); ?>