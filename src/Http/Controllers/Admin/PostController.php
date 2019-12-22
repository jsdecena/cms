<?php

namespace Jsdecena\Cms\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Jsdecena\Cms\Traits\UploadableTrait;
use Jsdecena\Cms\Models\Post;
use Jsdecena\Cms\Models\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use UploadableTrait;

    public function index()
    {
        return view('cms::admin.post.list', ['posts' => Post::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('cms::admin.post.create', ['categories' => Category::where('status', 1)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'cover_image' => ['file', 'required']
        ]);

        $user = Auth::user();

        $cover = $this->uploadOne($request->file('cover_image'));

        $data = [
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'cover_image' => $cover,
            'link' => $request->input('link')
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
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $postCats = $post->categories;

        $ids = [];
        foreach ($postCats as $cat) {
            $ids[] = $cat->id;
        }

        return view('cms::admin.post.edit', [
            'post' => $post,
            'ids' => $ids,
            'categories' => Category::where('status', 1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'link' => $request->input('link')
        ];

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->uploadOne($request->file('cover_image'));
        }

        $post = Post::find($id);
        $post->update($data);

        if ($request->has('category')) {
            $post->categories()->sync($request->input('category'));
        } else {
            $post->categories()->detach();
        }

        return redirect()->route('admin.post.edit', $post->id)->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('admin.post.index')->with('success', 'Successfully deleted!');
    }
}
