<div class="modal fade" id="kt_modal_access_denied" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
				<!--begin::Modal header-->
				<div class="modal-header" id="kt_modal_access_denied_header">
					<!--begin::Modal title-->
					<h2 class="fw-bolder">HTTP ERROR 403</h2>
					<!--end::Modal title-->
					<!--begin::Close-->
					<div id="kt_modal_access_denied_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<div class="modal-body py-10 px-lg-17 text-center">
					<!--begin::Wrapper-->
					<div class="pt-lg-10 mb-10">
						<!--begin::Logo-->
						<h1 class="fw-bolder fs-2qx text-gray-800 mb-10">HTTP ERROR 403</h1>
						<!--end::Logo-->
						<!--begin::Message-->
						<div class="fw-bold fs-3 text-muted mb-15">Access to plagiguardai was denied </br> You don't have authorization to view this page.</div>
						<!--end::Message-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Illustration-->
					<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-75px min-h-lg-150px" style="background-image: url(<?php echo base_url(); ?>assets/media/illustrations/unitedpalms-1/9.png"></div>
					<!--end::Illustration-->
				</div>
				<!--end::Modal body-->
				<!--begin::Modal footer-->
				<div class="modal-footer flex-end">
					<!--begin::Button-->
					<button type="button" id="kt_modal_access_denied_cancel" data-bs-dismiss="modal" class="btn btn-primary me-3">OK</button>
					<!--end::Button-->
				</div>
				<!--end::Modal footer-->
		</div>
	</div>
</div>
<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
	<!--begin::Container-->
	<div class="container d-flex flex-column flex-md-row flex-stack">
		<!--begin::Copyright-->
		<div class="text-dark order-2 order-md-1">
			<span class="text-gray-400 fw-bold me-1">Created by</span>
			<a href="<?php echo base_url().'dashboard/'; ?>" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">PlagiGuardAI</a>
		</div>
		<!--end::Copyright-->
		<!--begin::Menu-->
		<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
			<li class="menu-item">
				<a href="<?php echo base_url().'admin/dashboard/'; ?>" class="menu-link px-2">Dashboard</a>
			</li>
			<li class="menu-item">
				<a href="<?php echo base_url().'admin/dashboard/profile/'; ?>" class="menu-link px-2">MY Profile</a>
			</li>
			<li class="menu-item">
				<a href="<?php echo base_url().'admin/dashboard/settings/'; ?>" class="menu-link px-2">Settings</a>
			</li>
		</ul>
		<!--end::Menu-->
	</div>
	<!--end::Container-->
</div>