@extends('backend.components.master')

@section('master')
    
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Add Category</h1>
                </div>
                <div class="col-md-12">
                    <form action="{{route('create-category')}}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Category Name:
                            <span class="text-danger">{{$errors->first("name")}}</span>
                            </label>
                            <input type="text" class="form-control"id="name" name="name">
                        </div>
                        <div class="form-group mb-2">
                            <label for="slug">Slug:
                            <span class="text-danger">{{$errors->first("slug")}}</span>
                            </label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                        <div class="form-group mb-2">
                            <label for="section_id">Select Section:
                                <span class="text-danger">{{$errors->first("section_id")}}</span>

                            </label>
                            <select name="section_id" id="section_id" class="form-control">
                                <option value="">Select Section</option>
                                @foreach ($sectionData as $section)
                                    <option value="{{ $section->id }}"
                                        {{ old('section_id') == $section->id ? 'selected' : '' }}
                                    >{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="parent_id">
                                Select Parent Category:
                                <span class="text-danger">{{$errors->first("parent_id")}}</span>
                            </label>

                            <select name="parent_id" class="form-control"
                                    id="parent_id">
                                <option value="">Select a parent category</option>
                                @foreach($categoryData as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @if($category->child)
                                        @include('backend.pages.category.nested',['childrenData' => $category->child])
                                    @endif
                                @endforeach
                            </select>
                        <div class="form-group mb-2">
                            <button class="btn btn-success">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection