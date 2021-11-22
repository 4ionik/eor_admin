@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(['route' => 'settings.update', 'files'=>true])}}
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h3 class="mb-0">Configuraciones generales</h3></div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('company_name', 'Nombre empresa', ['class' => 'form-control-label'])}}
                                    {{ Form::text('company_name', setting('company_name'), ['class'=>"form-control"])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('company_email', 'Correo empresa', ['class' => 'form-control-label'])}}
                                    {{ Form::text('company_email', setting('company_email'), ['class'=>"form-control"])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('company_phone', 'Télefono empresa', ['class' => 'form-control-label'])}}
                                    {{ Form::text('company_phone', setting('company_phone'), ['class'=>"form-control"])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('company_address', 'Dirección empresa', ['class' => 'form-control-label'])}}
                                    {{ Form::text('company_address', setting('company_address'), ['class'=>"form-control"])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('company_city', 'Ciudad', ['class' => 'form-control-label'])}}
                                    {{ Form::text('company_city', setting('company_city'), ['class'=>"form-control"])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{Form::label('company_logo', 'Empresa logo', ['class' => 'form-control-label'])}}
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="uploadFile" data-input="thumbnail" data-preview="holder" class="btn btn-secondary">
                                            <i class="fa fa-picture-o"></i> Elegir Logo
                                          </a>
                                        </span>
                                        @if (setting('company_logo'))
                                            <input id="thumbnail" class="form-control d-none" type="text" value="{{ setting('company_logo') }}" name="company_logo">
                                        @else
                                            <input id="thumbnail" class="form-control d-none" type="text" name="company_logo">
                                        @endif
                                    </div>
                            </div>
                            <div class="col-md-2 text-right">
                                @if (setting('company_logo'))
                                <img alt="Image placeholder"
                                    class="avatar avatar-xl  rounded-circle"
                                    data-toggle="tooltip" data-original-title="{{ setting('company_name') }} Logo"
                                    src="{{ asset(setting('company_logo')) }}">
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h4 class="mb-0">Configuración de Pantalla</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('record_per_page', 'Registos por página', ['class' => 'form-control-label'])}}
                                {{ Form::text('record_per_page', setting('record_per_page'), ['class'=>"form-control"])}}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('company_currency_symbol', 'Símbolo de moneda', ['class' => 'form-control-label'])}}
                                {{ Form::text('company_currency_symbol', setting('company_currency_symbol'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h4 class="mb-0">Otras Configuraciones</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('default_role', 'Correo electrónico de notificación de administrador de registro de usuario', ['class' => 'form-control-label']) }}
                            <div class="custom-control custom-checkbox">
                                {!! Form::hidden('register_notification_email', 0) !!}
                                <input type="checkbox" name="register_notification_email" value="1" {{ setting('register_notification_email') ? 'checked' : ''}} class="custom-control-input" id="register_notification_email">
                                {{ Form::label('register_notification_email', 'Activado', ['class' => 'custom-control-label form-control-label']) }}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('default_role', 'Seleccionar rol de inicio de sesión por defecto', ['class' => 'form-control-label']) }}
                                {{ Form::select('default_role', $roles, setting('default_role', null), [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Seleccionar rol...']) }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('max_login_attempts', 'Intentos máximos de inicio de sesión', ['class' => 'form-control-label'])}}
                                {{ Form::text('max_login_attempts', setting('max_login_attempts'), ['class'=>"form-control"])}}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('lockout_delay', 'Demora de bloqueo (minutos)', ['class' => 'form-control-label'])}}
                                {{ Form::text('lockout_delay', setting('lockout_delay'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            {!! Form::submit('Actualizar configuraciones', ['class'=> 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{Form::close()}}

        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        jQuery(document).ready(function(){
            $(".alert").slideDown(300).delay(5000).slideUp(300);
        });

        jQuery(document).ready(function(){
            jQuery('#uploadFile').filemanager('file');
        })
    </script>
@endpush
