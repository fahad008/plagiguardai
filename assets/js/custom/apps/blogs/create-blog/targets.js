"use strict";

// Class definition
var KTModalCreateProjectTargets = function () {
	// Variables
	var nextButton;
	var previousButton;
	var validator;
	var form;
	var stepper;

	// Private functions
	var initForm = function() {
		// Tags. For more info, please visit the official plugin site: https://yaireo.github.io/tagify/
		var tags = new Tagify(form.querySelector('[name="target_tags"]'), {
			whitelist: [],
			maxTags: 5,
			dropdown: {
				maxItems: 10,           // <- mixumum allowed rendered suggestions
				enabled: 0,             // <- show suggestions on focus
				closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
			}
		});
		tags.on("change", function(){
			// Revalidate the field when an option is chosen
            validator.revalidateField('target_tags');
		});

		var meta_keywords = new Tagify(form.querySelector('[name="meta_keywords"]'), {
			whitelist: [],
			maxTags: 5,
			dropdown: {
				maxItems: 10,           // <- mixumum allowed rendered suggestions
				enabled: 0,             // <- show suggestions on focus
				closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
			}
		});
		meta_keywords.on("change", function(){
			// Revalidate the field when an option is chosen
            validator.revalidateField('meta_keywords');
		});
	}

	var initValidation = function() {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'meta_title': {
						validators: {
							notEmpty: {
								message: 'Meta Title is required'
							},
				            stringLength: {
				                min: 50,
				                max: 60,
				                message: 'Meta Title must be between 50 and 60 characters',
				                trim: true
				            }
						}
					},
					'meta_description': {
						validators: {
							notEmpty: {
								message: 'Meta Description is required'
							},
				            stringLength: {
				                min: 150,
				                max: 160,
				                message: 'Meta Title must be between 150 and 160 characters',
				                trim: true
				            }
						}
					},
					'meta_keywords': {
						validators: {
							notEmpty: {
								message: 'Meta Keywords are required'
							}
						}
					},
					'target_tags': {
						validators: {
							notEmpty: {
								message: 'Target tags are required'
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
						// Show loading indication
						// nextButton.setAttribute('data-kt-indicator', 'on');

						var post_url = $('#save_seo').val();

							console.log(post_url);

							$.ajax({
		                        url: post_url,
		                        type: 'POST',
		                        data: $(form).serialize(),
		                        dataType: 'json',
		                        success: function (response) {

		                            if (response.post_id != '') {
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
			nextButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element="targets-next"]');
			previousButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element="targets-previous"]');

			initForm();
			initValidation();
			handleForm();
		}
	};
}();

// Webpack support
if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
	module.exports = KTModalCreateProjectTargets;
}