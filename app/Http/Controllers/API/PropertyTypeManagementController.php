<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\PropertyType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PropertyTypeManagementController extends Controller
{
    //
    public function index()
    {
        $propertyTypes = PropertyType::latest()->get();
        return response([
            'code' => 200,
            'result' => $propertyTypes
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required',
                'image_icon' => 'required'
            ],
            [
                'name.required' => 'name field is required',
                'image_icon.required' => 'image_icon field is required'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'code' => 401,
                'message' => 'please insert the empty column',
                'result'    => $validator->errors()
            ], 401);
        } else {

            $propertyTypes = PropertyType::create([
                'name'     => $request->input('name'),
                'image_icon' => $request->input('image_icon')
            ]);

            if ($propertyTypes) {
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
        $propertyTypes = PropertyType::whereId($id)->first();
        if ($propertyTypes) {
            return response()->json([
                'code' => 200,
                'result'    => $propertyTypes
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
                'name'     => 'required',
                'image_icon' => 'required'
            ],
            [
                'name.required' => 'name field is required',
                'image_icon.required' => 'image_icon field is required'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'code' => 401,
                'message' => 'please insert the empty column',
                'result'    => $validator->errors()
            ], 401);
        } else {

            $propertyTypes = PropertyType::whereId($request->input('id'))->update([
                'name'     => $request->input('name'),
                'image_icon' => $request->input('image_icon')
            ]);

            if ($propertyTypes) {
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
        $propertyTypes = PropertyType::findOrFail($id);
        $propertyTypes->delete();

        if ($propertyTypes) {
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
