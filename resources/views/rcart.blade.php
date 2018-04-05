@extends('layouts.app')

@section('nav')
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('rhome') }}">Purchase <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active ">
    <a class="nav-link" >Cart <span class="sr-only">(current)</span></a>
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
            @if($carts)
                @foreach($carts as $cart)
                <div class="col-md-4 ">
                    <div class="card mb-1 box-shadow text-dark bg-white">
                        <div class="card-body p-2">
                            <div class="col-12">
                                <div class=row>
                                    <div class="col-5 p-0">
                                        <div class="text-center d-flex bg-white p-0 h-100">
                                            <img src="@if($cart->package->product()->get()[0]->prodimg) {{$cart->package->product()->get()[0]->prodimg}} @else img/noimage.jpg @endif" class="rounded img-fluid align-self-center">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <p class="lead my-1">{{$cart->package->product()->get()[0]->prodname}}</p>
                                        <p class="my-1">Seller: {{
                                            ucwords($cart->package->product()->get()[0]->seller()->get()[0]->fname." ".$cart->package->product()->get()[0]->seller()->get()[0]->lname)
                                        }}</p>
                                        <hr class="my-2">
                                        <p class="my-1">Type: {{$cart->package->prodpack}}</p>
                                        <p class="my-1">Quantity: {{$cart->prodquantity}}</p>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-dark editcart" data-id="{{$cart->id}}">
                                                    <i class="material-icons">edit</i></button>
                                            <button type="button" class="btn btn-sm btn-outline-dark removecart" data-id="{{$cart->id}}">
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <i class="material-icons">remove_shopping_cart</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade editProductModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="addLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header border-bottom pb-1">
                                        <h5 class="modal-title mb-3 productName" id="productName"></h5>
                                    </div>
                                    <form class="editproduct">
                                    <div class="modal-body py-2" style="height: fit-content">
                                        <div class="row">
                                           
                                            <div class="row w-100 mb-2">
                                                <div class="col-6 text-center">
                                                    <p class="mb-2 text-uppercase">Pack</p>
                                                </div>
                                                <div class="col-6 text-center">
                                                    <p class="text-uppercase">Price</p>
                                                </div>
                                            </div>
                                            <div class="packagedisplay">
                                                
                                                
                                            </div>
                                            
                                            <div class="row w-100 mt-3 ">
                                                <div class="col-5 text-center pr-0 pt-2">
                                                    <h5 class="mb-2 text-uppercase my-auto">Quantity :</h5>
                                                </div>
                                                <div class="col-7 pl-1">
                                                    <input  id="updatequantity" name="updatequantity" class="ml-2 form-control text-dark">
                                                     <input hidden name="updateid" id="updateid">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button id="editPRODUCT" type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<button type="button" 
        style="position: fixed;right: 30px;bottom: 30px;"
        class="btn btn-primary bmd-btn-fab"
        data-toggle="modal"
        data-target="#shopping_cart">
  <i class="material-icons">credit_card</i>
</button>
<!-- Modal -->
<div class="modal fade" id="shopping_cart" tabindex="-1" role="dialog" aria-labelledby="addLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom pb-1">
        <div class="col-12">
            <h5 class="modal-title mb-3" id="exampleModalLongTitle">CENTSILYO</h5>
        </div>
      </div>
      <div class="modal-body py-2" style="height: 400px; overflow-y: scroll;">
        <div class="row">
            
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="ADDPRODUCT" type="button" class="btn btn-primary">CheckOut</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
$('document').ready(function() {
    $('.removecart').click(function(e) {
        var id = $(this).data('id');
          $.ajax({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                url: "{{route('cart_crud', 'delete')}}",
                method: "POST",
                data:{'id': id},
                dataType: "json",
                beforeSend: function() {
                    $(".se-pre-con").css("opacity", '0.6');
                    $(".se-pre-con").show("fast");
                },
                success: function(result) {
                    console.log(result);
                    $(".se-pre-con").fadeOut("slow");
                },
                error: function(err) {
                    $(".se-pre-con").fadeOut("slow");
                }
            });
    });



    $('.editcart').click(function(e) {
        var id = $(this).data('id');      
        $('#edit').modal('show');
         $.ajax({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                url: "{{route('cart_crud', 'getData')}}",
                method: "POST",
                data:{'id': id},
                dataType: "json",
                beforeSend: function() {
                    $(".se-pre-con").css("opacity", '0.6');
                    $(".se-pre-con").show("fast");
                },
                success: function(result) {
                     var package = "";
                    console.log(result.product);
                    var len=Object.keys(result.package).length;
                    console.log(result.package);
                    $('h5.productName').text(result.product.prodname);
                    $('input[id="updatequantity"]').val(result.product.prodquantity);                           
                    $('input[name="updateid"]').val(result.product.cart_id);
                    
                    for(var x=0;x<len;x++){
                        
                        console.log(result.package[x].id);
                        console.log(result.product.prodpackid);
                        package += '<div class="custom-control custom-radio my-1 w-100 ml-3">'+
                            ' <input type="radio" id="pradio'+x+'" value="'+result.package[x].id+'" name="package" class="custom-control-input packageradio">'+
                            '<label class="custom-control-label w-100" for="pradio'+x+'">'+'<div class="row w-100">'+'<div class="col-12">'+(result.package[x].prodpack)+
                            '</div>'+'<div class="col-12">'+(result.package[x].prodprice).toLocaleString('en')+'.00'+'</div>'+'</div>'+'</label>'+'</div>';
                          if(result.product.prodpackid==result.package[x].id){
                            $('#pradio'+x+'').attr('checked', 'checked');
                            
                        }                        
                       
                    }
                    $('#edit .packagedisplay').html(package);
                    $(".se-pre-con").fadeOut("slow");
                },
                error: function(err) {
                    $(".se-pre-con").fadeOut("slow");
                }
            });
    });

        $('.editproduct').submit(function(e) {
             var id = $(this).data('id');
                e.preventDefault();
                   $.ajax({
                    headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                        url: "{{route('cart_crud', 'update')}}",
                        method: "POST",
                        data:$(this).serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            $(".se-pre-con").css("opacity", '0.6');
                            $(".se-pre-con").show("fast");
                        },
                        success: function(result) {
                            console.log(result);
                            $('.editProductModal').modal('hide');
                            $(".se-pre-con").fadeOut("slow");
                        },
                        error: function(err) {
                            $(".se-pre-con").fadeOut("slow");
                        }
                    });

        });


 $('#ADDPRODUCT').click(function(e) {
          $.ajax({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                url: "{{route('cart_crud', 'checkout')}}",
                method: "POST",
                dataType: "json",
                beforeSend: function() {
                    $(".se-pre-con").css("opacity", '0.6');
                    $(".se-pre-con").show("fast");
                },
                success: function(result) {
                    console.log(result);
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