<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        // Get all posts
        $posts = Post::latest()->paginate(5);

        // Return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $posts);
    }

    /**
     * Store
     *
     * @param Request $request
     * @return PostResource
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate($this->rules());

        // Buat post baru
        $post = Post::create($validatedData);

        // Return response
        return new PostResource(true, 'Post created successfully', $post);
    }

    /**
     * Update
     *
     * @param Request $request
     * @param Post $post
     * @return PostResource
     */
    public function update(Request $request, Post $post)
    {
        // Validasi data
        $validatedData = $request->validate($this->rules());

        // Update post
        $post->update($validatedData);

        // Return response
        return new PostResource(true, 'Post updated successfully', $post);
    }

    /**
     * Destroy
     *
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Post $post)
    {
        // Delete post
        $post->delete();

        // Return response
        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully'
        ]);
    }

    /**
     * Aturan Validasi
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
        ];
    }

    /**
     * Show
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Get post by ID
        $post = Post::find($id);

        // Cek apakah post ditemukan
        if (is_null($post)) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }

        // Return single post as a resource
        return new PostResource(true, 'Post found', $post);
    }
}
