<?php

namespace App\Http\Controllers;

use App\Models\Matrix;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreMatrixRequest;
use App\Http\Requests\UpdateMatrixRequest;

class MatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Matrix::with('alternatif', 'kriteria')->latest()->get();
        $matrix = [];
        foreach ($data as $value) {
            $matrix[$value->alternatif_id][$value->kriteria_id] = (object) [
                'alternatif_id' => $value->alternatif_id,
                'alternatif_code' => $value->alternatif->code,
                'alternatif_name' => $value->alternatif->name,
                'kriteria_id' => $value->kriteria_id,
                'kriteria_code' => $value->kriteria->code,
                'kriteria_name' => $value->kriteria->name,
                'id' => $value->id,
                'value' => $value->value,
            ];
        }

        // dd($matriks);
        return view('dashboard.matriks.index', [
            'title' => 'Matriks',
            'matrix' => $matrix,
            'alternatifs' => Alternatif::orderBy('code', 'asc')->get(),
            'kriterias' => Kriteria::orderBy('code', 'asc')->get(),
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.matriks.create', [
            'title' => 'Tambah Matriks',
            'alternatifs' => Alternatif::orderBy('code', 'asc')->get(),
            'kriterias' => Kriteria::orderBy('code', 'asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.alternatif_id' => 'required',
            'addMoreInputFields.*.kriteria_id' => 'required',
            'addMoreInputFields.*.value' => 'required',
        ]);

        foreach ($request->addMoreInputFields as $key => $value) {
            Matrix::create($value);
        }
        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect('/dashboard/matriks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matrix $matrix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('dashboard.matriks.edit', [
            'title' => 'Edit Matriks',
            'matriks' => Matrix::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $matrix = Matrix::findOrFail($id);
        $matrix->update($request->all());
        Alert::success('Success', 'Data berhasil diubah');
        return redirect('/dashboard/matriks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function truncate()
    {
        Matrix::truncate();
        Alert::success('Success', 'Matriks berhasil direset');
        return redirect('/dashboard/matriks');
    }
}
