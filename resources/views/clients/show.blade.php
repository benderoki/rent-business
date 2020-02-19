@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('clients.messages.table_title') }}</h3>
                </div>
                <div class="card-body">
                    <table class="dt table table-striped"
                           data-table
                           data-server-side="true"
                           data-processing="true"
                           data-order='[]'
                           data-ajax="{{ route('web.clients.messages.table', ['client' => $client]) }}">
                        <thead>
                        <tr>
                            <th data-data="message">Message</th>
                            <th data-data="created_at">Created at</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('clients.messages.send_title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('web.clients.messages.store', ['client' => $client]) }}">
                        @csrf

                        @include('components.text_field', [
                            'label' => __('clients.messages.message'),
                            'name' => 'message',
                            'required' => true,
                        ])

                        @include('components.submit_button', [
                            'label' => __('clients.messages.save')
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
