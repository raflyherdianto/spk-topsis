@extends('dashboard.layouts.main')

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-2">
                    <h3>Edit Kriteria</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Kriteria
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
                                    <form action="{{ url('dashboard/kriteria/'.$kriteria->id) }}" method="POST" class="form">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Kode</label>
                                                    <input type="text"
                                                        class="form-control
                                                        @error('code') is-invalid @enderror"
                                                        id="code" name="code"
                                                        value="{{ old('code', $kriteria->code) }}">
                                                        @error('code')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Nama Kriteria</label>
                                                    <input type="text"
                                                        class="form-control
                                                        @error('name') is-invalid @enderror"
                                                        id="name" name="name"
                                                        value="{{ old('name', $kriteria->name) }}">
                                                    @error('name')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Tipe Kriteria</label>
                                                    <select
                                                        class="form-select @error('type') is-invalid @enderror"
                                                        id="type" name="type">
                                                        <option selected>Pilih...</option>
                                                        @if (old('type', $kriteria->type) == "benefit")
                                                         <option value="benefit" selected>Benefit</option>
                                                        <option value="cost">cost</option>
                                                        @else
                                                        <option value="benefit">Benefit</option>
                                                        <option value="cost" selected>Cost</option>
                                                        @endif
                                                    </select>
                                                    @error('type')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Nilai Bobot</label>
                                                    <input type="text"
                                                        class="form-control
                                                        @error('weight') is-invalid @enderror"
                                                        id="weight" name="weight"
                                                        value="{{ old('weight', $kriteria->weight) }}">
                                                    @error('weight')
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
