<?php
   
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
   
class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index() /*untuk menampilkan daftar post*/
    {
        $posts = Post::all(); /*untuk mengambil semua data di database*/
        return Inertia::render('Posts/Index', ['posts' => $posts]); /*untuk menampilkan tampilan dengan menggunakan framework Inertia*/
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create() /*untuk menampilkan create*/
    {
        return Inertia::render('Posts/Create');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate(); /*untuk memastikan data yang di terima*/
   
        Post::create($request->all());
            
        return redirect(route('posts.index'))->with('success', 'Post created.'); /*mengarahkan kembari ke halaman home dgn pesan sukses*/
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();
    
        Post::find($id)->update($request->all());
        return redirect(route('posts.index'))->with('success', 'Post updated.');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect(route('posts.index'))->with('success', 'Post deleted.');
    }
}  
