@extends('layouts.app')
@section('content')

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

<div class="row">
    <div class="col-md-2">
        
    </div>
    <div class="col-md-6">

        <div class="card card-profile">

            <img src="https://i.postimg.cc/0QDKtV9w/Captura-de-Pantalla-2021-07-12-a-la-s-19-32-10.png"
                alt="Image placeholder" class="card-img-top" height="150px">

            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                            <img src="https://i.postimg.cc/NMq5rRRf/logo.png"
                                class="rounded-circle">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                {{-- <div class="d-flex justify-content-between">
                    <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                    <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                </div> --}}
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center">
                            <p>¿Quién es el Ente Operador Regional? </p>
                            
                        </div>
                        <div class="justify-content-center">
                            <p class="text-justify">En el EOR nos dedicamos a planificar la Red de Transmisión Regional (RTR), dirigir y coordinar la operación técnica del Sistema Eléctrico Regional (SER) y realizar la gestión comercial del Mercado Eléctrico Regional (MER) de América Central, a través de una gestión eficiente y eficaz basada en la mejora continua de los procesos, el desarrollo del talento humano y la adopción de mejores prácticas y estándares internacionales bajo la norma ISO 9001:2015, para asegurar servicios de excelencia a las partes interesadas</p>
                        </div>
                        <div class="justify-content-center">
                            <p class="text-justify">El EOR, es la institución responsable de operar y planificar el Sistema Eléctrico Regional (SER) y administrar el Mercado Eléctrico Regional (MER) con criterio técnico y económico, bajo estándares de calidad y seguridad; contribuyendo a un marco regulatorio sólido y previsible, para el desarrollo gradual de un Mercado más abierto y competitivo, en beneficio de los habitantes de América Central. </p>
                        </div>
                        <div class="justify-content-center">
                            <p class="text-justify">Durante los últimos 10 años, el EOR ha fortalecido sus capacidades y los procesos técnicos, comerciales e institucionales con el fin de cumplir con sus funciones y responsabilidades de acuerdo con la regulación regional desde que comenzó la operación del MER y se ha adaptado a los diferentes cambios regulatorios y a las exigencias del mismo mercado.</p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="h5 font-weight-300 text-justify">
                        <i class="ni location_pin mr-2"></i>Una colaboración del de Programa Energías Renovables y Eficiencia Energética (4E), implementado por la Deutsche Gesellschaft für Internationale Zusammenarbeit (GIZ) GmbH, por encargo del Ministerio Federal de Cooperación Económica y Desarrollo (BMZ) para el Sistema de la Integración Centroamericana (SICA), con el objetivo de mejorar las medidas de eficiencia energética y la integración de las energías renovables variables en el sistema eléctrico regional.
                    </div>
                    <!-- <div class="h5 font-weight-300">
                        <i class="ni location_pin mr-2"></i> Copyright © 2021, EOR. Todos los derechos reservados
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        
    </div>
</div>

@endsection