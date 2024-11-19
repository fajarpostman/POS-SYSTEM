<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Roles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index() 
    {
        $roles = Roles::all();
        return response()->json([
            'status' => true,
            'message' => 'Roles retrieved successfully',
            'data' => $roles
        ], 200);
    }

    public function show($id) 
    {
        $roles = Roles::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Roles found successfuly',
            'data' => $roles
        ], 200);
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $roles = Roles::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Roles created successfully',
            'data' => $roles
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Valdiation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $roles = Roles::findOrFail($id);
        $roles->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Roles updated successfully',
            'data' => $roles
        ], 200);
    }

    public function destroy($id)
    {
        $roles = Roles::findOrFail($id);
        $roles->delete();

        return response()->json([
            'status' => true,
            'message' => 'Roles deleted successfully'
        ], 204);
    }
}
