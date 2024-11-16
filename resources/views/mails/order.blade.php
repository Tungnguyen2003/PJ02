<div style="width:600px; margin: auto">
    <h4 style="text-align: center">Xin chào quý khách hàng: {{$customer->FullName}}</h4>
    <p style="text-align: center">
        Dưới đây là email thông tin đơn hàng của quý khách, quý khách hàng vui lòng xác
        nhận đơn hàng bằng cách click và
        nút bấm <b>"Xác nhận đơn hàng"</b> dưới đây để chúng ôi biết là đơn hàng của
        quý khách
    </p>
    <p style="text-align: center">
        <a href="{{ route('order.verify_order', $token) }}" target="_blank"
           style="display: inline-block; text-decoration: none; padding:10px 25px;
color: #fff; background: green">Xác nhận đơn hàng</a>
    </p>
    <h4>Thông tài khoản đặt hàng:</h4>
    <p>
    <ul>
        <li><b>Họ tên:</b> {{$customer->FullName}}</li>
        <li><b>Email:</b> {{$customer->email}}</li>
        <li><b>SỐ ĐT:</b> {{$customer->Phone}}</li>
        <li><b>Địa chỉ:</b> {{$customer->Address}}</li>
    </ul>
    </p>
    <div style="width:48%; float: left">
        <h4>Thông tin đơn hàng</h4>
        <table border="1" cellspacing="0" cellpadding="5" style="width:100%">
            <thead>
            <tr>
                <th>Mã</th>
{{--                <td>#{{$order->id}}</td>--}}
            </tr>
            <tr>
                <th>Ngày đặt</th>
{{--                <td>{{$order->created_at->format('d/m/yy')}}</td>--}}
            </tr>
            <tr>
                <th>Tổng tiền</th>
{{--                <td>{{number_format( $order->totalPrice() )}}</td>--}}
            </tr>
            <tr>
                <th>Trạng thái</th>
                <td>Chờ duyệt</td>
            </tr>
            </thead>
        </table>
    </div>
    <div style="width:48%; float: right">
        <h4>Thông tin giao hàng</h4>
        <table border="1" cellspacing="0" cellpadding="5" style="width:100%">
            <thead>
            <tr>
                <th>Họ tên</th>
                <td>{{$customer->FullName}}</td>
            </tr>
            <tr>
                <th>ĐỊa chỉ</th>
                <td>{{$customer->Address}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$customer->email}}</td>
            </tr>
            <tr>
                <th>Điện thoại</th>
                <td>{{$customer->Phone}}</td>
            </tr>
            </thead>
        </table>
    </div>
    <br>
    <div style="clear: both"></div>
    <h4>Chi tiết sản phẩm của đơn hàng</h4>
    <table border="1" cellspacing="0" cellpadding="5" style="width:100%">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order as $detail)
            <tr>
                <td style="text-align:center">{{$loop->index + 1}}</td>
                <td>{{$detail["ProductName"] }}</td>
                <td>{{$detail["quantity"] }}</td>
                <td>{{ number_format( $detail["Price"] ) }} đ</td>
                <td>{{ number_format( $detail["Price"]*$detail["quantity"] ) }} đ</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
