@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Thống kê
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

<link rel="stylesheet" href="{{ asset('vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('vendors/hover/css/hover-min.css') }}" />
<link href="{{ asset('css/pages/transitions.css') }}" rel="stylesheet" />

<!---Date--->
<link href="{{ asset('vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
<style>
    .ranges li.active {
        color: #fff !important;
    }
</style>

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
    <h1>Quản Lí Hóa Chất</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                Trang Chủ
            </a>
        </li>
        <li>
            <a href="#">Thống Kê Mức Độ Sử Dụng</a>
        </li>
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
                            Danh Sách Hóa Chất
                        </div>
                    </div>
                    <!--Load table theo ajax ở dưới -->
                    <div class="float-right">
                        
                        
                            <label for="select1">Chong Phòng</label>
                            <select class="form-control" id="select1">
                                <option class="btn_table_1">Phòng A</option>
                                <option class="btn_table_1">Phòng B</option>
                                <option id="optionsRadios3">Phòng C</option>
                            </select>
                        
                    </div>
                </div>
                <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md" id="myDataTable">
                    <div class="form-group">
                        <label>
                            Predefined Range:
                        </label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text"> <i class="livicon" data-name="phone" data-size="16"
                                        data-c="#555555" data-hc="#555555" data-loop="true"></i></span>
                            </div>
                            <input type="text" class="form-control" id="daterange3" />
                        </div>
                    </div>
                    <div class="float-right">                       
                        <button type="button" class="btn btn-primary btn-sm hvr-wobble-vertical"
                            value="gửi">Xuất File Excel</button>
                    </div>
                    <table class="table table-striped table-bordered" id="table2_table2" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Hóa Chất</th>
                                <th>Đơn Vị Tính</th>
                                <th>Số Lượng Sử Dụng</th>  
                                <th>Tồn Kho Hiện Tại</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- row-->

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

<!---date-->
<script src="{{ asset('vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/datepicker.js') }}" type="text/javascript"></script>

<!--ajax-->
<script type="text/javascript" >
    var table = $('#table2_table2').DataTable ( { 
        "language": {
            "emptyTable": "Không có bản ghi phù hợp",
            "sLengthMenu": "Hiển thị _MENU_ bản ghi",
            "search": "Tìm kiếm:",
            "info": "Đang hiển thị trang _START_ của _END_ trong số _TOTAL_ mục",
            "paginate": {
                "previous": "Trang trước",
                "next": "Trang sau"
            }
        },
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
        ajax : {
            url:'{{ asset("1_data_hc.txt") }}',
            dataSrc: 'data',
        },
        columns: [
            { data: '#', title: 'STT'},
            { data: 'FirstName' , title: 'Tên Hóa Chất'},
            { data: 'LastName', title: 'Đơn Vị Tính' },
            { data: 'UserE-mail', title: 'Số Lượng Sử Dụng' },
            { data: 'contact', title: 'Tồn Kho Hiện Tại' },
        ],
    });

    $(".btn_table_1").on("click",function() {
        $('#table1_wrapper').remove();
        $('#myDataTable').append(
            '<table class="table table-striped table-bordered" id="table1" width="100%"></table>'
        );
        var route_1 = '{{ asset("2_data_hc.txt") }}';
        table.ajax.url( route_1 ).load();
    })
    $(".btn_table_2").click(function() {
        $('#table1_wrapper').remove();
        $('#myDataTable').append(
            '<table class="table table-striped table-bordered" id="table1" width="100%"></table>'
        );
        var route_1 = '{{ asset("2_data_hc.txt") }}';
        table.ajax.url( route_1 ).load();
    })
    
</script>


@stop