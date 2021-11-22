@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('post.index', ['id_project'=>$post->project_id])}}" class="btn btn-sm btn-neutral">Ver vistas</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => ['post.update', $post], 'method'=>'put', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">Información vista</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {{ Form::label('post_title', 'Titulo vista', ['class' => 'form-control-label']) }}
                                        {{ Form::text('post_title', $post->post_title, ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('project_id', 'Seleccionar proyecto', ['class' => 'form-control-label']) }}
                                        {{ Form::select('project_id', $project, $post->project_id, [ 'class'=> 'form-control', 'placeholder' => 'Select project...']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {{ Form::label('post_body', 'Url', ['class' => 'form-control-label']) }}
                                        {!! Form::text('post_body', $post->post_body, ['class'=> 'form-control',]) !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr class="my-4" />
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="status" value="1" {{ $post->status ? 'checked' : ''}}  class="custom-control-input" id="status">
                                        {{ Form::label('status', 'Estado', ['class' => 'custom-control-label']) }}
                                    </div>
                                </div>
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
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/summernote-bs4.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        jQuery(document).ready(function(){
            $(".alert").slideDown(300).delay(5000).slideUp(300);
        });

        jQuery('#summernote').summernote({
            height: 150,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
              ]

        });
        jQuery('#uploadFile').filemanager('file');
    });
  </script>
@endpush
