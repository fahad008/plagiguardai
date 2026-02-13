<?php $this->load->view('header'); ?>
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
	<!--begin::Page-->
	<div class="page d-flex flex-row flex-column-fluid">
		<!--begin::Aside-->
		<?php $this->load->view('left_sidebar'); ?>
		<!--end::Aside-->
		<!--begin::Wrapper-->
		<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
			<!--begin::Header-->
			<div id="kt_header" class="header">
				<!--begin::Container-->
				<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
					<!--begin::Page title-->
					<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
						<!--begin::Heading-->
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">My Profile</h1>
						<!--end::Heading-->
					</div>
					<!--end::Page title=-->
					<!--begin::Wrapper-->
					<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
						<!--begin::Aside mobile toggle-->
						<div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
							<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
							<span class="svg-icon svg-icon-1 mt-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
									<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Aside mobile toggle-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Topbar-->
					<div class="d-flex align-items-center flex-shrink-0">
						<!--begin::Sidebar Toggler-->
						<button class="btn btn-icon btn-active-icon-primary d-xxl-none ms-2 me-n2" id="kt_sidebar_toggler">
							<!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
							<span class="svg-icon svg-icon-2x">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black" />
									<path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--end::Sidebar Toggler-->
					</div>
					<!--end::Topbar-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Header-->
			<!--begin::Content-->
			<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				<!--begin::Container-->
				<div class="container-xxl" id="kt_content_container">
				<?php $this->load->view('member/navbar'); ?>
					<!--begin::Basic info-->
					<div class="card mb-5 mb-xl-10">
						<!--begin::Card header-->
						<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
							<!--begin::Card title-->
							<div class="card-title m-0">
								<h3 class="fw-bolder m-0">Update Profile Details</h3>
							</div>
							<!--end::Card title-->
						</div>
						<!--begin::Card header-->
						<!--begin::Content-->
						<div id="kt_account_profile_details" class="collapse show">
							<!--begin::Form-->
							<form id="kt_account_profile_details_form" action="<?php echo base_url().'member/edit/' ?>" class="form" method="post" enctype="multipart/form-data">
								<!--begin::Card body-->
								<div class="card-body border-top p-9">
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<!--begin::Image input-->
											<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?php echo base_url(); ?>assets/media/avatars/blank.png)">
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?php echo $avatar; ?>)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
													<i class="bi bi-pencil-fill fs-7"></i>
													<!--begin::Inputs-->
													<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
													<input type="hidden" name="avatar_remove" />
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
													<i class="bi bi-x fs-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
													<i class="bi bi-x fs-2"></i>
												</span>
												<!--end::Remove-->
											</div>
											<!--end::Image input-->
											<!--begin::Hint-->
											<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
											<!--end::Hint-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<!--begin::Row-->
											<div class="row">
												<!--begin::Col-->
												<div class="col-lg-6 fv-row">
													<input type="text" name="first_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="<?php echo $customer_info['first_name']; ?>" />
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-lg-6 fv-row">
													<input type="text" name="last_name" class="form-control form-control-lg form-control-solid" placeholder="Last name" value="<?php echo $customer_info['last_name']; ?>" />
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span class="required">Contact Phone</span>
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
										</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<input type="tel" name="contact_number" class="form-control form-control-lg form-control-solid" placeholder="03123456789" value="<?php echo $customer_info['contact_number']; ?>" />
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6">
											<span class="required">Country</span>
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
										</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a country..." class="form-select form-select-solid form-select-lg fw-bold">
												<option <?php if($customer_info['country'] == ''){ echo 'selected'; } ?> value="">Select a Country...</option>
												<?php if (isset($country_list) && !empty($country_list)) {
													foreach ($country_list as $key => $value) { ?>
														<option data-kt-flag="<?php echo $value['flag']; ?>" <?php if($customer_info['country'] == $value['code']){ echo 'selected'; } ?> value="<?php echo $value['code']; ?>"><?php echo $value['name']; ?></option>
												<?php } } ?>
											</select>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-6">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label fw-bold fs-6"><span class="required">How did you find PlagiGuardAI?</span></label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<select name="heard_from" aria-label="Select best fit" data-control="select2" data-placeholder="Select best fit.." class="form-select form-select-solid form-select-lg">
												<option <?php if($customer_info['heard_from'] == ''){ echo 'selected'; } ?> value="">Select an option...</option>
												<option <?php if($customer_info['heard_from'] == 'google'){ echo 'selected'; } ?> value="google">
												    <b>Google</b>&#160;-&#160;Google Search
												</option>
												<option <?php if($customer_info['heard_from'] == 'social_media'){ echo 'selected'; } ?> value="social_media">
												    <b>Social</b>&#160;-&#160;Social Media (Facebook, Instagram, Twitter)
												</option>
												<option <?php if($customer_info['heard_from'] == 'friend'){ echo 'selected'; } ?> value="friend">
												    <b>Friend</b>&#160;-&#160;Friend / Family Recommendation
												</option>
												<option <?php if($customer_info['heard_from'] == 'ads'){ echo 'selected'; } ?> value="ads">
												    <b>Ads</b>&#160;-&#160;Online Advertisement
												</option>
												<option <?php if($customer_info['heard_from'] == 'blog'){ echo 'selected'; } ?> value="blog">
												    <b>Blog</b>&#160;-&#160;Blog / Article / Review
												</option>
												<option <?php if($customer_info['heard_from'] == 'youtube'){ echo 'selected'; } ?> value="youtube">
												    <b>YouTube</b>&#160;-&#160;YouTube / Video Content
												</option>
												<option <?php if($customer_info['heard_from'] == 'school'){ echo 'selected'; } ?> value="school">
												    <b>School</b>&#160;-&#160;School / University / College
												</option>
												<option <?php if($customer_info['heard_from'] == 'work'){ echo 'selected'; } ?> value="work">
												    <b>Work</b>&#160;-&#160;Work / Colleague / Employer
												</option>
												<option <?php if($customer_info['heard_from'] == 'event'){ echo 'selected'; } ?> value="event">
												    <b>Event</b>&#160;-&#160;Event / Seminar / Webinar
												</option>
												<option <?php if($customer_info['heard_from'] == 'other'){ echo 'selected'; } ?> value="other">
												    <b>Other</b>&#160;-&#160;Other
												</option>
											</select>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
								<!--begin::Actions-->
								<div class="card-footer d-flex justify-content-end py-6 px-9">
									<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Basic info-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Content-->
			<!--begin::Footer-->
			<?php $this->load->view('footer'); ?>
			<!--end::Footer-->
		</div>
		<!--end::Wrapper-->
		<!--begin::Sidebar-->
		<?php $this->load->view('right_sidebar'); ?>
		<!--end::Sidebar-->
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
<!--end::Main-->
<script>var hostUrl = "assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="<?php echo base_url(); ?>assets/js/components/image-input.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom/account/settings/profile-details.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom/detection-charts.js"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
<script>
	$(document).ready(function() {
		showPageLoader();
		setTimeout(() => {
			loadAIResults();
	    }, 1000);

	    function loadAIResults(scan_id = '') {

      		$.ajax({
	        	url : "<?php echo base_url().'scan/get_scan_report/'; ?>",
		        method : 'POST' ,
		        dataType : 'json',
		        data: { scan_id: scan_id }
	      	}).then(function(response){
	      		if (response.status == 'success') {
		      		$("#kt_sidebar_content").html(response.right_sidebar);

		      		setTimeout(function () {

		               	var chart_one = [response.scan_info.one_ai, response.scan_info.one_or];
					    var label_one = ['AI Detection', 'Authenticity'];
					    var color_one = [response.scan_info.one_ai_color, response.scan_info.one_or_color];

					    AIdoughnut.init('chart-1', chart_one, label_one, color_one);

					    var chart_two = [response.scan_info.two_ai, response.scan_info.two_or];
					    var label_two = ['AI Detection', 'Authenticity'];
					    var color_two = [response.scan_info.two_ai_color, response.scan_info.two_or_color];

					    AIdoughnut.init('chart-2', chart_two, label_two, color_two);

					    var chart_three = [response.scan_info.three_pl, response.scan_info.three_or];
					    var label_three = ['Plagiarized', 'Uniqueness'];
					    var color_three = [response.scan_info.three_pl_color, response.scan_info.three_or_color];

					    AIdoughnut.init('chart-3', chart_three, label_three, color_three);

						KTScroll.createInstances();
					    KTApp.init();

		            }, 50);

	      		}else{

	      			setTimeout(function () {

		               	var chart_one = ['50', '50'];
					    var label_one = ['AI Detection', 'Authenticity'];
					    var color_one = ['#f1f3f5', '#f1f3f5'];

					    AIdoughnut.init('chart-1', chart_one, label_one, color_one);

					    var chart_two = ['50', '50'];
					    var label_two = ['AI Detection', 'Authenticity'];
					    var color_two = ['#f1f3f5', '#f1f3f5'];

					    AIdoughnut.init('chart-2', chart_two, label_two, color_two);

					    var chart_three = ['50', '50'];
					    var label_three = ['Plagiarized', 'Uniqueness'];
					    var color_three = ['#f1f3f5', '#f1f3f5'];

					    AIdoughnut.init('chart-3', chart_three, label_three, color_three);

						KTScroll.createInstances();
					    KTApp.init();

		            }, 50);
	      		}
	      		hidePageLoader();
	      	});
	    }

	    function showPageLoader() {
		    const el = document.getElementById('kt_app_page_loader');
		    el.style.display = 'flex';
		    requestAnimationFrame(() => el.classList.add('show'));
		}

		function hidePageLoader() {
		    const el = document.getElementById('kt_app_page_loader');
		    el.classList.remove('show');
		    setTimeout(() => el.style.display = 'none', 250);
		}

	});
</script>
</body>
<!--end::Body-->
</html>