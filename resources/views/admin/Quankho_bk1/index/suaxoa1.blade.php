@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Simple Charts
@parent
@stop

{{-- page level styles --}}
@section('header_styles')


@stop

{{-- Page content --}}
@section('content')

<section class="content pr-3 pl-3">
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
										<td></td>
    									<td></td>
    									<td></td>
    									<td></td>
    									<td></td>
    									<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-7 col-md-6 col-12 my-3" id="bieudo">
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
						<div class="app" id="loadbieudo">
						{{ $line->container() }}
						</div>
					</div>
					<div>

					</div>
				</div>
			</div>
	</div>
</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('vendors/frappe/frappe-charts.min.iife.js') }}"></script>
<script src="{{ asset('vendors/highcharts/highcharts.js') }}" charset="utf-8"></script>
{!! $line->script() !!}
@stop