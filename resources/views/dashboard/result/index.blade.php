@extends('dashboard.layouts.main')

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-4">
                    <h3>Hasil Perhitungan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Hasil Perhitungan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="col-12 col-md-6 order-md-1 order-last mb-2">
                <h5>Matriks Ternomalisasi (SAW)</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                @foreach ($kriterias as $kriteria)
                                    <th>{{ $kriteria->code }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $keys = array_keys($matrix)
                            @endphp

                            @foreach ($matrix as $key)
                            <tr>
                                @foreach ($key as $value)
                                <td>{{ round($value->normalization, 3) }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="col-12 col-md-6 order-md-1 order-last mb-2">
                <h5>Matriks Ternomalisasi Terbobot (TOPSIS)</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                @foreach ($kriterias as $kriteria)
                                    <th>{{ $kriteria->code }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $keys = array_keys($weightNormal)
                            @endphp

                            @foreach ($weightNormal as $key)
                            <tr>
                                @foreach ($key as $value)
                                <td>{{ round($value->normalizationWeight, 3) }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="col-6 col-md-6 order-md-1 order-last mb-2">
                <h5>Solusi Ideal Positif (A+)</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                @foreach ($kriterias as $kriteria)
                                    <th>{{ $kriteria->code }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $keys = array_keys($idealPositive)
                            @endphp
                            <tr>
                            @foreach ($idealPositive as $key)
                                <td>{{ round($key, 3) }}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="col-6 col-md-6 order-md-1 order-last mb-2">
                <h5>Solusi Ideal Negatif (A-)</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                @foreach ($kriterias as $kriteria)
                                    <th>{{ $kriteria->code }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $keys = array_keys($idealNegative)
                            @endphp
                            <tr>
                            @foreach ($idealNegative as $key)
                                <td>{{ round($key, 3) }}</td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="col-6 col-md-6 order-md-1 order-last mb-2">
                <h5>Jarak Antara Nilai Terbobot Terhadap Solusi Ideal Positif Dan Negatif</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $keys = array_keys($distancePositive)
                            @endphp
                                @for ($alternatif = 1; $alternatif <= count($alternatifs); $alternatif++)
                                <tr>
                                    <th>D{{ $alternatif }}+</th>
                                    <td>{{ round($distancePositive[$alternatif], 3) }}</td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $keys = array_keys($distanceNegative)
                            @endphp
                                @for ($alternatif = 1; $alternatif <= count($alternatifs); $alternatif++)
                                <tr>
                                    <th>D{{ $alternatif }}-</th>
                                    <td>{{ round($distanceNegative[$alternatif], 3) }}</td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="col-6 col-md-6 order-md-1 order-last mb-2">
                <h5>Menentukan Nilai Preferensi Untuk Setiap Alternatif</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Nama</th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $keys = array_keys($rank)
                            @endphp
                            @foreach ($rank as $key)
                                <tr>
                                <td>{{ $key->rank }}</td>
                                <td>{{ $key->alternatif_name }}</td>
                                <td>{{ round($key->preferenceValue, 3) }}</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5>Kesimpulan:</h5>
                    <p>Dengan menggunakan metode SAW & TOPSIS yang memiliki <b>{{ count($alternatifs) }} alternatif </b> dan <b>{{ count($kriterias) }} kriteria</b></p>
                    <p>Alternatif terbaik adalah <b>{{ $rank[1]->alternatif_name }}</b> dengan nilai <b>{{ round($rank[1]->preferenceValue, 3) }}</b></p>
                </div>
            </div>
        </section>
    </div>
@endsection
