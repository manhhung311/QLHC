@extends('admin/layouts/horizontal')

{{-- Page title --}}
@section('title')
@lang('arisi/trasportatori/title.label')
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
<style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>@lang('arisi/trasportatori/title.label')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                @lang('arisi/trasportatori/title.label')
            </a>
        </li>        
    </ol>
</section>

<!-- Main content -->
<section class="content pl-3 pr-3">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
        <div class="card ">
            <div class="card-header bg-primary text-white" style="height: 70px;">
                <h4>@lang('arisi/trasportatori/title.label')</h4>
            </div>

            <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">                
                <button class="btn btn-sm btn-success" id="btn_new" style="margin-top: 5px;margin-bottom: 10px;">@lang('arisi/trasportatori/title.new')</button>
                <br/>
                <table class="table table-striped table-bordered" id="table" width="100%">
                    <thead>
                     <tr>
                        <th >@lang('arisi/trasportatori/title.ve_id')</th>
                        <th >@lang('arisi/trasportatori/title.ve_nome')</th>
                        <th >@lang('arisi/trasportatori/title.ve_descrizione')</th>
                        <th >@lang('arisi/trasportatori/title.ve_indirizzo')</th>
                        <th style="width: 25%;"></th>
                     </tr>
                    </thead>
                    <tbody>  
                    </tbody>
                    <tfoot>
                     <tr>
                        <th >@lang('arisi/trasportatori/title.ve_id')</th>
                        <th >@lang('arisi/trasportatori/title.ve_nome')</th>
                        <th >@lang('arisi/trasportatori/title.ve_descrizione')</th>
                        <th >@lang('arisi/trasportatori/title.ve_indirizzo')</th>
                        <th style="width: 25%;"></th>  
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
                <h4 class="modal-title" id="editlabel">@lang('arisi/trasportatori/title.edit')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/trasportatori/title.ve_id')</label>
                        <div class="col-sm-10">
                            <input id="ve_id" type="number" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/trasportatori/title.ve_nome')</label>
                        <div class="col-sm-10">
                            <input id="ve_nome" type="text" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/trasportatori/title.ve_descrizione')</label>
                        <div class="col-sm-10">
                            <input id="ve_descrizione" type="text" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/trasportatori/title.ve_indirizzo')</label>
                        <div class="col-sm-10">
                            <input id="ve_indirizzo" type="text" class="form-control"  />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/trasportatori/title.ve_lat')</label>
                        <div class="col-sm-10">
                            <input id="ve_lat" type="text" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">@lang('arisi/trasportatori/title.ve_lon')</label>
                        <div class="col-sm-10">
                            <input id="ve_lon" type="text" class="form-control" />
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
                <h4 class="modal-title" id="deleteLabel">@lang('arisi/trasportatori/title.delete')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="div_show_del">
                @lang('arisi/trasportatori/message.confirm.delete')
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY','key')}}&libraries=places" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        var input = document.getElementById('ve_indirizzo');
        var autocomplete = new google.maps.places.SearchBox(input);
        //console.log(autocomplete);
        autocomplete.addListener('places_changed', function() {
            var place = autocomplete.getPlaces();
            $('#ve_lat').val(place[0].geometry['location'].lat());
            $('#ve_lon').val(place[0].geometry['location'].lng());
        });
    });

    var type = 1;
    function delete_row(id){
        $('#id_del').val(id);
        $('#modal_delete').modal('toggle');
    }

    function edit_row(id){
        $('#editlabel').html("@lang('arisi/trasportatori/title.edit')");        
        $.ajax({
            url: "{{route('admin.trasportatori.data')}}?ve_id=" + id,
            type: 'GET',                
            error: function(err) {
                console.log(err);
                alert("@lang('arisi/trasportatori/message.error.store')");
            },
            success: function(data) {                        
                if(data != null){
                    type = 2;
                    $('#id_edit').val(id);
                    $('#ve_id').val(data.ve_id);
                    $('#ve_nome').val(data.ve_nome);
                    $('#ve_descrizione').val(data.ve_descrizione);
                    $('#ve_indirizzo').val(data.ve_indirizzo);
                    $('#ve_lat').val(data.ve_lat);
                    $('#ve_lon').val(data.ve_lon);
                    $('#modal_edit').modal('toggle');
                }else{                        
                    alert("@lang('arisi/trasportatori/message.error.data')");
                }                    
            }
        });                                                                        
    }

    $(function() {   
        var table = $('#table').DataTable({
            responsive: true,
            processing: true,
            //serverSide: true,
            ajax: "{!! route('admin.trasportatori.data') !!}",
            //order: [[ 6, "desc" ],[0, "asc"]],
            columns: [
                { data: 've_id', name: 've_id' },
                { data: 've_nome', name: 've_nome' },   
                { data: 've_descrizione', name: 've_descrizione' },  
                { data: 've_indirizzo', name: 've_indirizzo' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ],            
            createdRow: function( row, data, dataIndex ) {
                //$('td', row).css('background-color', '#888888');                
            }
        });

        $('#btn_new').click(function(){
            type = 1;
            $('#editlabel').html("@lang('arisi/trasportatori/title.new')");
            $('#ve_id').val("");
            $('#ve_nome').val("");
            $('#ve_descrizione').val("");
            $('#ve_indirizzo').val("");
            $('#modal_edit').modal('toggle');
        });

        $('#btn_save').click(function(){            
            $.ajax({
                url: "{{route('admin.trasportatori.update')}}",
                type: 'POST',
                data: {
                    ve_id : $('#ve_id').val(),
                    ve_cur_id : $('#id_edit').val(),
                    ve_nome : $('#ve_nome').val(),
                    ve_descrizione : $('#ve_descrizione').val(),
                    ve_indirizzo : $('#ve_indirizzo').val(),
                    ve_lat : $('#ve_lat').val(),
                    ve_lon : $('#ve_lon').val(),
                    ve_type : type,
                    _token : '{{csrf_token()}}',                
                },
                error: function(err) {
                    alert("@lang('arisi/trasportatori/message.error.store')");
                },
                success: function(data) {                        
                    if(data > 0){                        
                        alert("@lang('arisi/trasportatori/message.success.store')");
                        $('#modal_edit').modal('hide');
                        table.ajax.reload();
                    }else if(data == 0){                        
                        alert("@lang('arisi/trasportatori/message.error.store')");
                    }else{
                        alert("@lang('arisi/trasportatori/message.error.duplicate_id')");
                    }                    
                }
            });
        });

        $('#btn_delete').click(function(){
            $.ajax({
                url: "{{route('admin.trasportatori.delete')}}",
                type: 'POST',
                data: {
                    ve_id : $('#id_del').val(),
                    _token : '{{csrf_token()}}',                
                },
                error: function(err) {
                    alert("@lang('arisi/trasportatori/message.error.store')");
                    $('#modal_delete').modal('hide');
                },
                success: function(data) {                        
                    if(data > 0){
                        alert("@lang('arisi/trasportatori/message.success.delete')");
                        table.ajax.reload();
                    }else{                        
                        alert("@lang('arisi/trasportatori/message.error.store')");
                    }   
                    $('#modal_delete').modal('hide');                 
                }
            });
        });
    });
    
</script>   
@stop
