@extends('layouts.app')

@section('content')
<div class="container">
    <form data-action="products/update{{$product->id}} }}" method="POST" enctype="multipart/form-data" id="update-product-form">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$product->title}}" required>
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" placeholder="Here comes your text here." name="desc">{{$product->desc}}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" placeholder="Price" name="price" value="{{$product->price}}" required>
        </div>
        <input type="hidden" name="id" value="{{$product->id}}">

        <button type="submit" class="btn btn-primary btn-update">Update Product</button>

    </form>

</div>
@endsection
