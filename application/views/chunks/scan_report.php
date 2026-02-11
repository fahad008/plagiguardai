<?php if (isset($scan_info) && !empty($scan_info)) { ?>
	<div class="">
		<input type="hidden" value="<?php echo $scan_info['title']; ?>" id="scan_info_title">
		<?php if (isset($scan_score) && !empty($scan_score)) {?>
		<div class="row g-5 g-xl-8">
			<div class="col-xl-4">
				<?php 
					$three_card_bg = substr($scan_score['three_do_color'], strrpos($scan_score['three_do_color'], '-') + 1).'-card-bg'; 
					$two_card_bg = substr($scan_score['two_do_color'], strrpos($scan_score['two_do_color'], '-') + 1).'-card-bg'; 
					$one_card_bg = substr($scan_score['one_do_color'], strrpos($scan_score['one_do_color'], '-') + 1).'-card-bg'; 
				?>
				<!--begin::Statistics Widget 5-->
				<a href="javascript: void(0)" class="card <?php echo $three_card_bg; ?> hoverable card-xl-stretch mb-xl-8">
					<!--begin::Body-->
					<div class="card-body">
						<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
						<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M17.302 11.35L12.002 20.55H21.202C21.802 20.55 22.202 19.85 21.902 19.35L17.302 11.35Z" fill="black"></path>
							<path opacity="0.3" d="M12.002 20.55H2.802C2.202 20.55 1.80202 19.85 2.10202 19.35L6.70203 11.45L12.002 20.55ZM11.302 3.45L6.70203 11.35H17.302L12.702 3.45C12.402 2.85 11.602 2.85 11.302 3.45Z" fill="black"></path>
							</svg>
						</span>
						<!--end::Svg Icon-->
						<div class="text-white fw-bolder fs-2 mb-2 mt-5">Plagiarism Score</div>
						<div class="fw-bold text-white">Outcome: <?php echo $scan_score['three_do_text']; ?></div>
					</div>
					<!--end::Body-->
				</a>
				<!--end::Statistics Widget 5-->
			</div>
			<div class="col-xl-4">
				<!--begin::Statistics Widget 5-->
				<a href="#" class="card <?php echo $two_card_bg; ?> hoverable card-xl-stretch mb-xl-8">
					<!--begin::Body-->
					<div class="card-body">
						<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
						<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M7 20.5L2 17.6V11.8L7 8.90002L12 11.8V17.6L7 20.5ZM21 20.8V18.5L19 17.3L17 18.5V20.8L19 22L21 20.8Z" fill="black"></path>
							<path d="M22 14.1V6L15 2L8 6V14.1L15 18.2L22 14.1Z" fill="black"></path>
							</svg>
						</span>
						<!--end::Svg Icon-->
						<div class="text-white fw-bolder fs-2 mb-2 mt-5">AI Confidence</div>
						<div class="fw-bold text-white">Outcome: <?php echo $scan_score['two_do_text']; ?></div>
					</div>
					<!--end::Body-->
				</a>
				<!--end::Statistics Widget 5-->
			</div>
			<div class="col-xl-4">
				<!--begin::Statistics Widget 5-->
				<a href="#" class="card <?php echo $one_card_bg; ?> hoverable card-xl-stretch mb-5 mb-xl-8">
					<!--begin::Body-->
					<div class="card-body">
						<!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
						<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.3" d="M11.8 5.2L17.7 8.6V15.4L11.8 18.8L5.90001 15.4V8.6L11.8 5.2ZM11.8 2C11.5 2 11.2 2.1 11 2.2L3.8 6.4C3.3 6.7 3 7.3 3 7.9V16.2C3 16.8 3.3 17.4 3.8 17.7L11 21.9C11.3 22 11.5 22.1 11.8 22.1C12.1 22.1 12.4 22 12.6 21.9L19.8 17.7C20.3 17.4 20.6 16.8 20.6 16.2V7.9C20.6 7.3 20.3 6.7 19.8 6.4L12.6 2.2C12.4 2.1 12.1 2 11.8 2Z" fill="black"></path>
							<path d="M11.8 8.69995L8.90001 10.3V13.7L11.8 15.3L14.7 13.7V10.3L11.8 8.69995Z" fill="black"></path>
							</svg>
						</span>
						<!--end::Svg Icon-->
						<div class="text-white fw-bolder fs-2 mb-2 mt-5">AI Classification</div>
						<div class="fw-bold text-white">Outcome: <?php echo $scan_score['one_do_text']; ?></div>
					</div>
					<!--end::Body-->
				</a>
				<!--end::Statistics Widget 5-->
			</div>
		</div>
		<?php } ?>
		<div class="row g-5">
		    <!-- Left info -->
		    <div class="col-lg-4">
		      	<div class="card card-flush">
			        <div class="card-header p-0">
			          <h3 class="card-title">Scan Information</h3>
			        </div>
			        <div class="card-body p-0">

			          <div class="mb-4">
			            <div class="text-gray-600">Title</div>
			            <div class="fw-bold"><?php if (isset($scan_info) && !empty($scan_info)) { echo $scan_info['title']; } ?></div>
			          </div>
			          <?php if (isset($scan_file) && !empty($scan_file)) { 
			          	if ($scan_file['original_name'] != '') { ?>
			          <div class="mb-4">
			            <div class="text-gray-600">File Name</div>
			            <div class="fw-bold"><?php echo $scan_file['original_name']; ?></div>
			          </div>
		      			<?php } } ?>

			          <div class="mb-4">
			            <div class="text-gray-600">Scanned at</div>
			            <div class="fw-bold"><?php if (isset($scan_info) && !empty($scan_info)) { echo date('d M Y', strtotime($scan_info['updated_at'])); } ?></div>
			          </div>
			          <div class="mb-4">
			            <div class="text-gray-600">Expiry</div>
			            <div class="fw-bold text-danger"><?php if (isset($scan_info) && !empty($scan_info)) { echo date('d M Y', strtotime($scan_info['expire_at'])); } ?></div>
			          </div>

			        </div>
		      	</div>
		    </div>
		    <!-- Right results -->
		    <div class="col-lg-8">
		      <div class="card card-flush">
		        <div class="card-header p-0">
		          <h3 class="card-title">Score Overview</h3>
		        </div>
		        <div class="card-body p-0">
		          <table class="table table-row-bordered">
		            <thead>
		              <tr>
		                <th>Type</th>
		                <th>Score</th>
		                <th>Marked As</th>
		              </tr>
		            </thead>
		            <tbody>
		              <tr>
		                <td>Plagiarism Assessment</td>
		                <td class="<?php if (isset($scan_score) && !empty($scan_score)) { echo $scan_score['three_do_color']; } ?> fw-bold"><?php if (isset($scan_score) && !empty($scan_score)) { echo $scan_score['three_do_score']; } ?>%</td>
		                <td><?php if (isset($scan_score) && !empty($scan_score)) { echo $scan_score['three_do_text']; } ?></td>
		              </tr>
		              <tr>
		                <td>AI Confidence</td>
		                <td class="<?php if (isset($scan_score) && !empty($scan_score)) { echo $scan_score['two_do_color']; } ?> fw-bold"><?php if (isset($scan_score) && !empty($scan_score)) { echo $scan_score['two_do_score']; } ?>%</td>
		                <td><?php if (isset($scan_score) && !empty($scan_score)) { echo $scan_score['two_do_text']; } ?></td>
		              </tr>
		              <tr>
		                <td>AI Classification</td>
		                <td class="<?php if (isset($scan_score) && !empty($scan_score)) { echo $scan_score['one_do_color']; } ?> fw-bold"><?php if (isset($scan_score) && !empty($scan_score)) { echo $scan_score['one_do_score']; } ?>%</td>
		                <td><?php if (isset($scan_score) && !empty($scan_score)) { echo $scan_score['one_do_text']; } ?></td>
		              </tr>
		            </tbody>
		          </table>
		        </div>
		      </div>
		    </div>
	  	</div>

</div>
<?php }else{ ?>
	<div class="card">
		<!--begin::Card body-->
		<div class="card-body p-0">
			<!--begin::Wrapper-->
			<div class="card-px text-center py-0 my-0">
				<!--begin::Title-->
				<h2 class="fs-2x fw-bolder mb-5">Scan details not found</h2>
				<!--end::Title-->
				<!--begin::Description-->
				<p class="text-gray-400 fs-4 fw-bold mb-5">Please try later!</p>
				<!--end::Description-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Illustration-->
			<div class="text-center px-4">
				<img class="mw-100 mh-300px" alt="" src="assets/media/illustrations/unitedpalms-1/5.png">
			</div>
			<!--end::Illustration-->
		</div>
		<!--end::Card body-->
	</div>
<?php } ?>