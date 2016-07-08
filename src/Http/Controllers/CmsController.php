<?php 

namespace Jsdecena\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Jsdecena\Cms\Models\Post;
 
class CmsController extends Controller
{
 
    public function index()
    {
        return view('cms::front.cms.list', ['posts' => Post::where('status', 1)->paginate(2)]);
    }

    public function show($slug)
    {
        return view('cms::front.cms.show', ['post' => Post::where('slug', $slug)->first()]);
    }    
}