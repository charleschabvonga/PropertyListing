@extends('layouts.app')

@section('content')
    @can('back-to-properties')
    <a class="btn btn-dark mb-3 float-right" href="{{ route('properties.index') }}" role="button">Go Back</a>
    @endcan
    @can('back-to-dashboard')
        <a class="btn btn-dark mb-3 float-right" href="{{ route('home') }}" role="button">Go Back</a>
    @endcan
    <h1 class="mb-3">BIDS LIST</h1>
    <hr>
    @if(count($bids) > 0)
        @foreach($bids as $bid)
            <div class="well mb-3">
                <div class="row">
                    <div class="col-md-4 col-sm-4 text-center">
                        @can('accept-property-bid')<a href="#">@endcan<img src="/images/{{ $bid->property->image }}" class="img-thumbnail" width="100%"></a>
                        <small>Posted on {{$bid->created_at}} by {{ $bid->user->full_name }}</small>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3>@can('accept-property-bid')<a href="#">@endcan{{ $bid->property->name }}</a></h3>
                        <p><strong>Address: </strong>{{ $bid->property->address }}</p>
                        <p>{{ $bid->property->description }}</p>
                        <p><strong>Market Price : </strong>R {{ number_format($bid->property->price) }}</p>
                        <p><strong>Bid Amount : </strong>R {{ number_format($bid->bid_amount) }}</p>
                        <p><strong style="color:red">{{ $bid->property->is_winner ? 'PROPERTY HAS BID WINNER' : '' }}</strong></p>
                        @can('accept-property-bid')
                            @if(!$bid->property->is_winner)
                                <form method="POST" action="{{ route('properties.update', $bid->property->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Accept Bid</button></a>
                                </form>
                            @endif
                        @endcan
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
        {{$bids->links()}}
    @else
        <p>No bids found</p>
    @endif
@endsection

