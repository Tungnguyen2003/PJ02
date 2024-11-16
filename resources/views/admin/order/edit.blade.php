@extends("layout.admin")
@section("main")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title"> Cập nhật đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Mã đơn hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Số lượng</th>
                                <th>Trạng thái</th>
                                <th>Kho hàng</th>
                                <th>Tác vụ</th>
                                </thead>
                                <tbody>
                                @foreach($data as $order)
                                    <form method="POST" action="{{ route("admin.order.edit", ["code" => $order->OrderNumber]) }}">
                                        @csrf
                                    <tr>
                                        <td>
                                            <input type="hidden" name="hidOrderNumber" value="{{ $order->OrderNumber }}">
                                            <input type="hidden" name="hidProductCode" value="{{ $order->ProductCode }}">
                                            {{ $order->OrderNumber }}
                                        </td>
                                        <td>{{ $order->product->ProductName }}</td>
                                        <td>{{ $order->order->customer->FullName }}</td>
                                        <td>{{ $order->order->customer->Phone }}</td>
                                        <td>
                                            <input type="hidden" name="hidQuantity" value="{{ $order->Quantity }}">
                                            {{ $order->Quantity }}
                                        </td>
                                        <td>
                                            <select name="slProductStatus">
                                                <option value="0" @if($order->Status == 0) selected @endif>Chờ xác nhận</option>
                                                <option value="1" @if($order->Status == 1) selected @endif>Đã xác nhận</option>
                                                <option value="2" @if($order->Status == 2) selected @endif>Đã hủy</option>
                                                <option value="3" @if($order->Status == 3) selected @endif>Đang soạn hàng</option>
                                                <option value="4" @if($order->Status == 4) selected @endif>Đang giao hàng</option>
                                                <option value="5" @if($order->Status == 5) selected @endif>Đã nhận hàng</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="slWarehouse">
                                                @foreach($warehouses as $wh)
                                                    <option value="{{ $wh->WarehouseCode }}">{{ $wh->WarehouseName }}</option>
                                                @endforeach
                                            </select>
                                            @if(session()->has($order->ProductCode))
                                                <span class="text-danger">{{ session()->get($order->ProductCode) }}</span>
                                            @endif
                                        </td>
                                        <td><button type="submit" class="btn btn-success">Save</button></td>
                                    </tr>
                                    </form>
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
