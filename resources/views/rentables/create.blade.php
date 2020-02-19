@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">{{ __('rentables.create_title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('web.rentables.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 text-md-center">
                                <h3>Rentable</h3>
                            </div>
                        </div>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                        @include('components.text_field', [
                            'label' => __('rentables.name'),
                            'name' => 'name',
                            'required' => true,
                        ])

                        @include('components.textarea_field', [
                            'label' => __('rentables.description'),
                             'name' => 'description',
                             'required' => true,
                        ])
                        <hr>

                        <div class="row">
                            <div class="col-md-12 text-md-center">
                                <h3>
                                    Items
                                    <button id="rentable-add-items" type="button" class="btn btn-success">
                                        Add more
                                    </button>
                                </h3>
                            </div>
                        </div>
                        <div id="rentable-items-list">
                            <div class="rentable-item">
                                @include('components.text_field', [
                                    'label' => __('rentables.items.name'),
                                    'name' => 'items[0][name]',
                                    'required' => false,
                                ])

                                @include('components.text_field', [
                                   'label' => __('rentables.items.identification_number'),
                                   'name' => 'items[0][identification_number]',
                                   'required' => false,
                               ])
                                <hr>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 text-md-center">
                                <h3>Tariff</h3>
                            </div>
                        </div>

                        @include('components.select_field', [
                            'label' => __('rentables.tariff.period_type'),
                            'name' => 'tariff[period_type]',
                            'required' => false,
                            'options' => $tariffPeriodTypes,
                            'options_labels' => 'rentables.tariff.period_types',
                        ])


                        @include('components.select_field', [
                            'label' => __('rentables.tariff.bill_type'),
                            'name' => 'tariff[bill_type]',
                            'required' => false,
                            'options' => $tariffBillTypes,
                            'options_labels' => 'rentables.tariff.bill_types',
                        ])

                        <div class="row">
                            <div class="col-md-12 text-md-center">
                                <h3>
                                    Tariff rates
                                    <button id="rentable-tariff-rate-add-items" type="button" class="btn btn-success">
                                        Add more
                                    </button>
                                </h3>
                            </div>
                        </div>

                        <div id="rentable-tariff-rates-list">
                            <div class="rentable-tariff-rate">
                                @include('components.text_field', [
                                    'label' => __('rentables.tariff_rates.period_from'),
                                    'name' => 'tariff_rates[0][period_from]',
                                    'required' => false,
                                    'type' => 'number',
                                ])
                                @include('components.text_field', [
                                     'label' => __('rentables.tariff_rates.period_to'),
                                     'name' => 'tariff_rates[0][period_to]',
                                     'required' => false,
                                     'type' => 'number',
                                 ])
                                @include('components.text_field', [
                                      'label' => __('rentables.tariff_rates.price'),
                                      'name' => 'tariff_rates[0][price]',
                                      'required' => false,
                                      'type' => 'number',
                                 ])
                                <hr>
                            </div>
                        </div>

                        @include('components.submit_button', [
                            'label' => __('offices.save')
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
