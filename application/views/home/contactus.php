<?php $this->load->view('header'); ?>
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Wrapper-->
				<div class="d-flex align-items-center justify-content-between">
					<!--begin::Logo-->
					<div class="d-flex align-items-center flex-equal">
						<!--begin::Mobile menu toggle-->
						<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
							<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
							<span class="svg-icon svg-icon-2hx">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black"></path>
									<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black"></path>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--end::Mobile menu toggle-->
						<!--begin::Logo image-->
						<a href="<?php echo base_url(); ?>">
							<img alt="Logo" src="assets/media/logos/logo-demo3-default" class="logo-default h-25px h-lg-30px">
							<img alt="Logo" src="assets/media/logos/logo-demo3-default" class="logo-sticky h-20px h-lg-25px">
						</a>
						<!--end::Logo image-->
					</div>
					<!--end::Logo-->
					<!--begin::Menu wrapper-->
					<div class="d-lg-block" id="kt_header_nav_wrapper">
						<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
							<!--begin::Menu-->
							<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
								<?php if (isset($header_links) && !empty($header_links)) { ?>
									<?php foreach ($header_links as $key => $link) {?>
								<!--begin::Menu item-->
								<div class="menu-item">
									<!--begin::Menu link-->
									<a href="<?php echo $link['link']; ?>" class="menu-link nav-link py-3 px-4 px-xxl-6"><?php echo $link['title']; ?></a>
									<!--end::Menu link-->
								</div>
								<!--end::Menu item-->
								<?php } } ?>
							</div>
							<!--end::Menu-->
						</div>
					</div>
					<!--end::Menu wrapper-->
					<?php if (isset($primary_link) && !empty($primary_link)) {?>
					<!--begin::Toolbar-->
					<div class="flex-equal text-end ms-1">
						<a href="<?php echo $primary_link['link']; ?>" class="btn btn-primary"><?php echo $primary_link['title']; ?></a>
					</div>
					<!--end::Toolbar-->
					<?php } ?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Container-->
		</div>
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Container-->
					<div class="container-xxl" id="kt_content_container">
						<!--begin::Contact-->
						<div class="card">
							<!--begin::Body-->
							<div class="card-body p-lg-17">
								<!--begin::Row-->
								<div class="row mb-3">
									<!--begin::Col-->
									<div class="col-md-6 pe-lg-10">
										<!--begin::Form-->
										<form action="#" class="form mb-15" method="post" id="kt_contact_form">
											<h1 class="fw-bolder text-dark mb-9">Send Us Email</h1>
											<!--begin::Input group-->
											<div class="row mb-5">
												<!--begin::Col-->
												<div class="col-md-6 fv-row">
													<!--begin::Label-->
													<label class="fs-5 fw-bold mb-2">Name</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="text" class="form-control form-control-solid" placeholder="" name="name" />
													<!--end::Input-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-md-6 fv-row">
													<!--end::Label-->
													<label class="fs-5 fw-bold mb-2">Email</label>
													<!--end::Label-->
													<!--end::Input-->
													<input type="text" class="form-control form-control-solid" placeholder="" name="email" />
													<!--end::Input-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="d-flex flex-column mb-5 fv-row">
												<!--begin::Label-->
												<label class="fs-5 fw-bold mb-2">Subject</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input class="form-control form-control-solid" placeholder="" name="subject" />
												<!--end::Input-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="d-flex flex-column mb-10 fv-row">
												<label class="fs-6 fw-bold mb-2">Message</label>
												<textarea class="form-control form-control-solid" rows="6" name="message" placeholder=""></textarea>
											</div>
											<!--end::Input group-->
											<!--begin::Submit-->
											<button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
												<!--begin::Indicator-->
												<span class="indicator-label">Send Feedback</span>
												<span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												<!--end::Indicator-->
											</button>
											<!--end::Submit-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-6 ps-lg-10">
										<div class="overlay">
											<!--begin::Image-->
											<img class="w-100 card-rounded" src="assets/media/illustrations/unitedpalms-1/20.png" alt="">
											<!--end::Image-->
											<!--begin::Links-->
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<a href="<?php echo base_url().'login/'; ?>" class="btn btn-primary">Sign In</a>
												<a href="<?php echo base_url().'signup/'; ?>" class="btn btn-light-primary ms-3">Sign Up</a>
											</div>
											<!--end::Links-->
										</div>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Contact-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<?php $this->load->view('footer'); ?>
				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Root-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
				<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
			</svg>
		</span>
		<!--end::Svg Icon-->
	</div>
	<!--end::Scrolltop-->
	<input type="hidden" value="<?php echo base_url().'home/save_query/'; ?>" id="contact-form-action">
	<!--end::Main-->
	<script>var hostUrl = "assets/";</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<script src="assets/js/custom/pages/company/contact.js"></script>
</body>
<!--end::Body-->
</html>