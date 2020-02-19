@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.store') }}">
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
    </div>
@endsection
