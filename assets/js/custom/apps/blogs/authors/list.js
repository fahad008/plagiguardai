"use strict";

// Class definition
var KTAuthorsList = function () {
    // init variables
    var showMoreButton = document.getElementById('kt_authors_show_more_button');
    var showMoreCards = document.getElementById('kt_authors_show_more_cards');
    var offset = 0;
    var limit = 6;
    var ajaxUrl = $('#ajax-action').val();
    // Private functions
    var handleShowMore = function () {
        // Show more click
        showMoreButton.addEventListener('click', function (e) {
            showMoreButton.setAttribute('data-kt-indicator', 'on');

            // Disable button to avoid multiple click 
            showMoreButton.disabled = true;

            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: { offset: offset, limit: limit },
                dataType: 'json',
                success: function (response) {
                    offset += limit;
                    if (response.status === 'success') {
                        $("#kt_authors_show_more_cards").append(response.html);
                        // Hide loading indication
                        showMoreButton.removeAttribute('data-kt-indicator');

                        // Enable button
                        showMoreButton.disabled = false;

                        if (!response.has_more) {
                            showMoreButton.classList.add('d-none');
                        }else{
                            showMoreButton.classList.remove('d-none');
                        }

                    } else {
                        showMoreButton.classList.add('d-none');
                    }
                },
            });

        });
    }

    var showAuthors = function () {

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: { offset: offset, limit: limit },
            dataType: 'json',
            success: function (response) {
                offset += limit;
                if (response.status === 'success') {
                    $("#kt_authors_show_more_cards").append(response.html);
                    // Hide loading indication
                    showMoreButton.removeAttribute('data-kt-indicator');

                    // Enable button
                    showMoreButton.disabled = false;

                    if (!response.has_more) {
                        showMoreButton.classList.add('d-none');
                    }else{
                        showMoreButton.classList.remove('d-none');
                    }

                } else {
                    showMoreButton.classList.add('d-none');
                }
            },
        });

    }

    // Public methods
    return {
        init: function () {
            showAuthors();
            handleShowMore();
        }
    }
}();


// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAuthorsList.init();
});