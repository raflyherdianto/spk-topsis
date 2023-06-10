@extends('dashboard.layouts.main')

@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Sistem Pendukung Keputusan SAW & TOPSIS</h3>
    </div>
    <div class="page-content">
        <div class="col-6 col-lg-6">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('/compiled/jpg/2.jpg') }}" alt="Photo" />
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">Welcome, {{ auth()->user()->name }}</h5>
                            <h6 class="text-muted mb-0">{{ auth()->user()->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon purple mb-2">
                                            <i class="bi bi-list-task"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">
                                            Alternatif
                                        </h6>
                                        <h6 class="font-extrabold mb-0">{{ count($alternatifs) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon blue mb-2">
                                            <i class="bi bi-stack"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Kriteria</h6>
                                        <h6 class="font-extrabold mb-0">{{ count($kriterias) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
