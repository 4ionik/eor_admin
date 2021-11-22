<?php

namespace App\Http\Controllers;


use App\Project;
use App\User;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-project');
        $this->middleware('permission:create-project', ['only' => ['create','store']]);
        $this->middleware('permission:update-project', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-project', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $projects = Project::with(['user'])->where('project_name', 'like', '%'.$request->search.'%')->get();
        }else{
            $projects = Project::with(['user'])->get();
        }
        $title =  'Administrar Proyectos';
        return view('project.index', compact('projects','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Crear Proyecto';
        return view('project.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $request->validate([
            'project_name' => 'required|unique:projects|max:255',
        ]);

        $request->merge(['user_id' => Auth::user()->id]);
        $project = $request->except(['status']);
        $project['status'] = 1;

        Project::create($project);
        flash('¡Proyecto creado con éxito!')->success();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $title = "Conceder permisos";

        return response()->json(Project::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $title = "Detalles del Proyecto";
        $project->with('user');
        return view('project.edit', compact('title', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        flash('¡Proyecto actualizado con éxito!')->success();
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request, $id)
    {
        $result = '';
        
        if ($request->data['status']) {
            $result = '¡Permisos concedidos con éxito!';

            $user = User::find($id);
            $project = Project::find($request->data['project_id']);

            $user->givePermissionTo($project->project_name);
        }else{
            $result = '¡Permisos revocados con éxito!';

            $user = User::find($id);
            $project = Project::find($request->data['project_id']);

            $user->revokePermissionTo($project->project_name);
        }
        return response($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        flash('¡Proyecto eliminado con éxito!')->info();
        return back();
    }

}
