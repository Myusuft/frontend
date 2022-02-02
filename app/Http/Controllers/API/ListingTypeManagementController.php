<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\ListingType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ListingTypeManagementController extends Controller
{
    //
    public function index()
    {
        $listingTypes = ListingType::latest()->get();
        return response([
            'code' => 200,
            'result' => $listingTypes
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required',
                'description' => 'required',
                'type_listing' => 'required',
                'image_icon' => 'required'
            ],
            [
                'name.required' => 'name field is required',
                'description.required' => 'description field is required',
                'type_listing.required' => 'type_listing field is required',
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

            $listingTypes = ListingType::create([
                'name'     => $request->input('name'),
                'description' => $request->input('description'),
                'type_listing' => $request->input('type_listing'),
                'image_icon' => $request->input('image_icon')
            ]);

            if ($listingTypes) {
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
        $listingTypes = ListingType::whereId($id)->first();
        if ($listingTypes) {
            return response()->json([
                'code' => 200,
                'result'    => $listingTypes
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
                'description' => 'required',
                'type_listing' => 'required',
                'image_icon' => 'required'
            ],
            [
                'name.required' => 'name field is required',
                'description.required' => 'description field is required',
                'type_listing.required' => 'type_listing field is required',
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

            $listingTypes = ListingType::whereId($request->input('id'))->update([
                'name'     => $request->input('name'),
                'description' => $request->input('description'),
                'type_listing' => $request->input('type_listing'),
                'image_icon' => $request->input('image_icon')
            ]);

            if ($listingTypes) {
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
        $listingTypes = ListingType::findOrFail($id);
        $listingTypes->delete();

        if ($listingTypes) {
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
