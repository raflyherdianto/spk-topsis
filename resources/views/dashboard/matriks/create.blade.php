@extends('dashboard.layouts.main')

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-2">
                    <h3>Create Services</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Create Services
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ url('dashboard/service') }}" method="POST" class="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Nama Layanan</label>
                                                    <input type="text"
                                                        class="form-control
                                                        @error('name') is-invalid @enderror"
                                                        id="name" name="name" placeholder="Nama Layanan..."
                                                        value="{{ old('name') }}">
                                                    @error('name')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Categories</label>
                                                    <select
                                                        class="choices form-select @error('category_id') is-invalid @enderror"
                                                        id="category_id" name="category_id"
                                                        value="{{ old('category_id') }}">
                                                        <option selected>Kategori</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Deskripsi</label>
                                                    <input type="text"
                                                        class="form-control
                                                        @error('description') is-invalid @enderror"
                                                        id="description" name="description"
                                                        placeholder="Deskripsi layanan..." value="{{ old('description') }}">
                                                        @error('description')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Harga (Rp.)</label>
                                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                                        id="price" name="price" placeholder="Harga layanan..." value="{{ old('price') }}">
                                                        @error('price')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Rating</label>
                                                    <i class="bi bi-star-fill"></i>
                                                    <select class="form-select @error('rating') is-invalid @enderror"
                                                    id="rating" name="rating" value="{{ old('rating') }}">
                                                        <option selected>Bintang...</option>
                                                        <option value=5>5</option>
                                                        <option value=4>4</option>
                                                        <option value=3>3</option>
                                                        <option value=2>2</option>
                                                        <option value=1>1</option>
                                                    </select>
                                                    @error('rating')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endsection
