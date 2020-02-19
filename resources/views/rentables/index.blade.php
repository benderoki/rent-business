@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('rentables.table_title') }}</h3>
                    <div class="card-tools">
                        <a  href="{{ route('web.rentables.create') }}" type="button" class="btn btn-tool btn-success">
                           {{ __('rentables.create_title') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="dt table table-striped"
                           data-table
                           data-server-side="true"
                           data-processing="true"
                           data-order='[]'
                           data-ajax="{{ route('web.rentables.table') }}">
                        <thead>
                        <tr>
                            <th data-data="name">Name</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
