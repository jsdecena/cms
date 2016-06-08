<?php 

namespace Jsd\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use Validation;
use Hash;
 
class UserController extends Controller
{
    public function index()
    {
        return view('blog::admin.user.list', ['users' => User::paginate(10) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog::admin.user.create');
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
        	'name'		=> 'required',
        	'email'		=> 'required|email|unique:users',
        	'password'	=> 'required'
        ]);

        $data = [
        	'name' 		=> $request->input('name'),
        	'email' 	=> $request->input('email'),
        	'password'	=> Hash::make($request->input('password'))
        ];

        User::create($data);

        return redirect()->route('admin.user.index')->with('success', 'Successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blog::admin.user.edit', ['user' => User::find($id)]);
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
        	'name'		=> 'required',
        	'email'		=> 'required|email',
        ]);

        $data = [
        	'name' 		=> $request->input('name'),
        	'email' 	=> $request->input('email')
        ];

        if ($request->has('password')) {
        	$data['password'] = Hash::make($request->input('password'));
        }

        User::find($id)->update($data);

        return redirect()->route('admin.user.index')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.user.index')->with('success', 'Successfully deleted!');
    }
}