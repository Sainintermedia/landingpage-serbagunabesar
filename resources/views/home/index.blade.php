@extends('layouts.app-master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="bg-light rounded p-1">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{!! url('assets/image/slide_01.jpg') !!}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{!! url('assets/image/slide_02.jpg') !!}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{!! url('assets/image/slide_03.jpg') !!}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="bg-light rounded p-1">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{!! URL::asset('assets/image/slide_01.jpg') !!}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{!! URL::asset('assets/image/slide_02.jpg') !!}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{!! URL::asset('assets/image/slide_03.jpg') !!}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light rounded p-3">

        <div class="six_box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-4 pa_left">
                        <div class="six_probpx yellow_bg"><i><img src="{!! url('assets/image/drumpelastik.png') !!}"
                                    alt="website template image"></i> <span><a href="#">Drum Pelastik</a></span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 pa_left">
                        <div class="six_probpx bluedark_bg"><i><img src="{!! url('assets/image/drumkaleng.png') !!}"
                                    alt="website template image"></i> <span><a href="#">Drum Kaleng</a></span></div>
                    </div>
                    <div class="col-md-2 col-sm-4 pa_left">
                        <div class="six_probpx yellow_bg"><i><img src="{!! url('assets/image/karung.png') !!}"
                                    alt="website template image"></i> <span><a href="#">Karung</a></span></div>
                    </div>
                    <div class="col-md-2 col-sm-4 pa_left">
                        <div class="six_probpx bluedark_bg"><i><img src="{!! url('assets/image/kardus.png') !!}"
                                    alt="website template image"></i> <span><a href="#">kardus</a></span></div>
                    </div>
                    <div class="col-md-2 col-sm-4 pa_left">
                        <div class="six_probpx yellow_bg"><i><img src="{!! url('assets/image/paletpelastik.png') !!}"
                                    alt="website template image"></i> <span><a href="#">Palet Pelastik</a></span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 pa_left">
                        <div class="six_probpx bluedark_bg"><i><img src="{!! url('assets/image/kempu.png') !!}"
                                    alt="website template image"></i> <span><a href="#">Kempu</a></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
