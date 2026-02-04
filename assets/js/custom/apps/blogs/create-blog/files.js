"use strict";

// Class definition
var KTModalCreateProjectFiles = function () {
	// Variables
	var nextButton;
	var previousButton;
	var form;
	var stepper;
	var validator;

	// Private functions
	var initForm = function() {
		var featuredUrl = $("#upload_featured_image").val();
		var removeFeaturedUrl = $("#remove_featured_image").val();
		// Project logo
		// For more info about Dropzone plugin visit:  https://www.dropzonejs.com/#usage
		var myDropzone = new Dropzone("#kt_modal_create_project_files_upload", { 
			url: featuredUrl, // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 5, // MB
            acceptedFiles: ".png,.jpg,.jpeg",
            addRemoveLinks: true,
            dictInvalidFileType: "File type not allowed.",
            dictRemoveFile: "Remove",
            params: {
		        post_id: post_id
		    },
            init: function() {
		    	var dz = this;
		    	var form = KTModalCreateProject.getForm();
		        dz.on("addedfile", function(file) {
		            // If there is already a file, remove it
		            if (dz.files.length > 1) {
		                dz.removeFile(dz.files[0]); // remove the first/old file
		            }
		        });

		        dz.on("sending", function(file, xhr, formData) {
		            formData.append("post_id", form.post_id.value);
		        });

		        dz.on("success", function(file, response) {
		        	console.log(response);
		            // Ensure JSON object
		            if (typeof response === "string") {
		                response = JSON.parse(response);
		            }

		            // If server returned an error, trigger Dropzone error event
		            if (response.status === "success") {
		            	file.uploadedFileName = response.image;
		            	$("#featured_image_input").val(response.image);
		            }else if(response.status === "reload"){
		            	Swal.fire({
						    text: response.message,
						    icon: "error",
						    buttonsStyling: false,
						    confirmButtonText: "Sorry!",
						    customClass: {
						        confirmButton: "btn btn-danger"
						    }
						});
		            	setTimeout(function() {
							location.reload();
						}, 1000);  
		            	
		            }else{
		            	dz.emit("error", file, response.message);
		            	dz.removeFile(file);
		            	Swal.fire({
						    text: response.message,
						    icon: "error",
						    buttonsStyling: false,
						    confirmButtonText: "Continue",
						    customClass: {
						        confirmButton: "btn btn-danger"
						    }
						});
		            }
		        });

		        dz.on("removedfile", function(file) {

		            if (!file.uploadedFileName) return; // nothing to delete

		            $.ajax({
		                url: removeFeaturedUrl,
		                type: "POST",
		                data: { 
		                    file_name: file.uploadedFileName,
		                    post_id: form.post_id.value
		                },
		                success: function(response) {
		                    $("#featured_image_input").val('');
		                },
		                error: function(err) {
		                    console.error("Failed to delete file:", err);
		                }
		            });
		        });
		    },
		    accept: function(file, done) {
		        // Optional custom validation
		        const allowedExtensions = /(\.png|\.jpg|\.jpeg)$/i;
		        if (!allowedExtensions.exec(file.name)) {
		            done("Failed");
		        } else {
		            done();
		        }
		    }
		});  
	}

	// var handleForm = function() {
	// 	nextButton.addEventListener('click', function (e) {
	// 		// Prevent default button action
	// 		e.preventDefault();

	// 		// Disable button to avoid multiple click 
	// 		nextButton.disabled = true;

	// 		// Show loading indication
	// 		nextButton.setAttribute('data-kt-indicator', 'on');

	// 		// Simulate form submission
	// 		setTimeout(function() {
	// 			// Hide loading indication
	// 			nextButton.removeAttribute('data-kt-indicator');

	// 			// Enable button
	// 			nextButton.disabled = false;
				
	// 			// Go to next step
	// 			stepper.goNext();
	// 		}, 1500); 		
	// 	});

	// 	previousButton.addEventListener('click', function () {
	// 		stepper.goPrevious();
	// 	});
	// }

	var initValidation = function() {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'content': {
						validators: {
							notEmpty: {
								message: 'Content is required'
							}
						}
					}
				},
				
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);
	}

	var handleForm = function() {
		nextButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Disable button to avoid multiple click 
			// nextButton.disabled = true;

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');
					if (status == 'Valid') {

						var thumb = $("#featured_image_input").val();
						if (!thumb) {
							Swal.fire({
								text: "Please upload blog post featured image in order to proceed",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							});
						}else{

							// nextButton.setAttribute('data-kt-indicator', 'on');

							var post_url = $('#complete_blog').val();

							console.log(post_url);

							$.ajax({
		                        url: post_url,
		                        type: 'POST',
		                        data: $(form).serialize(),
		                        dataType: 'json',
		                        success: function (response) {

		                            if (response.status == 'success') {
		                            	$('#view_blog_btn').attr('href', response.view);
		                                // Simulate form submission
										nextButton.removeAttribute('data-kt-indicator');
										
										// Enable button
										nextButton.disabled = false;
										
										// Go to next step
										stepper.goNext();

		                            } else {
		                                
		                                Swal.fire({
		                                    html: response.message,
		                                    icon: "error",
		                                    buttonsStyling: false,
		                                    confirmButtonText: "Try again",
		                                    customClass: {
		                                        confirmButton: "btn btn-danger"
		                                    }
		                                });
		                            }
		                        },
		                    });
							   	
						}
											
					} else {
						// Enable button
						nextButton.disabled = false;

						// Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Please save the form carefully!",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}			
		});

		previousButton.addEventListener('click', function () {
			// Go to previous step
			stepper.goPrevious();
		});
	}

	return {
		// Public functions
		init: function () {
			form = KTModalCreateProject.getForm();
			stepper = KTModalCreateProject.getStepperObj();
			nextButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element="files-next"]');
			previousButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element="files-previous"]');

			initForm();
			initValidation();
			handleForm();
		}
	};
}();

// Webpack support
if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
	module.exports = KTModalCreateProjectFiles;
}
