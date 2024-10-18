<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    
    public function tagShow(Request $request){
        try{
            $tag = Tag::all();

            return response()->json([
                'status'    => 'success',
                'tag'  => $tag
            ], 200);

        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Request fail'
            ], 401);
        }
    }

    public function tagCreate(Request $request){
        try{
            $tag = Tag::create([
                'name'  => $request->input('name')
            ]);

            return response()->json([
                'status'    => 'success',
                'message'   => 'Tag created successfully',
                'tag'  => $tag
            ], 201);


        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Request fail to create tag'
            ], 401);
        }
    }


    public function tagUpdate(Request $request){
        try{
            $tagId = $request->input('id');

            Tag::where('id', '=', $tagId)->update([
                'name'  => $request->input('name')
            ]);

            return response()->json([
                'status'    => 'success',
                'message'   => 'Tag has been updated successfully'
            ], 200);
        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Request fail to update Tag'
            ], 401);
        }
    }

    public function tagDelete(Request $request){
        try{
            $tagId = $request->input('id');

            Tag::where('id', '=', $tagId)->delete();

            return response()->json([
                'status'    => 'success',
                'message'   => 'Tag has been delete successfully'
            ], 200);
        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Request fail to delete Tag'
            ], 401);
        }
    }

    public function tagById(Request $request){
        try{
            $tagId = $request->input('id');

            $data = Tag::where('id', '=', $tagId)->first();

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
