<?php

namespace App\Http\Controllers;

use App\Project;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Input;
use App\Helpers\TrustedAuthHelper;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function __construct()
    {

        // $this->middleware('permission:view-post');
        // $this->middleware('permission:create-post', ['only' => ['create','store']]);
        // $this->middleware('permission:update-post', ['only' => ['edit','update']]);
        // $this->middleware('permission:destroy-post', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $posts = Post::with(['user','project'])->where('post_title', 'like', '%'.$request->search.'%')->get();
        }else if ($request->has('id_project')) {
            $posts = Post::with(['user','project'])->where('project_id', '=', $request->input('id_project'))->get();
        }else{
            $posts = Post::with(['user','project'])->get();
        }
        $title =  'Administrar Vistas';

        return view('post.index', compact('posts','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Crear vista';
        $projects = Project::pluck('project_name', 'id');
        Log::debug($projects);
        return view('post.create', compact('projects', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $post = $request->except(['featured_image', 'status']);
        $post['featured_image'] = 'blank.png';
        $post['status'] = 1;
        // if ($request->featured_image) {
        //     $post['featured_image'] = parse_url($request->featured_image, PHP_URL_PATH);
        // }
        Post::create($post);
        flash('¡Vista creada con éxito!')->success();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * 
     * @return \Illuminate\Http\Response
     * 
     */
    public function show(Post $post)

    {
        $title = "Detalle de la Vista";
        $post->with(['project','user']);  
        
      
        return view('post.show', compact('title', 'post'));
    }

    



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $title = "Detalle de la Vista";
        $post->with(['project','user']);
        $project = Project::pluck('project_name', 'id');
        return view('post.edit', compact('title', 'project', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $postdata = $request->except('featured_image');
        $postdata['featured_image'] = 'blank.png';
        // if ($request->featured_image) {
        //     $postdata['featured_image'] = parse_url($request->featured_image, PHP_URL_PATH);
        // }
        $post->update($postdata);
        flash('¡Vista actualizada con éxito!')->success();
        return redirect()->route('post.index', ['id_project'=>$request->project_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        flash('¡Vista elminada con éxito!')->info();
        return back();
    }
}
