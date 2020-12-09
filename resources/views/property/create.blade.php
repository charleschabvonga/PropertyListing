@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">
                            {{ $error }}
                        </p>
                    @endforeach
                @endif
                <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-primary float-right">Add Property</button>
                    <h1 class="mb-3">CREATE PROPERTY</h1>
                    <hr>
                    <div class="col-md-12 row" style="display:flex">
                        <div class="form-group col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $property->name ?? '' }}" required autocomplete="name" placeholder="Name" autofocus>
                            <small class="form-text text-muted">The name of the property.</small>

                            @if ($errors->has('name'))
                                <p class="alert alert-danger">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group col-md-3">
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $property->price ?? '' }}" required autocomplete="price" placeholder="Price">
                            <small class="form-text text-muted">The price of the property.</small>

                            @if ($errors->has('price'))
                                <p class="alert alert-danger">
                                    {{ $errors->first('price') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group col-md-3">
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            <small class="form-text text-muted">The image of the property.</small>

                            @if ($errors->has('image'))
                                <p class="alert alert-danger">
                                    {{ $errors->first('image') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $property->address ?? '' }}" required autocomplete="address" placeholder="Address">
                            <small class="form-text text-muted">The address where the property is located.</small>

                            @if ($errors->has('address'))
                                <p class="alert alert-danger">
                                    {{ $errors->first('address') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" placeholder="Description" autofocus>{{ $property->description ?? '' }}</textarea>
                            <small class="form-text text-muted">The description of the property.</small>

                            @if ($errors->has('description'))
                                <p class="alert alert-danger">
                                    {{ $errors->first('description') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea id="body" class="ckeditor form-control @error('body') is-invalid @enderror" name="body" required autocomplete="body" autofocus>{{ $body->description ?? '' }}</textarea>
                            <small class="form-text text-muted">The full content of the property.</small>

                            @if ($errors->has('body'))
                                <p class="alert alert-danger">
                                    {{ $errors->first('body') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
