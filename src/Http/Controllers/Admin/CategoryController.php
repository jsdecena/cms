<?php

namespace Jsdecena\Cms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Jsdecena\Cms\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms::admin.category.list', ['categories' => Category::paginate(10) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms::admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        	'name'		=> 'required'
        ]);

        Category::create([
        					'name' 			=> $request->input('name'),
        					'slug' 			=> str_slug($request->input('name')),
        					'description' 	=> $request->input('description'),
        					'status' 		=> $request->input('status')
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cms::admin.category.edit', ['category' => Category::find($id) ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        	'name'		=> 'required'
        ]);

        Category::find($id)->update([
        					'name' 			=> $request->input('name'),
        					'slug' 			=> str_slug($request->input('name')),
        					'description' 	=> $request->input('description'),
        					'status' 		=> $request->input('status')
        ]);

        return redirect()->route('admin.category.edit', $id)->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('admin.category.index')->with('success', 'Successfully deleted!');
    }
}
