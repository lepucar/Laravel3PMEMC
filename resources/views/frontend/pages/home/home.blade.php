@extends('frontend.pages.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($productsData as $product)
            <div class="col-md-4">
                <div class="card">
                    @if($product->image)
                    <img src="{{url($product->image)}}" style="height: 200px;" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$product->name}}
                        </h5>
                        <p>
                            Rs: {{$product->price}}
                        </p>
                        <p class="card-text">
                            {{$product->description}}
                        </p>
                        <a href="{{route('product-details',$product->slug)}}" class="btn btn-primary">Views</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection