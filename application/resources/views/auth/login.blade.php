@extends('layouts.auth')

@section('content')

    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">

    </div>
    <div class="container mt--9 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <br>
                    <br>
                <div class="card bg-secondary border border-soft">

                    <div class="row justify-content-center">
                        <div class="col-lg-2 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="https://i.postimg.cc/NMq5rRRf/logo.png"
                                        class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="card-header border-0 px-lg-4 bg-transparent">
                    </div>
                    <div class="card-body px-lg-5 py-lg-5 pt-2">
                        @include('flash::message')
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input id="email" type="email" placeholder="correo" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input id="password" type="password" placeholder="contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror                                
                                </div>
                            </div>
                           
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">Iniciar Sesi&oacute;n</button>
                            </div>  
                            <hr class="my-3">
                            <input type="hidden" name="is_guest" id="is_guest" value="0" />
                            <div class="text-center">
                                <button type="submit" id="guest" class="btn btn-primary mt-4">Entrar como invitado</button>
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
            $(".alert").slideDown(300).delay(5000).slideUp(300);
        });
        
        jQuery(document).ready(function(){
            $('#guest').on('click', function(e){
                e.preventDefault();
                $('#is_guest').val('1');
                let that = jQuery(this);
                that.closest('form').submit()
            });
        })
  </script>
@endpush
