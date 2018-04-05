@extends('layouts.app')

@section('nav')
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('rhome') }}">Purchase <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown ">
    <a class="nav-link" href="{{ route('cart') }}">Cart <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" >Transaction <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('rlocation') }}">Location <span class="sr-only">(current)</span></a>
</li>
@endsection

@section('body')

<div class="album mt-4 py-5 bg-light">
    <div class="container">
        <div class="row">
            @if($trans)
                @foreach($trans as $tran)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow text-light bg-dark">
                        <div class="card-body">
                            <p class="card-title lead">
                                TRANS NO. {{$tran->transid}}
                            </p>
                            <p class="card-text">
                                Seller: {{ucwords($tran->seller()->get()[0]->fname." ".$tran->seller()->get()[0]->lname)}}
                            </p>
                            <div class="d-flex justify-content-between align-items-center ">
                                <div class="btn-group">

                                    <button type="button" class="btn btn-sm btn-outline-light my-0 moreinfo"
                                            data-id="{{$tran->transid}}" data-toggle="modal" data-target="#moreinfo">
                                            More Info
                                    </button>
                                    
                                </div>
                                <small class="text-white">
                                @if($tran->created_at)
                                    {{time_elapsed_string($tran->created_at)}}
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
            <div class="modal fade" id="moreinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header border-bottom pb-3">
                        <div class=row>
                                <div class="col-12">
                                    <input type="hidden" name="id" id="id" value="">
                                    <h5 class="modal-title mb-3">TRANS NO. <span id="trans_no"></span></h5>
                                </div>
                                <div class="col-12">
                                    <h5 class="modal-title">Total Price: ₱ <span id="total_price"></span></h5>
                                </div>
                        </div>
                    </div>
                    <div class="modal-body" style="height: 400px; overflow-y: scroll;">
                        <div class="row items">
                        <!--items here-->
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
<script>
    $(document).ready(function(e) {
        $('button.moreinfo').click(function(e) {
            $('#moreinfo .items').empty();
            var trans_id = $(this).data('id');

            $.ajax({
                url: "{{route('get_transaction')}}",
                method: "GET",
                data: {trans_id: trans_id},
                dataType: "json",
                beforeSend: function() {
                    $(".se-pre-con").css("opacity", '0.6');
                    $(".se-pre-con").show("fast");
                },
                success: function(result) {
                    var price = 0;
                    var items = "";

                    for(var x = 0; x < result.length; x++){
                        price += result[x].prodprice;
                    }
                    
                    for(var x = 0; x < result.length; x++){
                        var img = (result[x].product[0].prodimg)?result[x].product[0].prodimg:'img/noimage.jpg';
                        items +=    '<div class="col-12 border-bottom">'+
                                        '<div class="row ">'+ 
                                            '<div class="col-4">'+
                                                '<div class="text-center d-flex bg-white p-0 h-100">'+
                                                    '<img src="'+img+'" class="rounded img-fluid align-self-center">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-8">'+
                                                '<p class="lead my-1">'+result[x].product[0].prodname+'</p>'+
                                                '<p class="my-1">Seller: '+result[x].seller.fname+' '+result[x].seller.lname+'</p>'+
                                                '<hr class="my-2">'+
                                                '<p class="my-1">Package: '+result[x].prodpack+'</p>'+
                                                '<p class="my-1">Quantity: '+result[x].prodquantity+'</p>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';
                    }

                    $('#moreinfo #trans_no').text(result[0].transid);
                    $('#moreinfo #total_price').text(price);
                    $('#moreinfo .items').append(items);

                    $(".se-pre-con").fadeOut("slow");

                    $('#moreinfo').modal('show');
                },
                error: function(err) {
                    $(".se-pre-con").fadeOut("slow");
                }
            });
        })
    });
</script>
@endsection