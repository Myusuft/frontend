<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\PowerSupply;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PowerSupplyManagementController extends Controller
{
    //
    public function index()
    {
        $powerSupplies = PowerSupply::latest()->get();
        return response([
            'code' => 200,
            'result' => $powerSupplies
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'value' => 'required'
            ],
            [
                'value.required' => 'value field is required'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'code' => 401,
                'message' => 'please insert the empty column',
                'result'    => $validator->errors()
            ], 401);
        } else {

            $powerSupplies = PowerSupply::create([
                'value' => $request->input('value')
            ]);

            if ($powerSupplies) {
                return response()->json([
                    'code' => 200,
                    'message' => 'successfully save data',
                ], 200);
            } else {
                return response()->json([
                    'code' => 401,
                    'message' => 'failed to save data',
                ], 401);
            }
        }
    }

    public function show($id)
    {
        $powerSupplies = PowerSupply::whereId($id)->first();
        if ($powerSupplies) {
            return response()->json([
                'code' => 200,
                'result'    => $powerSupplies
            ], 200);
        } else {
            return response()->json([
                'code' => 401,
                'message' => 'data not found',
            ], 401);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'value' => 'required'
            ],
            [
                'value.required' => 'value field is required'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'code' => 401,
                'message' => 'please insert the empty column',
                'result'    => $validator->errors()
            ], 401);
        } else {

            $powerSupplies = PowerSupply::whereId($request->input('id'))->update([
                'value' => $request->input('value')
            ]);

            if ($powerSupplies) {
                return response()->json([
                    'code' => 200,
                    'message' => 'Successfully update data',
                ], 200);
            } else {
                return response()->json([
                    'code' => 401,
                    'message' => 'failed to update data',
                ], 401);
            }
        }
    }

    public function destroy($id)
    {
        $powerSupplies = PowerSupply::findOrFail($id);
        $powerSupplies->delete();

        if ($powerSupplies) {
            return response()->json([
                'code' => 200,
                'message' => 'Successfully delete data',
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'message' => 'failed to delete data',
            ], 400);
        }

    }
}
