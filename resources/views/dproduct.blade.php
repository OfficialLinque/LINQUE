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
	@foreach($temp as $a)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow text-light bg-dark">
                    <div class="text-center bg-white p-0">
                        <img style="height: 225px;" src="img/coke.png" class="rounded img-fluid">
                    </div>
                    <div class="card-body">
                        <p class="card-title lead">
                            {{ $a->iname }}
                        </p>
                        <p class="card-text">
                            {{ $a->proddesc }}</p>
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="btn-group">
                                <button type="button" id="{{ $a->item }}" class="btn btn-sm btn-outline-light info1">
                                        <i class="material-icons">info_outline</i></button>
                                <button type="button" id="{{ $a->item }}" class="btn btn-sm btn-outline-light edit1" >
                                        <i class="material-icons">edit</i>
                                </button>
                                <button type="button" id="{{ $a->item }}" class="btn btn-sm btn-outline-light delete1"><i class="material-icons">delete</i></button>
                            </div>
                            <small class="text-white">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Modal -->
            <div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="editLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLongTitle">Edit Product</h5>
                    </div>
                    <div class="modal-body" style="height: 400px; overflow-y: scroll;">
                        <form id="uploadform1">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <input type="hidden" name="dynamicValue" id="dynamicValue" >
                        <input type="hidden" name="id" id="id"  >

                        <div class="text-center mb-2">
                            <img id="epfileimg" style="height: 225px;" src="img/wear.png" class="rounded img-fluid">
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
                        <div class="form-group  mb-3">
                            <label for="type" class="bmd-label-floating">Product Type</label>
                            <select id="etype" class="form-control" name="eptype">
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

                        <div class="mb-2">
                            <p class="text-center text-primary lead" style="font-size: 15px;">Product Pack & Price</p>
                            <div id="EDITPPCOL" class="m-0">

                            </div>
                            <input id="EDITPP" type="button" class="btn btn-outline-primary btn-block" value="Add Product Pack & Price" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="EDITPRODUCT" type="button" class="btn btn-primary">Edit</button>
                    </div>
                  </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="moreinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header border-bottom pb-1">
                        <div class="col-12">
                            <div class=row>
                                <div class="col-12">
                                    <h5 class="modal-title mb-3" id="tanginamo">Lorem Ipsum Dolor Sit Amet</h5>
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
                                        <p  class="my-1" id="tanginamo1">Type: Type Here</p>
                                        <p class="my-1" id="tanginamo2">Quantity: Quantity Here </p>
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <p class="my-1"><- Package - ></p>
                                            <p class="my-1"><- Price - > </p>
                                        </div>

                                    </div>
                                    <p class="my-1" id="tanginamo3"><- Description Here - ></p>
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

<button type="button"
        style="position: fixed;right: 30px;bottom: 30px;"
        class="btn btn-primary bmd-btn-fab"
        data-toggle="modal"
        data-target="#add">
  <i class="material-icons">add</i>
</button>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addLongTitle">Add Product</h5>
      </div>
      <div class="modal-body" style="height: 400px; overflow-y: scroll;">
        <form id="uploadform">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
          <input type="hidden" name="dynamicValue" id="dynamicValue" >
        <div class="text-center mb-2">
            <img id="fileimg" name="fileimg" style="height: 225px;" src="img/wear.png" class="rounded img-fluid">
        </div>
        <div class="input-group mb-2">
            <input id="pimg" name="pimg"  hidden type="file" accept="image/*"/>
            <input type="button" class="btn btn-outline-primary btn-block" value="Upload Product Image" onclick="document.getElementById('file').click();" />
        </div>
        <div class="row  mb-0">
            <div class="col pr-1">
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">Product Name</label>
                    <input type="text" name="pname" class="form-control" id="pname">
                </div>
            </div>
            <div class="col pl-1">
                <div class="form-group">
                    <label for="name" class="bmd-label-floating">Product Quantity</label>
                    <input type="number" name="pquantity" class="form-control" id="pquantity">
                </div>
            </div>
        </div>
        <div class="form-group  mb-2">
            <label for="desc" class="bmd-label-floating">Product Description</label>
            <textarea class="form-control" name="pdesc" id="pdesc" rows="3"></textarea>
        </div>
        <div class="form-group  mb-3">
            <label for="type" class="bmd-label-floating">Product Type</label>
            <select id="ptype" class="form-control" name="ptype">
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
    </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
    var a = 0;
$(document).ready(function() {

  $(document).on('click', '.delete1', function(){
              var id = $(this).attr('id');
              iziToast.show({
                  theme: 'dark',
                  icon: 'icon-person',
                  title: 'Warning',
                  message: 'Are you sure? (Changes beyond here are cannot be undone.)',
                  position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                  progressBarColor: 'rgb(0, 255, 184)',
                  buttons: [
                      ['<button>Ok</button>', function (instance, toast) {

                        $.ajax({
                            url:"{{ route('deleteproduct') }}",
                            method: "get",
                            data:{id:id},
                            success:function(data){
                              instance.hide({
                                  transitionOut: 'fadeOutUp',
                                  onClosing: function(instance, toast, closedBy){
                                      console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
                                  }
                              }, toast, 'buttonName');

                              iziToast.success({
                                title: 'Delete Complete',
                                position: 'topCenter',
                                message: 'Product removed from database.'
                              });
                            }
                          })

                      }, true], // true to focus
                      ['<button>Close</button>', function (instance, toast) {
                          instance.hide({
                              transitionOut: 'fadeOutUp',
                              onClosing: function(instance, toast, closedBy){
                                  console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
                              }
                          }, toast, 'buttonName');
                      }]
                  ],
                  onOpening: function(instance, toast){
                      console.info('callback abriu!');
                  },
                  onClosing: function(instance, toast, closedBy){
                      console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
                  }
              });
          });
          //USE




    $("#ADDPRODUCT").click(function(event) {
              event.preventDefault();

                  $.ajax({
                      type: "POST",
                      url: "{{ route('addproduct') }}",
                      dataType: "text",
                      data: $('#uploadform').serialize(),
                      success: function(data){
                        //  swal("Success!", "Record has been added to database", "success")
                        //alert('hey');
                        $('#add').modal('hide');
                        iziToast.success({
                        title: 'Add Complete',
                        position: 'topCenter',
                        message: 'Item has been added to database'
                    });
                      },
                      error: function(data){
                        //  swal("Oh no!", "Something went wrong, try again.", "error")
                          alert('ho');
                      }
                  });

              });


              $("#EDITPRODUCT").click(function(event) {
                        event.preventDefault();

                            $.ajax({
                                type: "POST",
                                url: "{{ route('editproduct1') }}",
                                dataType: "text",
                                data: $('#uploadform1').serialize(),
                                success: function(data){
                                  //  swal("Success!", "Record has been added to database", "success")
                              //    alert('hey');
                                  $('#edit1').modal('hide');
                                  iziToast.success({
                                  title: 'Edit Complete',
                                  position: 'topCenter',
                                  message: 'Item is now up to date!'
                              });
                                },
                                error: function(data){
                                  //  swal("Oh no!", "Something went wrong, try again.", "error")
                                    alert('ho');
                                }
                            });

                        });



              $(document).on('click', '.edit1', function(){
                var id = $(this).attr("id");
                $.ajax({
                  url:"{{ route('editproduct') }}",
                  method: 'get',
                  data:{id:id},
                  dataType:'json',
                  success:function(data){
                    //$('#button_action').val('update');
                    $('#id').val(id);
                    $('#epname').val(data.prodname);
                    $('#epquantity').val(data.prodtotalquantity);
                    $('#etype').val(data.prodtype);
                    $('#epdesc').val(data.proddesc);
                    $('#edit1').modal('show');

                  }
                })
              });


                $(document).on('click', '.info1', function(){
                  var id = $(this).attr("id");
                  $.ajax({
                    url:"{{ route('editproduct') }}",
                    method: 'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data){

                      $('#tanginamo').text(data.name);
                      $('#tanginamo2').text("Quantity: "+data.prodtotalquantity);
                      $('#tanginamo1').text("Type: "+data.prodtype);
                      $('#tanginamo3').text("Description: "+data.proddesc);
                      $('#moreinfo').modal('show');

                    }
                  });

                });
                });

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
                  console.log(a);
                  ADDPPCOL();
                });

                $('#EDITPP').on('click', function () {
                  a++;
                  console.log(a);
                  EDITPPCOL();
                });

                function ADDPPCOL() {

                  $('#ADDPPCOL').append(
                    '<div id="'+ a +'" class="row mb-2 parrow">' +
                    '<div id="package" class="col pr-2">' +
                      '<input type="text" class="form-control" Placeholder="Package..." id="inpack'+a+'">' +
                      '</div>' +
                      '<div id="price" class="col pl-0 pr-2">' +
                      '<input type="text" class="form-control" Placeholder="Price..." id="inprice'+a+'">' +
                      '</div>' +
                      '<div class="col pl-0">' +
                      '<input onclick="REMOVECOL(' + a + ')" type="button" class="btn btn-sm btn-outline-danger btn-block" value="Remove"/>' +
                      '</div>'+
                      '</div>'
                    );

                  }

                  function EDITPPCOL() {

                    $('#EDITPPCOL').append(
                      '<div id="'+ a +'" class="row mb-2 parrow">' +
                      '<div id="package" class="col pr-2">' +
                      '<input type="text" class="form-control" Placeholder="Package..." id="inpack'+a+'">' +
                      '</div>' +
                      '<div id="price" class="col pl-0 pr-2">' +
                      '<input type="text" class="form-control" Placeholder="Price..." id="inprice'+a+'">' +
                      '</div>' +
                      '<div class="col pl-0">' +
                      '<input onclick="REMOVECOL(' + a + ')" type="button" class="btn btn-sm btn-outline-danger btn-block" value="Remove"/>' +
                      '</div>'+
                      '</div>'
                    );

                  }




    function REMOVECOL(c) {
        $("#"+c).remove();
        a=a-1;
        $('#dynamicValue').val(a);
        console.log(a);

    }

</script>
@endsection
