@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            List of products
            <a href="{{ route('products.create') }}" class="btn btn-success float-end">Create product</a>

        </div>
        <div class="card-body">

            @if(count($products)<1) There are no products yet! @endif
            <table class="table table-bordered mt-3">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Modify</th>
                    <th>Delete</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->desc }}</td>
                        <td>{{ $product->price }}</td>
                        <td><a href="{{route('products.edit', $product->id)}}" title="edit" class="btn btn-sm btn-success btn-edit"> Edit </a></td>
                        <td>
                            <a href="javascript:void(0)" data-url="{{ route('products.destroy', $product->id) }}"
                               class="btn btn-danger delete-product">Delete</a>
                        </td>

                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection
