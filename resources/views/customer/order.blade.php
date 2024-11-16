@extends("layout.main")

@section("main")
    <!-- Title Page -->
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset("images/heading-pages-01.jpg") }});">
        <h2 class="l-text2 t-center">
            Quản lý đơn hàng
        </h2>
    </section>

    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <!-- Cart item -->
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <input type="hidden" id="shoppingCartToken" value="{{ csrf_token() }}">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1">Mã đơn hàng</th>
                            <th class="column-2">Ngày tạo</th>
                            <th class="column-3">Trị giá</th>
                            <th class="column-4">Trạng thái</th>
                            <th class="column-5">Tác vụ</th>
                        </tr>
                        @foreach($data as $order)
                            <tr class="table-row">
                                <td class="column-1">{{ $order->OrderNumber }}</td>
                                <td class="column-2">{{ date("d/m/Y H:i A", strtotime($order->OrderCreated)) }}</td>
                                <td class="column-3">{{ number_format($order["Total"]) }} VND</td>
                                <td class="column-4">
                                    @php
                                        switch ($order["Status"]){
                                            case 1: $status = "Đã xác nhận"; break;
                                            case 2: $status = "Đã hủy"; break;
                                            case 3: $status = "Đang soạn hàng"; break;
                                            case 4: $status = "Đang giao hàng"; break;
                                            case 5: $status = "Đã nhận hàng"; break;
                                            default: $status = "Chờ xác nhận";
                                        }
                                    @endphp
                                    {{ $status }}
                                </td>
                                <td class="column-5">
                                    <a href="" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                    <a href="" class="btn btn-success"><i class="fa fa-forward"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
