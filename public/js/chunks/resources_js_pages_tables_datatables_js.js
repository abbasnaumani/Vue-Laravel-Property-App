(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_tables_datatables_js"],{

/***/ "./resources/js/pages/tables_datatables.js":
/*!*************************************************!*\
  !*** ./resources/js/pages/tables_datatables.js ***!
  \*************************************************/
/***/ (() => {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/*
 *  Document   : tables_datatables.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Plugin Init Example Page
 */
// DataTables, for more examples you can check out https://www.datatables.net/
var pageTablesDatatables = /*#__PURE__*/function () {
  function pageTablesDatatables() {
    _classCallCheck(this, pageTablesDatatables);
  }

  _createClass(pageTablesDatatables, null, [{
    key: "initDataTables",
    value:
    /*
     * Init DataTables functionality
     *
     */
    function initDataTables() {
      // Override a few default classes
      jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4",
        sFilterInput: "form-control form-control-sm",
        sLengthSelect: "form-control form-control-sm"
      }); // Override a few defaults

      jQuery.extend(true, jQuery.fn.dataTable.defaults, {
        language: {
          lengthMenu: "_MENU_",
          search: "_INPUT_",
          searchPlaceholder: "Search..",
          info: "Page <strong>_PAGE_</strong> of <strong>_PAGES_</strong>",
          paginate: {
            first: '<i class="fa fa-angle-double-left"></i>',
            previous: '<i class="fa fa-angle-left"></i>',
            next: '<i class="fa fa-angle-right"></i>',
            last: '<i class="fa fa-angle-double-right"></i>'
          }
        }
      }); // Init full DataTable

      jQuery('.js-dataTable-full').dataTable({
        pageLength: 5,
        lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
        autoWidth: false
      }); // Init DataTable with Buttons

      jQuery('.js-dataTable-buttons').dataTable({
        pageLength: 5,
        lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
        autoWidth: false,
        buttons: [{
          extend: 'copy',
          className: 'btn btn-sm btn-primary'
        }, {
          extend: 'csv',
          className: 'btn btn-sm btn-primary'
        }, {
          extend: 'print',
          className: 'btn btn-sm btn-primary'
        }],
        dom: "<'row'<'col-sm-12'<'text-center bg-body-light py-2 mb-2'B>>>" + "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
      });
    }
    /*
     * Init functionality
     *
     */

  }, {
    key: "init",
    value: function init() {
      this.initDataTables();
    }
  }]);

  return pageTablesDatatables;
}(); // Initialize when page loads


jQuery(function () {
  pageTablesDatatables.init();
});

/***/ })

}]);