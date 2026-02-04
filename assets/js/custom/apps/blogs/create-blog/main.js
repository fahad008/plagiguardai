"use strict";

// Class definition
var KTModalCreateProject = function () {
	// Private variables
	var stepper;
	var stepperObj;
	var form;	

	// Private functions
	var initStepper = function (step=1) {
		// Initialize Stepper
		stepperObj = new KTStepper(stepper);

		stepperObj.goTo(step);
	}

	return {
		// Public functions
		init: function (step=1) {
			stepper = document.querySelector('#kt_modal_create_project_stepper');
			form = document.querySelector('#kt_modal_create_project_form');

			initStepper(step);
		},

		getStepperObj: function () {
			return stepperObj;
		},

		getStepper: function () {
			return stepper;
		},
		
		getForm: function () {
			return form;
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	if (!document.querySelector('#kt_modal_create_blog')) {
		return;
	}
	if (!document.querySelector('#kt_modal_create_project_stepper')) { 
		return;
 	}

	KTModalCreateProject.init(1);
	KTModalCreateProjectType.init();
	KTModalCreateProjectSettings.init();
	KTModalCreateProjectTargets.init();
	KTModalCreateProjectFiles.init();
	KTModalCreateProjectComplete.init();
});

// Webpack support
if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
	module.exports = KTModalCreateProject;
}
