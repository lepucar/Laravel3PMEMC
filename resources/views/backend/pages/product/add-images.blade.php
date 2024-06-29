@extends('backend.components.master')

@section('master')
    <div class="card ">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-12">
                    <h1>Add Images</h1>
                    @include('components.messages')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Product Details</h3>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <h4>Name: {{$productData->name}}</h4>
                        <h4>Price:
                            @if($productData->discount_price)
                                {{$productData->discount_price}}
                                <span class="text-danger"><del>{{$productData->price}}</del></span>
                            @else
                                {{$productData->price}}
                            @endif

                        </h4>
                    </div>
                    <div class="col-md-4">
                        @if($productData->image)
                            <img src="{{url($productData->image)}}" alt="image" style="width: 100px;height: 100px">
                        @else
                            <span class="text-danger">No Image</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Add Images</h3>
                        <form action="{{route('manage-product.add-images',$productData->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" multiple id="image" name="images[]">
                            </div>
                            <div class="form-group mb-3">
                                <button>Add Images</button>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1> Product Gallery</h1>
                    </div>
                </div>
                <div class="row">
                    @if($productData->images->count() > 0)
                        @foreach($productData->images as $image)
                            <div class="col-md-3">
                                <img src="{{url($image->image_name)}}" alt="image" style="width: 100px;height: 100px">
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <span class="text-danger">No Image Found</span>
                        </div>
                    @endif
                </div>
            </div>
@endsection