"use strict";

var KTCategoryList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_category');
    var datatable;
    var toolbarBase;
    var toolbarSelected;
    var selectedCount;

    // Private functions
    var initCategoryTable = function () {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');
        const tbody = table.querySelector('tbody');
        const ajaxUrl = tbody.dataset.action;
        console.log(ajaxUrl);
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            ajax: {
                url: ajaxUrl, // your PHP endpoint
                type: 'POST',                      // usually POST
                data: function(d) {
                    // optional: send extra filter parameters
                    // d.role_id = document.querySelector('[name="role_id"]')?.value || '';
                }
            },
            columns: [
                { data: 'name', orderable: false },
                { data: 'slug', orderable: false },
                { data: 'status', orderable: false },
                { data: 'created_by', orderable: false, searchable: false },
                { data: 'created_at', orderable: false, searchable: false },
                { data: 'actions', orderable: false, searchable: false }
            ],
            "info": false,
            order: [],
            columnDefs: [
                { targets: 0, orderable: false, searchable: false }
            ]

        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-user-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }


    return {
        // Public functions  
        init: function () {
            if (!table) {
                return;
            }

            initCategoryTable();
            handleSearchDatatable();

        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCategoryList.init();
});