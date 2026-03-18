@extends('custom.master')
@section('content')

<section class="cart-section section-padding">
    <div class="container">
        <div class="main-cart-wrapper">

            <div class="row">
                <div class="col-12">
                    <div class="cart-wrapper">
                        <div class="cart-items-wrapper">

                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>

                                <tbody>

                                @php $total = 0; @endphp

                                @forelse($cart as $id => $item)

                                @php
                                    // 🔥 NO MULTIPLY (as per your logic)
                                    $subtotal = $item['price'];
                                    $total += $subtotal;
                                @endphp

                                <tr class="cart-item">

                                    <!-- 🖼 PRODUCT -->
                                    <td class="cart-item-info d-flex align-items-center gap-3">
                                        <img src="{{ $item['image'] ?: asset('assets/img/product/cart.jpg') }}" width="70">
                                        <span>{{ $item['name'] }}</span>
                                    </td>

                                    <!-- 💰 PRICE -->
                                    <td class="cart-item-price">
                                        ₹ {{ $item['price'] }}
                                        <br>
                                        <small class="text-muted">(Bulk Price)</small>
                                    </td>

                                    <!-- 🔢 QUANTITY -->
                                    <td>
                                        <div class="cart-item-quantity">
                                            <span>{{ (int) $item['quantity'] }}</span>
                                        </div>
                                    </td>

                                    <!-- 🧮 SUBTOTAL -->
                                    <td class="cart-item-price">
                                        ₹ {{ $subtotal }}
                                    </td>

                                    <!-- ❌ REMOVE -->
                                    <td class="cart-item-remove">
                                        <a href="{{ route('cart.remove', $id) }}">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>

                                </tr>

                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        🛒 Your cart is empty
                                    </td>
                                </tr>
                                @endforelse

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

            <!-- 💳 TOTAL -->
            <div class="row mt-5">
                <div class="col-lg-6"></div>

                <div class="col-xl-6">
                    <div class="cart-pragh-box">
                        <div class="cart-graph">

                            <h4>Cart Total</h4>

                            <ul>
                                <li>
                                    <span>Subtotal</span>
                                    <span>₹{{ $total }}</span>
                                </li>

                                <li>
                                    <span>Shipping</span>
                                    <span>₹0</span>
                                </li>

                                <li>
                                    <span>Total</span>
                                    <span><strong>₹{{ $total }}</strong></span>
                                </li>
                            </ul>

                            <div class="chck">
                               <a href="{{ route('checkout') }}" class="theme-btn w-100 text-center">
                                         <span>Checkout</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection