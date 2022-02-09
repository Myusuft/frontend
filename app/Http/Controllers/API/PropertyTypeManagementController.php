<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\PropertyType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class PropertyTypeManagementController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::all();
        return $this->output(200, 'retrieved successfully', $propertyTypes);
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
            return $this->output(422, 'please insert the empty column');
        } else {
            $propertyTypes = PropertyType::create([
                'name'     => $request->input('name'),
                'image_icon' => $request->input('image_icon')
            ]);
            if ($propertyTypes) {
                return $this->output(201, 'created successfully', $propertyTypes);
            } else {
                return $this->output(401, 'not created');
            }
        }
    }

    public function show($id)
    {
        $propertyTypes = PropertyType::whereId($id)->first();
        if ($propertyTypes) {
            return $this->output(200, 'retrieved successfully', $propertyTypes);
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
                'image_icon' => 'required'
            ],
            [
                'name.required' => 'name field is required',
                'image_icon.required' => 'image_icon field is required'
            ]
        );

        if ($validator->fails()) {
            return $this->output(422, 'please insert the empty column');
        } else {
            $propertyTypes = PropertyType::find($request->input('id'));
            $propertyTypes->name = $request->input('name');
            $propertyTypes->image_icon = $request->input('image_icon');
            $propertyTypes->update();

            if ($propertyTypes) {
                return $this->output(200, 'updated successfully', $propertyTypes);
            } else {
                return $this->output(401, 'not updated');
            }
        }
    }

    public function destroy($id)
    {
        $propertyTypes = PropertyType::findOrFail($id);
        $propertyTypes->delete();
        if ($propertyTypes) {
            return $this->output(200, 'deleted successfully', $propertyTypes);
        } else {
            return $this->output(404, 'not deleted');
        }
    }

    public function output($code, $message, $data = null)
    {
        $name = 'Property Type';
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
