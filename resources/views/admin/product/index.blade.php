@extends("layout.admin")
@section("main")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title"> Sản phẩm</h4>
                        {{--                        <p class="card-category"> Here is a subtitle for this table</p>--}}
                        <a href="{{ route("admin.product.create") }}" class="btn btn-dark pull-right">Tạo mới</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Hình ảnh</th>
                                <th>Mã Sản phẩm</th>
                                <th>Tên Sản phẩm</th>
                                <th>Giá</th>
                                <th>Danh mục</th>
                                <th>Tác vụ</th>
                                </thead>
                                <tbody>
                                @foreach($product_data as $product)
                                    <tr>
                                        <td><img class="img-thumbnail" width="100px" src="{{ asset("uploads/".$product->Image)  }}"></td>
                                        <td>{{ $product->ProductCode }}</td>
                                        <td>{{ $product->ProductName }}</td>
                                        <td>{{ $product->Price }}</td>
                                        <td>{{ $product->category->CategoryName }}</td>
                                        <td>
                                            <a href="{{ route("admin.product.edit", ["code" => $product->ProductCode]) }}" class="btn btn-warning">Cập nhật</a>
                                            <a href="{{ route("admin.product.delete", ["code" => $product->ProductCode]) }}" class="btn btn-danger">Xóa</a>
                                        </td>
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
