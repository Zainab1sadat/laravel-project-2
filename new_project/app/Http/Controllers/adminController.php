<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index')
                ->with('page','admin')
                ->with('posts',post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create')
                ->with('page','admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|image'
        ]);
            $image_new_name ='';
            if ($request->has('image')) {
                $image = $request->image;
                $image_new_name = time(). $image->getClientOriginalName();
                $image->move('upload',$image_new_name);
            }

        post::create(['title'=> $request->title,'description'=> $request->description,'image'=>$image_new_name]);
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $admin)
    {
        return view('admin.edit')
                ->with('page','admin')
                ->with('post',$admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $admin)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required|max:500'
        ]);

        if ($request->has('image')) {
            unlink('upload/'. $admin->image);
            $image = $request->image;
            $image_new_name = time(). $image->getClientOriginalName();
            $image->move('upload',$image_new_name);
            $admin->image = $image_new_name;
            $admin->save();
        }
       

        $admin->title = $request->title;
        $admin->description = $request->description;
        $admin->save();

        return redirect()->route('admin.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::findOrfail($id);
        unlink('upload/'. $post->image);
        $post->delete();

        return redirect()->back();
    }
}
