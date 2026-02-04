"use strict";

// Class definition
var KTModalCreateApiKey = function () {
	var submitButton;
	var cancelButton;
	var validator;
	var form;
	var modal;
	var modalEl;

	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'name': {
						validators: {
							notEmpty: {
								message: 'API name is required'
							}
						}
					},
					'api_key': {
						validators: {
							notEmpty: {
								message: 'API Key is required'
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

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click 
						submitButton.disabled = true;

						$.ajax({
                            url: form.getAttribute('action'),
                            type: 'POST',
                            data: $(form).serialize(),
                            dataType: 'json',
                            success: function (response) {

                                if (response.status === 'success') {

                                    submitButton.removeAttribute('data-kt-indicator');

									// Enable button
									submitButton.disabled = false;
									
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
											modal.hide();
											location.reload();
										}
									});

                                } else {

                                	submitButton.removeAttribute('data-kt-indicator');

									// Enable button
									submitButton.disabled = false;
                                    
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
  						
					} else {
						// Show error popuo. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
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

		cancelButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Show confirmation popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form	
					modal.hide(); // Hide modal				
				} else if (result.dismiss === 'cancel') {
					// Show success message. 
					Swal.fire({
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_create_api_key');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#kt_modal_create_api_key_form');
			submitButton = document.getElementById('kt_modal_create_api_key_submit');
			cancelButton = document.getElementById('kt_modal_create_api_key_cancel');

			handleForm();
		}
	};
}();

// On document ready
// KTUtil.onDOMContentLoaded(function () {
// 	KTModalCreateApiKey.init();
// });