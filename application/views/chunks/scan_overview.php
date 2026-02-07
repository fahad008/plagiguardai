<?php if (isset($scan_info) && is_array($scan_info) && !empty($scan_info)) { ?>
<!--begin::Header-->
<div class="card-header border-0 pt-5">
	<h3 class="card-title align-items-start flex-column">
		<span class="card-label fw-bolder fs-3 mb-1">Scan Overview</span>
	</h3>
</div>
<!--end::Header-->
<!--begin::Body-->
<div class="card-body py-3">
	<!--begin::Table container-->
	<div class="table-responsive">
		<!--begin::Table-->
		<table id="scan-overview-table" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
			<!--begin::Table head-->
			<thead>
				<tr class="fw-bolder text-muted">
					<th class="min-w-150px">Title</th>
					<th class="min-w-140px">Plagiarism Score</th>
					<th class="min-w-140px">AI Confidence</th>
					<th class="min-w-140px">AI Classification</th>
					<th class="min-w-50px">File</th>
					<th class="min-w-50px">Expiry</th>
					<th class="min-w-100px">Actions</th>
				</tr>
			</thead>
			<!--end::Table head-->
			<!--begin::Table body-->
			<tbody>
				<?php foreach ($scan_info as $key => $value) { ?>
				<tr>
					<td>
						<div class="d-flex align-items-center">
							<div class="d-flex justify-content-start flex-column me-1">
								<span class="text-dark fw-bolder text-hover-primary fs-6 me-1" id="table-title-<?php echo $value['id']; ?>"><?php echo $value['title']; ?></span>
							</div>
							<div class="symbol symbol-45px">
								<a href="javascript:void(0)" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target=".kt_modal_new_title" data-scan-id="<?php echo $value['id']; ?>" data-scan-title="<?php echo $value['title']; ?>">
								<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
								<span class="svg-icon svg-icon-3">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
										<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</a>
							</div>
						</div>
					</td>
					<td>
						<span class="text-dark fw-bolder text-hover-primary fs-6"><?php echo date('d M', strtotime($value['created_at'])); ?></span>
						<span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('Y', strtotime($value['created_at'])); ?></span>
					</td>
					<td>
						<span class="fw-bolder d-block mb-1 fs-6 <?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['three_do_color']; } ?>"><?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['three_do_text']; } ?></span>
						<span class="fs-7 fw-bolder <?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['three_do_color']; } ?>"><?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['three_do_score']; } ?>%</span>
					</td>
					<td>
						<span class="fw-bolder d-block mb-1 fs-6 <?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['two_do_color']; } ?>"><?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['two_do_text']; } ?></span>
						<span class="fs-7 fw-bolder <?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['two_do_color']; } ?>"><?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['two_do_score']; } ?>%</span>
					</td>
					<td>
						<span class="fw-bolder d-block mb-1 fs-6 <?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['one_do_color']; } ?>"><?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['one_do_text']; } ?></span>
						<span class="fs-7 fw-bolder <?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['one_do_color']; } ?>"><?php if (isset($value['overview_info']) && !empty($value['overview_info'])) { echo $value['overview_info']['one_do_score']; } ?>%</span>
					</td>
					<td>
						<div class="symbol symbol-45px me-5">
							<?php $file_url = ''; 
								if (isset($value['file_info']) && !empty($value['file_info'])) {
									if ($value['file_info']['formatted_file'] != '') {
										$file_path = ''; 
										$file_path = FCPATH.'uploads/scans/customer_'.$value['file_info']['customer_id'].'/'.$value['file_info']['formatted_file']; 

									   	if (file_exists($file_path)) {
									   		$file_url = base_url().'uploads/scans/customer_'.$value['file_info']['customer_id'].'/'.$value['file_info']['formatted_file'];
									   	}
								   	}  
							   	} 
						   	?>
							<?php if (isset($value['file_info']) && !empty($value['file_info']) && $file_url != '') { ?>
								<a href="<?php echo base_url('file_manager/download/' . $value['file_info']['id']); ?>">
									<span class="svg-icon svg-icon-success svg-icon-4x">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="black"/>
										<path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black"/>
										<path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="black"/>
										</svg>
									</span>
								</a>
								<?php }else{ ?>
									<a href="javascript: void(0)">
									<span class="svg-icon svg-icon-danger svg-icon-4x">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM13.4 14L15.5 11.9C15.9 11.5 15.9 10.9 15.5 10.5C15.1 10.1 14.5 10.1 14.1 10.5L12 12.6L9.89999 10.5C9.49999 10.1 8.9 10.1 8.5 10.5C8.1 10.9 8.1 11.5 8.5 11.9L10.6 14L8.5 16.1C8.1 16.5 8.1 17.1 8.5 17.5C8.7 17.7 9.00001 17.8 9.20001 17.8C9.40001 17.8 9.69999 17.7 9.89999 17.5L12 15.4L14.1 17.5C14.3 17.7 14.6 17.8 14.8 17.8C15 17.8 15.3 17.7 15.5 17.5C15.9 17.1 15.9 16.5 15.5 16.1L13.4 14Z" fill="black"/>
										<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black"/>
										</svg>
									</span>
								</a>
							<?php } ?>
						</div>
					</td>
					<td>
						<!-- <a href="javascript: void(0)" onclick="delete_scan(this)" data-id="<?php //echo $value['id']; ?>" class="btn btn-icon bg-light-danger btn-active-color-primary btn-sm">
							<span class="svg-icon svg-icon-2x svg-icon-danger">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
									<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
									<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
								</svg>
							</span>
						</a> -->
						<?php if ($value['status'] == 'processing') { ?>
						<a href="javascript: void(0)" onclick="show_popup(this)" data-status="processing" data-message="Status: Processing — Your scan has been queued and is now being analyzed. Please wait." class="btn btn-icon bg-light-warning btn-sm me-1">
							<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
							<span class="svg-icon svg-icon-2x svg-icon-warning">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"/>
									<path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="black"/>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</a>
						<?php }else if ($value['status'] == 'pending') { ?>
							<a href="javascript:void(0)" onclick="show_popup(this)" data-status="pending" data-message="Status: Pending — Your scan is queued and will start shortly." class="btn btn-icon bg-light-warning btn-sm me-1">
							<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
							<span class="svg-icon svg-icon-2x svg-icon-warning">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"/>
									<path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="black"/>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</a>
						<?php }else if ($value['status'] == 'failed') { ?>
						<a href="javascript:void(0)" onclick="show_popup(this)" data-status="pending" data-message="<?php echo $value['error_message']; ?>" class="btn btn-icon bg-light-danger btn-sm me-1">
							<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
							<span class="svg-icon svg-icon-2x svg-icon-danger">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"/>
								<rect x="9" y="13.0283" width="7.3536" height="1.2256" rx="0.6128" transform="rotate(-45 9 13.0283)" fill="black"/>
								<rect x="9.86664" y="7.93359" width="7.3536" height="1.2256" rx="0.6128" transform="rotate(45 9.86664 7.93359)" fill="black"/>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</a>
						<?php }else{ ?>
						<a href="<?php echo $value['scan_link']; ?>" target="_blank" class="btn btn-icon bg-light-success btn-sm me-1">
							<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
							<span class="svg-icon svg-icon-2x svg-icon-success">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
									<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</a>
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			<!--end::Table body-->
		</table>
		<!--end::Table-->
		<!-- <ul class="pagination">
		    <li class="page-item previous disabled"><span class="page-link">Previous</span></span></li>
		    <li class="page-item "><a href="#" class="page-link">1</a></li>
		    <li class="page-item active"><a href="#" class="page-link">2</a></li>
		    <li class="page-item "><a href="#" class="page-link">3</a></li>
		    <li class="page-item "><a href="#" class="page-link">4</a></li>
		    <li class="page-item "><a href="#" class="page-link">5</a></li>
		    <li class="page-item "><a href="#" class="page-link">6</a></li>
		    <li class="page-item next"><a class="page-link" href="#">Next</span></a></li>
		</ul> -->
	</div>
	<!--end::Table container-->
</div>
<!--begin::Body-->
<?php } ?>
<script>
	$(document).on('click', '.btn[data-scan-id]', function() {
	    var scanId = $(this).data('scan-id');
	    var scanTitle = $(this).data('scan-title');
	    $("#scan-id-input").val(scanId);
	    $("#scan-title-modal-input").val(scanTitle);
	});

</script>