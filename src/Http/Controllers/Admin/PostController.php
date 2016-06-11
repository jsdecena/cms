<?php 

namespace Jsdecena\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Jsdecena\Blog\Models\Post;
use Validation;
use Auth;
 
class PostController extends Controller
{
    public function index()
    {
        return view('blog::admin.post.list', ['posts' => Post::paginate(10) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog::admin.post.create');
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
        	'title'		=> 'required'
        ]);

        $user = Auth::user();

        $data = [
        	'user_id' 		=> $user->id,
        	'title' 		=> $request->input('title'),
        	'slug'  		=> str_slug($request->input('title')),
        	'content' 		=> $request->input('content'),
        	'status' 		=> $request->input('status')
        ];

        Post::create($data);

        return redirect()->route('admin.post.index')->with('success', 'Successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blog::admin.post.edit', ['post' => Post::find($id)]);
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
        	'title'		=> 'required'
        ]);

        $user = Auth::user();

        $data = [
        	'user_id' 		=> $user->id,
        	'title' 		=> $request->input('title'),
        	'slug'  		=> str_slug($request->input('title')),
        	'content' 		=> $request->input('content'),
        	'status' 		=> $request->input('status')
        ];

        Post::find($id)->update($data);

        return redirect()->route('admin.post.index')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('admin.post.index')->with('success', 'Successfully deleted!');
    }
}