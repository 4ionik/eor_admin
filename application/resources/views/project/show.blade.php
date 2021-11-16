@extends('layouts.app')
@section('content')
@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

    <div class="row">
        <!-- <div class="col-xl-8"> -->
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card">
                    <div class="card-body">
                        <div id="app">
                            <task-draggable :tasks-completed="{{ $users }}" :tasks-not-completed="{{ $userspers }}" :task-project="{{ $project }}"></task-draggable>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>



@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $(".alert").slideDown(300).delay(5000).slideUp(300);

    });

  </script>
@endpush
