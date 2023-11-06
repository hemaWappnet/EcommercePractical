@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
@endsection
@section('content')
<div class="container">    
    <h4 class="container">Products Listing</h4>
    <form action="{{ route('products.filter') }}" method="POST">
        @CSRF
        <div class="container row mb-4">
            <div class="col-md-3">
                <select class="form-control" name="productCategory">
                    <option value="">Select Product Category</option>
                    @foreach ($productCategories as $productCategory)
                        <option @if (isset($category) && $category == $productCategory->id) selected @endif value="{{ $productCategory->id }}" >{{ $productCategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="tags" placeholder="Enter Tags (comma-separated)" value="{{ $tags ?? '' }}" />
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" name="minPrice" placeholder="Minimum Price" value="{{ $minPrice ?? '' }}" />
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" name="maxPrice" placeholder="Maximum Price" value="{{ $maxPrice ?? '' }}"  />
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <div class="container mt-4">        
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img width="300" height="300" src="{{ asset('products/sampleProductImage.jpg') }}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        @php $tags = []; if($product->tags != '') $tags = explode(',', $product->tags); @endphp
                        <p>
                            @foreach ($tags as $tag)
                                <span class="badge badge-primary">{{ $tag }}</span>
                            @endforeach
                        </p>
                        <p class="card-text text-muted">${{ $product->price }}</p>
                    </div>
                    <div class="card-footer">                        
                        <button type="button" class="btn btn-primary">Add to Cart</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>
@endsection