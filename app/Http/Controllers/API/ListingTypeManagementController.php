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
        $listingTypes = ListingType::all();
        return $this->output(200, 'retrieved successfully', $listingTypes);
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
            return $this->output(422, 'please insert the empty column');
        } else {
            $listingTypes = ListingType::create([
                'name'     => $request->input('name'),
                'description' => $request->input('description'),
                'type_listing' => $request->input('type_listing'),
                'image_icon' => $request->input('image_icon')
            ]);
            if ($listingTypes) {
                return $this->output(201, 'created successfully', $listingTypes);
            } else {
                return $this->output(401, 'not created');
            }
        }
    }

    public function show($id)
    {
        $listingTypes = ListingType::whereId($id)->first();
        if ($listingTypes) {
            return $this->output(200, 'retrieved successfully', $listingTypes);
        } else {
            return $this->output(404, 'not found');
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
            return $this->output(422, 'please insert the empty column');
        } else {
            $listingTypes = ListingType::find($request->input('id'));
            $listingTypes->name = $request->input('name');
            $listingTypes->description = $request->input('description');
            $listingTypes->type_listing = $request->input('type_listing');
            $listingTypes->image_icon = $request->input('image_icon');
            $listingTypes->update();
            
            if ($listingTypes) {
                return $this->output(200, 'updated successfully', $listingTypes);
            } else {
                return $this->output(401, 'not updated');
            }
        }
    }

    public function destroy($id)
    {
        $listingTypes = ListingType::findOrFail($id);
        $listingTypes->delete();

        if ($listingTypes) {
            return $this->output(200, 'deleted successfully', $listingTypes);
        } else {
            return $this->output(404, 'not deleted');
        }
    }

    public function output($code, $message, $data = null)
    {
        $name = 'Listing Type';
        if ($code == 200 || $code == 201) {
            $result = [
                'code' => $code,
                'status' => 'success',
                'message' => $name . " " . $message,
                'data' => $data,
            ];
        } else if ($code == 401 || $code == 404) {
            $result = [
                'code' => $code,
                'status' => 'fail',
                'message' => $name . " " . $message,
            ];
        } else if ($code == 422) {
            $result = [
                'code' => $code,
                'status' => 'error',
                'message' => $message,
            ];
        }

        return response($result);
    }
}
