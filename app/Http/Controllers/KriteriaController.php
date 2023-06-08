<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kriteria.index', [
            'title' => 'Kriteria',
            'kriterias' => Kriteria::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kriteria.create', [
            'title' => 'Tambah Kriteria',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.code' => 'required',
            'addMoreInputFields.*.name' => 'required',
            'addMoreInputFields.*.type' => 'required',
            'addMoreInputFields.*.weight' => 'required',
        ]);

        foreach ($request->addMoreInputFields as $key => $value) {
            Kriteria::create($value);
        }
        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect('/dashboard/kriteria');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('dashboard.kriteria.edit', [
            'title' => 'Edit Kriteria',
            'kriteria' => Kriteria::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kriterias = Kriteria::find($id);
        $validateData = $request->validate([
            'code' => 'required|max:255',
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'weight' => 'required|max:255',
        ]);

        Kriteria::where('id', $kriterias->id)->update($validateData);
        Alert::success('Success', 'Data berhasil diubah');
        return redirect('/dashboard/kriteria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kriteria::find($id)->delete();
        Alert::success('Success', 'Data berhasil dihapus');
        return redirect('/dashboard/kriteria');
    }
}
