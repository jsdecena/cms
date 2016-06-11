<?php 

namespace Jsdecena\Blog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
class AdminController extends Controller
{
    public function index()
    {
        return view('blog::admin.dashboard');
    }
 
}