@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('user::user.permission.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('user::user.permission.names') !!}</small>
@stop

@section('title')
{!! trans('user::user.permission.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('user::user.permission.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='entry-permission'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="main-list" class="table table-striped table-bordered">
    <thead>
        <th>{!! trans('user::user.permission.label.slug')!!}</th>
        <th>{!! trans('user::user.permission.label.name')!!}</th>
    </thead>
</table>
@stop
@section('script')
<script type="text/javascript">
var oTable;
$(document).ready(function(){
    $('#entry-permission').load('{{trans_url('admin/user/permission/0')}}');
    oTable = $('#main-list').dataTable( {
        "ajax": '{{ trans_url('/admin/user/permission') }}',
        "columns": [
            {data :'slug'},
            {data :'name'},

        ],
        "permissionLength": 50
    });

    $('#main-list tbody').on( 'click', 'tr', function () {
        $(this).toggleClass("selected").siblings(".selected").removeClass("selected");

        var d = $('#main-list').DataTable().row( this ).data();

        $('#entry-permission').load('{{trans_url('admin/user/permission')}}' + '/' + d.id);

    });
});
</script>
@stop

@section('style')
@stop
