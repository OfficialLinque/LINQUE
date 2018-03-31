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

            
            <div class="col-md-4">
                <div class="card mb-4 box-shadow text-light bg-dark">
                    <div class="text-center bg-white p-0">
                        <img style="height: 225px;" src="img/coke.png" class="rounded img-fluid">
                    </div>
                    <div class="card-body">
                        <p class="card-title lead">
                            Lorem Ipsum Dolor Sit Amet
                        </p>
                        <p class="card-text">
                            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-light"><i class="material-icons">info_outline</i></button>
                                <button type="button" class="btn btn-sm btn-outline-light"
                                        data-toggle="modal" data-target="#edit">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-light"><i class="material-icons">delete</i></button>
                            </div>
                            <small class="text-white">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                </div>
                <div class="modal-body" style="height: 400px; overflow-y: scroll;">
                    <form id="uploadform">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <div class="text-center mb-2">
                        <img id="fileimg" style="height: 225px;" src="img/wear.png" class="rounded img-fluid">
                    </div>
                    <div class="input-group mb-2">
                        <input id="file" name="pimg"  hidden type="file" accept="image/*"/>
                        <input type="button" class="btn btn-outline-primary btn-block" value="Upload Product Image" onclick="document.getElementById('file').click();" />    
                    </div>
                    <div class="row  mb-0">
                        <div class="col pr-1">
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">Product Name</label>
                                <input type="text" name="pname" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="col pl-1">
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">Product Quantity</label>
                                <input type="text" name="pquantity" class="form-control" id="quantity">
                            </div>
                        </div>
                    </div>
                    <div class="form-group  mb-2">
                        <label for="desc" class="bmd-label-floating">Product Description</label>
                        <textarea class="form-control" name="pdesc" id="desc" rows="3"></textarea>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="type" class="bmd-label-floating">Product Type</label>
                        <select id="type" class="form-control" name="ptype">
                            <option selected hidden>Choose Type...</option>
                            <option value="1">Bakery and Bread</option>
                            <option value="2">Meat and Seafood</option>
                            <option value="3">Pasta and Rice</option>
                            <option value="4">Oils, Sauces, and Condiments</option>
                            <option value="5">Cereals and Breakfast foods</option>
                            <option value="6">Soup and Canned Goods</option>
                            <option value="7">Frozen Foods</option>
                            <option value="8">Dairy, Cheese and Eggs</option>
                            <option value="9">Snacks and Crakers</option>
                            <option value="10">Produce</option>

                            <option value="11">Dishwashing</option>
                            <option value="12">Haircare</option>
                            <option value="13">Healthcare products</option>
                            <option value="14">Household</option>
                            <option value="15">Laundry detergents</option>
                            <option value="16">Menstrual hygiene</option>
                            <option value="17">Skin care</option>

                            <option value="18">Beer</option>
                            <option value="19">Coffee </option>
                            <option value="20">Energy drink</option>
                            <option value="21">Water</option>
                            <option value="22">Softdrinks</option>
                            <option value="23">Juice</option>
                        </select>
                    </div>
                    <form>
                    <div class="mb-2">
                        <p class="text-center text-primary lead" style="font-size: 15px;">Product Pack & Price</p>
                        <div id="ADDPPCOL" class="m-0">
                            
                        </div>
                        <input id="ADDPP" type="button" class="btn btn-outline-primary btn-block" value="Add Product Pack & Price" />    
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="ADDPRODUCT" type="button" class="btn btn-primary">Add</button>
                </div>
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
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
      </div>
      <div class="modal-body" style="height: 400px; overflow-y: scroll;">
        <form id="uploadform">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <div class="text-center mb-2">
            <img id="fileimg" style="height: 225px;" src="img/wear.png" class="rounded img-fluid">
        </div>
        <div class="input-group mb-2">
            <input id="file" name="pimg"  hidden type="file" accept="image/*"/>
            <input type="button" class="btn btn-outline-primary btn-block" value="Upload Product Image" onclick="document.getElementById('file').click();" />    
        </div>
        <div class="row  mb-0">
            <div class="col pr-1">
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">Product Name</label>
                    <input type="text" name="pname" class="form-control" id="name">
                </div>
            </div>
            <div class="col pl-1">
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">Product Quantity</label>
                    <input type="text" name="pquantity" class="form-control" id="quantity">
                </div>
            </div>
        </div>
        <div class="form-group  mb-2">
            <label for="desc" class="bmd-label-floating">Product Description</label>
            <textarea class="form-control" name="pdesc" id="desc" rows="3"></textarea>
        </div>
        <div class="form-group  mb-3">
            <label for="type" class="bmd-label-floating">Product Type</label>
            <select id="type" class="form-control" name="ptype">
                <option selected hidden>Choose Type...</option>
                <option value="1">Bakery and Bread</option>
                <option value="2">Meat and Seafood</option>
                <option value="3">Pasta and Rice</option>
                <option value="4">Oils, Sauces, and Condiments</option>
                <option value="5">Cereals and Breakfast foods</option>
                <option value="6">Soup and Canned Goods</option>
                <option value="7">Frozen Foods</option>
                <option value="8">Dairy, Cheese and Eggs</option>
                <option value="9">Snacks and Crakers</option>
                <option value="10">Produce</option>

                <option value="11">Dishwashing</option>
                <option value="12">Haircare</option>
                <option value="13">Healthcare products</option>
                <option value="14">Household</option>
                <option value="15">Laundry detergents</option>
                <option value="16">Menstrual hygiene</option>
                <option value="17">Skin care</option>

                <option value="18">Beer</option>
                <option value="19">Coffee </option>
                <option value="20">Energy drink</option>
                <option value="21">Water</option>
                <option value="22">Softdrinks</option>
                <option value="23">Juice</option>
            </select>
        </div>
        <form>
        <div class="mb-2">
            <p class="text-center text-primary lead" style="font-size: 15px;">Product Pack & Price</p>
            <div id="ADDPPCOL" class="m-0">
                
            </div>
            <input id="ADDPP" type="button" class="btn btn-outline-primary btn-block" value="Add Product Pack & Price" />    
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="ADDPRODUCT" type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.2.0/js/iziToast.js"></script>
<script>
    var a = 0;
    var inpack = [];
    var inprice = [];
    var pform = new FormData($("#uploadform")[0]);


    $('#file').on('change', function () {
      readURL(this);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#fileimg').attr('src', e.target.result);
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
        '<div id="'+ a +'" class="row mb-2 parrow">' +
            '<div id="package" class="col pr-2">' +
                '<input type="text" class="form-control" Placeholder="Package..." id="inpack">' +
            '</div>' +
            '<div id="price" class="col pl-0 pr-2">' +
                '<input type="text" class="form-control" Placeholder="Price..." id="inprice">' +
            '</div>' +
            '<div class="col pl-0">' +
                '<input onclick="REMOVECOL(' + a + ')" type="button" class="btn btn-sm btn-outline-danger btn-block" value="Remove"/>' +
            '</div>'+
        '</div>'
      );
    }
    
    function REMOVECOL(a) {
        $("#"+a).remove();
        console.log(a);
    }

    // $('#ADDPRODUCT').bind('click', function () {
    //     ADD();
        
    // });

    // function ADD()
    // {
    //     $('#ADDPRODUCT').off('click');

    //     var inputid = checkinput();
    //     console.log(inputid);
    //     if(inputid){
    //         $.ajax({
    //             type: 'POST',
    //             dataType: 'json',
    //             url: 'addproduct',
    //             processData: false,
    //             data: {pform:pform,inpack:inpack,inprice:inprice},
    //             success: function(data)
    //             { 
    //                 console.log(data);
    //                 // if(data == 'success'){
    //                 // Lobibox.notify('success', {
    //                 //     msg: "Process sucessfully Transfer"
    //                 // });
    //                 // $('#Documentinput').val('');

    //                 // }else if(data == 'error'){
    //                 // Lobibox.notify('error', {
    //                 //     msg: "That is not the first Folder in your Requesting queue"
    //                 // });
    //                 // }
    //                 // setTimeout(Request, 1);
    //                 // setTimeout(Transfer, 1);
    //             }
    //         });
    //     }else{
    //         iziToast.warning({
    //             title: 'Caution',
    //             messageColor: 'black',
    //             timeout: 3000,
    //             zindex: 9999999,
    //             overlay: true,
    //             toastOnce: true,
    //             pauseOnHover: false,
    //             position: 'bottomCenter',
    //             message: 'Please provide data in the required fields',
    //         });
    //     }

    //     $('#ADDPRODUCT').on('click', function(e){
    //         ADD(e);
    //     });  
    // }

    // function checkinput(){
    //     var result = false;

    //     var pimg = $("#file")[0].files.length;
    //     var pname = $('#name').val(); 
    //     var pquantity = $('#quantity').val(); 
    //     var pdesc = $('#desc').val(); 
    //     var ptype = $('#type').val();

    //     $("input[id='inpack']").each(function() {
    //         inpack.push($(this).val());
    //     });
    //     $("input[id='inprice']").each(function() {
    //         inprice.push($(this).val());
    //     });
    //     var ppack = inpack.includes(undefined);
    //     var pprice = inprice.includes(undefined);
        
    //     if(ppack || ppack || pimg === 0 || pname === "" 
    //        || pquantity === "" || pdesc === "" || ptype === "Choose Type...")
    //     {
    //         result = false;
    //     }else{
    //         result = true;
    //     }

    //     console.log(ppack, pprice, pimg, pname, pquantity, pdesc, ptype === "Choose Type...");

    //     return result;
    // }

</script>
@endsection