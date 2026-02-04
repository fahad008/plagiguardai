"use strict";

// Class definition
var KTModalCustomerSelect = function() {
    // Private variables
    var element;
    var suggestionsElement;
    var resultsElement;
    var wrapperElement;
    var emptyElement;
    var selectedElement;
    var searchObject;
    
    var modal;

    // Private functions
    var processs = function(search) {
        
        var query = search.getQuery();

        if (query.length < 2) {
            clear(search);
            search.complete();
            return;
        }

        suggestionsElement.classList.add('d-none');

        var url = $("#form_two_action").val();
        $.ajax({
            url: url, // 🔁 change to your CI3 endpoint
            type: 'POST',
            dataType: 'json',
            data: {
                keyword: query
            },
            success: function(response) {

                if (response.status === 'success' && response.html !== '') {
                    // Inject results
                    resultsElement.innerHTML = response.html;

                    resultsElement.classList.remove('d-none');
                    emptyElement.classList.add('d-none');
                    selectedElement.classList.add('d-none');
                } else {
                    // No results found
                    resultsElement.classList.add('d-none');
                    emptyElement.classList.remove('d-none');
                    selectedElement.classList.add('d-none');
                    $("#reseller_id").val('');
                    $("#reseller_name").text('');
                }

                search.complete();
            }
        });

        // var timeout = setTimeout(function() {
        //     var number = KTUtil.getRandomInt(1, 6);

        //     // Hide recently viewed
        //     suggestionsElement.classList.add('d-none');

        //     if (number === 3) {
        //         // Hide results
        //         resultsElement.classList.add('d-none');
        //         // Show empty message 
        //         emptyElement.classList.remove('d-none');
        //     } else {
        //         // Show results
        //         resultsElement.classList.remove('d-none');
        //         // Hide empty message 
        //         emptyElement.classList.add('d-none');
        //     }                  

        //     // Complete search
        //     search.complete();
        // }, 1500);
    };

    var clear = function(search) {
        // Show recently viewed
        suggestionsElement.classList.remove('d-none');
        // Hide results
        resultsElement.classList.add('d-none');
        // Hide empty message 
        emptyElement.classList.add('d-none');

        selectedElement.classList.add('d-none');

        $("#reseller_id").val('');
        $("#reseller_name").text('');
    }    

    // Public methods
	return {
		init: function() {
            // Elements
            element = document.querySelector('#kt_modal_customer_search_handler');
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_offer_a_deal'));

            if (!element) {
                return;
            }

            wrapperElement = element.querySelector('[data-kt-search-element="wrapper"]');
            suggestionsElement = element.querySelector('[data-kt-search-element="suggestions"]');
            resultsElement = element.querySelector('[data-kt-search-element="results"]');
            emptyElement = element.querySelector('[data-kt-search-element="empty"]');
            selectedElement = element.querySelector('[data-kt-search-element="selected"]');
            
            // Initialize search handler
            searchObject = new KTSearch(element);

            // Search handler
            searchObject.on('kt.search.process', processs);

            // Clear handler
            searchObject.on('kt.search.clear', clear);

            // Handle select
            KTUtil.on(element, '[data-kt-search-element="customer"]', 'click', function() {
                const resellerId   = this.getAttribute('data-reseller-id');
                const resellerName = this.getAttribute('data-reseller-name');
                $("#reseller_id").val(resellerId);
                $("#reseller_name").text(resellerName);
                resultsElement.classList.add('d-none');
                suggestionsElement.classList.add('d-none');
                selectedElement.classList.remove('d-none');
                // modal.hide();
            });
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalCustomerSelect.init();
});