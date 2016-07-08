<?php 

namespace Jsdecena\Cms\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
class AdminController extends Controller
{
    public function index()
    {
        return view('cms::admin.dashboard');
    }
 
}