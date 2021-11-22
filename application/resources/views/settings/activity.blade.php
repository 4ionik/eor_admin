@extends('layouts.app')
@push('pg_btn')

@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h3 class="mb-0">Ver actividades</h3></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-hover align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Actividad</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Realizado por</th>
                                    <th scope="col">Creación</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($activities as $activity)
                                    <tr>
                                        <th scope="row">
                                            {{$activity->log_name}}
                                        </th>
                                        <td class="budget">
                                            {{$activity->description}}
                                        </td>
                                        <td>
                                            By {{ $activity->causer->name ?? '' }}<br/>
                                        </td>

                                        <td>

                                            {{ $activity->created_at->diffForHumans() }}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot >
                                <tr>
                                    <td colspan="6">
                                        {{$activities->links()}}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
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
                    title: '¡Estás seguro!',
                    content: '¡No puedes deshacer esta acción.!',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        Confirmar: function () {
                            that.parent('form').submit();
                            //$.alert('Confirmed!');
                        },
                        Cancelar: function () {
                            //$.alert('Canceled!');
                        }
                    }
                });
            })
        })

    </script>
@endpush
