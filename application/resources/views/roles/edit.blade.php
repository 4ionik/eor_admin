@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('roles.index')}}" class="btn btn-sm btn-neutral">Ver roles</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => ['roles.update', $role], 'method'=>'put']) !!}
                    <h6 class="heading-small text-muted mb-4">Role information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('name', 'Nombre', ['class' => 'form-control-label']) }}
                                        {{ Form::text('name', $role->name, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                        <hr class="my-4" />
                        <div class="pl-lg-1">
                            <div class="row">
                                    <div class="col-lg-6">
                                        @foreach ($permissions as $key => $permission)
                                        <div class="form-group p-2 d-inline-block">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="permissions[]" value="{{ $key }}" class="custom-control-input" id="{{ $permission }}"
                                                @foreach ($role->permissions as $perm)
                                                    @if ($perm->id== $key))
                                                        checked
                                                    @endif
                                                @endforeach
                                                @if($role->name == 'super-admin')
                                                    disabled
                                                @endif>
                                                {{ Form::label($permission, $permission, ['class' => 'custom-control-label']) }}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                            </div>
                        </div>
                        <div class="pl-lg-1">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ Form::submit('Enviar', ['class'=> 'mt-3 btn btn-primary']) }}
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