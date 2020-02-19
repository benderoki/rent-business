@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">{{ __('clients.create_title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('web.clients.store') }}">
                        @csrf

                        @include('components.text_field', [
                            'class' => 'phone',
                            'label' => __('clients.phone'),
                            'name' => 'phone',
                            'required' => true,
                        ])

                        @include('components.text_field', [
                            'label' => __('clients.name'),
                             'name' => 'name',
                             'required' => true,
                        ])

                        @include('components.submit_button', [
                            'label' => __('clients.save')
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
