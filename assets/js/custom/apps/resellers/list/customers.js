"use strict";

// Class definition
var KTCustomersList = function () {
    // Define shared variables
    var datatable;
    var filterMonth;
    var filterPayment;
    var table

    // Private functions
    var initCustomerList = function () {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');
        const tbody = table.querySelector('tbody');
        const ajaxUrl = tbody.dataset.action;
        // console.log(ajaxUrl);
        const resellerId = tbody.dataset.resellerid;

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            ajax: {
                url: ajaxUrl,
                type: 'POST',                   
                data: function(d) {
                    d.reseller_id = resellerId;
                }
            },
            columns: [
                { data: 'full_name', orderable: false, searchable: false  },
                { data: 'email', orderable: false, searchable: false  },
                { data: 'plan_type', orderable: false, searchable: false  },
                { data: 'email_verified', orderable: false, searchable: false },
                { data: 'created_at', orderable: false, searchable: false  },
            ],
            "info": false,
            order: [],
            columnDefs: [
                { targets: 0, orderable: false, searchable: false }
            ]

        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        datatable.on('draw', function () {
            KTMenu.createInstances();
        });
    }

    // Public methods
    return {
        init: function () {
            table = document.querySelector('#kt_table_reseller_customers');
            console.log(table);
            if (!table) {
                return;
            }

            initCustomerList();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCustomersList.init();
});