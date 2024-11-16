@extends("layout.admin")
@section("main")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title"> Kho hàng</h4>
                        {{--                        <p class="card-category"> Here is a subtitle for this table</p>--}}
                        <a href="{{ route("admin.product.create") }}" class="btn btn-dark pull-right">Tạo mới</a>
                        <a href="{{ route("admin.warehouse.transfer") }}" class="btn btn-primary pull-right">Chuyển hàng</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Mã đơn hàng</th>
                                <th>Ngày tạo</th>
                                <th>Trị giá</th>
                                <th>Trạng thái</th>
                                <th>Tác vụ</th>
                                </thead>
                                <tbody>
{{--                                @foreach($data as $order)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $order->OrderNumber }}</td>--}}
{{--                                        <td>{{ date("d/m/Y H:i A", strtotime($order->OrderCreated)) }}</td>--}}
{{--                                        <td>{{ number_format($order["Total"]) }} VND</td>--}}
{{--                                        <td>--}}
{{--                                            @php--}}
{{--                                                switch ($order["Status"]){--}}
{{--                                                    case 1: $status = "Đã xác nhận"; break;--}}
{{--                                                    case 2: $status = "Đã hủy"; break;--}}
{{--                                                    case 3: $status = "Đang soạn hàng"; break;--}}
{{--                                                    case 4: $status = "Đang giao hàng"; break;--}}
{{--                                                    case 5: $status = "Đã nhận hàng"; break;--}}
{{--                                                    default: $status = "Chờ xác nhận";--}}
{{--                                                }--}}
{{--                                            @endphp--}}
{{--                                            {{ $status }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{ route("admin.order.view", ["code" => $order->OrderNumber]) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>--}}
{{--                                            <a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a>--}}
{{--                                            <a href="{{ route("admin.order.cancel", ["code" => $order->OrderNumber]) }}" class="btn btn-danger"><i class="fa fa-close"></i></a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
