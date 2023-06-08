@extends('dashboard.layouts.main')

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-2">
                    <h3>Matriks</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Matriks
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <a href="{{ url('dashboard/matriks/create') }}">
                    <h5 class="col-12 col-md-2 btn btn-primary" style="margin: 15px 15px 0px 15px">Create Data</h5>
                </a>
                @if (!$data->isEmpty())
                <form action="/dashboard/matriks/truncate" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="margin: 15px 15px 0px 15px">Hapus Semua Data</button>
                  </form>
                @endif
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Kode</th>
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
                                <td>{{ $matrix[$loop->iteration][1]->alternatif_code }}</td>
                                @foreach ($key as $value)
                                <td>{{ round($value->value, 3) }}
                                    <a href="/dashboard/matriks/{{ $value->id }}/edit"><i class="bi bi-pencil-square"></i></a>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
