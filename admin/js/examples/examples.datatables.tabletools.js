/*
 Name: 			Tables / Advanced - Examples
 Written by: 	Okler Themes - (http://www.okler.net)
 Theme Version: 	2.0.0
 */

(function ($) {

    'use strict';

    var datatableInit = function () {
        var $table = $('#datatable-tabletools');

        //var table = $table.dataTable({
        //	sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
        //	buttons: [ 'print', 'excel', 'pdf' ]
        //});

        $('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools_wrapper');

        $table.DataTable().buttons().container().prependTo('#datatable-tabletools_wrapper .dt-buttons');

        $('#datatable-tabletools_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
    };

    $(function () {
        datatableInit();
    });

    var datatableInit1 = function () {
        var $table = $('#datatable-tabletools1');

        //var table = $table.dataTable({
        //    sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
        //    buttons: [ 'print', 'excel', 'pdf' ]
        //});

        $('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools_wrapper');

        $table.DataTable().buttons().container().prependTo('#datatable-tabletools_wrapper .dt-buttons');

        $('#datatable-tabletools_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
    };
    $(function () {
        datatableInit1();
    });

    var datatableInit2 = function () {
        var $table = $('#datatable-tabletools2');

        //var table = $table.dataTable({
        //    sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
        //    buttons: [ 'print', 'excel', 'pdf' ]
        //});

        $('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools_wrapper');

        $table.DataTable().buttons().container().prependTo('#datatable-tabletools_wrapper .dt-buttons');

        $('#datatable-tabletools_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
    };
    $(function () {
        datatableInit2();
    });

    var datatableInit3 = function () {
        var $table = $('#datatable-tabletools3');

        //var table = $table.dataTable({
        //    sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
        //    buttons: [ 'print', 'excel', 'pdf' ]
        //});

        $('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools_wrapper');

        $table.DataTable().buttons().container().prependTo('#datatable-tabletools_wrapper .dt-buttons');

        $('#datatable-tabletools_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
    };
    $(function () {
        datatableInit3();
    });

}).apply(this, [jQuery]);
