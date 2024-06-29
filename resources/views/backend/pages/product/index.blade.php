@extends('backend.components.master')

@section('master')
    <div class="card ">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-12">
                    <h1>Show Product</h1>
                    @include('backend.pages.components.messages')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Color</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productData as $key=>$product)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    @if($product->category)
                                        {{$product->category->category_name}}
                                    @else
                                        <span class="text-danger">No Category</span>
                                    @endif
                                </td>
                                <td>
                                    @if($product->brand)
                                        {{$product->brand->name}}
                                    @else
                                        <span class="text-danger">No Brand</span>
                                    @endif
                                </td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->color}}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{url($product->image)}}" alt="image"
                                             style="width: 50px;height: 50px">
                                    @else
                                        <span class="text-danger">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm">Add Images</a>
                                    <a href=""
                                       class="btn btn-primary btn-sm">Edit</a>
                                    <form action="" method="post"
                                          style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection