<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="<?php echo base_url(); ?>">
		<title>PlagiGuardAI - AI & Plagiarism Detection Tool</title>
		<meta name="description" content="PlagiGuardAI is an advanced AI and plagiarism detection tool that helps you identify AI-generated content and ensure originality." />
		<meta name="keywords" content="AI content detection, plagiarism checker, AI writing detection, original content verification, content authenticity, PlagiGuardAI" />
		<meta name="author" content="PlagiGuardAI">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<!-- Open Graph / Facebook -->
		<meta property="og:locale" content="en_US" />
		<meta property="og:site_name" content="" />
		<meta property="og:title" content="PlagiGuardAI - AI & Plagiarism Detection Tool">
		<meta property="og:description" content="Check AI-generated content and detect plagiarism with PlagiGuardAI. Ensure content authenticity easily and quickly.">
		<meta property="og:image" content="https://yourwebsite.com/path-to-logo-or-preview-image.png">
		<meta property="og:url" content="https://yourwebsite.com">
		<meta property="og:type" content="website">
		<link rel="canonical" href="" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!-- Twitter -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="PlagiGuardAI - AI & Plagiarism Detection Tool">
		<meta name="twitter:description" content="Ensure originality and detect AI-generated content with PlagiGuardAI. The ultimate AI & plagiarism detection tool.">
		<meta name="twitter:image" content="https://yourwebsite.com/path-to-logo-or-preview-image.png">

		<!-- Favicon -->
		<link rel="icon" href="assets/media/logos/favicon.ico" type="image/png">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<?php $CI = &get_instance(); ?>
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - 404 Page-->
			<div class="d-flex flex-column flex-center flex-column-fluid p-10">
				<!--begin::Illustration-->
				<img src="assets/media/illustrations/unitedpalms-1/18.png" alt="" class="mw-100 mb-10 h-lg-450px" />
				<!--end::Illustration-->
				<!--begin::Message-->
				<h1 class="fw-bold mb-10" style="color: #A3A3C7">Seems there is nothing here</h1>
				<!--end::Message-->
				<?php if ($CI->session->userdata('admin_logged_in')) { ?>
				<!--begin::Link-->
				<a href="<?php echo base_url().'admin/dashboard'; ?>" class="btn btn-primary">Return to Dashboard</a>
				<!--end::Link-->
				<?php }else if($CI->session->userdata('logged_in_customer')){ ?>
				<!--begin::Link-->
				<a href="<?php echo base_url().'dashboard'; ?>" class="btn btn-primary">Return to Dashboard</a>
				<!--end::Link-->
				<?php }else{ ?>
				<!--begin::Link-->
				<a href="<?php echo base_url().'login'; ?>" class="btn btn-primary">Return to Login</a>
				<!--end::Link-->
				<?php } ?>
			</div>
			<!--end::Authentication - 404 Page-->
		</div>
		<!--end::Main-->
		<!--begin::Footer-->
			<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
				<?php if ($CI->session->userdata('admin_logged_in')) { ?>
				<!--begin::Links-->
				<div class="d-flex flex-center fw-bold fs-6">
					<a href="<?php echo base_url().'admin/dashboard'; ?>" class="text-muted text-hover-primary px-2">Dashboard</a>
					<a href="<?php echo base_url().'terms_conditions' ?>" class="text-muted text-hover-primary px-2" target="_blank">Terms and Conditions</a>
				</div>
				<!--end::Links-->
				<?php }else if($CI->session->userdata('logged_in_customer')){ ?>
					<!--begin::Links-->
				<div class="d-flex flex-center fw-bold fs-6">
					<a href="<?php echo base_url().'dashboard' ?>" class="text-muted text-hover-primary px-2">Dashboard</a>
					<a href="<?php echo base_url().'terms_conditions' ?>" class="text-muted text-hover-primary px-2" target="_blank">Terms and Conditions</a>
				</div>
				<!--end::Links-->
				<?php }else{ ?>
					<!--begin::Links-->
				<div class="d-flex flex-center fw-bold fs-6">
					<a href="<?php echo base_url().'login' ?>" class="text-muted text-hover-primary px-2">Signin</a>
					<a href="<?php echo base_url().'terms_conditions' ?>" class="text-muted text-hover-primary px-2" target="_blank">Terms and Conditions</a>
					<a href="<?php echo base_url().'signup' ?>" class="text-muted text-hover-primary px-2">Signup</a>
				</div>
				<!--end::Links-->
				<?php } ?>
			</div>
			<!--end::Footer-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>