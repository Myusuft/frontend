<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\InfrastructureType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfrastructureTypeManagementController extends Controller
{
    //
    public function index()
    {
        $infrastructureTypes = InfrastructureType::all();
        return $this->output(200, 'retrieved successfully', $infrastructureTypes);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required',
                'description' => 'required',
                'image_icon' => 'required',
            ],
            [
                'name.required' => 'name field is required',
                'description.required' => 'description field is required',
                'image_icon.required' => 'image_icon field is required',
            ]
        );

        if ($validator->fails()) {
            return $this->output(422, 'please insert the empty column');
        } else {
            $infrastructureTypes = InfrastructureType::create([
                'name'     => $request->input('name'),
                'description' => $request->input('description'),
                'image_icon' => $request->input('image_icon'),
            ]);
            if ($infrastructureTypes) {
                return $this->output(201, 'created successfully', $infrastructureTypes);
            } else {
                return $this->output(401, 'not created');
            }
        }
    }

    public function show($id)
    {
        $infrastructureTypes = InfrastructureType::whereId($id)->first();
        if ($infrastructureTypes) {
            return $this->output(200, 'retrieved successfully', $infrastructureTypes);
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
                'image_icon' => 'required',
            ],
            [
                'name.required' => 'name field is required',
                'description.required' => 'description field is required',
                'image_icon.required' => 'image_icon field is required',
            ]
        );

        if ($validator->fails()) {
            return $this->output(422, 'please insert the empty column');
        } else {
            $infrastructureTypes = InfrastructureType::find($request->input('id'));
            $infrastructureTypes->name = $request->input('name');
            $infrastructureTypes->description = $request->input('description');
            $infrastructureTypes->image_icon = $request->input('image_icon');
            $infrastructureTypes->update();
            
            if ($infrastructureTypes) {
                return $this->output(200, 'updated successfully', $infrastructureTypes);
            } else {
                return $this->output(401, 'not updated');
            }
        }
    }

    public function destroy($id)
    {
        $infrastructureTypes = InfrastructureType::findOrFail($id);
        $infrastructureTypes->delete();

        if ($infrastructureTypes) {
            return $this->output(200, 'deleted successfully', $infrastructureTypes);
        } else {
            return $this->output(404, 'not deleted');
        }
    }
    
    public function output($code, $message, $data = null)
    {
        $name = 'Infrastructure Type';
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
