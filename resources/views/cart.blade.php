@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="p-5">
    <div class="text-center">
        <h3 class="cart__title">Troli Anda</h3>
    </div>

    <div class="mt-5">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">PRODUK</th>
                    <th scope="col">PILIHAN HARGA</th>
                    <th scope="col">KUANTITAS</th>
                    <th scope="col">SUBTOTAL</th>
                    <th scope="col">HAPUS</th>
                </tr>
            </thead>
            <tbody>
                @forelse($carts as $key => $cart)
                <tr>
                    <td class="d-flex align-items-center">
                        <img src="{{ $cart->product->image }}" width="50px">
                        <div class="ml-1">
                            <p class="product__name">{{ $cart->product->name }}</p>
                            <p class="product__code">{{ $cart->product->code }}</p>
                        </div>
                    </td>
                    <td class="text-center product__price">{{ $cart->product->format_price }}</td>
                    <td class="text-center">
                        <select name="qty" id="qty">
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $cart->product_id }}-{{ $i }}" @if($cart->qty == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                    <td class="text-center cart__subtotal" id="subtotal-{{ ++$key }}">
                        {{ $cart->format_subtotal }}
                    </td>
                    <td class="text-center">
                        <form action="{{ route('cart.destroy', $cart->id) }}" method="post" id="destroy-cart-{{ $cart->id }}">
                            @csrf
                            @method('delete')
                        </form>

                        <a href="{{ route('cart.destroy', $cart->id) }}" onclick="event.preventDefault(); document.getElementById('destroy-cart-{{ $cart->id }}').submit();">
                            x
                        </a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td>Cart empty.</td>
                    </tr>
                @endforelse

                @if(count($carts) > 0)
                <tr>
                    <td colspan="5">
                        <div class="coupon d-flex align-items-center justify-content-end">
                            <img src="/assets/images/coupon.png">
                            <a href="#" class="coupon__link ml-1" data-toggle="modal" data-target="#cuponModal">Gunakan Kode Diskon/Reward</a>
                        </div>
                    </td>
                </tr>
                 <tr>
                    <td colspan="5">
                        <div class="total cart__footer d-flex align-items-center justify-content-end">
                            <p class="total__title">TOTAL</p>
                            <p class="total__price" id="total">Rp {{ session('total') ?? number_format($cart->sum_subtotal) }}</p>
                        </div>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cuponModal" tabindex="-1" role="dialog" aria-hidden="true">
   @include('partials.modal')
</div>

@endsection

@push('js')
    <script>
       $('select').on('change', function() {
            let optionValue = this.value.split('-')
            let product_id = optionValue[0]
            let qty = optionValue[1]

            $.ajax({
                method: 'put',
                dataType: 'json',
                url: `/carts/${qty}`,
                data: {
                    qty: qty,
                    product_id: product_id,
                    _token: "{{ csrf_token() }}"
                },

                success: function(res) {
                    if (res.status) {
                        $('#subtotal-'+res.cart_id).text(res.subtotal)
                        $('#total').text(res.total)
                    }
                },
                error: function(err) {
                    console.error(err)
                }
            })
        })
    </script>
@endpush
