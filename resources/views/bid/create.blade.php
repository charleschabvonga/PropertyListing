


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-primary float-right">Add Property</button>
                    <h1 class="mb-3">CREATE BID</h1>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="property_id" type="text" class="form-control @error('property_id') is-invalid @enderror" name="property_id" value="{{ request('id')  }}" required readonly hidden autocomplete="property_id">

                            @error('property_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="bid_amount" type="number" class="form-control @error('bid_amount') is-invalid @enderror" name="bid_amount" value="{{ old('bid_amount') }}" required autocomplete="bid_amount" placeholder="Bidding Amount">
                            <small class="form-text text-muted">The bidding amount of the property.</small>

                            @error('bid_amount')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

