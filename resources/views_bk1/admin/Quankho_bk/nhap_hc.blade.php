@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Phân Hóa Chất
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
<link type="text/css" href="{{ asset('vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}"
    rel="stylesheet" />
<link href="{{ asset('vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/selectize/css/selectize.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/bootstrap-switch/css/bootstrap-switch.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/switchery/css/switchery.css') }}" rel="stylesheet" />
<link href="{{ asset('css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/pickadate/css/default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/pickadate/css/default.date.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/pickadate/css/default.time.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/airDatepicker/css/datepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/flatpickr/css/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/pages/adv_date_pickers.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" href="{{asset('vendors/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/css/select2-bootstrap.css') }}" />
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
    <h1>Quản Lý Hóa Chất</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                Trang Chủ
            </a>
        </li>
        <li>
            <a href="#">Phân Hóa Chất</a>
        </li>
    </ol>
</section>
<!--section ends-->
<section class="content pl-3 pr-3">

    <div class="row">
        <div class="col-lg-12 my-3">
            <div class="card filterable" style="overflow:auto;">
                <div class="card-header bg-success text-white clearfix  ">
                    <div class="float-left">
                        <button type="button" class="btn btn-sm btn-info">
                            <a href="1_them_hc">Thêm hoá chất mới</a>
                        </button>
                    </div>
                    <div class="float-right">

                        <button type="button" class="btn btn-warning btn-sm" id="">Nhập từ excel</button>
                        <button type="button" class="btn btn-primary btn-sm" id="addButton">Thêm dòng</button>
                        <button type="button" class="btn btn-danger btn-sm" id="delButton">Xoá dòng</button>
                    </div>
                </div>
                <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
                    <form class="form-horizontal" method="post"
                        action="http://localhost:8080/laravel/public/quankho/1_nhap_hc">
                        
                        <table class="table table-striped table-bordered" id="table3" width="100%">
                            <thead>
                                <tr>

                                    <th>STT</th>
                                    <th>Tên Hóa Chất</th>
                                    <th>Số Lô</th>
                                    <th>Đơn Vị Tính</th>
                                    <th>Nơi Sản Xuất-cung cấp</th>

                                    <th>Số Lượng Nhập Kho</th>
                                    <th>Ngày Hết Hạn</th>
                                </tr>
                            </thead>
                            <tbody>

                               


                            </tbody>
                        </table>
                        <div class="form-position">
                            <div class="row">
                                <div class="col-md-3 ">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info">
                                        <a href="1_phan_hc">Xuất Kho</a>
                                    </button>

                                    <!-- Modal -->

                                </div>
                            </div>
                        </div>
                        <div class="form-position">
                            <div class="row">
                                <div class="col-md-12  col-sm-12 col-12  col-lg-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.responsive.js') }}"></script>
<!--<script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.bootstrap4.js')}}"></script>-->
<script type="text/javascript" src="{{ asset('vendors/select2/js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pages/table-advanced2.js') }}"></script>
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
<script language="javascript" type="text/javascript"
    src="{{ asset('vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/select2/js/select2.js') }}"></script>

<script language="javascript" type="text/javascript" src="{{ asset('vendors/sifter/sifter.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/microplugin/microplugin.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/selectize/js/selectize.min.js') }}">
</script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript"
    src="{{ asset('vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript"
    src="{{ asset('vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/card/js/jquery.card.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('js/pages/custom_elements.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    var i = 0;
    //table tools example
    $('#table1').DataTable({
        dom: '<"m-t-10"B><"m-t-10 pull-left"f><"m-t-10 pull-right"l>rt<"pull-left m-t-10"i><"m-t-10 pull-right"p>',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    });

    // add row, delete row example
    var table3 = $('#table3').DataTable({
        order: [
            [0, 'desc']
        ],
        responsive: true,
    });
    //total number of existing rows
    var counter = 2;

    //row addition code

    $('#addButton').on('click', function() {
        i++;
        table3.row
            .add([
                counter,
                '<div class="form-group"><div class="input-group-append radius_left"><select id="select24" name="idDanh_muc_hoa_chat[' +
                i +
                ']" ><option value="">Select value...</option>@foreach($danhMucHoaChat as $dmhc) <option value="{{$dmhc->idDanh_muc_hoa_chat}}">{{$dmhc->ten_hoa_chat}}</option>@endforeach </select></div></div>',
                '<div class="form-group"><div class="input-group-append radius_left"><input type="number" name="so_lo[' +
                i + ']" size="1" id="row-1-DongGoi" ></div></div>',
                '<div class="form-group"><div class="input-group-append radius_left"><input type="number" name="so_luong_dong_goi[' +
                i + ']" size="1" id="row-1-DongGoi" ></div></div>',
                '<select size="1" id="row-1-name" name="idCong_ty_cung_ung[' + i +
                ']"><option value="">Select value...</option>@foreach($congTyCungUng as $ctcu)<option value="{{$ctcu->idCong_ty_cung_ung}}">{{$ctcu->ten_cong_ty_cung_ung}}--{{$ctcu->noi_san_xuat}}</option>@endforeach</select>',
                '<input type="text" class="form-control" id="row-1-number" name="so_luong[' + i +
                ']" value="30000">',
                '<div class="form-group"><div class="input-group"><input class="flatpickr flatpickr-input form-control" type="text" name="han_su_dung[' +
                i + ']" placeholder="Chọn ngày"></div></div>',

            ])
            .draw();
        counter++;
    });

    //row deletion code

    $('#table3 tbody').on('click', 'tr', function() {
        if ($(this).hasClass('danger')) {
            $(this).removeClass('danger');
        } else {
            table3.$('tr.danger').removeClass('danger');
            $(this).addClass('danger');
        }
    });

    $('#delButton').click(function() {
        if (!$('#table3 tr').hasClass('danger')) {
            alert('please select a row first');
            //exit;
        }
        table3
            .row('.danger')
            .remove()
            .draw(false);
    });
});
$('#sample_5').dataTable({
    scrollY: '200px',
    dom: 'frtiS',
    deferRender: true,
    responsive: true,
});
$(document).ready(function() {
    var oTable;
    /* Apply the jEditable handlers to the table */
    $('#inline_edit tbody td').editable(
        function(sValue) {
            /* Get the position of the current data from the node */
            var aPos = oTable.fnGetPosition(this);

            /* Get the data array for this row */
            var aData = oTable.fnGetData(aPos[0]);

            /* Update the data array and return the value */
            aData[aPos[1]] = sValue;
            return sValue;
        }, {
            onblur: 'submit'
        }
    );
    /* Submit the form when bluring a field */

    /* Init DataTables */
    oTable = $('#inline_edit').dataTable();
});
</script>
@stop