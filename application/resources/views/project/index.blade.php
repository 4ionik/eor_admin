@extends('layouts.app')
@push('pg_btn')
@can('create-project')
    <a href="{{ route('project.create') }}" class="btn btn-sm btn-neutral">Crear nuevo proyecto</a>
@endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">Proyectos</h3>
                        </div>
                        <div class="col-lg-4">
                    {{-- {!! Form::open(['route' => 'users.index', 'method'=>'get']) !!} --}}
                        <div class="form-group mb-0">
                        {{-- {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'Search users']) }} --}}
                    </div>
                    {!! Form::close() !!}
                </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            @if (count($projects)>0)
                            <table class="table table-hover align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Agregado por</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Creación</th>
                                    <th scope="col" class="text-center">Acción</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($projects as $project)
                                    <tr>
                                        <th scope="row">
                                            {{$project->project_name}}
                                        </th>
                                        <td class="budget">
                                            {{$project->user->name}}
                                        </td>
                                        <td>
                                            @if($project->status)
                                                <span class="badge badge-pill badge-lg badge-success">Activo</span>
                                            @else
                                                <span class="badge badge-pill badge-lg badge-danger">Deshabilitado</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$project->created_at->diffForHumans()}}
                                        </td>
                                        <td class="text-center">
                                            @can('destroy-project')
                                            {!! Form::open(['route' => ['project.destroy', $project],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            @endcan

                                            @can('update-project')
                                            <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Editar proyecto" href="{{route('project.edit',$project)}}">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            @endcan
                                            @can('destroy-project')
                                                <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Eliminar proyecto" href="">
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
                                        {{$projects->links()}}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                            @else
                            <div class="alert alert-default" role="alert">
                                <strong>No hay datos para mostrar</strong>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    title: '¿Estas seguro?',
                    content: 'No se puede deshacer esta accion',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        confirm: function () {
                            that.parent('form').submit();
                        },
                        cancel: function () {
                        }
                    }
                });
            })
        })

    </script>
@endpush
