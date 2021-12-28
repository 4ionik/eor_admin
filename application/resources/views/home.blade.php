@extends('layouts.app')
@section('content')

    <div class="row">
        <!-- <div class="col-xl-8"> -->
        <div class="col">
            <div class="card">
               
                <div class="card-body">
                    <div class="row">
                        @if (count($projects)>0)
                        @foreach($projects as $project)
                        <div class="col-sm-3 col-6 m-auto">

                            <div class="wrimagecard wrimagecard-topimage">
                                <div class="d-flex justify-content-end">
                                    @hasrole('super-admin')
                                    <div class="dropdown text-right">
                                        <a class="btn btn-sm btn-icon-only text-brown" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        
                                        <div class="dropdown-menu dropdown-menu-arrow">
                                            @can('destroy-project')
                                            {!! Form::open(['route' => ['project.destroy', $project],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            @endcan
                                            @can('update-project')
                                            <a class="dropdown-item" href="{{route('project.edit',$project)}}">Editar proyecto</a>
                                            @endcan
                                            @can('destroy-project')
                                            <a class="dropdown-item" href="" onclick="this.closest('form').submit(); return false;">Eliminar proyecto</a>
                                            {!! Form::close() !!}
                                            @endcan
                                        </div>
                                        
                                    </div>
                                    @endhasrole
                                </div>
                                @if($project->flag_post == 1)

                                @foreach($project->posts as $post)
                                    
                                    <a href="{{ route('show_post',['id_post'=>$post->id])}}">
                                        
                                        <div class="wrimagecard-topimage_header">
                                            <center>
                                                <img class="img-fluid" src="{{asset('storage/' . $project->icon)}}" alt="Project Image"  width="100" height="200"> 
                                            </center>
                                        </div>
                                        <div class="wrimagecard-topimage_title">
                                            <h5>
                                                {{ $project->project_name }}
                                             
                                            </h5>
                                        </div>
                                        
                                    </a>
                                @endforeach
                                @else
                                    <a href="{{ route('post.index',['id_project'=>$project->id]) }}">
                                        
                                        <div class="wrimagecard-topimage_header">
                                            <center>
                                                <img class="img-fluid" src="{{asset('storage/' . $project->icon)}}" alt="Project Image"  width="100" height="200"> 
                                            </center>
                                        </div>
                                        <div class="wrimagecard-topimage_title">
                                            <h5>
                                                {{ $project->project_name }}
                                            </h5>
                                        </div>
                                        
                                    </a>
                                    
                                @endif
               
                            </div>

                        </div>
                        @endforeach
                        @else
                        <div class="col-md-12">
                            <div class="alert alert-default text-center" role="alert">
                                <strong>No hay datos para mostrar !!</strong>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
    </div>


@endsection

@push('scripts')
  <script>
    jQuery(document).ready(function(){
        $(".alert").slideDown(300).delay(5000).slideUp(300);
    });

  </script>
@endpush
