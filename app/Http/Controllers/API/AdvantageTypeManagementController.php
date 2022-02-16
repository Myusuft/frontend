<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\AdvantageType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdvantageTypeManagementController extends Controller
{
    //
    public function index()
    {
        $advantageTypes = AdvantageType::all();
        return $this->output(200, 'retrieved successfully', $advantageTypes);
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
            $advantageTypes = AdvantageType::create([
                'name'     => $request->input('name'),
                'description' => $request->input('description'),
                'image_icon' => $request->input('image_icon'),
            ]);
            if ($advantageTypes) {
                return $this->output(201, 'created successfully', $advantageTypes);
            } else {
                return $this->output(401, 'not created');
            }
        }
    }

    public function show($id)
    {
        $advantageTypes = AdvantageType::whereId($id)->first();
        if ($advantageTypes) {
            return $this->output(200, 'retrieved successfully', $advantageTypes);
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
            $advantageTypes = AdvantageType::find($request->input('id'));
            $advantageTypes->name = $request->input('name');
            $advantageTypes->description = $request->input('description');
            $advantageTypes->image_icon = $request->input('image_icon');
            $advantageTypes->update();
            
            if ($advantageTypes) {
                return $this->output(200, 'updated successfully', $advantageTypes);
            } else {
                return $this->output(401, 'not updated');
            }
        }
    }

    public function destroy($id)
    {
        $advantageTypes = AdvantageType::findOrFail($id);
        $advantageTypes->delete();

        if ($advantageTypes) {
            return $this->output(200, 'deleted successfully', $advantageTypes);
        } else {
            return $this->output(404, 'not deleted');
        }
    }
    
    public function output($code, $message, $data = null)
    {
        $name = 'Advantage Type';
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
