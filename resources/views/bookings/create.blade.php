@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('bookings.create_title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('web.bookings.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Client</label>
                            <div class="col-md-6">
                                <select class="form-control" name="client_id">
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->name }} ({{$client->phone }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Rentable item</label>
                            <div class="col-md-6">
                                <select class="form-control" name="rentable_item_id">
                                    @foreach($rentableItems as $rentableItem)
                                        <option value="{{ $rentableItem->id }}">
                                            {{ $rentableItem->name }} ({{$rentableItem->rentable->name }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @include('components.text_field', [
                             'label' => 'Deposit',
                             'name' => 'deposit',
                             'required' => true,
                             'type' => 'number',
                        ])

                        @include('components.submit_button', [
                            'label' => __('offices.save')
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
