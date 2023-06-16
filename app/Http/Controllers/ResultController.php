<?php

namespace App\Http\Controllers;

use App\Models\Matrix;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ResultController extends Controller
{

    public function index(){
        Alert::error('Error', 'Silahkan klik hitung pada menu Matriks!');
        return redirect('/dashboard/matriks');
    }

    public function hitung(){
        $data = Matrix::with('alternatif', 'kriteria')->get();
        $totalAlternatif = Alternatif::count();
        $totalKriteria = Kriteria::count();

        $matrix = [];
        foreach ($data as $value) {
            $matrix[$value->alternatif_id][$value->kriteria_id] = $value->value;
        }

        $jumAlternatif = count($matrix);
        $jumKriteria = count($matrix[1]);

        if($jumAlternatif != $totalAlternatif || $jumKriteria != $totalKriteria){
            Alert::error('Error', 'Data matriks belum lengkap!');
            return redirect('/dashboard/matriks');
        } else {
            // create normalization with SAW method

            $max = [];
            $min = [];
            foreach ($matrix as $key => $value) {
                foreach ($value as $k => $v) {
                    if(!isset($max[$k])){
                        $max[$k] = $v;
                    } else {
                        if($v > $max[$k]){
                            $max[$k] = $v;
                        }
                    }
                    if(!isset($min[$k])){
                        $min[$k] = $v;
                    } else {
                        if($v < $min[$k]){
                            $min[$k] = $v;
                        }
                    }
                }
            }
            $normalization = [];
            foreach ($matrix as $key => $value) {
                foreach ($value as $k => $v) {
                    if(Kriteria::find($k)->type == 'cost'){
                        $normalization[$key][$k] = (object) [
                            'alternatif_id' => $key,
                            'kriteria_id' => $k,
                            'value' => $v,
                            'normalization' => ($min[$k]) / $v,
                        ];
                    } else {
                        $normalization[$key][$k] = (object) [
                            'alternatif_id' => $key,
                            'kriteria_id' => $k,
                            'value' => $v,
                            'normalization' => $v / ($max[$k]),
                        ];
                    }
                }
            }

            // create normalization * weight

            $weightNormal = [];
            foreach ($normalization as $key => $value) {
                foreach ($value as $k => $v) {
                    $weightNormal[$key][$k] = (object) [
                        'alternatif_id' => $key,
                        'kriteria_id' => $k,
                        'value' => $v->value,
                        'normalization' => $v->normalization,
                        'weight' => Kriteria::find($k)->weight,
                        'normalizationWeight' => $v->normalization * Kriteria::find($k)->weight,
                    ];
                }
            }

            // create positive ideal solution with benefit criteria and cost criteria

            $idealPositive = [];
            foreach ($weightNormal as $key => $value) {
                foreach ($value as $k => $v) {
                    if(Kriteria::find($k)->type == 'cost'){
                        if(!isset($idealPositive[$k])){
                            $idealPositive[$k] = $v->normalizationWeight;
                        } else {
                            if($v->normalizationWeight < $idealPositive[$k]){
                                $idealPositive[$k] = $v->normalizationWeight;
                            }
                        }
                    } else {
                        if(!isset($idealPositive[$k])){
                            $idealPositive[$k] = $v->normalizationWeight;
                        } else {
                            if($v->normalizationWeight > $idealPositive[$k]){
                                $idealPositive[$k] = $v->normalizationWeight;
                            }
                        }
                    }
                }
            }

            // create negative ideal solution with benefit criteria and cost criteria

            $idealNegative = [];
            foreach ($weightNormal as $key => $value) {
                foreach ($value as $k => $v) {
                    if(Kriteria::find($k)->type == 'cost'){
                        if(!isset($idealNegative[$k])){
                            $idealNegative[$k] = $v->normalizationWeight;
                        } else {
                            if($v->normalizationWeight > $idealNegative[$k]){
                                $idealNegative[$k] = $v->normalizationWeight;
                            }
                        }
                    } else {
                        if(!isset($idealNegative[$k])){
                            $idealNegative[$k] = $v->normalizationWeight;
                        } else {
                            if($v->normalizationWeight < $idealNegative[$k]){
                                $idealNegative[$k] = $v->normalizationWeight;
                            }
                        }
                    }
                }
            }

            // create distance between weight normalization and ideal positive solution

            $distancePositive = [];
            foreach ($weightNormal as $key => $value) {
                foreach ($value as $k => $v) {
                    $distancePositive[$key][$k] = (object) [
                        'alternatif_id' => $key,
                        'kriteria_id' => $k,
                        'value' => $v->value,
                        'normalization' => $v->normalization,
                        'weight' => Kriteria::find($k)->weight,
                        'normalizationWeight' => $v->normalizationWeight,
                        'idealPositive' => $idealPositive[$k],
                        'distancePositive' => pow($v->normalizationWeight - $idealPositive[$k], 2),
                    ];
                }
            }
            $distancePositive = array_map(function($value){
                return array_sum(array_column($value, 'distancePositive'));
            }, $distancePositive);

            $distancePositive = array_map(function($value){
                return sqrt($value);
            }, $distancePositive);

            // create distance between weight normalization and ideal negative solution

            $distanceNegative = [];
            foreach ($weightNormal as $key => $value) {
                foreach ($value as $k => $v) {
                    $distanceNegative[$key][$k] = (object) [
                        'alternatif_id' => $key,
                        'kriteria_id' => $k,
                        'value' => $v->value,
                        'normalization' => $v->normalization,
                        'weight' => Kriteria::find($k)->weight,
                        'normalizationWeight' => $v->normalizationWeight,
                        'idealNegative' => $idealNegative[$k],
                        'distanceNegative' => pow($v->normalizationWeight - $idealNegative[$k], 2),
                    ];
                }
            }

            $distanceNegative = array_map(function($value){
                return array_sum(array_column($value, 'distanceNegative'));
            }, $distanceNegative);

            $distanceNegative = array_map(function($value){
                return sqrt($value);
            }, $distanceNegative);

            // create preference value

            $preferenceValue = [];

            foreach ($distanceNegative as $key => $value) {
                $preferenceValue[$key] = $value / ($value + $distancePositive[$key]);
            }

            // create rank sorting by preference value descending

            arsort($preferenceValue);
            $rank = [];
            $i = 1;
            foreach ($preferenceValue as $key => $value) {
                $rank[$key] = (object) [
                    'rank' => $i,
                    'alternatif_id' => $key,
                    'alternatif_code' => Alternatif::find($key)->code,
                    'alternatif_name' => Alternatif::find($key)->name,
                    'preferenceValue' => $value,
                ];
                $i++;
            }

            // dd($rank);
        }
        return view('dashboard.result.index', [
            'title' => 'Hasil',
            'alternatifs' => Alternatif::orderBy('code', 'asc')->get(),
            'kriterias' => Kriteria::orderBy('code', 'asc')->get(),
            'matrix' => $normalization,
            'weightNormal' => $weightNormal,
            'idealPositive' => $idealPositive,
            'idealNegative' => $idealNegative,
            'distancePositive' => $distancePositive,
            'distanceNegative' => $distanceNegative,
            'preferenceValue' => $preferenceValue,
            'rank' => $rank,
        ]);
    }
}
