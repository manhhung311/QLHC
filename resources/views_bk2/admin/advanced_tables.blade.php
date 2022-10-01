@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Advanced Data Tables
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/colReorder.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/rowReorder.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/scroller.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/tables.css') }}" />

<style>
#table1_filter {
    margin-bottom: 10px;
}
</style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">

    <!--section starts-->
    <h1>Advanced Data Tables</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#">DataTables</a>
        </li>
        <li class="active ">Advanced Data Tables</li>
        

    </ol>
</section>
<!--section ends-->
<section class="content pl-3 pr-3">
    <div class="row">
        <div class="col-lg-12 my-3">
            <div class="card filterable">
                <div class="card-header bg-primary text-white clearfix  ">
                    <div class="float-left">
                        <div class="caption">
                            <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff"
                                data-hc="white"></i>
                            TableTools
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
                    <table class="table table-striped table-bordered" id="table1" width="100%">
                        <thead>
                            <tr>

                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>
                                    User E-mail
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td class="money">100000</td>
                                <td>Otto</td>
                                <td>Markotto</td>
                                <td>
                                    <input type="number" class="form-control" id="row-1-number" name="row-1-number"
                                    min="0">
                                </td>
                            </tr>
                            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- row-->

    <!-- Third Basic Table Ends Here-->
    <!--delete modal starts here-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">
                        Delete this entry
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <span class="fa fa-exclamation-triangle"></span>
                        Are you sure you want to delete this Record?
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning">
                        <span class="fa fa-check"></span>
                        Yes
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="fa fa-times"></span>
                        No
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal ends here -->
</section>
<!-- content -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/jeditable/js/jquery.jeditable.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.buttons.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.colReorder.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.responsive.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.rowReorder.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.colVis.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.html5.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.print.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.bootstrap4.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/pdfmake.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.scroller.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pages/table-advanced.js') }}"></script>


@stop