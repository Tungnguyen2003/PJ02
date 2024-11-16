@extends("layout.admin")
@section("main")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title"> Chi tiết đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Mã đơn hàng</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá gốc</th>
                                <th>Giá bán</th>
                                <th>Thành tiền</th>
                                </thead>
                                <tbody>
                                @foreach($data as $order)
                                    <tr>
                                        <td>{{ $order->OrderNumber }}</td>
                                        <td>{{ $order->ProductCode }}</td>
                                        <td></td>
                                        <td>{{ $order->Quanity }}</td>
                                        <td>{{ $order->OriginalPrice }}</td>
                                        <td>{{ $order->SalePrice }}</td>
                                        <td>{{ number_format($order->Price*$order->Quantity) }} VND</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
