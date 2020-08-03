@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Product</h1>
                <form action="/admin/products/edit" method= "POST">
                @csrf
                <input type="hidden" name="productid" id="productid" value="{{ $product->_id }}">
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input class="form-control" type="text" name="product_name" id="product_name" value="{{ $product->product_name }}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="0">Select a category...</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->_id }}"{{ $category -> _id == $product->category_id ? 'selected' : ''}}>{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="currency">Currency</label>
                        <select class="form-control" id="currency" name="currency">
                            <option value="0">Select a currency...</option>
                            <option value="mxn"{{ $product->currency == "mxn" ? 'selected' : ''}}>Mexican Peso (MXN)</option>
                            <option value="usd"{{ $product->currency == "usd" ? 'selected' : ''}}>American Dolar (USD)</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection