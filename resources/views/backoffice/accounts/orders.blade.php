@extends('adminlte::page')

@section('title', app_name() . ' | ' . __('labels.accounts.orders')) - {{ $user->name }}
@section('content')
<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.accounts.orders') }} - {{ $user->name }}
                </h4>
            </div>
            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                    @include('includes.account_submenu')
                </div>
            </div>
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <table id="orders" class="table row-border hover order-column" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Ref ID</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<link rel='stylesheet' href='//cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css' type='text/css' media='all' />

@parent
@stop

@section('scripts')
@parent
<script src="//cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#orders').DataTable({
        processing: true,
        responsive: true,
        serverSide: true,
        pageLength: 50,
        ajax: "/backoffice/accounts/{{$user->id}}/orders_data",
        columns: [{
                name: 'id',
                data: 'id'
            },
            {
                name: 'order_date',
                data: 'order_date'
            },
            {
                name: 'user_name',
                data: 'user_name'
            },
            {
                name: 'ref_id',
                data: 'ref_id'
            },            
            {
                name: 'status',
                data: 'status_name'
            },
            {
                "className": 'options',
                "data": null,
                "searchable": false, 
                "render": function(data) {
                    var template = "{{ route('backoffice.orders.view', '000') }}"
                    var redirect_url = template.replace('000', data.oid);
                    return `<a class="btn btn-sm btn-info float-right" href="${redirect_url}"><i class="fas fa-eye"></i></a>`;
                },            
        ],
       
    });
});
</script>
@stop