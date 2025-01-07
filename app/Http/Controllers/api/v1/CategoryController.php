<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CategoryController extends BaseController 
{
    protected $category;

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $data = Category::all();
        return  response()->json([
            'status' => true,
            'message' => 'categories retrieved successfully',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validate->errors()
            ], 422);
        }

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'status' => true,
            'message' => 'category created successfully',
            'data' => $category
        ], 201);
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'category found successfully',
            'data' => $category
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
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'category updated successfully',
            'data' => $category
        ], 200);
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'status' => true,
            'message' => 'category deleted successfully'
        ], 200);
    }
}
