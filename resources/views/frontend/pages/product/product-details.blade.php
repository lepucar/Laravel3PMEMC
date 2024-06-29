
@extends('frontend.pages.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                @if($product->image)
                    <img src="{{url($product->image)}}" style="height: 200px;" class="card-img-top" alt="...">
                @endif
                @if($product->images->count() > 0)
                    <div class="row">
                        @foreach($product->images as $image)
                            <div class="col-md-3">
                                <img src="{{url($image->image_name)}}" alt="image" style="width: 100px;height: 100px">
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="col-md-12">
                        <span class="text-danger">No Image Found</span>
                    </div>
                @endif


            </div>
            <div class="col-md-8">
                <h5 class="card-title">
                    {{$product->name}}
                </h5>
                <p>
                    Rs: {{$product->price}}
                </p>
                <p class="card-text">
                    {{$product->description}}
                </p>
                <a href="#" class="btn btn-primary">Add To Cart </a>
            </div>

        </div>
    </div>
@endsection
