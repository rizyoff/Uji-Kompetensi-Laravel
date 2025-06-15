@extends('layouts.main')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1 text-bold">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
    <section class="content">
        <title>{{ $title }}</title>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @foreach ($products as $product)
                            <form action="/update/{{ $product->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Produk</label>
                                            <input type="text" name="name" value="{{ $product->name }}"
                                                class="form-control" id="name" placeholder="Nama Produk..">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Deskripsi Produk</label>
                                            <textarea type="text" name="description" class="form-control" id="description" placeholder="Deskripsi Produk..">{{ $product->description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="sku" class="form-label">SKU Produk</label>
                                            <input type="text" name="sku" value="{{ $product->sku }}"
                                                class="form-control" id="sku" placeholder="Kode Produk">
                                        </div>

                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stok Produk</label>
                                            <input type="number" name="stock" value="{{ $product->stock }}"
                                                class="form-control" id="stock" placeholder="Stok Produk">
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Harga Produk</label>
                                            <input type="number" name="price" value="{{ $product->price }}"
                                                inputmode="numeric" class="form-control" id="price"
                                                placeholder="SKU Produk">
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Kategori Produk</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                @foreach ($category as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 d-flex justify-content-end">
                                            <a class="btn btn-danger mr-3" href="/products">back</a>
                                            <button type="submit" class="btn btn-success">Edit Product</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
