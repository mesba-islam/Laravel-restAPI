<?php

namespace App\Http\Controllers;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use App\models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        return new BlogCollection(Blog::all());
    }

    public function show(Request $request, Blog $blog)
    {
        return new BlogResource($blog);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'feature_image'=>'required',
        ]);

        $blog = Blog::create($validated);

        return new BlogResource($blog);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'feature_image'=>'required',
        ]);

        $blog = Blog::findOrFail($id); // Find the blog post by its ID

        $blog->update($validated);

        return new BlogResource($blog);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Perform the deletion
        $blog->delete();

        // Return a success response with a 204 status code
        return response()->noContent();
    }
}
