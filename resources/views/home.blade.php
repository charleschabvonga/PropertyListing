@extends('layouts.app')

@section('content')
    @can('create-property')
        <a href="{{ route('properties.create') }}"><button type="button" class="btn btn-info float-right">Create Property</button></a>
    @endcan
    <h1 class="mb-3">DASHBOARD</h1>
    <hr>
    @include('layouts.property')
@endsection
