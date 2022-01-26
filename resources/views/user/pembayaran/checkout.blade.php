@extends('layouts.user.user')
@section('title', 'Checkout - PECIKUID')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Check Out Product</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Billing Address
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form action="">
                                            <p><input type="text" name="Nama" placeholder="Name"></p>
                                            <p><input type="email" name="email" placeholder="Email"></p>
                                            <p><input type="text" name="telepon" placeholder="Phone"></p>
                                            <p><input type="text" name="provinsi" class="provinsi"
                                                    list="datalistOptions1" id="listProvinsi" placeholder="Provinsi">
                                            </p>
                                            <p><input type="text" name="kota" class="kota ongkir"
                                                    list="datalistOptions2" id="listKota" placeholder="Kabupatenn/Kota">
                                            </p>
                                            <p><input type="text" name="kode_pos" placeholder="Postal Code"></p>
                                            <p><input type="text" name="alamat" placeholder="Address"></p>
                                            <p><textarea name="bill" id="bill" cols="30" rows="10"
                                                    placeholder="Catatan"></textarea></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Shipping Address
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="shipping-address-form">
                                        <p>
                                            <label>pengiriman : </label>
                                        <select name="ship" class="ship cek" id="ship">
                                            <option value="pilih salah satu">Pilih salah Satu</option>
                                        </select>
                                        <!-- <input type="radio" name="ship" value="Jeep" id="apple">
                                        <label>Jeep</label>
                                        <input type="radio" name="ship" value="asu" id="apple">
                                        <label>Jeep</label> -->
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="order-details-wrap">
                    <table class="order-details">
                        <thead>
                            <tr>
                                <th>Your order Details</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody class="order-details-body">
                            <tr>
                                <td>Product</td>
                                <td>Total</td>
                            </tr>
                            @php $total = 0 @endphp
                            @php $total_2 = 0 @endphp
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            @php $total += $details['harga'] * $details['quantity'] @endphp
                            @php $total_2 += $details['harga'] * $details['quantity'] @endphp
                            <tr data-id="{{$id}}">
                                <td>{{ $details['nama'] }}</td>
                                <td>Rp {{ $details['harga'] * $details['quantity'] }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tbody class="checkout-details">
                            <tr>
                                <td>Subtotal</td>
                                <td>Rp {{$total}}</td>
                                <td>
                                    <input type="text" id="subtotal" name="total" value="{{$total}}">
                                </td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td id="harga_ongkir">Rp 0</td>
                            </tr>
                            <tr>
                                
                                <td>Total</td>
                                <td id="harga_total">Rp {{$total}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="boxed-btn">Place Order</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end check out section -->

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
    var id_prov = 0;
    console.log(id_prov);
    $(document).ready(function () {
        $.ajax({
            url: '{{route('ongkir.get_provinsi')}}',
            method: 'GET',
            dataType: 'json',
            success: function (res) {
                // console.log(res.get_provinsi);
                var bodyData1 = ''
                bodyData1 += '<datalist id="datalistOptions1">'
                $.each(res.get_provinsi, function (key, item) {
                    bodyData1 += '<option value="' + item.province + '">'
                })
                bodyData1 += '</datalist>'
                $("#listProvinsi").append(bodyData1);
            }
        })
    })
    $(document).ready(function () {
        $.ajax({
            url: '/ongkir/get_kota',
            method: 'get',
            dataType: 'json',
            success: function (res) {
                // console.log(res.data);
                var bodyData = ''
                bodyData += '<datalist id="datalistOptions2">'
                $.each(res.data, function (key, item) {
                    bodyData += '<option value="' + item.city_id + '">' + item.city_name +
                        '</option>'
                })
                bodyData += '</datalist>'
                $(".kota").append(bodyData);
            }
        })
    })
    $(document).ready(function () {
        var id_kota = document.getElementById('listKota')
        $(".ongkir").change(function (e) {
            console.log(id_kota.value);
            $.ajax({
                url: '{{ route('ongkir.index') }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    idkota: id_kota.value,
                },
                success: function (res) {
                    console.log(res.ongkir);
                    var ongkir=''
                    // $ongkir[0]['costs'][2]['cost'][0]['value']
                    $.each(res.ongkir[0]['costs'], function (key, value) {
                        $('#ongkir').empty();
                        ongkir +='<option value="'+value.cost[0].value+'">'
                        ongkir += res.ongkir[0].code.toUpperCase()+' : <strong>'+value.service+'</strong> - Rp. '+value.cost[0].value+' ('+value.cost[0].etd+' hari)'
                        ongkir +='</option>'
                        ongkir +='</div>'
                })
                $("#ship").append(ongkir);
                }
            });
        });

        $(".ship").change(function () {
        var x = parseInt($('.cek').find(":selected").val());
        var h_ongkir = 'Rp '+x
        $('#harga_ongkir').empty();
        $("#harga_ongkir").append(h_ongkir);
        
        var y = parseInt(document.getElementById('subtotal').value )
        var h_total = y+x
        $('#harga_total').empty();
        $("#harga_total").append(h_total);
        })
    })

</script>
@endsection
