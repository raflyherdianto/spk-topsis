<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.alternatif.index', [
            'title' => 'Alternatif',
            'alternatifs' => Alternatif::all(),
            'kriterias' => Kriteria::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.alternatif.create', [
            'title' => 'Tambah Alternatif',
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
        ]);

        foreach ($request->addMoreInputFields as $key => $value) {
            Alternatif::create($value);
        }
        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect('/dashboard/alternatif');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('dashboard.alternatif.edit', [
            'title' => 'Edit Alternatif',
            'alternatif' => Alternatif::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $alternatifs = Alternatif::find($id);
        $validateData = $request->validate([
            'code' => 'required|max:255',
            'name' => 'required|max:255',
        ]);

        Alternatif::where('id', $alternatifs->id)->update($validateData);
        Alert::success('Success', 'Data berhasil diubah');
        return redirect('/dashboard/alternatif');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Alternatif::find($id)->delete();
        Alert::success('Success', 'Data berhasil dihapus');
        return redirect('/dashboard/alternatif');
    }
}
