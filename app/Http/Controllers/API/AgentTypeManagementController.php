<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\AgentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentTypeManagementController extends Controller
{
    //
    public function index()
    {
        $agentTypes = AgentType::all();
        return $this->output(200, 'retrieved successfully', $agentTypes);
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
            $agentTypes = AgentType::create([
                'name'     => $request->input('name'),
                'description' => $request->input('description'),
                'deadline' => $request->input('deadline'),
                'status' => $request->input('status'),
                'price' => $request->input('price'),
            ]);
            if ($agentTypes) {
                return $this->output(201, 'created successfully', $agentTypes);
            } else {
                return $this->output(401, 'not created');
            }
        }
    }

    public function show($id)
    {
        $agentTypes = AgentType::whereId($id)->first();
        if ($agentTypes) {
            return $this->output(200, 'retrieved successfully', $agentTypes);
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
            $agentTypes = AgentType::find($id);
            $agentTypes->name = $request->input('name');
            $agentTypes->description = $request->input('description');
            $agentTypes->deadline = $request->input('deadline');
            $agentTypes->status = $request->input('status');
            $agentTypes->price = $request->input('price');
            $agentTypes->update();
            
            if ($agentTypes) {
                return $this->output(200, 'updated successfully', $agentTypes);
            } else {
                return $this->output(401, 'not updated');
            }
        }
    }

    public function destroy($id)
    {
        $agentTypes = AgentType::findOrFail($id);
        $agentTypes->delete();

        if ($agentTypes) {
            return $this->output(200, 'deleted successfully', $agentTypes);
        } else {
            return $this->output(404, 'not deleted');
        }
    }
    
    public function output($code, $message, $data = null)
    {
        $name = 'Agent Type';
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
