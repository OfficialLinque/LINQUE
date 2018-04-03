@extends('layouts.app')

@section('nav')
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('dhome') }}">Product <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" >Orders <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('location') }}">Location <span class="sr-only">(current)</span></a>
</li>
@endsection


@section('body')

<div class="album mt-4 py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- START FOR LOOP HERE -->
            <div class="col-md-4">
                <div class="card mb-4 box-shadow text-light bg-dark">
                    <div class="card-body">
                        <p class="card-title lead">
                            TRANS NO. 626418
                        </p>
                        <p class="card-text">
                            Buyer: John Doe
                        </p>
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="btn-group">

                                <button type="button" class="btn btn-sm btn-outline-light"
                                        data-toggle="modal" data-target="#moreinfo">
                                        More Info
                                </button>
                                
                            </div>
                            <small class="text-white">03/31/2018</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="moreinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header border-bottom pb-3">
                        <div class="col-12">
                            <div class=row>
                                <div class="col-12">
                                    <h5 class="modal-title mb-3" id="exampleModalLongTitle">INFO - TRANS NO. 123451</h5>
                                </div>
                                <div class="col-12">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Buyer : John Doe</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body" style="height: 400px; overflow-y: scroll;">
                        
                        <div class="row">

                            <!-- START FOR LOOP HERE -->
                            <div class="col-12 border-bottom">
                                <div class=row>
                                    <div class="col-4">
                                        <div class="text-center d-flex bg-white p-0 h-100">
                                            <img src="img/coke.png" class="rounded img-fluid align-self-center">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="lead my-1">Lorem Ipsum Dolor </p>
                                        <hr class="my-2">
                                        <p class="my-1">Type: by box </p>
                                        <p class="my-1">Quantity: 2 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 border-bottom">
                                <div class=row>
                                    <div class="col-4">
                                        <div class="text-center d-flex bg-white p-0 h-100">
                                            <img src="img/coke.png" class="rounded img-fluid align-self-center">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="lead my-1">Lorem Ipsum Dolor </p>
                                        <hr class="my-2">
                                        <p class="my-1">Type: by box </p>
                                        <p class="my-1">Quantity: 2 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 border-bottom">
                                <div class=row>
                                    <div class="col-4">
                                        <div class="text-center d-flex bg-white p-0 h-100">
                                            <img src="img/coke.png" class="rounded img-fluid align-self-center">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="lead my-1">Lorem Ipsum Dolor </p>
                                        <hr class="my-2">
                                        <p class="my-1">Type: by box </p>
                                        <p class="my-1">Quantity: 2 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 border-bottom">
                                <div class=row>
                                    <div class="col-4">
                                        <div class="text-center d-flex bg-white p-0 h-100">
                                            <img src="img/coke.png" class="rounded img-fluid align-self-center">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="lead my-1">Lorem Ipsum Dolor </p>
                                        <hr class="my-2">
                                        <p class="my-1">Type: by box </p>
                                        <p class="my-1">Quantity: 2 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 border-bottom">
                                <div class=row>
                                    <div class="col-4">
                                        <div class="text-center d-flex bg-white p-0 h-100">
                                            <img src="img/coke.png" class="rounded img-fluid align-self-center">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="lead my-1">Lorem Ipsum Dolor </p>
                                        <hr class="my-2">
                                        <p class="my-1">Type: by box </p>
                                        <p class="my-1">Quantity: 2 </p>
                                    </div>
                                </div>
                            </div>
                            <!-- END FOR LOOP HERE -->

                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- END FOR LOOP HERE -->
        </div>
    </div>
</div>
@endsection
