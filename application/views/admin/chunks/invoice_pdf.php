<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<!--begin::Container-->
<div class="container-xxl" id="kt_content_container">
	<!--begin::Invoice 2 main-->
	<div class="card">
		<!--begin::Body-->
		<div class="card-body p-lg-20">
			<!--begin::Layout-->
			<div class="d-flex flex-column flex-xl-row" id="kt_invoice_printable">
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
										<span class="fs-7 text-danger d-flex align-items-center">
										<span class="bullet bullet-dot bg-danger me-2"></span>Due in 0 days</span>
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
												<i class="fa fa-genderless text-<?php if (isset($customer_plan) && !empty($customer_plan)) { echo $customer_plan['title']; } ?> fs-2 me-2"></i><?php if (isset($customer_plan) && !empty($customer_plan)) { echo $customer_plan['title']; } ?></td>
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
<script>var hostUrl = "assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>