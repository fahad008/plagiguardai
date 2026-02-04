<!--begin::Card-->
<div class="card mb-5 mb-xl-8">
	<!--begin::Summary-->
	<!--begin::User Info-->
	<div class="d-flex flex-center flex-column py-5">
		<!--begin::Avatar-->
		<div class="symbol symbol-100px symbol-circle mb-7">
			<img src="<?php if(isset($avatar) && $avatar != ''){ echo $avatar; } ?>" alt="<?php if(isset($reseller_info) && !empty($reseller_info)){ echo $reseller_info->full_name; } ?>" />
		</div>
		<!--end::Avatar-->
		<!--begin::Name-->
		<a href="javascript: void(0)" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3"><?php if(isset($reseller_info) && !empty($reseller_info)){ echo $reseller_info->full_name; } ?></a>
		<!--end::Name-->
		<!--begin::Position-->
		<div class="mb-9">
			<!--begin::Badge-->
			<div class="badge badge-lg badge-light-primary d-inline"><?php if(isset($reseller_info) && !empty($reseller_info)){ echo 'Reseller'; }else{ echo 'Admin'; } ?></div>
			<!--begin::Badge-->
		</div>
		<!--end::Position-->
	</div>
	<!--end::User Info-->
	<!--end::Summary-->
	<!--begin::Details toggle-->
	<div class="d-flex flex-stack fs-4 py-3">
		<div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
		<span class="ms-2 rotate-180">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
			<span class="svg-icon svg-icon-3">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</span></div>
	</div>
	<!--end::Details toggle-->
	<div class="separator"></div>
	<!--begin::Details content-->
	<div id="kt_user_view_details" class="collapse show">
		<div class="pb-5 fs-6">
			<?php if (isset($reseller_info) && !empty($reseller_info)) { ?>
			<!--begin::Details item-->
			<div class="fw-bolder mt-5">Email</div>
			<div class="text-gray-600">
				<a href="javascript: void(0)" class="text-gray-600 text-hover-primary"><?php if(isset($reseller_info) && !empty($reseller_info)){ echo $reseller_info->email; } ?></a>
			</div>
			<!--begin::Details item-->
			<div class="fw-bolder mt-5">Contact Number</div>
			<div class="text-gray-600"><?php if(isset($reseller_info) && !empty($reseller_info) && $reseller_info->contact_number != ''){ echo $reseller_info->contact_number; }else{ echo '-----------'; } ?></div>

			<div class="fw-bolder mt-5">Country</div>
			<div class="text-gray-600"><?php if(isset($country) && !empty($country) && $country['name'] != ''){ echo $country['name']; }else{ echo '-----------'; } ?></div>
			<!--begin::Details item-->
			<!--begin::Details item-->
			<div class="fw-bolder mt-5">Email  Status</div>
			<div class="text-gray-600"><?php if(isset($reseller_info) && !empty($reseller_info) ){ if ($reseller_info->email_verified == 'yes') { echo 'Verified'; }else{ echo "Not Verified"; } }?></div>
			<!--begin::Details item-->
		<?php }else{ ?>
			<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
				<!--begin::Icon-->
				<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
				<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
						<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
						<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
					</svg>
				</span>
				<!--end::Svg Icon-->
				<!--end::Icon-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-stack flex-grow-1">
					<!--begin::Content-->
					<div class="fw-bold">
						<h4 class="text-gray-900 fw-bolder">No Reseller Found!</h4>
						<div class="fs-6 text-gray-700">Subscription created by admin.</div>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
		<?php } ?>
		</div>
	</div>
	<!--end::Details content-->
</div>
<!--end::Card-->