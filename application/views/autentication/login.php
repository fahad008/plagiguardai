<?php $this->load->view('autentication/header'); ?>
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
	<!--begin::Authentication - Sign-in -->
	<div class="d-flex flex-column flex-lg-row flex-column-fluid">
		<!--begin::Aside-->
		<div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #f2f3f5">
			<!--begin::Wrapper-->
			<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
				<!--begin::Content-->
				<div class="d-flex flex-row-fluid flex-column text-center p-5">
					<!--begin::Logo-->
					<a href="<?php echo base_url(); ?>" class="mb-3">
						<img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/logo-2.png" class="h-150px" />
					</a>
					<!--end::Logo-->
					<!--begin::Title-->
					<h1 class="text-dark fw-bolder fs-2qx pb-5 pb-md-2 text-logo1">Welcome to PlagiGuardAI</h1>
					<!--end::Title-->
					<!--begin::Description-->
					<p class="fw-bold fs-2 text-logo2">PlagiGuardAI helps you spot <br>AI-written content and plagiarism in seconds<br>Protect your ideas, maintain originality<br>ensure every word counts</p>
					<!--end::Description-->
				</div>
				<!--end::Content-->
				<!--begin::Illustration-->
				<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(<?php echo base_url(); ?>assets/media/illustrations/dozzy-1/23.png"></div>
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
					<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="<?php echo base_url().'login/signin'; ?>">
						<!--begin::Heading-->
						<div class="text-center mb-10">
							<!--begin::Title-->
							<h1 class="text-dark mb-3">Sign In to PlagiGuardAI</h1>
							<!--end::Title-->
							<!--begin::Link-->
							<div class="text-gray-400 fw-bold fs-4">New Here?
							<a href="<?php echo base_url().'signup' ?>" class="link-primary fw-bolder">Create an Account</a></div>
							<!--end::Link-->
						</div>
						<!--begin::Heading-->
						<?php if ($this->session->flashdata('error')): ?>
						    <div class="alert alert-danger d-flex align-items-center p-5 mt-2" id="error-alert">
					            <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
					                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"/>
					                    <rect x="9" y="13.0283" width="7.3536" height="1.2256" rx="0.6128" transform="rotate(-45 9 13.0283)" fill="black"/>
					                    <rect x="9.86664" y="7.93359" width="7.3536" height="1.2256" rx="0.6128" transform="rotate(45 9.86664 7.93359)" fill="black"/>
					                </svg>
					            </span>

					            <div class="d-flex flex-column">
					                <h4 class="mb-1">Attention</h4>
					                <span><?php echo $this->session->flashdata('error'); ?></span>
					            </div>
		        			</div>
						<?php endif; ?>

						<?php if ($this->session->flashdata('success')): ?>
						    <div class="alert alert-success d-flex align-items-center p-5 mt-2" id="success-alert">
					            <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
					                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"/>
									<path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black"/>
									</svg>
					            </span>

					            <div class="d-flex flex-column">
					                <span><?php echo $this->session->flashdata('success'); ?></span>
					            </div>
		        			</div>
						<?php endif; ?>
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Label-->
							<label class="form-label fs-6 fw-bolder text-dark">Email</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-stack mb-2">
								<!--begin::Label-->
								<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
								<!--end::Label-->
								<!--begin::Link-->
								<a href="<?php echo base_url().'forgot_password' ?>" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
								<!--end::Link-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Input-->
							<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<?php if ($_SERVER['HTTP_HOST'] != 'plagiguardai') { ?>
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<div class="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITE_KEY; ?>"></div>
						</div>
						<!--end::Input group-->
						<?php } ?>
						<!--begin::Actions-->
						<div class="text-center">
							<!--begin::Submit button-->
							<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
								<span class="indicator-label">Continue</span>
								<span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<!--end::Submit button-->
							<!--begin::Separator-->
							<!-- <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div> -->
							<!--end::Separator-->
							<!--begin::Google link-->
							<!-- <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
							<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a> -->
							<!--end::Google link-->
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
<script>var hostUrl = "assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="<?php echo base_url(); ?>assets/js/custom/authentication/sign-in/general.js"></script>
<!--end::Page Custom Javascript-->
<script>
document.addEventListener("DOMContentLoaded", function () {
    let alertBox = document.getElementById("error-alert");
    if (alertBox) {
        setTimeout(function () {
            alertBox.style.transition = "opacity 0.5s ease";
            alertBox.style.opacity = "0";
            setTimeout(function () {
                alertBox.remove();
            }, 500);
        }, 3000); // 3 seconds
    }
});

document.addEventListener("DOMContentLoaded", function () {
    let alertBox = document.getElementById("success-alert");
    if (alertBox) {
        setTimeout(function () {
            alertBox.style.transition = "opacity 0.5s ease";
            alertBox.style.opacity = "0";
            setTimeout(function () {
                alertBox.remove();
            }, 500);
        }, 3000); // 3 seconds
    }
});
</script>
<!--end::Javascript-->
<?php $this->load->view('autentication/footer'); ?>
