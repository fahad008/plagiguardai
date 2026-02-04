"use strict";

// Class definition
var KTModalNewTitle = function () {
	var submitButton;
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
					'title': {
						validators: {
							notEmpty: {
								message: 'Title is required.'
							},
							stringLength: {
		                        min: 5,  
		                        max: 100,  
		                        message: 'Title must be between 5 and 100 characters long.'
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
	                            	$("#scan-id-input").val('');
	                            	$("#scan-title-modal-input").val('');
	                            	$(response.row_title_id).text(response.new_title);
	                            	modal.hide();
	                                Swal.fire({
	                                    text: response.message,
	                                    icon: "success",
	                                    showConfirmButton: false,
	                                    timer: 1000,
	                                    timerProgressBar: true
	                                });
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

	                            setTimeout(function() {
									submitButton.removeAttribute('data-kt-indicator');

									submitButton.disabled = false;
								}, 100);  
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
			// Elements
			modalEl = document.querySelector('.kt_modal_new_title');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#kt_modal_new_title_form');
			submitButton = document.getElementById('kt_modal_new_title_submit');

			// initForm();
			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModalNewTitle.init();
});