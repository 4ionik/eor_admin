@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">{{  $title }}</h3>
                        </div>
                        <div class="col-lg-2">
                            @can('create-post')
                                <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">Crear nueva vista</a>
                            @endcan
                        </div>
                        <div class="col-lg-2">
                            {!! Form::open(['route' => 'post.index', 'method'=>'get']) !!}
                            <div class="form-group mb-0">
                            {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'Buscar vista']) }}
                            </div>

                            {!! Form::close() !!}
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if (count($posts)>0)
                        @foreach($posts as $post)
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
                                            @can('destroy-post')
                                            {!! Form::open(['route' => ['post.destroy', $post],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            @endcan
                                            @can('update-post')
                                            <a class="dropdown-item" href="{{route('post.edit',$post)}}">Editar Vista</a>
                                            @endcan
                                            @can('destroy-post')
                                            <a class="dropdown-item" href="" onclick="this.closest('form').submit(); return false;">Eliminar Vista</a>
                                            {!! Form::close() !!}
                                            @endcan
                                            {{-- @can('create-permission')
                                            <a class="dropdown-item"  href="{{route('project.show',$project)}}">Permissions</a>
                                            @endcan --}}
                                        </div>
                                        
                                    </div>
                                    @endhasrole
                                </div>

                                <a href="{{route('post.show', $post)}}">
                                    
                                    <div class="wrimagecard-topimage_header">
                                        <center>
                                        @if ($post->featured_image != 'blank.png')
                                            <img class="img-fluid" src="{{asset('storage/' . $post->featured_image)}}" alt="Project Image"  width="100" height="200">
                                        @else
                                            <i class="fa fa-bar-chart" style="color:#203478"></i>
                                        @endif
                                        </center>
                                    </div>
                                    <div class="wrimagecard-topimage_title">
                                        <h4>
                                            {{ $post->post_title }}
                                        </h4>
                                    </div>
                                    
                                </a>
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
        {{-- <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">Vistas</h3>
                        </div>
                        <div class="col-lg-4">
                    {!! Form::open(['route' => 'post.index', 'method'=>'get']) !!}
                        <div class="form-group mb-0">
                        {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'Buscar vista']) }}
                    </div>

                    {!! Form::close() !!}
                </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-hover align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Proyecto </th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Creado Por</th>
                                    <!-- <th scope="col">Photo</th> -->
                                    <th scope="col" class="text-center">Acción</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($posts as $post)
                                    <tr>
                                        <th scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{$post->post_title }}
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{$post->project->project_name}}
                                        </td>
                                        <td>
                                            @if($post->status)
                                                <span class="badge badge-pill badge-lg badge-success">Activo</span>
                                            @else
                                                <span class="badge badge-pill badge-lg badge-danger">Deshabilitado</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$post->user->name}}
                                        </td>
                                        <td class="text-center">
                                            @can('destroy-post')
                                            {!! Form::open(['route' => ['post.destroy', $post],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            @endcan
                                            @can('view-post')
                                            <a class="btn btn-primary btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Ver y editar detalles de la vista" href="{{route('post.show', $post)}}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            @endcan
                                            @can('update-post')
                                            <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Editar detalles vista" href="{{route('post.edit',$post)}}">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            @endcan
                                            @can('destroy-post')
                                                <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Eliminar vista" href="">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot >
                                <tr>
                                    <td colspan="6">
                                        {{$posts->links()}}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@push('scripts')
    <script>
        jQuery(document).ready(function(){
            $('.delete').on('click', function(e){
                e.preventDefault();
                let that = jQuery(this);
                jQuery.confirm({
                    icon: 'fas fa-wind-warning',
                    closeIcon: true,
                    title: '¡Estás seguro!',
                    content: '¡No puedes deshacer esta acción.!',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        confirmar: function () {
                            that.parent('form').submit();
                            //$.alert('Confirmed!');
                        },
                        Cancelar: function () {
                            //$.alert('Canceled!');
                        }
                    }
                });
            })
        })

    </script>
@endpush
