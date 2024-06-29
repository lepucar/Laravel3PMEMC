@extends('backend.components.master')

@section('master')
    <div class="card ">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-12">
                    <h1>Add Product</h1>
                    @include('backend.pages.components.messages')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('store-product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category_id">
                                        Select Category:
                                        <span class="text-danger">{{$errors->first("category_id")}}</span>
                                    </label>

                                    <select name="category_id" class="form-control"
                                            id="category_id">
                                        <option value="">Select category</option>
                                        @foreach($categoryData as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @if($category->child)
                                                @include('backend.pages.product.nested',['childrenData' => $category->child])
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category_id">
                                        Select Brand:
                                        <span class="text-danger">{{$errors->first("brand_id")}}</span>
                                    </label>

                                    <select name="brand_id" class="form-control"
                                            id="brand_id">
                                        <option value="">Select Brand</option>
                                        @foreach($brandData as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>

                                        @endforeach
                                    </select>

                                </div>

                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="name"> Name:
                                <span class="text-danger">{{$errors->first("name")}}</span>

                            </label>
                            <input type="text" name="name"
                                   value="{{old('name')}}"
                                   id="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="slug"> Slug:
                                <span class="text-danger">{{$errors->first("slug")}}</span>

                            </label>
                            <input type="text" name="slug"
                                   value="{{old('slug')}}"
                                   id="slug" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price"> Price:
                                        <span class="text-danger">{{$errors->first("price")}}</span>

                                    </label>
                                    <input type="number" name="price"
                                           value="{{old('price')}}"
                                           id="price" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount"> Discount:
                                        <span class="text-danger">{{$errors->first("discount")}}</span>

                                    </label>
                                    <input type="number" name="discount"
                                           value="{{old('discount')}}"
                                           id="discount" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="color"> Color:
                                <span class="text-danger">{{$errors->first("color")}}</span>

                            </label>
                            <input type="text" name="color"
                                   value="{{old('color')}}"
                                   id="color" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="weight"> Weight:
                                <span class="text-danger">{{$errors->first("weight")}}</span>

                            </label>
                            <input type="text" name="weight"
                                   value="{{old('weight')}}"
                                   id="weight" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="code"> Code:
                                <span class="text-danger">{{$errors->first("code")}}</span>

                            </label>
                            <input type="text" name="code"
                                   value="{{old('code')}}"
                                   id="code" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description"> Description:
                                <span class="text-danger">{{$errors->first("description")}}</span>

                            </label>
                            <textarea name="description" id="description"
                                      class="form-control">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image"> Image:
                                <span class="text-danger">{{$errors->first("image")}}</span>

                            </label>
                            <input type="file" name="image"
                                   value="{{old('image')}}"
                                   id="image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection