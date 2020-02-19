@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>
                    <div class="card-tools">
                        <a  href="{{ route('web.bookings.create') }}" type="button" class="btn btn-tool btn-success">
                            Create
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="dt table table-striped"
                           data-table
                           data-server-side="true"
                           data-processing="true"
                           data-order='[]'
                           data-ajax="{{ route('web.bookings.table') }}">
                        <thead>
                        <tr>
                            <th data-data="client.name">Client</th>
                            <th data-data="rentable_item.name">Rentable item</th>
                            <th data-data="deposit">Deposit</th>
                            <th data-data="actual_cost">Actual cost</th>
                            <th data-data="cost">Cost</th>
                            <th data-data="actions">Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
