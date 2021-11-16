<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\PostServiceInterface;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostExport;
use App\Imports\PostImport;

class PostController extends Controller
{

    private $postInterface;

    public function __construct(PostServiceInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return $posts object
     */
    public function index()
    {
        $posts = $this->postInterface->PostList();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view create.blade.php
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Confirm a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $post object
     */

    public function confirm(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title',
            'description' => 'required',
        ]);

        $post = $this->postInterface->PostConfirm($request);

        return view('posts.confirm', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return redirect with success message
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $post = $this->postInterface->PostCreate($request);

        return redirect('/post')->with('message', 'You have successfully created!');
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
     * @return $post object
     */
    public function edit($id)
    {
        $post = $this->postInterface->PostEdit($id);

        return view('posts.update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return redirect with success message
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $post = $this->postInterface->PostUpdate($request, $id);

        return redirect('/post')->with('message', 'You have successsfully updated!');
    }

    /**
     * Confirm the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $post object
     */
    public function update_confirm(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $post = $this->postInterface->UpdateConfirm($request);

        return view('posts.update_confirm', compact('post'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->postInterface->PostDelete($id);

        return redirect('/post')->with('message', 'You have successsfully deleted!');
    }
     /**
     * Search for post data.
     *
     * @param  $request
     * @return redirect with message
     */
    public function search(Request $request)
    {

        $posts = $this->postInterface->PostSearch($request);
        if (count($posts) > 0) {
            return view('posts.index', compact('posts'));
        } else {
            return redirect('/post')->with('message', 'No Results found!');
        }
    }

    public function importExportView()
    {
       return view('posts/post_import');
    }

     /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new PostExport, 'posts.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new PostImport,request()->file('file'));
             
        return redirect('/post')->with('message', 'Posts uploaded successfully.');
    }
}
