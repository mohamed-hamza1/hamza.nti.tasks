@extends('backend.layouts.parent')

@section('title', 'Edit Product')

@section('content')
    <div class="row">
        <div class="col-12">
            @include('backend.includes.message')
        </div>
        <div class="col-12">
            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-6">
                        <label for="name_en">Name En</label>
                        <input type="text" name="name_en" id="name_en" class="form-control" placeholder="Product Name"
                            aria-describedby="helpId" value="{{ $product->name_en }}">
                        @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="name_ar">Name Ar</label>
                        <input type="text" name="name_ar" id="name_ar" class="form-control" placeholder="اسم المنتج"
                            aria-describedby="helpId" value="{{ $product->name_ar }}">
                        @error('name_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Price"
                            aria-describedby="helpId" value="{{ $product->price }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="code">Code</label>
                        <input type="number" name="code" id="code" class="form-control" placeholder="Code"
                            aria-describedby="helpId" value="{{ $product->code }}">
                        @error('code')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-$">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity"
                            aria-describedby="helpId" value="{{ $product->quantity }}">
                        @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option {{ $product->status == 1 ? 'selected' : '' }} value="1">Active</option>
                            <option {{ $product->status == 0 ? 'selected' : '' }} value="0">Not Active</option>
                        </select>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-4">
                        <label for="brands">Brands</label>
                        <select name="brands_id" id="brands_id" class="form-control"></select>
                        @foreach ($brands as $brand)
                            <option {{ $product->brand_id == $brand->id ? 'selected' : '' }}
                                value="{{ $brand->id }}">
                                {{ $brand->name_en }}</option>
                        @endforeach
                    </div>
                    @error('brands')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-4">
                        <label for="subcategories">Subcategories</label>
                        <select name="subcategories_id" id="subcategories_id" class="form-control"></select>
                        @foreach ($subcategories as $subcategory)
                            <option {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}
                                value="{{ $subcategory->id }}">{{ $subcategory->name_en }}</option>
                        @endforeach
                    </div>
                    @error('subcategories')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-6">
                        <label for="desc_en">Description En</label>
                        <textarea name="desc_en" id="desc_en" cols="30" rows="10"
                            class="form-control">{{ $product->desc_en }}</textarea>
                    </div>
                    @error('desc_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-6">
                        <label for="desc_ar">Description Ar</label>
                        <textarea name="desc_ar" id="desc_ar" cols="30" rows="10"
                            class="form-control">{{ $product->desc_ar }}</textarea>
                    </div>
                    @error('desc_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="col-12">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <img src="{{ url('dist/img/products' . $product->image) }}" class="w-100"
                            alt="{{ $product->name_en }}">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col-2">
                        <button class="btn btn-primary">Update</button>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
