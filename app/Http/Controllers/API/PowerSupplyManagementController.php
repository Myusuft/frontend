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
        $powerSupplies = PowerSupply::all();
        return $this->output(200, 'retrieved successfully', $powerSupplies);
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
            return $this->output(422, 'please insert the empty column');
        } else {
            $powerSupplies = PowerSupply::create([
                'value' => $request->input('value')
            ]);
            if ($powerSupplies) {
                return $this->output(201, 'created successfully', $powerSupplies);
            } else {
                return $this->output(401, 'not created');
            }
        }
    }

    public function show($id)
    {
        $powerSupplies = PowerSupply::whereId($id)->first();
        if ($powerSupplies) {
            return $this->output(200, 'retrieved successfully', $powerSupplies);
        } else {
            return $this->output(404, 'not found');
        }
    }

    public function update(Request $request, $id)
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
            return $this->output(422, 'please insert the empty column');
        } else {
            $powerSupplies = PowerSupply::find($id);
            $powerSupplies->value = $request->input('value');
            $powerSupplies->update();

            if ($powerSupplies) {
                return $this->output(200, 'updated successfully', $powerSupplies);
            } else {
                return $this->output(401, 'not updated');
            }
        }
    }

    public function destroy($id)
    {
        $powerSupplies = PowerSupply::findOrFail($id);
        $powerSupplies->delete();

        if ($powerSupplies) {
            return $this->output(200, 'deleted successfully', $powerSupplies);
        } else {
            return $this->output(404, 'not deleted');
        }
    }

    public function output($code, $message, $data = null)
    {
        $name = 'Power Supply';
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
