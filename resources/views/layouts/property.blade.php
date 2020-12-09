@if(count($properties) > 0)
    @foreach($properties as $property)
        <div class="well mb-3">
            <div class="row">
                <div class="col-md-4 col-sm-4 text-center">
                    @can('view-property-bids')<a href="{{ route('bids.index.id', $property->id) }}"><img src="/images/{{ $property->image }}" class="img-thumbnail" width="100%"></a>@endcan
                    @can('view-property-details')<a href="{{ route('properties.show', $property->id) }}"><img src="/images/{{ $property->image }}" class="img-thumbnail" width="100%"></a>@endcan
                    <small>Posted on {{$property->created_at}} by {{ $property->user->full_name }}</small>
                </div>
                <div class="col-md-8 col-sm-8">
                    @can('view-property-bids')<a href="{{ route('bids.index.id', $property->id) }}"><h3>{{ $property->name }}</h3></a>@endcan
                    @can('view-property-details')<a href="{{ route('properties.show', $property->id) }}"><h3>{{ $property->name }}</h3></a>@endcan
                    <p><strong>Address: </strong>{{ $property->address }}</p>
                    <p>{!! $property->description !!}
                        @can('view-property-details')
                            <a href="{{ route('properties.show', $property->id) }}"> Read more...</a>
                        @endcan
                    </p>
                    <div class="col-lg-12 col-md-8 col-sm-8"></div>
                    <p><strong>Market Price : </strong>R {{ number_format($property->price) }}</p>
                    <p><strong style="color:red">{{ $property->is_paid ? 'PROPERTY SOLD' : '' }}</strong></p>
                    @can('view-property-bids')
                        <a href="{{ route('bids.index.id', $property->id) }}"><button type="button" class="btn btn-primary">View Bids</button></a>
                    @endcan
                    @can('view-property-details')
                        <a href="{{ route('properties.show', $property->id) }}"><button type="button" class="btn btn-info">View Details</button></a>
                    @endcan
                </div>
            </div>
        </div>
        <hr>
    @endforeach
    {{$properties->links()}}
@else
    <p>No properties found</p>
@endif
