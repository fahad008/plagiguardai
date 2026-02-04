<div class="hover-scroll-y" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-offset="0px" data-kt-scroll-dependencies="#kt_sidebar_tabs" data-kt-scroll-wrappers="#kt_sidebar_content, #kt_sidebar_body">
	<!--begin::Tab content-->
	<div class="tab-content px-5 px-xxl-10">
		<!--begin::Tab pane-->
		<div class="tab-pane fade show active" id="kt_sidebar_tab_1" role="tabpanel">
			<!--begin::Statistics Widget-->
			<div class="card card-flush card-p-0 shadow-none bg-transparent mb-3">
				<!--begin::Header-->
				<div class="card-header align-items-center border-0">
					<!--begin::Title-->
					<h3 class="card-title fw-bolder text-white fs-3">Plagiarism Assessment Score</h3>
					<!--end::Title-->
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body">
					<!--begin::Row-->
					<div class="row g-5">
						<!--begin::Col-->
						<div class="col-6">
							<!--begin::Item-->
							<div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
								<!--begin::Progress-->
								<div class="progress-bar h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="<?php echo $three_do_text; ?>">
									<div class="<?php echo $three_pl_class; ?> rounded h-4px" role="progressbar" style="width: <?php echo $three_pl; ?>%" aria-valuenow="<?php echo $three_pl; ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<!--end::Progress-->
								<!--begin::Value-->
								<div class="text-white fs-2 fs-xxl-2x fw-bolder mb-1" data-kt-countup="true" data-kt-countup-value="<?php echo $three_pl; ?>" data-kt-countup-prefix=""><?php echo $three_pl; ?></div>
								<!--end::Value-->
								<!--begin::Label-->
								<div class="sidebar-text-muted fs-6 fw-bold">Plagiarism Score</div>
								<!--end::Label-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-6">
							<!--begin::Item-->
							<div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
								<!--begin::Progress-->
								<div class="progress-bar h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="<?php echo $three_do_text; ?>">
									<div class="<?php echo $three_or_class; ?> rounded h-4px" role="progressbar" style="width: <?php echo $three_or; ?>%" aria-valuenow="<?php echo $three_or; ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<!--end::Progress-->
								<!--begin::Value-->
								<div class="text-white fs-2 fs-xxl-2x fw-bolder mb-1" data-kt-countup="true" data-kt-countup-value="<?php echo $three_or; ?>" data-kt-countup-prefix=""><?php echo $three_or; ?></div>
								<!--end::Value-->
								<!--begin::Label-->
								<div class="sidebar-text-muted fs-6 fw-bold">Uniqueness Score</div>
								<!--end::Label-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Card Body-->
			</div>
			<!--end::Statistics Widget-->
			<div class="card card-flush h-lg-100">
				<!--begin::Card header-->
				<div class="card-header mt-2">
					<!--begin::Card title-->
					<div class="card-title flex-column">
						<h3 class="fw-bolder mb-1 <?php echo $three_do_color; ?>"><?php echo $three_do_text; ?></h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body p-6 pt-5">
					<!--begin::Wrapper-->
					<div class="d-flex flex-wrap">
						<!--begin::Chart-->
						<div class="position-relative d-flex flex-center h-250px w-250px mb-5">
							<div class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center text-center">
								<span class="fs-2qx fw-bolder"><?php echo $three_do_score; ?></span>
								<span class="fs-8 fw-bold <?php echo $three_do_color; ?>"><?php echo $three_do_text; ?></span>
							</div>
							<canvas id="chart-3"></canvas>
						</div>
						<!--end::Chart-->
						<!--begin::Labels-->
						<div class="d-flex flex-column justify-content-center flex-row-fluid pe-0 mb-5">
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-original me-3"></div>
								<div class="text-gray-600">Highly Unique</div>
								<div class="ms-auto fw-bolder text-gray-700">0% – 20%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-low me-3"></div>
								<div class="text-gray-600">Mostly Unique</div>
								<div class="ms-auto fw-bolder text-gray-700">21% – 40%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-medium me-3"></div>
								<div class="text-gray-600">Partially Plagiarized</div>
								<div class="ms-auto fw-bolder text-gray-700">41% – 60%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-likely me-3"></div>
								<div class="text-gray-600">Mostly Plagiarized</div>
								<div class="ms-auto fw-bolder text-gray-700">61% – 80%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-high me-3"></div>
								<div class="text-gray-600">Highly Plagiarized</div>
								<div class="ms-auto fw-bolder text-gray-700">81% – 95%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-very-high me-3"></div>
								<div class="text-gray-600">Extensively Plagiarized</div>
								<div class="ms-auto fw-bolder text-gray-700">96% – 100%</div>
							</div>
							<!--end::Label-->
						</div>
						<!--end::Labels-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Notice-->
					<div class="notice d-flex <?php echo $three_do_light; ?> rounded <?php echo $three_do_border; ?> border border-dashed p-6 mb-5">
						<!--begin::Wrapper-->
						<div class="d-flex flex-stack flex-grow-1">
							<!--begin::Content-->
							<div class="fw-bold">
								<div class="fs-6 text-gray-700">
									<div class="fs-6 fw-bold <?php echo $three_do_color; ?>"><?php echo $three_do_state; ?></div>
								</div>
							</div>
							<!--end::Content-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Notice-->
					<?php if (isset($plagiarism_sources) && is_array($plagiarism_sources) && !empty($plagiarism_sources)) { ?>
					<div class="d-flex flex-column flex-row-fluid pe-0 mb-5">

						<span class="text-gray-1000 fw-bolder fs-6 mb-5">Matched Resources:</span>

						
						<?php foreach ($plagiarism_sources as $key => $value) {
						?>

					    <!--begin::Item-->
					    <span class="text-gray-800 fw-bolder fs-6">Similarity Text:</span>
				        <span class="text-gray-700 fw-bold d-block mb-3"><?php echo $value['phrase']; ?></span>

				        <?php if (isset($value['sources']) && is_array($value['sources']) && !empty($value['sources'])) {
				        	foreach ($value['sources'] as $key => $source) {
				        		$key = $key + 1;
			        	?>

					    <div class="fs-6 fw-bold mb-2 p-3 border-start border-5 rounded-start-sm mb-5 <?php echo $source['border']; ?>">
					        <span class="text-gray-800 fw-bolder fs-6">Link <?php echo $key; ?>:</span>
					        <a href="<?php echo $source['link']; ?>" class="text-gray-700 fw-bold d-block mb-3" target="_blank"><?php echo $source['link']; ?></a>
					        <span class="badge fs-8 fw-bolder <?php echo $source['bg_light']; ?> <?php echo $source['color']; ?>"><?php echo $source['label']; ?> <?php echo $source['score']; ?>%</span>
					    </div>

						<?php } ?>
						<?php } ?>
					    <!--end::Item-->

						<?php } ?>

					</div>
					<?php } ?>
				</div>
				<!--end::Card body-->
			</div>

		</div>
		<!--end::Tab pane-->

		<!--begin::Tab pane-->
		<div class="tab-pane fade" id="kt_sidebar_tab_2" role="tabpanel">
			<!--begin::Statistics Widget-->
			<div class="card card-flush card-p-0 shadow-none bg-transparent mb-3">
				<!--begin::Header-->
				<div class="card-header align-items-center border-0">
					<!--begin::Title-->
					<h3 class="card-title fw-bolder text-white fs-3">AI Confidence Score</h3>
					<!--end::Title-->
					<!--begin::Toolbar-->
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body">
					<!--begin::Row-->
					<div class="row g-5">
						<!--begin::Col-->
						<div class="col-6">
							<!--begin::Item-->
							<div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
								<!--begin::Progress-->
								<div class="progress-bar h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="<?php echo $two_do_text; ?>">
									<div class="<?php echo $two_ai_class; ?> rounded h-4px" role="progressbar" style="width: <?php echo $two_ai; ?>%" aria-valuenow="<?php echo $two_ai; ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<!--end::Progress-->
								<!--begin::Value-->
								<div class="text-white fs-2 fs-xxl-2x fw-bolder mb-1" data-kt-countup="true" data-kt-countup-value="<?php echo $two_ai; ?>" data-kt-countup-prefix=""><?php echo $two_ai; ?></div>
								<!--end::Value-->
								<!--begin::Label-->
								<div class="sidebar-text-muted fs-6 fw-bold">AI Detection Confidence</div>
								<!--end::Label-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-6">
							<!--begin::Item-->
							<div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
								<!--begin::Progress-->
								<div class="progress-bar h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="<?php echo $two_do_text; ?>">
									<div class="<?php echo $two_or_class; ?> rounded h-4px" role="progressbar" style="width: <?php echo $two_or; ?>%" aria-valuenow="<?php echo $two_or; ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<!--end::Progress-->
								<!--begin::Value-->
								<div class="text-white fs-2 fs-xxl-2x fw-bolder mb-1" data-kt-countup="true" data-kt-countup-value="<?php echo $two_or; ?>" data-kt-countup-prefix=""><?php echo $two_or; ?></div>
								<!--end::Value-->
								<!--begin::Label-->
								<div class="sidebar-text-muted fs-6 fw-bold">Authenticity Confidence</div>
								<!--end::Label-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Card Body-->
			</div>
			<!--end::Statistics Widget-->
			<div class="card card-flush h-lg-100">
				<!--begin::Card header-->
				<div class="card-header mt-2">
					<!--begin::Card title-->
					<div class="card-title flex-column">
						<h3 class="fw-bolder mb-1 <?php echo $two_do_color; ?>"><?php echo $two_do_text; ?></h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body p-6 pt-5">
					<!--begin::Wrapper-->
					<div class="d-flex flex-wrap">
						<!--begin::Chart-->
						<div class="position-relative d-flex flex-center h-250px w-250px mb-5">
							<div class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center text-center">
								<span class="fs-2qx fw-bolder"><?php echo $two_do_score; ?></span>
								<span class="fs-8 fw-bold <?php echo $two_do_color; ?>"><?php echo $two_do_text; ?></span>
							</div>
							<canvas id="chart-2"></canvas>
						</div>
						<!--end::Chart-->
						<!--begin::Labels-->
						<div class="d-flex flex-column justify-content-center flex-row-fluid pe-0 mb-5">
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-original me-3"></div>
								<div class="text-gray-600">Original</div>
								<div class="ms-auto fw-bolder text-gray-700">0% – 20%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-low me-3"></div>
								<div class="text-gray-600">Mostly Human</div>
								<div class="ms-auto fw-bolder text-gray-700">21% – 40%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-medium me-3"></div>
								<div class="text-gray-600">Partial AI</div>
								<div class="ms-auto fw-bolder text-gray-700">41% – 60%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-likely me-3"></div>
								<div class="text-gray-600">Likely AI</div>
								<div class="ms-auto fw-bolder text-gray-700">61% – 80%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-high me-3"></div>
								<div class="text-gray-600">High AI</div>
								<div class="ms-auto fw-bolder text-gray-700">81% – 95%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-very-high me-3"></div>
								<div class="text-gray-600">AI Generated</div>
								<div class="ms-auto fw-bolder text-gray-700">96% – 100%</div>
							</div>
							<!--end::Label-->
						</div>
						<!--end::Labels-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Notice-->
					<div class="notice d-flex <?php echo $two_do_light; ?> rounded <?php echo $two_do_border; ?> border border-dashed p-6">
						<!--begin::Wrapper-->
						<div class="d-flex flex-stack flex-grow-1">
							<!--begin::Content-->
							<div class="fw-bold">
								<div class="fs-6 text-gray-700">
									<div class="fs-6 fw-bold <?php echo $two_do_color; ?>"><?php echo $two_do_state; ?></div>
								</div>
							</div>
							<!--end::Content-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Notice-->
				</div>
				<!--end::Card body-->
			</div>
		</div>
		<!--end::Tab pane-->
		
		<!--begin::Tab pane-->
		<div class="tab-pane fade" id="kt_sidebar_tab_3" role="tabpanel">
			<!--begin::Statistics Widget-->
			<div class="card card-flush card-p-0 shadow-none bg-transparent mb-3">
				<!--begin::Header-->
				<div class="card-header align-items-center border-0">
					<!--begin::Title-->
					<h3 class="card-title fw-bolder text-white fs-3">AI Classification Score</h3>
					<!--end::Title-->
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body">
					<!--begin::Row-->
					<div class="row g-5">
						<!--begin::Col-->
						<div class="col-6">
							<!--begin::Item-->
							<div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
								<!--begin::Progress-->
								<div class="progress-bar h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="<?php echo $one_do_text; ?>">
									<div class="<?php echo $one_ai_class; ?> rounded h-4px" role="progressbar" style="width: <?php echo $one_ai; ?>%" aria-valuenow="<?php echo $one_ai; ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<!--end::Progress-->
								<!--begin::Value-->
								<div class="text-white fs-2 fs-xxl-2x fw-bolder mb-1" data-kt-countup="true" data-kt-countup-value="<?php echo $one_ai; ?>" data-kt-countup-prefix=""><?php echo $one_ai; ?></div>
								<!--end::Value-->
								<!--begin::Label-->
								<div class="sidebar-text-muted fs-6 fw-bold">AI Detection Score</div>
								<!--end::Label-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-6">
							<!--begin::Item-->
							<div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
								<!--begin::Progress-->
								<div class="progress-bar h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="<?php echo $one_do_text; ?>">
									<div class="<?php echo $one_or_class; ?> rounded h-4px" role="progressbar" style="width: <?php echo $one_or; ?>%" aria-valuenow="<?php echo $one_or; ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<!--end::Progress-->
								<!--begin::Value-->
								<div class="text-white fs-2 fs-xxl-2x fw-bolder mb-1" data-kt-countup="true" data-kt-countup-value="<?php echo $one_or; ?>" data-kt-countup-prefix=""><?php echo $one_or; ?></div>
								<!--end::Value-->
								<!--begin::Label-->
								<div class="sidebar-text-muted fs-6 fw-bold">Authenticity Score</div>
								<!--end::Label-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Card Body-->
			</div>
			<!--end::Statistics Widget-->

			<div class="card card-flush h-lg-100">
				<!--begin::Card header-->
				<div class="card-header mt-2">
					<!--begin::Card title-->
					<div class="card-title flex-column">
						<h3 class="fw-bolder mb-1 <?php echo $one_do_color; ?>"><?php echo $one_do_text; ?></h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body p-6 pt-5">
					<!--begin::Wrapper-->
					<div class="d-flex flex-wrap">
						<!--begin::Chart-->
						<div class="position-relative d-flex flex-center h-250px w-250px mb-5">
							<div class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center text-center">
								<span class="fs-2qx fw-bolder"><?php echo $one_do_score; ?></span>
								<span class="fs-8 fw-bold <?php echo $one_do_color; ?>"><?php echo $one_do_text; ?></span>
							</div>
							<canvas id="chart-1"></canvas>
						</div>
						<!--end::Chart-->
						<!--begin::Labels-->
						<div class="d-flex flex-column justify-content-center flex-row-fluid pe-0 mb-5">
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-original me-3"></div>
								<div class="text-gray-600">Original</div>
								<div class="ms-auto fw-bolder text-gray-700">0% – 20%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-low me-3"></div>
								<div class="text-gray-600">Mostly Human</div>
								<div class="ms-auto fw-bolder text-gray-700">21% – 40%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-medium me-3"></div>
								<div class="text-gray-600">Partial AI</div>
								<div class="ms-auto fw-bolder text-gray-700">41% – 60%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-likely me-3"></div>
								<div class="text-gray-600">Likely AI</div>
								<div class="ms-auto fw-bolder text-gray-700">61% – 80%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-high me-3"></div>
								<div class="text-gray-600">High AI</div>
								<div class="ms-auto fw-bolder text-gray-700">81% – 95%</div>
							</div>
							<!--end::Label-->
							<!--begin::Label-->
							<div class="d-flex fs-6 fw-bold align-items-center mb-2">
								<div class="bullet bg-very-high me-3"></div>
								<div class="text-gray-600">AI Generated</div>
								<div class="ms-auto fw-bolder text-gray-700">96% – 100%</div>
							</div>
							<!--end::Label-->
						</div>
						<!--end::Labels-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Notice-->
					<div class="notice d-flex <?php echo $one_do_light; ?> rounded <?php echo $one_do_border; ?> border border-dashed p-6">
						<!--begin::Wrapper-->
						<div class="d-flex flex-stack flex-grow-1">
							<!--begin::Content-->
							<div class="fw-bold">
								<div class="fs-6 text-gray-700">
									<div class="fs-6 fw-bold <?php echo $one_do_color; ?>"><?php echo $one_do_state; ?></div>
								</div>
							</div>
							<!--end::Content-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Notice-->
				</div>
				<!--end::Card body-->
			</div>
		</div>
		<!--end::Tab pane-->
	</div>
	<!--end::Tab content-->
</div>