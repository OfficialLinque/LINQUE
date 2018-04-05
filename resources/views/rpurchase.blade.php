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
            @if($products)
                @foreach($products as $product)
                <form class="col-md-4 product">
                    <div class="card mb-4 box-shadow text-light bg-dark">
                        <div class="text-center bg-white p-0">
                        <img style="height: 225px;" src="@if($product->prodimg) {{$product->prodimg}} @else img/noimage.jpg @endif" class="rounded img-fluid">
                        </div>
                        <div class="card-body">
                            <p class="card-title lead">
                                {{$product->prodname}}
                            </p>
                            <button type="button" class="btn btn-outline-primary text-white collapsed w-100" 
                                    data-toggle="collapse" 
                                    data-target="#{{$product->id}}" 
                                    aria-expanded="false" 
                                    aria-controls="collapseTwo">
                                Set Purchase Options
                            </button>
                            <div  id="{{$product->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="row w-100">
                                    <div class="col-6 text-center">
                                        <p class="mb-2 text-uppercase">Pack</p> 
                                    </div>
                                    <div class="col-6 text-center">
                                        <p class="mb-2 text-uppercase">Price</p>
                                    </div>
                                </div>
                                @if($product->package)
                                    @foreach($product->package as $package)
                                        <div class="custom-control custom-radio my-1 ">
                                            {{ csrf_field() }}
                                            <input type="radio" id="package{{$package->id}}" name="package" class="custom-control-input" value="{{$package->id}}">
                                            <label class="custom-control-label w-100" for="package{{$package->id}}">
                                                <div class="row w-100">
                                                    <div class="col-6">
                                                    {{$package->prodpack}}
                                                    </div>
                                                    <div class="col-6">
                                                    {{$package->prodprice}}
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white">Quantity : </span>
                                    </div>
                                    <input type="text" class="ml-2 form-control text-white" name="quantity" value="{{$product->prodtotalquantity}}"></input>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center ">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-light prodinfo" data-id="{{$product->id}}">
                                            <i class="material-icons">info_outline</i></button>
                                    <button type="submit" class="btn btn-sm btn-outline-light addcart" data-id="{{$product->id}}">
                                            <i class="material-icons">add_shopping_cart</i>
                                    </button>
                                </div>
                                <small class="text-white">
                                    @if($product->created_at)
                                        {{time_elapsed_string($product->created_at)}}
                                    @else
                                        null
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
            @endif
            <!-- Modal -->
            <div class="modal fade" id="moreinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header border-bottom pb-1">
                        <div class="col-12">
                            <div class=row>
                                <div class="col-12">
                                    <h5 class="modal-title mb-3" id="exampleModalLongTitle"><span class="prodname"></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body" style="height: 300px; overflow-y: scroll;">
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
                                        <p class="my-1">Type: <span class="prodtype">Type Here</span></p>
                                        <p class="my-1">Quantity: <span class="prodqty">Quantity Here</span></p>
                                        <div class="proddetails">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="my-1">Description: <br><span class="proddesc"><- Description Here - ></span></p>
                                    </div>
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

@endsection

@section('script')
<script>
    $(document).ready(function(e) {
        $('button.prodinfo').click(function(e) {
            var id = $(this).data('id');

            $.ajax({
                url: "{{route('get_product')}}",
                method: "GET",
                data: {id: id},
                dataType: "json",
                beforeSend: function() {
                    $(".se-pre-con").css("opacity", '0.6');
                    $(".se-pre-con").show("fast");
                },
                success: function(result) {
                    var package = "";
                    $('#moreinfo .prodname').text(result[0].prodname);
                    $('#moreinfo .proddesc').text(result[0].proddesc);
                    $('#moreinfo .prodtype').text(result[0].type.prodtype);
                    $('#moreinfo .prodqty').text(result[0].prodtotalquantity);
                    $('#moreinfo img').attr('src', (result[0].prodimg)?result[0].prodimg:'img/noimage.jpg');

                    $.each(result[0].package, function(key, value) {                    
                        package += '<div class="d-flex justify-content-between align-items-center ">'+
                            '<p class="my-1">'+value.prodpack+'</p>'+
                            '<p class="my-1">'+value.prodprice+'</p>'+
                        '</div>';
                    })

                    $('#moreinfo .proddetails').html(package);

                    $(".se-pre-con").fadeOut("slow");

                    $('#moreinfo').modal('show');
                },
                error: function(err) {
                    $(".se-pre-con").fadeOut("slow");
                }
            });
        });
        
        $('form.product').submit(function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: "{{route('cart_crud', 'add')}}",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $(".se-pre-con").css("opacity", '0.6');
                    $(".se-pre-con").show("fast");
                },
                success: function(result) {
                    $(".se-pre-con").fadeOut("slow");
                },
                error: function(err) {
                    $(".se-pre-con").fadeOut("slow");
                }
            });
        });
    });
</script>
@endsection