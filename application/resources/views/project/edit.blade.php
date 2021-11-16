@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('home')}}" class="btn btn-sm btn-neutral">Ver proyectos</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @can('update-project')
                    {!! Form::open(['route' => ['project.update', $project], 'method'=>'put']) !!}
                    @endcan
                    <h6 class="heading-small text-muted mb-4">Información del proyecto</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('project_name', 'Nombre proyecto', ['class' => 'form-control-label']) }}
                                        {{ Form::text('project_name', $project->project_name, ['class' => 'form-control']) }}
                                    </div>
                                </div>

                            </div>

                        </div>


                        <hr class="my-4" />
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        {!! Form::hidden('status', 0) !!}
                                        <input type="checkbox" name="status" value="1" {{ $project->status ? 'checked' : ''}} class="custom-control-input" id="status">
                                        {{ Form::label('status', 'Estado', ['class' => 'custom-control-label']) }}
                                    </div>
                                </div>
                                @can('update-user')
                                <div class="col-md-12">
                                    {{ Form::submit('Enviar', ['class'=> 'mt-5 btn btn-primary']) }}
                                </div>
                                @endcan
                            </div>
                        </div>
                    @can('update-project')
                    {!! Form::close() !!}
                    @endcan
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
