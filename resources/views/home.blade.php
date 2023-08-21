@extends('layouts.app')
@section('content')
    <div class="container-fluid" style="margin-top: 100px">

        <div class="row d-flex justify-content-end">

            <div class="position-fixed start-0 col-2  bg-dark z-2 p-4" style="height: 100vh">
                <div class="d-flex justify-content-center">

                    <div>

                        <button type="button" class="btn btn-outline-light my-2 d-none d-sm-none d-md-block"> <a class="text-decoration-none text-primary fw-bold" href="{{route('logged.createProject')}}"> Crea un nuovo progetto</a></button>

                    </div>

                    <div>
                        <a class="d-block d-md-none text-light my-3" href="{{route('logged.createProject')}}"><i class="bi bi-plus-circle text-primary fs-1"></i></a>

                    </div>

                </div>
            </div>

            <div class="col-10 ">

                <div class="container p-4 d-flex flex-wrap">


                    @foreach ($projects as $project)
                        <div class="card m-3 col-11 col-sm-5 col-md-4 col-lg-3 col-xl-2 shadow-sm p-3 mb-5 bg-body-tertiary rounded">

                            <img src="{{asset('storage/' . $project -> image)  }}" class="card-img-top" alt="image-project">

                            <div class="card-body">

                                <h5 class="card-title">
                                    {{ $project->title }}
                                </h5>

                                <div class="card-text my-2">

                                    <div class="text-danger">{{ $project-> type -> category}} </div>

                                </div>

                                <div class="card-text my-2">
                                   Budget:
                                   <span class="text-warning fs-5">{{ $project->budget }} €</span>
                                </div>



                                <a href="{{ route('logged.showProject', $project->id) }}" class="btn btn-primary">Vedi i
                                    dettagli
                                </a>

                            </div>

                        </div>
                    @endforeach
                </div>


            </div>

        </div>

    </div>
@endsection
