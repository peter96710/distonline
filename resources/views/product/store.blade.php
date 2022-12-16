@extends('layouts.app')

@section('content')
<div class="container">

    <form data-action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="add-product-form">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" placeholder="Here comes your text here." name="desc"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" placeholder="Price" name="price" required>
        </div>

        <button type="submit" class="btn btn-primary btn-submit">Create Product</button>

    </form>

</div>
@endsection
