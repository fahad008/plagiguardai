<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<!--begin::Heading-->
				<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Contact Us</h1>
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
				<!--begin::Logo-->
				<a href="<?php echo base_url().'admin/'; ?>" class="d-flex align-items-center">
					<img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/logo-demo3-default.svg" class="h-20px" />
				</a>
				<!--end::Logo-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Header-->
	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Container-->
		<div class="container-xxl" id="kt_content_container">
			<!--begin::Card-->
			<div class="card">
				<!--begin::Tables Widget 5-->
				<div class="card card-xl-stretch mb-xl-8">
					<!--begin::Header-->
					<div class="card-header border-0 pt-5">
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bolder fs-3 mb-1">User Queries</span>
						</h3>
						<div class="card-toolbar">
							<ul class="nav">
								<li class="nav-item">
									<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark active fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">Fresh</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_2">Closed</a>
								</li>
							</ul>
						</div>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body py-3">
						<div class="tab-content">
							<!--begin::Tap pane-->
							<div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
								<?php if (isset($latest_queries_count) && $latest_queries_count >= 1) { ?>
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
										<!--begin::Table head-->
										<thead>
											<tr class="border-0">
												<th class="p-0 min-w-100px"></th>
												<th class="p-0 min-w-100px"></th>
												<th class="p-0 min-w-150px"></th>
												<th class="p-0 min-w-100px"></th>
											</tr>
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody>
											<?php if (isset($latest_queries) && !empty($latest_queries)) {
											 	foreach ($latest_queries as $key => $value) { ?>
											<tr>
												<td>
													<a href="Javascript: void(0)" class="text-dark fw-bolder text-hover-primary mb-1 fs-6"><?php echo ucfirst($value['name']); ?></a>
													<span class="text-muted fw-bold d-block"><?php echo $value['email']; ?></span>
												</td>
												<td class="text-start">
													<span class="text-muted fw-bold d-block"><?php echo $value['subject']; ?></span>
												</td>
												<td class="text-start text-muted fw-bold"><?php echo $value['message']; ?></td>
												<td class="text-end">
													<a href="Javascript: void(0)" class="btn btn-primary er fs-7 px-3 py-2"data-id="<?php echo $value['id'] ?>" onclick="close_query(this)">close</a>
													<a href="Javascript: void(0)" class="btn btn-danger er fs-7 px-3 py-2"data-id="<?php echo $value['id'] ?>" onclick="delete_query(this)">delete</a>
												</td>
											</tr>
											<?php } } ?>
										</tbody>
										<!--end::Table body-->
									</table>
								</div>
								<!--end::Table-->
								<?php }else{ ?>
									<div class="card">
										<!--begin::Card body-->
										<div class="card-body pb-0">
											<!--begin::Heading-->
											<div class="card-px text-center pt-20 pb-5">
												<!--begin::Title-->
												<h2 class="fs-2x fw-bolder mb-0">Looks like there are no more queries to resolve.</h2>
												<!--end::Title-->
											</div>
											<!--end::Heading-->
											<!--begin::Illustration-->
											<div class="text-center px-5">
												<img src="<?php echo base_url(); ?>assets/media/illustrations/unitedpalms-1/5.png" alt="" class="mw-100 h-200px h-sm-325px">
											</div>
											<!--end::Illustration-->
										</div>
										<!--end::Card body-->
									</div>
								<?php } ?>
							</div>
							<!--end::Tap pane-->
							<!--begin::Tap pane-->
							<div class="tab-pane fade" id="kt_table_widget_5_tab_2">
								<?php if (isset($closed_queries_count) && $closed_queries_count >= 1) { ?>
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
										<!--begin::Table head-->
										<thead>
											<tr class="border-0">
												<th class="p-0 min-w-100px"></th>
												<th class="p-0 min-w-100px"></th>
												<th class="p-0 min-w-150px"></th>
												<th class="p-0 min-w-100px"></th>
											</tr>
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody>
											<?php if (isset($closed_queries) && !empty($closed_queries)) {
											 	foreach ($closed_queries as $key => $value) { ?>
											<tr>
												<td>
													<a href="Javascript: void(0)" class="text-dark fw-bolder text-hover-primary mb-1 fs-6"><?php echo ucfirst($value['name']); ?></a>
													<span class="text-muted fw-bold d-block"><?php echo $value['email']; ?></span>
												</td>
												<td class="text-start">
													<span class="text-muted fw-bold d-block"><?php echo $value['subject']; ?></span>
												</td>
												<td class="text-start text-muted fw-bold"><?php echo $value['message']; ?></td>
												<td class="text-end">
													<a href="Javascript: void(0)" class="btn btn-danger er fs-7 px-3 py-2"data-id="<?php echo $value['id'] ?>" onclick="delete_query(this)">delete</a>
												</tr>
											<?php } } ?>
										</tbody>
										<!--end::Table body-->
									</table>
								</div>
								<!--end::Table-->
								<?php }else{ ?>
									<div class="card">
										<!--begin::Card body-->
										<div class="card-body pb-0">
											<!--begin::Heading-->
											<div class="card-px text-center pt-20 pb-5">
												<!--begin::Title-->
												<h2 class="fs-2x fw-bolder mb-0">Looks like there are no more entertained queries we have.</h2>
												<!--end::Title-->
											</div>
											<!--end::Heading-->
											<!--begin::Illustration-->
											<div class="text-center px-5">
												<img src="<?php echo base_url(); ?>assets/media/illustrations/unitedpalms-1/5.png" alt="" class="mw-100 h-200px h-sm-325px">
											</div>
											<!--end::Illustration-->
										</div>
										<!--end::Card body-->
									</div>
								<?php } ?>
							</div>
							<!--end::Tap pane-->
						</div>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Tables Widget 5-->
			</div>
			<!--end::Card-->
			<!--begin::Modals-->
			<!--end::Modals-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Content-->
	<script>var hostUrl = "assets/";</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Footer-->
	<?php $this->load->view('admin/layouts/footer'); ?>
	<!--end::Footer-->
</div>
<!--end::Wrapper-->
<script>

	function delete_query(el) {
	    const contact_us_id = el.getAttribute('data-id');
	    Swal.fire({
				text: "Are you sure you want to delete this query?",
				icon: "warning",
				buttonsStyling: false,
				showCancelButton: true,
				confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
			}).then(function (result) {
				if (result.isConfirmed) {
					$.ajax({
			            url: "<?php echo base_url().'admin/pages/delete_query/'; ?>",
			            type: 'POST',
			            dataType: 'json',
			            data: {
			                contact_us_id: contact_us_id
			            },
			            success: function(response) {

			                if (response.status == 'success') {
			                	Swal.fire({
									text: response.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.isConfirmed) {
										location.reload();
									}
								});		
			                } else {
			                	Swal.fire({
								    html: response.message,
								    icon: "error",
								    buttonsStyling: false,
								    confirmButtonText: "ok!",
								    customClass: {
								        confirmButton: "btn btn-danger"
								    }
								});
			                }
			            }
			        });
				}else{
					Swal.fire({
                            text: "Query was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
				}
			});
	    
	}

	function close_query(el) {
	    const contact_us_id = el.getAttribute('data-id');
	    Swal.fire({
				text: "Are you sure you want to close this query?",
				icon: "warning",
				buttonsStyling: false,
				showCancelButton: true,
				confirmButtonText: "Yes, close!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
			}).then(function (result) {
				if (result.isConfirmed) {
					$.ajax({
			            url: "<?php echo base_url().'admin/pages/close_query/'; ?>",
			            type: 'POST',
			            dataType: 'json',
			            data: {
			                contact_us_id: contact_us_id
			            },
			            success: function(response) {

			                if (response.status == 'success') {
			                	Swal.fire({
									text: response.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.isConfirmed) {
										location.reload();
									}
								});		
			                } else {
			                	Swal.fire({
								    html: response.message,
								    icon: "error",
								    buttonsStyling: false,
								    confirmButtonText: "ok!",
								    customClass: {
								        confirmButton: "btn btn-danger"
								    }
								});
			                }
			            }
			        });
				}else{
					Swal.fire({
                            text: "Query was not closed.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
				}
			});
	    
	}
</script>