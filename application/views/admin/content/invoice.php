<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<!--begin::Header-->
	<div id="kt_header" class="header">
		<!--begin::Container-->
		<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<!--begin::Heading-->
				<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Invoice</h1>
				<!--end::Heading-->
			</div>
			<!--end::Page title=-->
			<!-- <div class="d-flex my-4"><a href="Javascript: void(0)"  class="btn btn-primary">Download</a></div> -->
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
				<a href="<?php echo base_url().'admin/dashboard/' ?>" class="d-flex align-items-center">
					<img alt="Logo" src="assets/media/logos/logo-demo3-default.svg" class="h-20px" />
				</a>
				<!--end::Logo-->
			</div>
			<!--end::Wrapper-->
			<div class="d-flex flex-wrap flex-stack mb-6">
				<!--begin::Actions-->
				<div class="d-flex flex-wrap my-2">
					<a href="Javascript: void(0)" class="btn btn-primary btn-sm" id="download_pdf">Screenshot</a>
				</div>
				<!--end::Actions-->
			</div>
		</div>
		<!--end::Container-->
	</div>
	<!--end::Header-->
	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Container-->
		<div class="container-xxl" id="kt_content_container">
			<!--begin::Invoice 2 main-->
			<div class="card" id="kt_invoice_printable">
				<!--begin::Body-->
				<div class="card-body p-lg-20">
					<!--begin::Layout-->
					<div class="d-flex flex-column flex-xl-row">
						<!--begin::Content-->
						<div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
							<!--begin::Invoice 2 content-->
							<div class="mt-n1">
								<!--begin::Top-->
								<div class="d-flex flex-stack pb-10">
									<!--begin::Logo-->
									<a href="#">
										<img alt="Logo" src="assets/media/logos/logo-demo3-default" />
									</a>
									<!--end::Logo-->
									<!-- <a href="<?php //echo base_url('admin/invoices/download_invoice/'.$invoice_info['id']) ?>" class="btn btn-primary">
									    Download PDF
									</a> -->
								</div>
								<!--end::Top-->
								<!--begin::Wrapper-->
								<div class="m-0">
									<!--begin::Label-->
									<div class="fw-bolder fs-3 text-gray-800 mb-8">Invoice #<?php echo $invoice_info['invoice_number']; ?></div>
									<!--end::Label-->
									<!--begin::Row-->
									<div class="row g-5 mb-11">
										<!--end::Col-->
										<div class="col-sm-6">
											<!--end::Label-->
											<div class="fw-bold fs-7 text-gray-600 mb-1">Issue Date:</div>
											<!--end::Label-->
											<!--end::Col-->
											<div class="fw-bolder fs-6 text-gray-800"><?php echo $created = date('d M Y', strtotime($invoice_info['created_at'])); ?></div>
											<!--end::Col-->
										</div>
										<!--end::Col-->
										<!--end::Col-->
										<div class="col-sm-6">
											<!--end::Label-->
											<div class="fw-bold fs-7 text-gray-600 mb-1">Due Date:</div>
											<!--end::Label-->
											<!--end::Info-->
											<div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
												<span class="pe-2"><?php echo $created = date('d M Y', strtotime($invoice_info['created_at'])); ?></span>
											</div>
											<!--end::Info-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--begin::Row-->
									<div class="row g-5 mb-12">
										<!--end::Col-->
										<div class="col-sm-6">
											<!--end::Label-->
											<div class="fw-bold fs-7 text-gray-600 mb-1">Issue For:</div>
											<!--end::Label-->
											<!--end::Text-->
											<div class="fw-bolder fs-6 text-gray-800"><?php if (isset($customer_info) && !empty($customer_info)) { echo $customer_info['full_name']; } ?></div>
											<!--end::Text-->
											<!--end::Description-->
											<div class="fw-bold fs-7 text-gray-600"><?php if (isset($customer_info) && !empty($customer_info)) { echo $customer_info['email']; } ?></div>
											<div class="fw-bold fs-7 text-gray-600"><?php if (isset($customer_info) && !empty($customer_info)) { echo $customer_info['contact_number']; } ?></div>
											<!--end::Description-->
										</div>
										<!--end::Col-->
										<!--end::Col-->
										<div class="col-sm-6">
											<!--end::Label-->
											<div class="fw-bold fs-7 text-gray-600 mb-1">Issued By:</div>
											<!--end::Label-->
											<!--end::Text-->
											<div class="fw-bolder fs-6 text-gray-800">Admin</div>
											<!--end::Text-->
											<!--end::Description-->
											<div class="fw-bold fs-7 text-gray-600">admin@plagiguardai.com</div>
											<!--end::Description-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--begin::Content-->
									<div class="flex-grow-1">
										<!--begin::Table-->
										<div class="table-responsive border-bottom mb-9">
											<table class="table mb-3">
												<thead>
													<tr class="border-bottom fs-6 fw-bolder text-muted">
														<th class="min-w-175px pb-2">Subscription</th>
														<th class="min-w-70px text-end pb-2">Credits</th>
														<th class="min-w-80px text-end pb-2">Rate</th>
														<th class="min-w-100px text-end pb-2">Amount</th>
													</tr>
												</thead>
												<tbody>
													<tr class="fw-bolder text-gray-700 fs-5 text-end">
														<td class="d-flex align-items-center pt-6">
														<i class="fa fa-genderless text-<?php if (isset($customer_plan) && !empty($customer_plan)) { echo $customer_plan['color']; } ?> fs-2 me-2"></i><?php if (isset($customer_plan) && !empty($customer_plan)) { echo $customer_plan['title']; } ?></td>
														<td class="pt-6"><?php echo intval($invoice_info['credits']); ?></td>
														<td class="pt-6"><?php echo intval($invoice_info['per_credit']); ?></td>
														<td class="pt-6 text-dark fw-boldest"><?php echo intval($invoice_info['total']); ?>PKR</td>
													</tr>
												</tbody>
											</table>
										</div>
										<!--end::Table-->
										<!--begin::Container-->
										<div class="d-flex justify-content-end">
											<!--begin::Section-->
											<div class="mw-300px">
												<!--begin::Item-->
												<div class="d-flex flex-stack mb-3">
													<!--begin::Accountname-->
													<div class="fw-bold pe-10 text-gray-600 fs-7">Subtotal:</div>
													<!--end::Accountname-->
													<!--begin::Label-->
													<div class="text-end fw-bolder fs-6 text-gray-800"><?php echo intval($invoice_info['subtotal']); ?>PKR</div>
													<!--end::Label-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex flex-stack mb-3">
													<!--begin::Accountname-->
													<div class="fw-bold pe-10 text-gray-600 fs-7">VAT 0%</div>
													<!--end::Accountname-->
													<!--begin::Label-->
													<div class="text-end fw-bolder fs-6 text-gray-800">0</div>
													<!--end::Label-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex flex-stack mb-3">
													<!--begin::Accountnumber-->
													<div class="fw-bold pe-10 text-gray-600 fs-7">Subtotal + VAT</div>
													<!--end::Accountnumber-->
													<!--begin::Number-->
													<div class="text-end fw-bolder fs-6 text-gray-800"><?php echo intval($invoice_info['total']); ?>PKR</div>
													<!--end::Number-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex flex-stack">
													<!--begin::Code-->
													<div class="fw-bold pe-10 text-gray-600 fs-7">Total</div>
													<!--end::Code-->
													<!--begin::Label-->
													<div class="text-end fw-bolder fs-6 text-gray-800"><?php echo intval($invoice_info['total']); ?>PKR</div>
													<!--end::Label-->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Section-->
										</div>
										<!--end::Container-->
									</div>
									<!--end::Content-->
								</div>
								<!--end::Wrapper-->
							</div>
							<!--end::Invoice 2 content-->
						</div>
						<!--end::Content-->
						<!--begin::Sidebar-->
						<div class="m-0">
							<!--begin::Invoice 2 sidebar-->
							<div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">
								<!--begin::Labels-->
								<div class="mb-8">
									<span class="badge badge-success me-2">Approved</span>
									<?php if ($invoice_info['status'] == 'paid') { ?>
										<span class="badge badge-success"><?php echo ucfirst($invoice_info['status']); ?></span>
									<?php }else if ($invoice_info['status'] == 'pending') { ?>
										<span class="badge badge-warning"><?php echo ucfirst($invoice_info['status']); ?></span>
									<?php }else{ ?>
										<span class="badge badge-danger"><?php echo ucfirst($invoice_info['status']); ?></span>
									<?php } ?>
									
								</div>
								<!--end::Labels-->
								<!--begin::Title-->
								<h6 class="mb-8 fw-boldest text-gray-600 text-hover-primary">SUBSCRIPTION DETAILS</h6>
								<!--end::Title-->
								<!--begin::Item-->
								<div class="mb-6">
									<div class="fw-bold text-gray-600 fs-7">Payment Method:</div>
									<div class="fw-bolder text-gray-800 fs-6"><?php echo ucfirst($invoice_info['payment_method']); ?></div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="mb-6">
									<div class="fw-bold text-gray-600 fs-7">Start Date</div>
									<div class="fw-bolder fs-6 text-gray-800"><?php echo $start = date('d M Y', strtotime($customer_subscription['start_date'])); ?></div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="mb-6">
									<div class="fw-bold text-gray-600 fs-7">Expiry Date</div>
									<div class="fw-bolder fs-6 text-gray-800"><?php echo $created = date('d M Y', strtotime($customer_subscription['end_date'])); ?></div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="mb-6">
									<div class="fw-bold text-gray-600 fs-7">Status</div>
									<?php if ($customer_subscription['status'] == 'active') { ?>
										<span class="badge badge-success"><?php echo ucfirst($customer_subscription['status']); ?></span>
									<?php }else if ($customer_subscription['status'] == 'inactive') { ?>
										<span class="badge badge-warning"><?php echo ucfirst($customer_subscription['status']); ?></span>
									<?php }else{ ?>
										<span class="badge badge-danger"><?php echo ucfirst($customer_subscription['status']); ?></span>
									<?php } ?>
								</div>
								<!--end::Item-->
								<?php if (isset($reseller_info) && !empty($reseller_info)) { ?>
								<!--begin::Title-->
								<h6 class="mb-8 fw-boldest text-gray-600 text-hover-primary">RESELLER DETAILS</h6>
								<!--end::Title-->
								<!--begin::Item-->
								<div class="mb-6">
									<div class="fw-bold text-gray-600 fs-7">Name</div>
										<div class="fw-bolder fs-6 text-gray-800"><?php echo ucfirst($reseller_info->full_name); ?>
									</div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="mb-6">
									<div class="fw-bold text-gray-600 fs-7">Email:</div>
									<div class="fw-bolder text-gray-800 fs-6"><?php echo $reseller_info->email; ?></div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="m-0">
									<div class="fw-bold text-gray-600 fs-7">Phone:</div>
									<div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center"><?php if ($reseller_info->contact_number) {
										echo $reseller_info->contact_number; }else{ echo '-----------'; } ?></div>
								</div>
								<!--end::Item-->
								<?php } ?>
							</div>
							<!--end::Invoice 2 sidebar-->
						</div>
						<!--end::Sidebar-->
					</div>
					<!--end::Layout-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Invoice 2 main-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Content-->
	<input type="hidden" value="<?php echo $customer_info['first_name'].'-'.$customer_info['last_name'].'-'.$invoice_info['invoice_number']; ?>" id="file_name">
	<script>var hostUrl = "assets/";</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!-- html2pdf library -->

	<!--begin::Footer-->
	<?php $this->load->view('admin/layouts/footer'); ?>
	<!--end::Footer-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

	<script>
	document.getElementById('download_pdf').addEventListener('click', function() {
	    var element = document.getElementById('kt_invoice_printable');
	    let filename = $("#file_name").val();
	    document.getElementById('kt_body').scrollTop = 0;
	    // Use a timeout to let the page render
	    setTimeout(function(){
	        html2pdf().from(element).set({
	            margin: 10,
	            filename: filename+'.pdf',
	            image: { type: 'jpeg', quality: 1 }, // higher quality
	            html2canvas: { scale: 2, logging: true, letterRendering: true, useCORS: true },
	            jsPDF: { unit: 'mm', format: 'a4', orientation: 'Landscape' }
	        }).save();
	    }, 1000);
	});
	</script>

</div>
<!--end::Wrapper-->