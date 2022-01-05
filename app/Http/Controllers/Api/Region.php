<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Exception;
use Illuminate\Http\Request;

class Region extends Controller
{
    public function getRegencies(Request $request)
    {
        try {
            $request->validate([
                'province_id' => 'required|integer',
            ]);

            $regencies = Regency::where('province_id', $request->province_id)->orderBy('name', 'ASC')->get();
            if (count($regencies) == 0) {
                throw new Exception("Data Tidak Ditemukan", 1);
            }
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $regencies
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function getDistricts(Request $request)
    {
        try {
            $request->validate([
                'regency_id' => 'required|integer',
            ]);

            $districts = District::where('regency_id', $request->regency_id)->orderBy('name', 'ASC')->get();
            if (count($districts) == 0) {
                throw new Exception("Data Tidak Ditemukan", 1);
            }
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $districts
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function getVillages(Request $request)
    {
        try {
            $request->validate([
                'district_id' => 'required|integer',
            ]);

            $villages = Village::where('district_id', $request->district_id)->orderBy('name', 'ASC')->get();
            if (count($villages) == 0) {
                throw new Exception("Data Tidak Ditemukan", 1);
            }
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $villages
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
