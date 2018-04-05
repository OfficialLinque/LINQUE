@extends('layouts.app')

@section('nav')
<li class="nav-item active">
    <a class="nav-link">Product <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('order') }}">Orders <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('location') }}">Location <span class="sr-only">(current)</span></a>
</li>
@endsection

@section('body')

<div class="album mt-4 py-5 bg-light">
    <div class="container">
        <div class="row">

            @if($products)
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow text-light bg-dark">
                        <div class="text-center bg-white p-0">
                            <img style="height: 225px;" src="@if($product->prodimg) {{$product->prodimg}} @else img/noimage.jpg @endif" class="rounded img-fluid">
                        </div>
                        <div class="card-body">
                            <p class="card-title lead">
                            {{$product->prodname}}
                            </p>
                            <p class="card-text">
                            {{$product->proddesc}}
                            </p>
                            <div class="d-flex justify-content-between align-items-center ">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-light product_info" data-id="{{$product->id}}">
                                        <i class="material-icons">info_outline</i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-light product_edit" data-id="{{$product->id}}">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-light product_delete" data-id="{{$product->id}}"><i class="material-icons">delete</i></button>
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
                </div>
                @endforeach
            @endif
            <!-- Modal -->
            <form id="edit-product" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLongTitle">Edit Product</h5>
                            <input type="hidden" name="epid">
                        </div>
                        <div class="modal-body" style="height: 400px; overflow-y: scroll;">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <div class="text-center mb-2">
                                <img class="rounded img-fluid preview" style="height: 225px;" src="img/wear.png">
                            </div>
                            <div class="input-group mb-2">
                                <input id="file" name="epimg"  hidden type="file" accept="image/*"/>
                                <input type="button" class="btn btn-outline-primary btn-block" value="Upload Product Image" onclick="document.getElementById('file').click();" />
                            </div>
                            <div class="row  mb-0">
                                <div class="col pr-1">
                                    <div class="form-group">
                                        <label for="name" class="bmd-label-floating">Product Name</label>
                                        <input type="text" name="epname" class="form-control" id="epname">
                                    </div>
                                </div>
                                <div class="col pl-1">
                                    <div class="form-group">
                                        <label for="name" class="bmd-label-floating">Product Quantity</label>
                                        <input type="number" name="epquantity" class="form-control" id="epquantity">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  mb-2">
                                <label for="desc" class="bmd-label-floating">Product Description</label>
                                <textarea class="form-control" name="epdesc" id="epdesc" rows="3"></textarea>
                            </div>
                            @if($producttypes)
                            <div class="form-group  mb-3">
                                <label for="type" class="bmd-label-floating">Product Type</label>
                                <select id="ptype" class="form-control" name="ptype" required>            
                                    <option selected hidden value="">Choose Type...</option>
                                    @foreach($producttypes as $producttype)
                                    <option value="{{$producttype->id}}">{{$producttype->prodtype}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="mb-2">
                                <p class="text-center text-primary lead" style="font-size: 15px;">Product Pack & Price</p>
                                <div id="EDITPPCOL" class="m-0">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="EDITDPRODUCT" type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
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

<button type="button"
        style="position: fixed;right: 30px;bottom: 30px;"
        class="btn btn-primary bmd-btn-fab"
        data-toggle="modal"
        data-target="#add">
  <i class="material-icons">add</i>
</button>
<!-- Modal -->

<form id="add-product" method="POST" enctype="multipart/form-data">
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addLongTitle">Add Product</h5>
        </div>
        <div class="modal-body" style="height: 400px; overflow-y: scroll;">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <div class="text-center mb-2">
            <img class="rounded img-fluid preview" name="fileimg" style="height: 225px;" src="img/wear.png">
        </div>
        <div class="input-group mb-2">
            <input id="pimg" name="pimg" type="file" accept="image/*" value="img/wear.png" hidden/>
            <input type="button" class="btn btn-outline-primary btn-block" value="Upload Product Image" onclick="document.getElementById('pimg').click();" />
        </div>
        <div class="row  mb-0">
            <div class="col pr-1">
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">Product Name</label>
                    <input type="text" name="pname" class="form-control" id="pname" required>
                </div>
            </div>
            <div class="col pl-1">
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">Product Quantity</label>
                    <input type="number" name="pquantity" class="form-control" id="pquantity" required>
                </div>
            </div>
        </div>
        <div class="form-group  mb-2">
            <label for="desc" class="bmd-label-floating">Product Description</label>
            <textarea class="form-control" name="pdesc" id="desc" rows="3" required></textarea>
        </div>
        @if($producttypes)
        <div class="form-group  mb-3">
            <label for="type" class="bmd-label-floating">Product Type</label>
            <select id="ptype" class="form-control" name="ptype" required>            
                <option selected hidden value="">Choose Type...</option>
                @foreach($producttypes as $producttype)
                <option value="{{$producttype->id}}">{{$producttype->prodtype}}</option>
                @endforeach
            </select>
        </div>
        @endif
        <div class="mb-2">
            <p class="text-center text-primary lead" style="font-size: 15px;">Product Pack & Price</p>
            <div id="ADDPPCOL" class="m-0">            
                <div class="row mb-2 parrow">
                    <div id="package" class="col pr-2">
                        <input type="text" class="form-control" Placeholder="Package..." name="packagename[]" required>
                    </div>
                    <div id="price" class="col pl-0 pr-2">
                        <input type="number" class="form-control" Placeholder="Price..." name="packageprice[]" required>
                    </div>
                </div>
            </div>
            <input id="ADDPP" type="button" class="btn btn-outline-primary btn-block" value="Add Product Pack & Price" />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection

@section('script')
<script>
$(document).ready(function() {
    var a = 0;

    $("form#add-product").submit(function(event) {
        event.preventDefault();

        var data = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
            url: "{{route('product','add')}}",
            dataType: "json",
            data: data, 
            contentType: false,  
            cache: false,  
            processData: false,  
            beforeSend: function() {
                $(".se-pre-con").css("opacity", '0.6');
                $(".se-pre-con").show("fast");
            },
            success: function(data){                
                $(".se-pre-con").fadeOut("slow");

                $('#add').modal('hide');

                // window.location.reload();
            },
            error: function(data){   
                $(".se-pre-con").fadeOut("slow");

                $('#add').modal('hide');
            }
        });

    });

    $('.product_info').on('click', function(e) {
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

    $('.product_edit').click(function(e) {
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
                $('form#edit-product input[name="epid"]').val(result[0].id);
                $('form#edit-product input[name="epname"]').val(result[0].prodname).parent().addClass('is-filled');
                $('form#edit-product input[name="epquantity"]').val(result[0].prodtotalquantity).parent().addClass('is-filled');
                $('form#edit-product textarea[name="epdesc"]').val(result[0].proddesc).parent().addClass('is-filled');
                $('form#edit-product select[name="ptype"]').val(result[0].type.id).parent().addClass('is-filled');
                
                $('#EDITPPCOL').empty();
                $.each(result[0].package, function(key, value) {                    
                    $('#EDITPPCOL').append(
                        '<div class="row mb-2 parrow">' +
                            '<input type="hidden" class="form-control" name="packageid[]" value="'+value.id+'">' +
                            '<div id="package" class="col pr-2">' +
                                '<input type="text" class="form-control" Placeholder="Package..." name="packagename[]" value="'+value.prodpack+'">' +
                            '</div>' +
                            '<div id="price" class="col pl-0 pr-2">' +
                                '<input type="number" class="form-control" Placeholder="Price..." name="packageprice[]" value="'+value.prodprice+'">' +
                            '</div>' +
                        '</div>'
                    );
                })

                $(".se-pre-con").fadeOut("slow");

                $('#edit').modal('show');
            },
            error: function(err) {
                $(".se-pre-con").fadeOut("slow");
            }
        });
    });

    $('form#edit-product').submit(function(e) {
        e.preventDefault();

        var data = new FormData($(this)[0]);

        $.ajax({
            url: "{{route('product', 'edit')}}",
            method: "POST",
            data: data,
            contentType: false,  
            cache: false,  
            processData: false,  
            dataType: "json",
            beforeSend: function() {
                $(".se-pre-con").css("opacity", '0.6');
                $(".se-pre-con").show("fast");
            },
            success: function(result) {
                $('#edit').modal('hide');
                window.location.reload();
            },
            error: function(err) {
                alert('error');
                $(".se-pre-con").fadeOut("slow");
            }
        });
    });

    $('input[type="file"]').on('change', function () {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(input).parent().parent().find('.preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#ADDPP').on('click', function () {
        a++;

        ADDPPCOL();
    });

    function ADDPPCOL() {
        $('#ADDPPCOL').append(
            '<div class="row mb-2 parrow">' +
                '<div id="package" class="col pr-2">' +
                    '<input type="text" class="form-control" Placeholder="Package..." name="packagename[]">' +
                '</div>' +
                '<div id="price" class="col pl-0 pr-2">' +
                    '<input type="number" class="form-control" Placeholder="Price..." name="packageprice[]">' +
                '</div>' +
                '<div class="col pl-0">' +
                    '<input type="button" class="btn btn-sm btn-outline-danger btn-block remove-package" value="Remove"/>' +
                '</div>'+
            '</div>'
        );

        $('.remove-package').click(function(e) {
            $(this).parent().parent().remove();
        });
    }
});
</script>
@endsection
