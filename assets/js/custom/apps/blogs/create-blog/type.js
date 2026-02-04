"use strict";

// Class definition
var KTModalCreateProjectType = function () {
	// Variables
	var nextButton;
	var validator;
	var form;
	var stepper;

	// Private functions
	var initValidation = function() {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'title': {
						validators: {
							notEmpty: {
								message: 'Blog title is required'
							},
				            stringLength: {
				                min: 10,
				                max: 150,
				                trim: true,
				                message: 'Blog title must be between 10 and 150 characters'
				            }
						}
					},
					'author_id': {
						validators: {
							notEmpty: {
								message: 'Please pick an author'
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
					e.preventDefault();

					if (status == 'Valid') {
						// Show loading indication
						// nextButton.setAttribute('data-kt-indicator', 'on');
						var post_url = $('#pick_an_author').val();

						console.log(post_url);

						$.ajax({
	                        url: post_url,
	                        type: 'POST',
	                        data: $(form).serialize(),
	                        dataType: 'json',
	                        success: function (response) {

	                            if (response.post_id != '') {

	                            	$("#post_id").val(response.post_id);
	                            	$("#post_slug").val(response.slug);
	                                // Simulate form submission
									nextButton.removeAttribute('data-kt-indicator');
									
									// Enable button
									nextButton.disabled = false;
									
									// Go to next step
									stepper.goNext();

	                            } else {
	                                
	                                Swal.fire({
	                                    text: response.message,
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
	}

	return {
		// Public functions
		init: function () {
			form = KTModalCreateProject.getForm();
			stepper = KTModalCreateProject.getStepperObj();
			nextButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element="type-next"]');

			initValidation();
			handleForm();
		}
	};
}();

// Webpack support
if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
	module.exports = KTModalCreateProjectType;
}
