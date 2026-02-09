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
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Invoice</h1>
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
				<?php $this->load->view('subscription/navbar'); ?>
					<!--begin::details View-->
					<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
						<!--begin::Card header-->
						<div class="card-header cursor-pointer">
							<!--begin::Card title-->
							<div class="card-title m-0">
								<h3 class="fw-bolder m-0">Invoice</h3>
							</div>
							<!--end::Card title-->
							<div class="d-flex flex-wrap flex-stack">
								<!--begin::Actions-->
								<div class="d-flex flex-wrap my-2">
									<!-- <a href="Javascript: void(0)" class="btn btn-primary btn-sm" id="download_pdf">Download</a> -->
								</div>
								<!--end::Actions-->
							</div>
						</div>
						<!--begin::Card header-->
						<!--begin::Invoice 2 main-->
						<div class="card" id="kt_invoice_printable">
							<!--begin::Body-->
							<div class="card-body p-lg-5">
								<!--begin::Layout-->
								<div class="d-flex flex-column flex-xl-row">
									<!--begin::Content-->
									<div class="flex-lg-row-fluid me-xl-3 mb-2 mb-xl-0">
										<!--begin::Invoice 2 content-->
										<div class="mt-n1">
											<!--begin::Top-->
											<div class="d-flex flex-stack pb-10">
												<!--begin::Logo-->
												<a href="<?php echo base_url().'admin/dashboard/' ?>">
													<img alt="Logo" src="assets/media/logos/logo-demo3-default.svg" />
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
																	<i class="fa fa-genderless text-<?php if (isset($invoice_info['customer_plan']) && !empty($invoice_info['customer_plan'])) { echo $invoice_info['customer_plan']['color']; } ?> fs-2 me-2"></i><?php if (isset($invoice_info['customer_plan']) && !empty($invoice_info['customer_plan'])) { echo $invoice_info['customer_plan']['title']; } ?></td>
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
												<div class="fw-bolder fs-6 text-gray-800"><?php echo $start = date('d M Y', strtotime($invoice_info['customer_subscription']['start_date'])); ?></div>
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="mb-6">
												<div class="fw-bold text-gray-600 fs-7">Expiry Date</div>
												<div class="fw-bolder fs-6 text-gray-800"><?php echo $created = date('d M Y', strtotime($invoice_info['customer_subscription']['end_date'])); ?></div>
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="mb-6">
												<div class="fw-bold text-gray-600 fs-7">Status</div>
												<?php if ($invoice_info['customer_subscription']['status'] == 'active') { ?>
													<span class="badge badge-success"><?php echo ucfirst($invoice_info['customer_subscription']['status']); ?></span>
												<?php }else if ($invoice_info['customer_subscription']['status'] == 'inactive') { ?>
													<span class="badge badge-warning"><?php echo ucfirst($invoice_info['customer_subscription']['status']); ?></span>
												<?php }else{ ?>
													<span class="badge badge-danger"><?php echo ucfirst($invoice_info['customer_subscription']['status']); ?></span>
												<?php } ?>
											</div>
											<!--end::Item-->
											<?php if (isset($invoice_info['reseller_info']) && !empty($invoice_info['reseller_info'])) { ?>
											<!--begin::Title-->
											<h6 class="mb-8 fw-boldest text-gray-600 text-hover-primary">RESELLER DETAILS</h6>
											<!--end::Title-->
											<!--begin::Item-->
											<div class="mb-6">
												<div class="fw-bold text-gray-600 fs-7">Name</div>
													<div class="fw-bolder fs-6 text-gray-800"><?php echo ucfirst($invoice_info['reseller_info']['full_name']); ?>
												</div>
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="mb-6">
												<div class="fw-bold text-gray-600 fs-7">Email:</div>
												<div class="fw-bolder text-gray-800 fs-6"><?php echo $invoice_info['reseller_info']['email']; ?></div>
											</div>
											<!--end::Item-->
											<!--begin::Item-->
											<div class="m-0">
												<div class="fw-bold text-gray-600 fs-7">Phone:</div>
												<div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center"><?php if ($invoice_info['reseller_info']['contact_number'] != '') {
													echo $invoice_info['reseller_info']['contact_number']; }else{ echo '-----------'; } ?></div>
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
					<!--end::details View-->
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
<input type="hidden" value="<?php echo $customer_info['first_name'].'-'.$customer_info['last_name'].'-'.$invoice_info['invoice_number']; ?>" id="file_name">
<!--end::Main-->
<script>var hostUrl = "assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="assets/js/custom/apps/invoices/list/list.js"></script>
<script src="assets/js/custom/detection-charts.js"></script>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
document.getElementById('download_pdf').addEventListener('click', function() {
    var element = document.getElementById('kt_invoice_printable');
    let filename = $("#file_name").val();
    document.getElementById('kt_wrapper').scrollTop = 0;
    // Use a timeout to let the page render
    // setTimeout(function(){
    //     html2pdf().from(element).set({
    //         margin: 10,
    //         filename: filename+'.pdf',
    //         image: { type: 'jpeg', quality: 1 }, // higher quality
    //         html2canvas: { scale: 2, logging: true, letterRendering: true, useCORS: true },
    //         jsPDF: { unit: 'mm', format: 'a4', orientation: 'Landscape' }
    //     }).save();
    // }, 500);
});
</script>

</body>
<!--end::Body-->
</html>