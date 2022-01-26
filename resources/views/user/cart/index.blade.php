@extends('layouts.user.user')
@section('title', 'Cart - PECIKUID')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @php $total_2 = 0 @endphp
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            @php $total += $details['harga'] * $details['quantity'] @endphp
                            @php $total_2 += $details['harga'] * $details['quantity'] @endphp
                            <tr class="table-body-row" data-id="{{$id}}">
                                <td class="product-remove"><button class="btn btn-danger btn-sm"
                                        id="remove-from-cart"><i class="far fa-window-close"></i></button></td>
                                <td class="product-image"> <img style=" width: 100;height: 100%;"
                                        src="{{ url('/images/'.$details['foto']) }}" /></td>
                                <td class="product-name">{{ $details['nama'] }}</td>
                                <td class="product-price">{{ $details['harga'] }}</td>
                                <td class="product-quantity"><input type="number" id="unit" name="unit"
                                        value="{{ $details['quantity'] }}" placeholder="0"></td>
                                <td class="product-total">Rp {{ $details['harga'] * $details['quantity'] }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart'))
                            <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td>Rp {{ $total_2 }}</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Shipping: </strong></td>
                                <td><input type="hidden" id="id" value="{{$id}}"></td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td>$545</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        @if(session('cart'))
                        <a id="update-cart" class="boxed-btn">Update Cart</a>
                        <a href="{{route('pembayaran.checkout')}}" class="boxed-btn black">Check Out</a>
                        @endif
                    </div>
                </div>

                <!-- <div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="https://technext.github.io/fruitkha/index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div> -->
            </div>
        </div>
    </div>
</div>
<!-- end cart -->

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="{{url('user/assets/img/company-logos/1.png')}}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{url('user/assets/img/company-logos/2.png')}}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{url('user/assets/img/company-logos/3.png')}}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{url('user/assets/img/company-logos/4.png')}}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{url('user/assets/img/company-logos/5.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        var x = document.getElementById("unit").value;
        var id_produk = document.getElementById("id").value;
        $("#update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id_produk,
                    quantity: x
                },
                success: function (response) {
                    console.log(x);
                    window.location.reload();
                }
            });
        });

        $("#remove-from-cart").click(function (e) {
            // e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('cart.delete') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });
    })
</script>
@endsection
