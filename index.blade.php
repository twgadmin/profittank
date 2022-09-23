@extends('admin.layouts.app')

@section('css')
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{!! URL::to('assets/admin/plugins/select2/select2.css') !!}"/>
<link rel="stylesheet" type="text/css" href="{!! URL::to('assets/admin/plugins/select2/select2-metronic.css') !!}"/>
<link rel="stylesheet" href="{!! URL::to('assets/admin/plugins/data-tables/DT_bootstrap.css') !!}"/>
<!-- END PAGE LEVEL STYLES -->
@stop

@section('content')
<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">Look Reports List <small></small></h3>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- Action buttons Code Start -->
        <div class="row">
            <div class="col-md-12">
                <!-- Add New Button Code Moved Here -->
                <div class="table-toolbar pull-right">
                    <div class="btn-group">
                        <a href="{!! URL::route('admin.look-reports.create') !!}" id="sample_editable_1_new" class="btn blue">
                            Add <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <!-- Add New Button Code Moved Here -->
            </div>
        </div>
        <!-- Action buttons Code End -->

        @include('admin.partials.errors')

        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">

            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-th"></i> Look Reports List
                </div>
            </div>

            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th>Look</th>
                            <th>Reported By</th>
                            <th>Reported On</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $key => $report)
                            <tr class="odd gradeX">
                                <td>{!! $report->look_id !!}</td>                              
                                <td>{!! $report->user_id !!}</td>
                                <td>{!! $report->created_at !!}</td>

                                <td class="center text-center">
                                   <!--  <a href="{!! URL::route('admin.look-categories.show', $category->id) !!}" class="btn btn-xs blue" title="Show Record">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a class="btn btn-xs green" href="{!! URL::route('admin.look-categories.edit', $category->id) !!}" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-xs red" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Record" onclick="setRecordId({!! $category->id !!})" title="Delete Record">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <form action="{!! URL::route('admin.look-categories.destroy', $category->id) !!}" method="POST" id="deleteForm{!! $category->id !!}">
                                        @csrf
                                        @method('DELETE')
                                    </form> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->
@stop

@section('footer-js')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{!! URL::to('assets/admin/plugins/select2/select2.min.js') !!}"></script>
<script type="text/javascript" src="{!! URL::to('assets/admin/plugins/data-tables/jquery.dataTables.js') !!}"></script>
<script type="text/javascript" src="{!! URL::to('assets/admin/plugins/data-tables/DT_bootstrap.js') !!}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{!! URL::to('assets/admin/scripts/core/app.js') !!}"></script>

<script>
var TableManaged = function () {

    return {

        //main function to initiate the module
        init: function () {
            
            if (!jQuery().dataTable) {
                return;
            }

            // begin first table
            $('#sample_1').dataTable({
                "aoColumns": [
                  null,
                  null,
                  null,
                  null,                  
                  { "bSortable": false }
                ],
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [
                    /*
                    { 'bSortable': false, 'aTargets': [0] },
                    { "bSearchable": false, "aTargets": [ 0 ] }
                    */
                ]
            });

            jQuery('#sample_1 .group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).attr("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }                    
                });
                jQuery.uniform.update(set);
            });

            jQuery('#sample_1').on('change', 'tbody tr .checkboxes', function(){
                 $(this).parents('tr').toggleClass("active");
            });

            jQuery('#sample_1_wrapper .dataTables_filter input').addClass("form-control input-medium input-inline"); // modify table search input
            jQuery('#sample_1_wrapper .dataTables_length select').addClass("form-control input-xsmall"); // modify table per page dropdown
            //jQuery('#sample_1_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
        }
    };

}();
</script>

<script>
jQuery(document).ready(function() {
   App.init();
   Admin.init();
   TableManaged.init();
});
var setRecordId = function(id) {
    jQuery(document).ready(function() {
        jQuery('#deleteButton').attr('onclick', 'document.getElementById(\'deleteForm'+id+'\').submit()')
    });
};
</script>
@stop