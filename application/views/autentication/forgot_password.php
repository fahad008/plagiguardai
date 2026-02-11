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
						<img alt="Logo" src="assets/media/logos/logo-2.png" class="h-150px" />
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
				<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(assets/media/illustrations/dozzy-1/23.png"></div>
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
					<!--begin::Form-->
					<form method="post" action="<?php echo base_url().'forgot_password/query/'; ?>" class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
						<!--begin::Heading-->
						<div class="text-center mb-10">
							<!--begin::Title-->
							<h1 class="text-dark mb-3">Forgot Password ?</h1>
							<!--end::Title-->
							<!--begin::Link-->
							<div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
							<!--end::Link-->
						</div>
						<!--begin::Heading-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
							<input class="form-control form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
						</div>
						<!--end::Input group-->
						<!--begin::Actions-->
						<div class="d-flex flex-wrap justify-content-center pb-lg-0">
							<button type="button" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
								<span class="indicator-label">Submit</span>
								<span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<a href="<?php echo base_url().'login' ?>" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
<!--end::Main-->
<script>var hostUrl = "assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="assets/js/custom/authentication/password-reset/password-reset.js"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
<?php $this->load->view('autentication/footer'); ?>