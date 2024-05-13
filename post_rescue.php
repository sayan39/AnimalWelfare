<?php
    include('API/MyMethods.php');
    $message = "";
    $email = "";
    if(!isset($_SESSION['email']))
    {
        $message = "Please login 1st to post a rescue for stray animals";
    }
    else 
    {
        $email = $_SESSION['email'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Animal Welfare</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php
        include('includes/csslink.php');
    ?>
</head>

<body>
    
    <?php
        include('includes/topbar.php');
        include('includes/headers.php');
    ?>

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 100%;">
                <h4 class="text-primary text-uppercase">
                    <span>Post For Rescue of Stray Animals</span>
                    <!-- <button class="btn" style="background-color: #64B62E;color:white; margin-left: 52%;">POST FOR RESCUE</button> -->
                </h4>
                <h5><?php echo $message;?></h5>
            </div>
            
            <form class="row g-3" style="width: 100%;" action="" method="post" enctype="multipart/form-data">
                <div class="col-lg-6">
                    <!-- Google Map Script -->
                    <input type="hidden" name="userid" id="userid" value="<?php echo $email;?>"/>
                    <input type="hidden" name="urlatt" id="urlatt" value=""/>
                    <input type="hidden" name="urlng" id="urlng" value=""/>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="name" placeholder="Enter Animal Name">
                        </div>
                        
                        <div class="col-12">
                            <textarea rows="3" class="form-control" name="description" placeholder="Write the basic description ....."></textarea>
                        </div>

                        <div class="col-12">
                            <input type="text" class="form-control" name="address"  placeholder="Enter your Address">
                        </div>
                    
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="city" placeholder="Enter City">
                        </div>
                        <div class="col-md-4">
                            <select id="inputState" class="form-select" name="state">
                            <option selected>Choose state</option>
                            <option value="West Bengal">West Bengal</option>
                            <option value="Bihar">Bihar</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="pincode" placeholder="Enter pincode">
                        </div>
                        <div class="col-md-12">
                            <input type="file" class="form-control" accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;" alt="Image not uploaded">
                            <p><label for="file" style="cursor: pointer;text-decoration: underline;" class="btn" >Click me to Upload Image</label></p>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="post" class="btn btn-primary">Post for Rescue</button>
                        </div>

                        <div class="col-md-12">
                            <?php
                                if(isset($_POST['post']))
                                {
                                    $res = needRescue($_POST);                                  

                                
                                    echo '<h3 class="text-success">'.$res.'</h3>';
                                    
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="" id="output" width="70%" height="250px" style="padding-left: 100px;" alt="">
                </div>      
            </form>
    
        </div>
    </div>
    <!-- Blog End -->

    <!-- Rescue Form -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Rescue Form -->


    <?php
        include('includes/footer.php');
    ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script>
	var loadFile = function(event) 
	{
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
	</script>

    <?php
        include('includes/jslink.php');
    ?>

<script>
/* map script to show donors near 20 km from user current location */
var map;
	function getVisitorsLatitudeLongitudePromise (){
		return new Promise(function(resolve, reject){
			getLocation();

    function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
          } else {
            alert("Geolocation is not supported by this browser.") ;
          }
      }

      function showPosition(position) {
              geousrlat=position.coords.latitude;
              geousrlng= position.coords.longitude;
              $("#urlatt").val(geousrlat);
              $("#urlng").val(geousrlng);
			 
              resolve(); 
        
      }
		});
	}

    function initialize() {
	 initMap();
	 initAutoComplete();
    }
    
    function initAutoComplete() {

      var input = document.getElementById('address');

      var autocomplete = new google.maps.places.Autocomplete(input);

      autocomplete.addListener('place_changed', function() {

          var place = autocomplete.getPlace();
          
           if($('#signupurlatt').length>0){
				$("#signupurlatt").val(place.geometry.location.lat());
			 }
           if($('#signupurlng').length>0){
				$("#signupurlng").val(place.geometry.location.lng());
           }
          
         //call again to refresh map
         //$("#hideditproflat").val(place.geometry.location.lat());
         //$("#hideditproflng").val(place.geometry.location.lng());

      });
  
  }

  
  function initMap() 
 {
		//wrap all the requests in Promise.all
		Promise.all([
			getVisitorsLatitudeLongitudePromise()
           
			
		]).then(function (results) 
     {
            
            var customLabel = {
              donor: {
                label: ''
              },
              
          
            };

              var map = new google.maps.Map(document.getElementById('map'), 
              {
                    //var vslat= $("#urlatt").val();
                    //var vslng = $("#urlng").val();
                    
                      //center: new google.maps.LatLng(23.751844, 90.377849),
              
                      center: new google.maps.LatLng(geousrlat, geousrlng),
                      zoom: 11,
                      panControl: false,
                      zoomControl: false,
                      mapTypeControl: false,
                      scaleControl: false,
                      streetViewControl: false,
                      overviewMapControl: false,
                      rotateControl: false,
                      fullscreenControl: false
                   
             });
              var infoWindow = new google.maps.InfoWindow;
              var vslat= $("#urlatt").val();
              var vslng = $("#urlng").val();
              localStorage.setItem("urlatt_loc_stor",vslat);
              localStorage.setItem("urlng_loc_stor",vslng);
              // Change this depending on the name of your PHP or XML file
              

                function downloadUrl(url, callback) {
                    var request = window.ActiveXObject ?
                        new ActiveXObject('Microsoft.XMLHTTP') :
                        new XMLHttpRequest;

                            request.onreadystatechange = function() {
                              if (request.readyState == 4) {
                                request.onreadystatechange = doNothing;
                                callback(request, request.status);
                              }
                            };

                    request.open('GET', url, true);
                    request.send(null);
                  }

                   function doNothing() {}
	     }).then(function(){
            
            initAutoComplete();
        })
		
	}
  /* map script to show donors near 20 km from user current location */
  </script>


    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZWZG9qSxMhvegb1JenZbzdJmQXKm28Qk&callback=initialize&libraries=places">
    </script>


    
</body>

</html>