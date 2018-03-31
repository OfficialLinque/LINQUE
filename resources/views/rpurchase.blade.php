@extends('layouts.app')

@section('nav')
<li class="nav-item active">
    <a class="nav-link">Purchase <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('cart') }}">Cart <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('transaction') }}">Transaction <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('rlocation') }}">Location <span class="sr-only">(current)</span></a>
</li>
@endsection

@section('body')

<div class="album mt-4 py-5 bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="card mb-4 box-shadow text-light bg-dark">
                    <div class="text-center bg-white p-0">
                        <img style="height: 225px;" src="img/coke.png" class="rounded img-fluid">
                    </div>
                    <div class="card-body">
                        <p class="card-title lead">
                            Product Title
                        </p>
                        <button class="btn btn-outline-primary text-white collapsed w-100" 
                                data-toggle="collapse" 
                                data-target="#collapseTwo" 
                                aria-expanded="false" 
                                aria-controls="collapseTwo">
                            Set Purchase Options
                        </button>
                        <div  id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="row w-100">
                                    <div class="col-6 text-center">
                                        <p class="mb-2 text-uppercase">Pack</p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <p class="mb-2 text-uppercase">Price</p>
                                    </div>
                                </div>
                                <div class="custom-control custom-radio my-1 ">
                                    <input type="radio" id="pradio1" name="radio" class="custom-control-input">
                                    <label class="custom-control-label w-100" for="pradio1">
                                        <div class="row w-100">
                                            <div class="col-6">
                                            by package
                                            </div>
                                            <div class="col-6">
                                            ₱ 100.00
                                            </div>
                                        </div>
                                    </label>
                                    
                                </div>
                                <div class="custom-control custom-radio my-1 ">
                                    <input type="radio" id="pradio2" name="radio" class="custom-control-input">
                                    <label class="custom-control-label w-100" for="pradio2">
                                        <div class="row w-100">
                                            <div class="col-6">
                                            by box
                                            </div>
                                            <div class="col-6">
                                            ₱ 100.00
                                            </div>
                                        </div>
                                    </label>
                                    
                                </div>
                                <div class="custom-control custom-radio my-1 ">
                                    <input type="radio" id="pradio3" name="radio" class="custom-control-input">
                                    <label class="custom-control-label w-100" for="pradio3">
                                        <div class="row w-100">
                                            <div class="col-6">
                                            by case
                                            </div>
                                            <div class="col-6">
                                            ₱ 100.00
                                            </div>
                                        </div>
                                    </label>
                                    
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white">Quantity : </span>
                                    </div>
                                    <input type="text" class="ml-2 form-control text-white"></input>
                                </div>
                             </div>
                        
                        

                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-light"
                                        data-toggle="modal" data-target="#moreinfo">
                                        <i class="material-icons">info_outline</i></button>
                                <button type="button" class="btn btn-sm btn-outline-light"
                                        data-toggle="modal" data-target="#edit">
                                        <i class="material-icons">add_shopping_cart</i>
                                </button>
                            </div>
                            <small class="text-white">03/15/18</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="moreinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header border-bottom pb-1">
                        <div class="col-12">
                            <div class=row>
                                <div class="col-12">
                                    <h5 class="modal-title mb-3" id="exampleModalLongTitle">
                                    Product Title
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body " style="height: 300px; overflow-y: scroll;">
                        
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
                                        <p class="my-1">Type: Type Here</p>
                                        <p class="my-1">Quantity: Quantity Here </p>
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <p class="my-1"><- Package - ></p>
                                            <p class="my-1"><- Price - > </p>
                                        </div>
                                        
                                    </div>
                                    <p class="my-1"><- Description Here - ></p>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
                        
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection