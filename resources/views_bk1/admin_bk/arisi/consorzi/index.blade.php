@extends('admin/layouts/horizontal')

{{-- Page title --}}
@section('title')
@lang('arisi/consorzi/title.label')
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link href="{{ asset('css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"
    type="text/css" />
<link rel="stylesheet" href="{{ asset('css/pages/jscharts.css') }}" />
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>@lang('arisi/consorzi/title.label')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                @lang('arisi/consorzi/title.label')
            </a>
        </li>        
    </ol>
</section>

<!-- Main content -->
<section class="content pl-3 pr-3">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
        <div class="card ">
            <div class="card-header bg-primary text-white" style="height: 70px;">
                <h4>@lang('arisi/consorzi/title.label')</h4>
            </div>

            <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">                
                <button class="btn btn-sm btn-success" id="btn_new" style="margin-top: 5px;margin-bottom: 10px;">@lang('arisi/consorzi/title.new')</button>
                <br/>
                <table class="table table-striped table-bordered" id="table" width="100%">
                    <thead>
                     <tr>
                        <th >@lang('arisi/consorzi/title.id')</th>
                        <th >@lang('arisi/consorzi/title.descrizione')</th>
                        <th >@lang('arisi/consorzi/title.annullato')</th>
                        <th style="width: 30%;"></th>
                     </tr>
                    </thead>
                    <tbody>  
                    </tbody>
                    <tfoot>
                     <tr>
                        <th >@lang('arisi/consorzi/title.id')</th>
                        <th >@lang('arisi/consorzi/title.descrizione')</th>
                        <th >@lang('arisi/consorzi/title.annullato')</th>   
                        <th style="width: 30%;"></th>  
                     </tr>
                    </tfoot>                    
                </table>
            </div>
        </div>
    </div>
    </div><!-- row-->
</section>
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editlabel">@lang('arisi/consorzi/title.edit')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/consorzi/title.id')</label>
                        <div class="col-sm-10">
                            <input id="co_id" type="number" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/consorzi/title.descrizione')</label>
                        <div class="col-sm-10">
                            <input id="co_nome" type="text" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/consorzi/title.annullato')</label>
                        <div class="col-sm-10">
                            <input id="co_annullato" type="checkbox" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('button.cancel')</button>
                <input type="hidden" id="id_edit" value="0">
                <button id="btn_save" class="btn btn-success">@lang('button.save')</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteLabel">@lang('arisi/consorzi/title.delete')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="div_show_del">
                @lang('arisi/consorzi/message.confirm.delete')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('button.cancel')</button>
                <input type="hidden" id="id_del" value="0">
                <button id="btn_delete" class="btn btn-danger">@lang('button.delete')</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>
    <script src="{{ asset('vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>    
    <script src="{{ asset('vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/chartjs/js/Chart.js') }}"></script>
<script>
    var type = 1;
    function delete_row(id){
        $('#id_del').val(id);
        $('#modal_delete').modal('toggle');
    }

    function edit_row(id){
        $('#editlabel').html("@lang('arisi/consorzi/title.edit')");        
        $.ajax({
            url: "{{route('admin.consorzi.data')}}?co_id=" + id,
            type: 'GET',                
            error: function(err) {
                console.log(err);
                alert("@lang('arisi/consorzi/message.error.store')");
            },
            success: function(data) {                        
                if(data != null){
                    type = 2;
                    $('#id_edit').val(id);
                    $('#co_id').val(data.co_id);
                    $('#co_nome').val(data.co_nome);
                    $('#co_annullato').prop('checked', data.co_annullato == 1 ? true : false);
                    $('#modal_edit').modal('toggle');
                }else{                        
                    alert("@lang('arisi/consorzi/message.error.data')");
                }                    
            }
        });                                                                        
    }

    function update_annullato(id,value){
        var gt = value ? 1 : 0;
        $.ajax({
            url: "{{route('admin.consorzi.update')}}",
            type: 'POST',
            data: {
                co_id : id,
                co_annullato : gt,
                co_type : 0,
                _token : '{{csrf_token()}}',                
            },
            error: function(err) {
                alert("@lang('arisi/consorzi/message.error.store')");
                table.ajax.reload();
            },
            success: function(data) {                        
                if(data == 0){                                              
                    alert("@lang('arisi/consorzi/message.error.store')");
                    table.ajax.reload();
                }                
            }
        });
    }        

    $(function() {        
        var table = $('#table').DataTable({
            responsive: true,
            processing: true,
            //serverSide: true,
            ajax: "{!! route('admin.consorzi.data') !!}",
            //order: [[ 6, "desc" ],[0, "asc"]],
            columns: [
                { data: 'co_id', name: 'co_id' },
                { data: 'co_nome', name: 'co_nome' },                
                { data: 'co_annullato', name: 'co_annullato', orderable: false, searchable: false },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ],            
            createdRow: function( row, data, dataIndex ) {
                //$('td', row).css('background-color', '#888888');                
            }
        });

        $('#btn_new').click(function(){
            type = 1;
            $('#editlabel').html("@lang('arisi/consorzi/title.new')");
            $('#co_id').val("");
            $('#co_nome').val("");
            $('#co_annullato').prop('checked', false);
            $('#modal_edit').modal('toggle');
        });

        $('#btn_save').click(function(){
            var id = $('#co_id').val();
            var nome = $('#co_nome').val();
            var check = $('#co_annullato').is(":checked") ? 1 : 0;
            $.ajax({
                url: "{{route('admin.consorzi.update')}}",
                type: 'POST',
                data: {
                    co_id : id,
                    co_cur_id : $('#id_edit').val(),
                    co_nome : nome,
                    co_annullato : check,
                    co_type : type,
                    _token : '{{csrf_token()}}',                
                },
                error: function(err) {
                    alert("@lang('arisi/consorzi/message.error.store')");
                },
                success: function(data) {                        
                    if(data > 0){                        
                        alert("@lang('arisi/consorzi/message.success.store')");
                        $('#modal_edit').modal('hide');
                        table.ajax.reload();
                    }else if(data == 0){                        
                        alert("@lang('arisi/consorzi/message.error.store')");
                    }else{
                        alert("@lang('arisi/consorzi/message.error.duplicate_id')");
                    }                    
                }
            });
        });

        $('#btn_delete').click(function(){
            $.ajax({
                url: "{{route('admin.consorzi.delete')}}",
                type: 'POST',
                data: {
                    co_id : $('#id_del').val(),
                    _token : '{{csrf_token()}}',                
                },
                error: function(err) {
                    alert("@lang('arisi/consorzi/message.error.store')");
                    $('#modal_delete').modal('hide');
                },
                success: function(data) {                        
                    if(data > 0){
                        alert("@lang('arisi/consorzi/message.success.delete')");
                        table.ajax.reload();
                    }else{                        
                        alert("@lang('arisi/consorzi/message.error.store')");
                    }   
                    $('#modal_delete').modal('hide');                 
                }
            });
        });
    });
    
</script>   
@stop
