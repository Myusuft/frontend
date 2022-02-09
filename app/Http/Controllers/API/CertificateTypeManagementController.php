<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\CertificateType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CertificateTypeManagementController extends Controller
{
    //
    public function index()
    {
        $certificateTypes = CertificateType::all();
        return $this->output(200, 'retrieved successfully', $certificateTypes);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required',
                'description' => 'required',
            ],
            [
                'name.required' => 'name field is required',
                'description.required' => 'description field is required',
            ]
        );

        if ($validator->fails()) {
            return $this->output(422, 'please insert the empty column');
        } else {
            $certificateTypes = CertificateType::create([
                'name'     => $request->input('name'),
                'description' => $request->input('description'),
            ]);
            if ($certificateTypes) {
                return $this->output(201, 'created successfully', $certificateTypes);
            } else {
                return $this->output(401, 'not created');
            }
        }
    }

    public function show($id)
    {
        $certificateTypes = CertificateType::whereId($id)->first();
        if ($certificateTypes) {
            return $this->output(200, 'retrieved successfully', $certificateTypes);
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
            ],
            [
                'name.required' => 'name field is required',
                'description.required' => 'description field is required',
            ]
        );

        if ($validator->fails()) {
            return $this->output(422, 'please insert the empty column');
        } else {
            $certificateTypes = CertificateType::find($request->input('id'));
            $certificateTypes->name = $request->input('name');
            $certificateTypes->description = $request->input('description');
            $certificateTypes->update();
            
            if ($certificateTypes) {
                return $this->output(200, 'updated successfully', $certificateTypes);
            } else {
                return $this->output(401, 'not updated');
            }
        }
    }

    public function destroy($id)
    {
        $certificateTypes = CertificateType::findOrFail($id);
        $certificateTypes->delete();

        if ($certificateTypes) {
            return $this->output(200, 'deleted successfully', $certificateTypes);
        } else {
            return $this->output(404, 'not deleted');
        }
    }
    
    public function output($code, $message, $data = null)
    {
        $name = 'Certificate Type';
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
