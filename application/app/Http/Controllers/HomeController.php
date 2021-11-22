<?php

namespace App\Http\Controllers;

use App\Post;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::with(['user','posts'])->paginate(setting('record_per_page', 15));
        $title =  'Administrar Proyectos';

        // $posts = DB::table('posts')->join('projects','posts.project_id','=','projects.id')
        //         ->select('posts.id')->where('projects.flag_post','=',1)->get();

        return view('home', compact('projects','title'));
    }

  
}
