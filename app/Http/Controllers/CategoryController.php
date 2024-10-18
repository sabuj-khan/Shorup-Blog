<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryShow(Request $request){
        try{
            $category = Category::all();

            return response()->json([
                'status'    => 'success',
                'category'  => $category
            ], 200);

        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Request fail'
            ], 401);
        }
    }


    public function categoryCreate(Request $request){
        try{
            $category = Category::create([
                'name'  => $request->input('name')
            ]);

            return response()->json([
                'status'    => 'success',
                'message'   => 'Category created successfully',
                'category'  => $category
            ], 201);


        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Request fail to create category'
            ], 401);
        }
    }


    public function categoryUpdate(Request $request){
        try{
            $catId = $request->input('id');

            Category::where('id', '=', $catId)->update([
                'name'  => $request->input('name')
            ]);

            return response()->json([
                'status'    => 'success',
                'message'   => 'Category updated successfully'
            ], 200);
        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Request fail to update category'
            ], 401);
        }
    }

    public function categoryDelete(Request $request){
        try{
            $catId = $request->input('id');

            Category::where('id', '=', $catId)->delete();

            return response()->json([
                'status'    => 'success',
                'message'   => 'Category delete successfully'
            ], 200);
        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Request fail to delete category'
            ], 401);
        }
    }

    public function categoryById(Request $request){
        try{
            $catId = $request->input('id');

            $data = Category::where('id', '=', $catId)->first();

            return response()->json([
                'status'    => 'success',
                'data'      => $data
            ], 200);
        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Request fail'
            ], 401);
        }
    }


    

    

}
