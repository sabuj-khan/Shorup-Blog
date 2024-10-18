<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    

    public function allPostAction(Request $request){
        $post = Post::with('user', 'category', 'tag')->paginate(4);

        return response()->json([
            'post'  => $post,
        ]);
    }
    public function postShow(Request $request){
        // $user = User::where('usertype', '=', 'admin')->first();
        // $userID = $user->id;

        $post = Post::with('user', 'category', 'tag')->get();

        return response()->json([
            'post'  => $post,
            //'id'    => $userID
        ]);
    }


    public function postCreate(Request $request){
        try{
            $user     = User::where('usertype', '=', 'admin')->first();
            $userID   = $user->id;
            $title    = $request->input('title');
            $content  = $request->input('content');
            $category = $request->input('category_id');
            $tags     = $request->input('tag_id');

            $img        = $request->file('image');
            $time       = time();
            $fileName   = $img->getClientOriginalName();
            $imageName  = "{$userID}-{$time}-{$fileName}";
            $image_url  = "uploads/post-img/{$imageName}";

            // Image File Upload
            $img->move(public_path('uploads/post-img'), $imageName);

            $postData = Post::create([
                'title'         => $title,
                'content'       => $content,
                'image'         => $image_url,
                'user_id'       => $userID,
                'category_id'   => $category,
                'tag_id'        => $tags
            ]);


            return response()->json([
                'status'  => 'success',
                'message' => 'The post has been created successfully',
                'data'    => $postData
            ], 201);

        }
        catch(Exception $e){
            return response()->json([
                'status' => 'fail',
                'message' => 'Request fail to create the post'
            ], 401);
        }
    }


    public function postUpdate(Request $request){
        try{
            $user     = User::where('usertype', '=', 'admin')->first();
            $userID   = $user->id;
            $postID   = $request->input('id');
            $title    = $request->input('title');
            $content  = $request->input('content');
            $category = $request->input('category_id');
            $tags     = $request->input('tag_id');

            if($request->hasFile('image')){
                $img        = $request->file('image');
                $time       = time();
                $fileName   = $img->getClientOriginalName();
                $imageName  = "{$userID}-{$time}-{$fileName}";
                $image_url  = "uploads/post-img/{$imageName}";

                // Image File Upload
                $img->move(public_path('uploads/post-img'), $imageName);

                // Delete File
                $filePath = $request->input('file_path');
                File::delete($filePath);

                // Update post with image
                Post::where('id', '=', $postID)->where('user_id', '=', $userID)->update([
                    'title'         => $title,
                    'content'       => $content,
                    'image'         => $image_url,
                    'user_id'       => $userID,
                    'category_id'   => $category,
                    'tag_id'        => $tags
                ]);
                


                return response()->json([
                    'status'    => 'success',
                    'message'   => 'The post has been updated successfully'
                ], 200);


            }else{
                // Update post without image
                $postData = Post::where('id', '=', $postID)->where('user_id', '=', $userID)->update([
                    'title'         => $title,
                    'content'       => $content,
                    'user_id'       => $userID,
                    'category_id'   => $category,
                    'tag_id'        => $tags
                ]);


                return response()->json([
                    'status'    => 'success',
                    'message'   => 'The post has been updated successfully'
                ], 200);
            }
        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Request fail to update the post'
            ], 401);
        }
    }

    public function postDelete(Request $request){
        try{
            $user     = User::where('usertype', '=', 'admin')->first();
            $userID   = $user->id;
            $postID   = $request->input('id');
            $filePath = $request->input('file_path');
            File::delete($filePath);

            Post::where('id', '=', $postID)->where('user_id','=', $userID)->delete();

            return response()->json([
                'status'    => 'success',
                'message'   => 'Post deleted successfully'
            ], 200);

        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Request fail to delete post'
            ], 401);
        }
    }


    public function postById(Request $request){
        try{
            $user     = User::where('usertype', '=', 'admin')->first();
            $userID   = $user->id;
            $postID   = $request->input('id');

            $postById = Post::where('id', '=', $postID)->where('user_id', '=', $userID)->first();

            return response()->json([
                'status' => 'success',
                'data' => $postById
            ], 200);

        }
        catch(Exception $e){
            return response()->json([
                'status' => 'fail',
                'message' => 'Request fail !'
            ], 401);
        }
    }


    public function GetPostById(Request $request){
        $user     = User::where('usertype', '=', 'admin')->first();
        $userID   = $user->id;
        $postID   = $request->id;

        $postById = Post::where('id', '=', $postID)->where('user_id', '=', $userID)->with('user', 'category', 'tag')->first();

        return response()->json([
            'status' => 'success',
            'data' => $postById
        ], 200); 
    }










}
 