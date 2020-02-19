@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>
                    <div class="card-tools">
                        <a  href="{{ route('web.clients.create') }}" type="button" class="btn btn-tool btn-success">
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
                           data-ajax="{{ route('web.clients.table') }}">
                        <thead>
                        <tr>
                            <th data-data="name">Name</th>
                            <th data-data="phone">Phone</th>
                            <th data-data="created_at">Created at</th>
                            <th data-data="actions">Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
