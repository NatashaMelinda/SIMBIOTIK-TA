<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title> SIMBIOTIK | @yield('title') </title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="\assets/img/icon.png" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="\assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['\assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="\assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="\assets/css/azzara.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="\assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		 -->
		<div class="main-header" style="background-color: #294A79;">
			<!-- Logo Header -->
			<div class="logo-header">
				<a href=" " class="logo d-flex align-items-center">
					<img src="\assets/img/icon2.png" alt="navbar brand" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">
					<div style="font-weight: bold;" class="navbar-brand text-white">SIMBIOTIK</div>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 3 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"></i> </div>
											<div class="notif-content">
												<span class="block">
													Suhu Air saat ini 30c
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"></div>
											<div class="notif-content">
												<span class="block">
													Air mencapai batas maximum
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"></div>
											<div class="notif-content">
												<span class="block">
													Tanaman membutuhkan TDS
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								{{-- <li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li> --}}
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="\assets/img/paklinds2.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="\assets/img/paklinds2.jpg" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>Lindung Siswanto</h4>
											<p class="text-muted">Admin</p> 
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="http://127.0.0.1:8000/profile">
										<i class="fas fa-user"></i> My Profile
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt"></i> Logout
									</a>
								</li>								
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background" style="background-color: #c1c1c1;"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav">
						<li class="nav-item">
							<a href="dashboard2">
								<i class="fas fa-fw fa-tachometer-alt"></i>
								<p>Dashboard</p>
							</a>
						</li>
                        <hr>
                        <li class="nav-item">
							<a href="http://127.0.0.1/native/control.php">
								<i class="fas fa-fw fa-cog"></i>
								<p>Control</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="kelolauser">
								<i class="fas fa-fw fa-user"></i>
								<p>Manage User</p>
							</a>
                        </li>
						<hr>
						<li class="nav-item">
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
								<i class="fas fa-sign-out-alt"></i>
								<p>Logout</p>
							</a>
                        </li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
		
        @yield('content') 
        
        {{-- <!-- Footer -->
        <footer class="footer bg-white">
            <div class="container my-auto">
                 <div class="copyright text-center my-auto">
                    <strong>Copyright &copy; by
                        <a href="#"> Natasha Melinda. </a> </strong>
                </div>
            </div>
        </footer>
        <!-- End of Footer --> --}}
		

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login">Logout</a>
                </div>
            </div>
        </div>
    </div>

	</div>
	<!--   Core JS Files   -->
	<script src="\assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="\assets/js/core/popper.min.js"></script>
	<script src="\assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="\assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="\assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Moment JS -->
	<script src="\assets/js/plugin/moment/moment.min.js"></script><!-- DateTimePicker -->
	<script src="\assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="\assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="\assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Azzara JS -->
	<script src="\assets/js/ready.min.js"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="\assets/js/setting-demo.js"></script>
	<script>
		$('#datepicker').datetimepicker({
			format: 'MM/DD/YYYY',
		});
	</script>
</body>
</html>