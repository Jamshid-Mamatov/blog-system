<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image_path'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|unique:blogs,slug',
        ]);
        $imagePath=null;
        if($request->hasFile('image_path')){
            $imagePath = $request->file('image_path')->store('assets/img', 'public');
        }
//        dd($imagePath);

        Blog ::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'image_path'=>$imagePath,
            'user_id'=>Auth::id(),
            'slug'=>$request->slug
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::with('comments.user')->findOrFail($id);
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //

        $blog= Blog::findOrFail($id);
//        dd($blog);
        if($blog->user_id != Auth::id()){
            return redirect()->route('blog.index')->with('error', 'Unauthorized Access');
        }

        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        // Check if the user is the owner of the post
        if ($blog->user_id != auth()->id()) {
            return redirect()->route('blog.index')->with('error', 'Unauthorized access');
        }

        $blog->update($request->all());
        return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        // Check if the user is the owner of the post
        if ($blog->user_id != auth()->id()) {
            return redirect()->route('blog.index')->with('error', 'Unauthorized access');
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog post deleted');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $blogs=Blog::where('title', 'LIKE', "%$query%")
            ->orWhere('body', 'LIKE', "%$query%")
            ->paginate(10);

        return view('blog.index', compact('blogs'))->with('query', $query);
    }
}
