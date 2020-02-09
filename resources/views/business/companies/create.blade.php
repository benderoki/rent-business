@extends('business.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">{{ __('business_companies.create_title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('business.companies.store') }}">
                        @csrf

                        @include('components.text_field', [
                            'label' => __('business_companies.name'),
                            'name' => 'name',
                            'required' => true,
                        ])

                        @include('components.submit_button', [
                            'label' => __('business_companies.save')
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
