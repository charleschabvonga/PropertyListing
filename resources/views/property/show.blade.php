@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <a class="btn btn-dark mb-3 float-right" href="{{ route('properties.index') }}" role="button">Go Back</a>
            <h1 class="col-sm-12 col-md-6 col-lg-6 text-center">{{ $property->name }}</h1>
            <hr style="clear:both;">
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <a href="{{ route('bid.create.id', $property->id) }}">
                <img src="/images/{{ $property->image }}" class="img-thumbnail" width="100%">
            </a>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
            <p><strong>Address: </strong>{{ $property->address }}</p>
            <p><strong>Market Price: </strong>R {{ number_format($property->price) }}</p>
            <p>{{ $property->description }}</p>
            <a class="btn btn-dark mt-5 float-right" href="{{ route('bid.create.id', $property->id) }}" role="button">Bid for the property</a>
        </div>
    </div>
    <hr>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div>{!! $property->body  !!}</div>
    </div>
    <hr>
    <div class="col-sm-12 col-md-6 col-lg-6 text-center">
        <small>Posted on {{$property->created_at}} by {{ $property->user->full_name }}</small>
    </div>
@endsection
