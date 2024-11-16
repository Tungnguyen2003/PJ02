@extends("layout.admin")
@section("main")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title"> Danh mục sản phẩm</h4>
{{--                        <p class="card-category"> Here is a subtitle for this table</p>--}}
                        <a href="{{ route("admin.category.create") }}" class="btn btn-dark pull-right">Tạo mới</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Mã Danh mục
                                </th>
                                <th>
                                    Tên Danh mục
                                </th>
                                <th>
                                    Tác vụ
                                </th>
                                </thead>
                                <tbody>
                                    @foreach($category_data as $category)
                                        <tr>
                                            <td>{{ $category->CategoryCode }}</td>
                                            <td>{{ $category->CategoryName }}</td>
                                            <td>
                                                <a href="{{ route("admin.category.edit", ["code" => $category->CategoryCode]) }}" class="btn btn-warning">Cập nhật</a>
                                                <a href="{{ route("admin.category.delete", ["code" => $category->CategoryCode]) }}" class="btn btn-danger">Xóa</a>
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
