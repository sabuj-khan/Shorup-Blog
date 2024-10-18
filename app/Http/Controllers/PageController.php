<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutPageShow(Request $request){
        return view('pages.about');
    }
    public function servicesPageShow(Request $request){
        return view('pages.services');
    }

    public function blogsPageShow(Request $request){
        $posts = Post::paginate(6);

        return view('pages.blogs', compact('posts'));
        


        
        //return view('pages.blogs');
    }

    public function contactPageShow(Request $request){
        return view('pages.contact');
    }


    
    // Admin Dashboard all page show

    public function addNewPostPage(Request $request){
        return view('pages.dashboard.add-post');
    }

    public function allPostPage(Request $request){
        return view('pages.dashboard.all-post-page');
    }

    public function editPostPage(Request $request){
        return view('pages.dashboard.edit-post-page');
    }
 
    
    public function categoryListPage(Request $request){
        return view('pages.dashboard.category-page');
    }


    public function tagListPage(Request $request){
        return view('pages.dashboard.tags-page');
    }




}
