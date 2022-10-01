@extends('admin/layouts/horizontal')

{{-- Page title --}}
@section('title')
@lang('arisi/tipo_intervento/title.label')
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
    <h1>@lang('arisi/tipo_intervento/title.label')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                @lang('arisi/tipo_intervento/title.label')
            </a>
        </li>        
    </ol>
</section>

<!-- Main content -->
<section class="content pl-3 pr-3">
    <div class="row">        
        <div class="col-12">
        <div class="card ">
            <div class="card-header bg-primary text-white" style="height: 70px;">
                <h4>@lang('arisi/tipo_intervento/title.label')</h4>
            </div>

            <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">                
                <button class="btn btn-sm btn-success" id="btn_new" style="margin-top: 5px;margin-bottom: 10px;">@lang('arisi/tipo_intervento/title.new')</button>
                <br/>
                <table class="table table-striped table-bordered" id="table" width="100%">
                    <thead>
                     <tr>
                        <th >@lang('arisi/tipo_intervento/title.id')</th>
                        <th >@lang('arisi/tipo_intervento/title.descrizione')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_sto_cli')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_app_cli')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_cli')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_sto_ma')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_app_man')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_man')</th>
                        <th style="width: 20%;"></th>
                     </tr>
                    </thead>
                    <tbody>  
                    </tbody>
                    <tfoot>
                     <tr>
                        <th >@lang('arisi/tipo_intervento/title.id')</th>
                        <th >@lang('arisi/tipo_intervento/title.descrizione')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_sto_cli')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_app_cli')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_cli')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_sto_ma')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_app_man')</th>
                        <th >@lang('arisi/tipo_intervento/title.in_att_man')</th>
                        <th style="width: 20%;"></th>  
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
                <h4 class="modal-title" id="editlabel">@lang('arisi/tipo_intervento/title.edit')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/tipo_intervento/title.id')</label>
                        <div class="col-sm-10">
                            <input id="in_id" type="number" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/tipo_intervento/title.descrizione')</label>
                        <div class="col-sm-10">
                            <input id="in_nome" type="text" class="form-control" />
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/tipo_intervento/title.in_att_sto_cli')</label>
                        <div class="col-sm-4">
                            <input id="in_1" type="checkbox" class="form-control" />
                        </div>
                        <label class="col-sm-2 control-label">@lang('arisi/tipo_intervento/title.in_att_app_cli')</label>
                        <div class="col-sm-4">
                            <input id="in_2" type="checkbox" class="form-control" />
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/tipo_intervento/title.in_att_cli')</label>
                        <div class="col-sm-4">
                            <input id="in_3" type="checkbox" class="form-control" />
                        </div>
                        <label class="col-sm-2 control-label">@lang('arisi/tipo_intervento/title.in_att_sto_ma')</label>
                        <div class="col-sm-4">
                            <input id="in_4" type="checkbox" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/tipo_intervento/title.in_att_app_man')</label>
                        <div class="col-sm-4">
                            <input id="in_5" type="checkbox" class="form-control" />
                        </div>
                        <label class="col-sm-2 control-label">@lang('arisi/tipo_intervento/title.in_att_man')</label>
                        <div class="col-sm-4">
                            <input id="in_6" type="checkbox" class="form-control" />
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
                <h4 class="modal-title" id="deleteLabel">@lang('arisi/tipo_intervento/title.delete')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="div_show_del">
                @lang('arisi/tipo_intervento/message.confirm.delete')
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
        $('#editlabel').html("@lang('arisi/tipo_intervento/title.edit')");        
        $.ajax({
            url: "{{route('admin.tipo_intervento.data')}}?in_id=" + id,
            type: 'GET',                
            error: function(err) {
                console.log(err);
                alert("@lang('arisi/tipo_intervento/message.error.store')");
            },
            success: function(data) {                        
                if(data != null){
                    type = 2;
                    $('#id_edit').val(id);
                    $('#in_id').val(data.in_id);
                    $('#in_nome').val(data.in_nome);                    
                    $('#in_1').prop('checked', data.in_1 == 1 ? true : false);
                    $('#in_2').prop('checked', data.in_2 == 1 ? true : false);
                    $('#in_3').prop('checked', data.in_3 == 1 ? true : false);
                    $('#in_4').prop('checked', data.in_4 == 1 ? true : false);
                    $('#in_5').prop('checked', data.in_5 == 1 ? true : false);
                    $('#in_6').prop('checked', data.in_6 == 1 ? true : false);
                    $('#modal_edit').modal('toggle');
                }else{                        
                    alert("@lang('arisi/tipo_intervento/message.error.data')");
                }                    
            }
        });                                                                        
    }

    function update_annullato(id,index,value){
        var gt = value ? 1 : 0;
        $.ajax({
            url: "{{route('admin.tipo_intervento.update')}}",
            type: 'POST',
            data: {
                in_id : id,
                in_type : 0,
                value : gt,
                index : index,                
                _token : '{{csrf_token()}}',                
            },
            error: function(err) {
                alert("@lang('arisi/tipo_intervento/message.error.store')");
                table.ajax.reload();
            },
            success: function(data) {                        
                if(data == 0){                                              
                    alert("@lang('arisi/tipo_intervento/message.error.store')");
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
            ajax: "{!! route('admin.tipo_intervento.data') !!}",
            //order: [[ 6, "desc" ],[0, "asc"]],
            columns: [
                { data: 'in_id', name: 'in_id' },
                { data: 'in_nome', name: 'in_nome' },   
                { data: 'in_att_sto_cli', name: 'in_att_sto_cli', orderable: false, searchable: false },
                { data: 'in_att_app_cli', name: 'in_att_app_cli', orderable: false, searchable: false },             
                { data: 'in_att_cli', name: 'in_att_cli', orderable: false, searchable: false },
                { data: 'in_att_sto_ma', name: 'in_att_sto_ma', orderable: false, searchable: false },
                { data: 'in_att_app_man', name: 'in_att_app_man', orderable: false, searchable: false },
                { data: 'in_att_man', name: 'in_att_man', orderable: false, searchable: false },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ],            
            createdRow: function( row, data, dataIndex ) {
                //$('td', row).css('background-color', '#888888');                
            }
        });

        $('#btn_new').click(function(){
            type = 1;
            $('#editlabel').html("@lang('arisi/tipo_intervento/title.new')");
            $('#in_id').val("");
            $('#in_nome').val("");
            for(var i = 1;i < 7;i++){
                $('#in_' + i).prop('checked', false);
            }
            $('#modal_edit').modal('toggle');
        });

        $('#btn_save').click(function(){
            var id = $('#in_id').val();
            var nome = $('#in_nome').val();            
            $.ajax({
                url: "{{route('admin.tipo_intervento.update')}}",
                type: 'POST',
                data: {
                    in_id : id,
                    in_cur_id : $('#id_edit').val(),
                    in_nome : nome,
                    in_1 : $('#in_1').is(":checked") ? 1 : 0,
                    in_2 : $('#in_2').is(":checked") ? 1 : 0,
                    in_3 : $('#in_3').is(":checked") ? 1 : 0,
                    in_4 : $('#in_4').is(":checked") ? 1 : 0,
                    in_5 : $('#in_5').is(":checked") ? 1 : 0,
                    in_6 : $('#in_6').is(":checked") ? 1 : 0,
                    in_type : type,
                    _token : '{{csrf_token()}}',                
                },
                error: function(err) {
                    alert("@lang('arisi/tipo_intervento/message.error.store')");
                },
                success: function(data) {                        
                    if(data > 0){                        
                        alert("@lang('arisi/tipo_intervento/message.success.store')");
                        $('#modal_edit').modal('hide');
                        table.ajax.reload();
                    }else if(data == 0){                        
                        alert("@lang('arisi/tipo_intervento/message.error.store')");
                    }else{
                        alert("@lang('arisi/tipo_intervento/message.error.duplicate_id')");
                    }                    
                }
            });
        });

        $('#btn_delete').click(function(){
            $.ajax({
                url: "{{route('admin.tipo_intervento.delete')}}",
                type: 'POST',
                data: {
                    in_id : $('#id_del').val(),
                    _token : '{{csrf_token()}}',                
                },
                error: function(err) {
                    alert("@lang('arisi/tipo_intervento/message.error.store')");
                    $('#modal_delete').modal('hide');
                },
                success: function(data) {                        
                    if(data > 0){
                        alert("@lang('arisi/tipo_intervento/message.success.delete')");
                        table.ajax.reload();
                    }else{                        
                        alert("@lang('arisi/tipo_intervento/message.error.store')");
                    }   
                    $('#modal_delete').modal('hide');                 
                }
            });
        });
    });
    
</script>   
@stop
