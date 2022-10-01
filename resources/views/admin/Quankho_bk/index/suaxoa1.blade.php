<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" href="{{asset('vendors/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/css/select2-bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/tables.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/colReorder.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/rowReorder.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/scroller.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/tables.css') }}" />

<!--hiệu ứng các nút -->
<link rel="stylesheet" href="{{ asset('vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('vendors/hover/css/hover-min.css') }}" />
<link href="{{ asset('css/pages/transitions.css') }}" rel="stylesheet" />


<style>
#table1_filter {
    margin-bottom: 10px;
}
</style>

	<div class="row">
			<div class="col-md-12 col-lg-5 col-12 my-3">
				<div class="portlet box bg-danger text-white mb-4 card">
					<div class="portlet-title ">
						<div class="caption">
							<i class="livicon" data-name="warning" data-size="16" data-loop="true" data-c="#fff"
							data-hc="white" id="hvn"></i> Cảnh Báo
						</div>
						<span class="float-right">
							<i class="fa fa-chevron-up showhide clickable"></i>
							
						</span>
					</div>
					<div class="portlet-body bg-white p-2 card-body">
						<div class="table-scrollable">
							<!--Bảng cảnh báo-->
							<table class="table table-striped table-bordered width100" id="table3">
								<thead>
									<tr>
										<th >
											Tên Phòng
										</th>
										<th>Tên Hóa Chất</th>
										<th>Số Lô</th>
										<th>Số Lượng</th>
										<th>Ngày Hết Hạn</th>
										<th>Tình Trạng</th>
									</tr>
								</thead>
								<tbody> 
									<tr>
										<td>canhBao['phong']->ten_phong</td>
    									<td>canhBao['hoachat']->ten_hoa_chat</td>
    									<td>canhBao['lo']->so_lo</td>
    									<td>canhBao['suDung']->so_luong_hoa_chat_nhap_ve - $canhBao['suDung']->so_luong_su_dung</td>
    									<td>canhBao['lo']->han_su_dung}}</td>
    									<td>canhBao['tinhtrang']->loai_canh_bao}}</td>
									</tr>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-7 col-md-6 col-12 my-3">
				<div class="card ">
					<div class="card-header bg-primary text-white ">
						<span>
							<i class="livicon" data-name="barchart" data-size="16" data-loop="true" data-c="#fff"
							data-hc="#fff"></i> Hóa Chất
						</span>
						<span class="float-right">
							<i class="fa fa-chevron-up showhide clickable"></i>
							
						</span>
					</div>
					<div class="card-body">
						<div class="app">
						{{ $line->container() }}
						{{ $line->script() }}
						</div>
					</div>
					<div>

					</div>
				</div>
			</div>
	</div>

<script src="{{ asset('vendors/highcharts/highcharts.js') }}" charset="utf-8"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.responsive.js') }}"></script>
<!--<script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.bootstrap4.js')}}"></script>-->
<script type="text/javascript" src="{{ asset('vendors/select2/js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pages/table-advanced2.js') }}"></script>
<script src="{{ asset('vendors/frappe/frappe-charts.min.iife.js') }}"></script>
<script src="{{ asset('vendors/chartjs/js/Chart.js') }}" charset="utf-8"></script>
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

