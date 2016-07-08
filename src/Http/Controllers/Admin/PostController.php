<?php 

namespace Jsdecena\Cms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Jsdecena\Cms\Models\Post;
use Jsdecena\Cms\Models\Category;
use Auth;
 
class PostController extends Controller
{
    public function index()
    {
        return view('cms::admin.post.list', ['posts' => Post::paginate(10) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms::admin.post.create', ['categories' => Category::where('status', 1)->get()]);
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

        $post = Post::create($data);

        if ($request->has('category')) {
			$post->categories()->sync($request->input('category'));
        }        

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
    	$post 		= Post::find($id);
    	$postCats 	= $post->categories;

    	$ids = [];
    	foreach ($postCats as $cat) {
    		$ids[] = $cat->id;
    	}

        return view('cms::admin.post.edit', [
        											'post' 			=> $post,
        											'ids'			=> $ids,
        											'categories' 	=> Category::where('status', 1)->get()
        										]);
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
        	'title' 		=> $request->input('title'),
        	'slug'  		=> str_slug($request->input('title')),
        	'content' 		=> $request->input('content'),
        	'status' 		=> $request->input('status')
        ];

        $post = Post::find($id);
        $post->update($data);

        if ($request->has('category')) {
			$post->categories()->sync($request->input('category'));
        }else{
        	$post->categories()->detach();
        }        

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