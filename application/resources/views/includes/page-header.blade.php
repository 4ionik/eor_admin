<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-2">
                <div class="col-lg-6 col-5 text-right">
                    @stack('pg_btn')
                </div>
                <div class="col-lg-12 col-12">
                    @include('flash::message')
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mt-4">{{$error}}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
