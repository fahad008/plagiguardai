"use strict";

// Class definition
var KTUsersViewRole = function () {
    // Shared variables
    var datatable;
    var table;

    // Init add schedule modal
    var initViewRole = () => {

        const tbody = table.querySelector('tbody');
        const ajaxUrl = tbody.dataset.action;
        const role_id = tbody.dataset.role_id;

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
                    d.role_id = role_id;
                    // optional: send extra filter parameters
                }
            },
            columns: [
                { data: 'member', orderable: false },
                { data: 'created_at', orderable: false },
                { data: 'actions', orderable: false }
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
        const filterSearch = document.querySelector('[data-kt-roles-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    return {
        // Public functions
        init: function () {
            table = document.querySelector('#kt_roles_view_table');
            
            if (!table) {
                return;
            }

            initViewRole();
            handleSearchDatatable();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersViewRole.init();
});