<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\DeveloperType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeveloperTypeManagementController extends Controller
{
    //
    public function index()
    {
        $developerTypes = DeveloperType::all();
        return $this->output(200, 'retrieved successfully', $developerTypes);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required',
                'deadline' => 'required',
                'status' => 'required',
                'price' => 'required',
            ],
            [
                'name.required' => 'name field is required',
                'deadline.required' => 'deadline field is required',
                'status.required' => 'status field is required',
                'price.required' => 'price field is required',                
            ]
        );

        if ($validator->fails()) {
            return $this->output(422, 'please insert the empty column');
        } else {
            $developerTypes = DeveloperType::create([
                'name'     => $request->input('name'),
                'description' => $request->input('description'),
                'deadline' => $request->input('deadline'),
                'status' => $request->input('status'),
                'price' => $request->input('price'),
            ]);
            if ($developerTypes) {
                return $this->output(201, 'created successfully', $developerTypes);
            } else {
                return $this->output(401, 'not created');
            }
        }
    }

    public function show($id)
    {
        $developerTypes = DeveloperType::whereId($id)->first();
        if ($developerTypes) {
            return $this->output(200, 'retrieved successfully', $developerTypes);
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
                'deadline' => 'required',
                'status' => 'required',
                'price' => 'required',
            ],
            [
                'name.required' => 'name field is required',
                'deadline.required' => 'deadline field is required',
                'status.required' => 'status field is required',
                'price.required' => 'price field is required',
            ]
        );

        if ($validator->fails()) {
            return $this->output(422, 'please insert the empty column');
        } else {
            $developerTypes = DeveloperType::find($id);
            $developerTypes->name = $request->input('name');
            $developerTypes->description = $request->input('description');
            $developerTypes->deadline = $request->input('deadline');
            $developerTypes->status = $request->input('status');
            $developerTypes->price = $request->input('price');
            $developerTypes->update();
            
            if ($developerTypes) {
                return $this->output(200, 'updated successfully', $developerTypes);
            } else {
                return $this->output(401, 'not updated');
            }
        }
    }

    public function destroy($id)
    {
        $developerTypes = DeveloperType::findOrFail($id);
        $developerTypes->delete();

        if ($developerTypes) {
            return $this->output(200, 'deleted successfully', $developerTypes);
        } else {
            return $this->output(404, 'not deleted');
        }
    }
    
    public function output($code, $message, $data = null)
    {
        $name = 'Developer Type';
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
