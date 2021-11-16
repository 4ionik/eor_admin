@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12">
                @can('update-post')
                <div class="card-header bg-sm bg-transparent">
                    <div class="row">
                        <div class="col-lg-10">
                            {{-- <h3 class="mb-0">{{  $post->project->project_name }}</h3> --}}
                        </div>
                        <div class="col-lg-2">
                            <a class="btn btn-info btn-sm m-1 btn-floating" data-toggle="tooltip" data-placement="top" title="Edit post details" href="{{route('post.edit',$post)}}">
                                <i class="fa fa-edit" aria-hidden="true"></i> Editar Vista
                            </a>
                        </div>
                        
                    </div>
                </div>
                @endcan
                <div class="card-body-post">
                    


                    <div class="row">
                        <div class="col-sm-12">
                            <!-- <strong>{!! $post->post_body !!}</strong> -->
                            
                            <iframe id="myIframe" src="{{ $post->post_body }}" width="100%" height="800px" id="yourIframe" marginheight="0" frameborder="0" onLoad="resizeIframe(this);"></iframe>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

function resizeIframe(obj) {
    var newheight;
    var newwidth;

    if(document.getElementById){
        newheight = document.getElementById(obj).contentWindow.document .body.scrollHeight;
        newwidth = document.getElementById(obj).contentWindow.document .body.scrollWidth;
    }

    document.getElementById(obj).height = (newheight) + "px";
    document.getElementById(obj).width = (newwidth) + "px";
}

    </script>
@endpush