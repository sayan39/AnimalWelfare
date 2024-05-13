<div class="sidebar-menu">
	<header class="logo1" style="text-align: left;">
		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span></a> 
	</header>
	<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
		<div class="menu">
				<ul id="menu" >
					<li><a href="dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span><div class="clearfix"></div></a></li>
				
					<li id="menu-academico" ><a href="welfare.php"><i class="fa fa-users" aria-hidden="true"></i><span>Welfare</span><div class="clearfix"></div></a></li>

					<li id="menu-academico" ><a href="rescue.php"><i class="fa fa-users" aria-hidden="true"></i><span>Rescue</span><div class="clearfix"></div></a></li>

					<li id="menu-academico" ><a href="members.php"><i class="fa fa-users" aria-hidden="true"></i><span>Members</span><div class="clearfix"></div></a></li>
					
					<li><a href="adoption.php"><i class="fa fa-medium" aria-hidden="true"></i><span>Adoption</span><div class="clearfix"></div></a></li>

					<li><a href="donation.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Donation</span><div class="clearfix"></div></a></li>
						
					<li><a href="managefeedbacks.php"><i class="fa fa-comments-o" aria-hidden="true"></i><span>Feedbacks</span><div class="clearfix"></div></a></li>
					
					<li><a onclick="logout()"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span><div class="clearfix"></div></a></li>
					
				</ul>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		function logout() {

			Swal.fire({
					title: 'Are you sure to Logout?',
					text: "",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Logout'
					}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: "logout.php",
							type: 'POST',
							success: function (data) {
								
								window.location.href = "index.php";
								   
							},
							cache: false,
							contentType: false,
							processData: false
						});
					}
				})
			}
	</script>