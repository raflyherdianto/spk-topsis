@extends('dashboard.layouts.main')

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-2">
                    <h3>Create Alternatif</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Create Alternatif
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
                                    <form action="{{ url('dashboard/alternatif') }}" method="POST" class="form">
                                        @csrf
                                        <div class="row" id="dynamicAddRemove">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Kode</label>
                                                    <input type="text"
                                                        class="form-control
                                                        @error('code') is-invalid @enderror"
                                                        id="code" name="addMoreInputFields[0][code]"
                                                        placeholder="Kode Alternatif..." value="{{ old('code') }}">
                                                        @error('code')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Nama Alternatif</label>
                                                    <input type="text"
                                                        class="form-control
                                                        @error('name') is-invalid @enderror"
                                                        id="name" name="addMoreInputFields[0][name]" placeholder="Nama Alternatif..."
                                                        value="{{ old('name') }}">
                                                    @error('name')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary me-1 mb-1">
                                                Add Data
                                            </button>
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                Reset
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endsection
