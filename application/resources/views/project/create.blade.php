@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('home')}}" class="btn btn-sm btn-neutral">Proyectos</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => 'project.store']) !!}
                    <h6 class="heading-small text-muted mb-4">Información del Proyecto</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('project_name', 'Nombre Proyecto', ['class' => 'form-control-label']) }}
                                        {{ Form::text('project_name', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                {{-- <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="status" value="1" class="custom-control-input" id="status">
                                        {{ Form::label('status', 'Estado', ['class' => 'custom-control-label']) }}
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    {{ Form::submit('Enviar', ['class'=> 'mt-5 btn btn-primary']) }}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
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
