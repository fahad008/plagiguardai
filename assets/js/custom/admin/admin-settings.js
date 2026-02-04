"use strict";

// Class definition
var KTPlagiSettings = function () {
    // Private variables
    var form;
    var submitButton;
    var validation;

    // Private functions
    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    min_words: {
                        validators: {
                            notEmpty: {
                                message: 'Minimum Words is required'
                            },
                            integer: {
                                message: 'Only positive whole numbers are allowed'
                            },
                            greaterThan: {
                                min: 100,
                                inclusive: true,
                                message: 'Value must be at least 100'
                            },
                            lessThan: {
                                max: 5999,
                                inclusive: true,
                                message: 'Value must not exceed 5999'
                            }
                        }
                    },
                    max_words: {
                        validators: {
                            notEmpty: {
                                message: 'Maximum Words is required'
                            },
                            integer: {
                                message: 'Only positive whole numbers are allowed'
                            },
                            greaterThan: {
                                min: 100,
                                inclusive: true,
                                message: 'Value must be at least 100'
                            },
                            lessThan: {
                                max: 6000,
                                inclusive: true,
                                message: 'Value must not exceed 6000'
                            }
                        }
                    },
                    block_length: {
                        validators: {
                            notEmpty: {
                                message: 'Block Length is required'
                            },
                            integer: {
                                message: 'Only positive whole numbers are allowed'
                            },
                            greaterThan: {
                                min: 1,
                                inclusive: false,
                                message: 'Block length must be greater than 0'
                            }
                        }
                    },
                    credits_per_block: {
                        validators: {
                            notEmpty: {
                                message: 'Credits Per Block is required'
                            },
                            integer: {
                                message: 'Only positive whole numbers are allowed'
                            },
                            greaterThan: {
                                min: 1,
                                inclusive: true,
                                message: 'Credits Per Block must be greater than 0'
                            },
                            lessThan: {
                                max: 10,
                                inclusive: true,
                                message: 'Credits Per Block must not exceed 10'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
    }

    var handleForm = function () {
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validation.validate().then(function (status) {
                if (status == 'Valid') {
                    var formData = new FormData(form);
                    $.ajax({
                        url: form.getAttribute('action'),
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        contentType: false, 
                        processData: false,
                        cache: false,
                        success: function (response) {
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;

                            if (response.status === 'success') {
                                Swal.fire({
                                    text: response.message,
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1000,
                                    timerProgressBar: true
                                });

                                setTimeout(function () {
                                    location.reload();
                                }, 500);

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
                        }
                    });

                } else {
                    swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }

    // Public methods
    return {
        init: function () {
            form = document.getElementById('kt_plagi_settings_form');
            submitButton = form.querySelector('#kt_plagi_settings_submit');

            initValidation();
            handleForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTPlagiSettings.init();
});
