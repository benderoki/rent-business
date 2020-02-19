@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">{{ __('companies.create_title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('web.companies.store') }}">
                        @csrf

                        @include('components.text_field', [
                            'label' => __('companies.name'),
                            'name' => 'name',
                            'required' => true,
                        ])

                        @include('components.submit_button', [
                            'label' => __('companies.save')
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
