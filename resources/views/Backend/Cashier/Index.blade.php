<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cashier | Billing App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <section id="cashier">
        <div class="row cashier-info">
            <div class="cashier-header">
                @if(auth()->user()->role == "admin")
                <a href="/admin/home" class="btn btn-outline-primary"><i class="fa fa-arrow-left"> Home</i></a>
                @else
                <a href="/staff/home" class="btn btn-outline-primary"><i class="fa fa-arrow-left"> Home</i></a>
                @endif
                <h2>Sales Information</h2>
            </div>
            <div class="product-detail col-md-7" id="product-detail">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach($categories as $category)
                        <a class="nav-item nav-link" data-id="{{$category->id}}" data-toggle="tab">
                            {{$category->category_name}}
                        </a>
                        @endforeach
                    </div>
                </nav>
                <div id="list-menu" class="row mt-2 mb-2"></div>
            </div>
            <div class="customer-data col-md-5">
                <div class="order-details">
                    <h5>Order List</h5>
                    <div class="product-list" id="product-list"></div>
                </div>
            </div>

        </div>

    </section>
    <!--Quantity & Price Modal -->
    <div class="modal fade" id="priceModal" tabindex="-1" aria-labelledby="priceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="priceModalLabel">Quantity & Price</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="productID"></h6>
                    <div class="input-group mb-3">
                        <input type="number" id="product_quantity" class="form-control" placeholder="Enter Quantity" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" id="product_price" class="form-control" placeholder="Enter Price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info btn-confirm-rate" data-dismiss="modal" data-id="">Next</button>
                </div>
            </div>
        </div>
    </div>
    <!--Payment Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="totalAmount"></h4>
                    <div class="input-group mb-3">
                        <input type="text" id="customer_name" class="form-control" placeholder="Enter Customer Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" id="contact_number" class="form-control" placeholder="Enter Customer Number" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" id="customer_vat" class="form-control" placeholder="Enter Customer VAT" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_type" id="payment_type" value="cash" checked>
                            <label class="form-check-label" for="payment_type">Cash</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_type" id="payment_type" value="cheque">
                            <label class="form-check-label" for="payment_type">Cheque</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_type" id="payment_type" value="credit">
                            <label class="form-check-label" for="payment_type">Credit</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rs.</span>
                        </div>
                        <input type="number" id="received_amount" class="form-control">
                    </div>
                    <h4 class="changeAmount"></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a class="btn btn-info btn-save-payment">Save payment</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#product-detail").on("click", ".btn-menu", function() {
            var product_id = $(this).data("id");
            $(".productID").html("Product ID: " + product_id);
            var data_id = $(".btn-confirm-rate").data();
            $data_id = $(".btn-confirm-rate").data("id", product_id);
        });
    });

    // Order Menu
    $(".btn-confirm-rate").on("click", function() {
        var product_id = $(this).data("id");
        var quantity = $("#product_quantity").val();
        var price = $("#product_price").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            data: {
                "product_id": product_id,
                "quantity": quantity,
                "price": price
            },
            url: '/cashier/order',
            success: function(data) {
                // $(".btn-menu").toggle();
                $("#product-list").html(data);
            }
        });
    });

    $("#product-list").on("click", ".btn-confirm-order", function() {
        var SaleID = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            data: {
                "sale_id": SaleID,
            },
            url: '/cashier/confirmOrder',
            success: function(data) {
                $("#product-list").html(data);
            }
        });
    });

    //delete sale detail
    $("#product-list").on("click", ".btn-delete-saledetail", function() {
        var saleDetailID = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            data: {
                "saleDetailID": saleDetailID
            },
            url: "/cashier/deleteDetail",
            success: function(data) {
                $("#product-list").html(data);
            }
        });
    });

    //total Amount
    $("#product-list").on("click", ".btn-payment", function() {
        var totalAmount = $(this).attr('data-totalAmount');
        $(".totalAmount").html("Total Amount : Rs. " + totalAmount);
        $("#received_amount").val('');
        $(".changeAmount").html('');
    });

    //change Amount
    $("#received_amount").keyup(function() {
        var totalAmount = $(".btn-payment").attr('data-totalAmount');
        var receivedAmount = $(this).val();
        var change_amount = receivedAmount - totalAmount;
        $(".changeAmount").html("Change Amount : Rs. " + change_amount);
    });

    //save payment
    $(".btn-save-payment").click(function() {
        var receivedAmount = $("#received_amount").val();
        var sale_id = $(".btn-payment").data('id');
        var customer_name = $("#customer_name").val();
        var customer_number = $("#contact_number").val();
        var customer_vat = $("#customer_vat").val();
        var payment_type = $("#payment_type").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            data: {
                "sale_id": sale_id,
                "customer_name": customer_name,
                "customer_number": customer_number,
                "received_amount": receivedAmount,
                "payment_type": payment_type,
                "customer_vat": customer_vat
            },
            url: '/cashier/savePayment',
            success: function(data) {
                window.location.href = data;
            }
        });
    });

    //load product on categories
    $(".nav-link").click(function() {
        $.get("/cashier/getMenuByCategory/" + $(this).data("id"), function(data) {
            $("#list-menu").html(data);
        });
    });

    //price update
    $("#input_price").keyup(function() {
        alert("Hi");
    });
</script>

</html>