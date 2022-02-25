<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\FacilityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacilityTypeManagementController extends Controller
{
    //
    public function index()
    {
        $facilityTypes = FacilityType::all();
        return $this->output(200, 'retrieved successfully', $facilityTypes);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required',
                'category' => 'required',
                'image_icon' => 'required',
            ],
            [
                'name.required' => 'name field is required',
                'category.required' => 'category field is required',
                'image_icon.required' => 'image_icon field is required',
            ]
        );

        if ($validator->fails()) {
            return $this->output(422, 'please insert the empty column');
        } else {
            $facilityTypes = FacilityType::create([
                'name'     => $request->input('name'),
                'category' => $request->input('category'),
                'image_icon' => $request->input('image_icon'),
            ]);
            if ($facilityTypes) {
                return $this->output(201, 'created successfully', $facilityTypes);
            } else {
                return $this->output(401, 'not created');
            }
        }
    }

    public function show($id)
    {
        $facilityTypes = FacilityType::whereId($id)->first();
        if ($facilityTypes) {
            return $this->output(200, 'retrieved successfully', $facilityTypes);
        } else {
            return $this->output(404, 'not found');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required',
                'category' => 'required',
                'image_icon' => 'required',
            ],
            [
                'name.required' => 'name field is required',
                'category.required' => 'category field is required',
                'image_icon.required' => 'image_icon field is required',
            ]
        );

        if ($validator->fails()) {
            return $this->output(422, 'please insert the empty column');
        } else {
            $facilityTypes = FacilityType::find($id);
            $facilityTypes->name = $request->input('name');
            $facilityTypes->category = $request->input('category');
            $facilityTypes->image_icon = $request->input('image_icon');
            $facilityTypes->update();
            
            if ($facilityTypes) {
                return $this->output(200, 'updated successfully', $facilityTypes);
            } else {
                return $this->output(401, 'not updated');
            }
        }
    }

    public function destroy($id)
    {
        $facilityTypes = FacilityType::findOrFail($id);
        $facilityTypes->delete();

        if ($facilityTypes) {
            return $this->output(200, 'deleted successfully', $facilityTypes);
        } else {
            return $this->output(404, 'not deleted');
        }
    }
    
    public function output($code, $message, $data = null)
    {
        $name = 'Facility Type';
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
