<?php 

namespace Jsdecena\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Jsdecena\Cms\Models\Post;
 
class BlogController extends Controller
{
 
    public function index()
    {
        return view('blog::front.blog.list', ['posts' => Post::where('status', 1)->paginate(2)]);
    }

    public function show($slug)
    {
        return view('blog::front.blog.show', ['post' => Post::where('slug', $slug)->first()]);
    }    
}