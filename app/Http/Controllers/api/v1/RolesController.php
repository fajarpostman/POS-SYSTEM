<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all();
        return response()->json([
            'status' => true,
            'message' => 'roles retrieved successfully',
            'roles' => $roles
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:255'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validate->errors()
            ], 422);
        }

        $roles = Roles::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'roles created successfully',
            'roles' => $roles
        ], 200);
    }


    public function show(string $id)
    {
        $roles = Roles::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Roles found successfuly',
            'roles' => $roles
        ], 200);
    }

    public function update(Request $request, string $id)
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
            'message' => 'roles updated successfully',
            'roles' => $roles
        ], 200);
    }

    public function destroy(string $id)
    {
        $roles = Roles::findOrFail($id);
        $roles->delete();

        return response()->json([
            'status' => true,
            'message' => 'roles deleted successfully'
        ], 204);
    }
}
