<?php $this->load->view('autentication/header'); ?>
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
	<!--begin::Authentication - Password reset -->
	<div class="d-flex flex-column flex-lg-row flex-column-fluid">
		<!--begin::Aside-->
		<div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #f2f3f5">
			<!--begin::Wrapper-->
			<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
				<!--begin::Content-->
				<div class="d-flex flex-row-fluid flex-column text-center p-5">
					<!--begin::Logo-->
					<a href="<?php echo base_url(); ?>" class="mb-5">
						<img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/logo-2.png" class="h-200px" />
					</a>
					<!--end::Logo-->
					<!--begin::Title-->
					<h1 class="fw-bolder fs-2qx pb-5 pb-md-2 text-logo1">Welcome to PlagiGuardAI</h1>
					<!--end::Title-->
					<!--begin::Description-->
					<p class="fw-bold fs-2 text-logo2">PlagiGuardAI helps you spot <br>AI-written content and plagiarism in seconds<br>Protect your ideas, maintain originality<br>ensure every word counts</p>
					<!--end::Description-->
				</div>
				<!--end::Content-->
				<!--begin::Illustration-->
				<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(<?php echo base_url(); ?>assets/media/illustrations/dozzy-1/21.png"></div>
				<!--end::Illustration-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Aside-->
		<!--begin::Body-->
		<div class="d-flex flex-column flex-lg-row-fluid py-10">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="w-lg-500px p-10 p-lg-15 mx-auto">
					<div class="text-center mb-10">
						<div class="text-gray-400 fw-bold fs-4">Back to login?
						<a href="<?php echo base_url().'login' ?>" class="link-primary fw-bolder">Sign in here</a></div>
						<h2 class="fw-bolder fs-2qx pb-5 pb-md-2 text-dark">Terms and Conditions</h2>
						<div class="text-dark fw-bold fs-4"><b class="text-logo2">Effective Date:</b> 01-01-2026</div>
						<div class="text-dark fw-bold pb-md-2 fs-4">Welcome to PlagiGuardAI (“we,” “our,” or “us”). By accessing or using our website and services (“Services”), you agree to comply with these Terms and Conditions.</div>
						<h2 class="text-dark mb-3">Acceptance of Terms</h2>
						<div class="text-dark fw-bold pb-md-2 fs-4">By using our Services, you acknowledge that you have read, understood, and agree to be bound by these Terms. If you do not agree, you may not use our Services.</div>
						<h2 class="text-dark mb-3">Use of Services</h2>
						<div class="text-dark fw-bold pb-md-2 fs-4">You may use our Services only for lawful purposes. You may not use our Services to upload content that is illegal, harmful, offensive, or infringes on intellectual property rights.You agree not to attempt to reverse-engineer, manipulate, or misuse our detection algorithms.</div>
						<h2 class="text-dark mb-3">Intellectual Property</h2>
						<div class="text-dark fw-bold pb-md-2 fs-4">All content, software, logos, and trademarks on the website are owned by us or our licensors. You are granted a limited, non-exclusive, non-transferable license to use our Services for personal or professional purposes.</div>
						<h2 class="text-dark mb-3">Data and Privacy</h2>
						<div class="text-dark fw-bold pb-md-2 fs-4">By submitting content for plagiarism or AI detection, you grant us a limited right to process the content solely to provide the Services. We do not claim ownership of your content. Please review our Privacy Policy for information on how we handle your data.</div>
						<h2 class="text-dark mb-3">Accuracy of Results</h2>
						<div class="text-dark fw-bold pb-md-2 fs-4">Our Services provide automated detection results which may not be 100% accurate. You agree that reliance on the results is at your own risk. We are not liable for any errors, omissions, or consequences arising from the use of our Services.</div>
						<h2 class="text-dark mb-3">Prohibited Activities</h2>
						<div class="text-dark fw-bold pb-md-2 fs-4">You agree not to: <br>Use the Services for unlawful purposes or in violation of applicable laws. Attempt to interfere with the security or functionality of our website. Copy, distribute, or use our algorithms, data, or systems without permission.</div>
						<h2 class="text-dark mb-3">Termination</h2>
						<div class="text-dark fw-bold pb-md-2 fs-4">We may suspend or terminate your access to the Services if you violate these Terms, misuse the Services, or engage in unlawful activities.</div>
						<h2 class="text-dark mb-3">Limitation of Liability</h2>
						<div class="text-dark fw-bold pb-md-2 fs-4">To the maximum extent permitted by law, we are not liable for any direct, indirect, incidental, or consequential damages arising from your use of the Services. We make no warranties regarding the accuracy, reliability, or completeness of the Services.</div>
						<h2 class="text-dark mb-3">Indemnification</h2>
						<div class="text-dark fw-bold pb-md-2 fs-4">You agree to indemnify and hold harmless [Your Website Name], its affiliates, and employees from any claims, losses, damages, or expenses arising from your use of the Services or violation of these Terms.</div>
						<h2 class="text-dark mb-3">Governing Law</h2>
						<div class="text-dark fw-bold pb-md-2 fs-4">These Terms shall be governed by and construed in accordance with the laws of Pakistan.</div>
						<h2 class="text-dark mb-3">Changes to Terms</h2>
						<div class="text-dark fw-bold pb-md-2 fs-4">We may update these Terms from time to time. Your continued use of the Services constitutes acceptance of the updated Terms.</div>
					</div>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
<?php $this->load->view('autentication/footer'); ?>