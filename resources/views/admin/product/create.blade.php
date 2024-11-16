@extends("layout.admin")
@section("main")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title"> Thêm mới Sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route("admin.product.save") }}" enctype="multipart/form-data">
                            @csrf
                            <div class="clearfix mb-2">
                                <label for="txtProductName" class="float-left mr-3 w-25">Tên Sản phẩm: </label>
                                <input id="txtProductName" type="text" class="form-control float-left w-25" name="productName">
                                @error("productName")
                                    <span class="ml-2 text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="clearfix mb-2">
                                <label for="txtProductImage" class="float-left mr-3 w-25">Hình ảnh: </label>
                                <input id="txtProductImage" type="file" class="form-control float-left w-25" name="upload">
                                @error("upload")
                                    <span class="ml-2 text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="clearfix mb-2">
                                <label for="txtProductUnit" class="float-left mr-3 w-25">Đơn vị tính: </label>
                                <input id="txtProductUnit" type="text" class="form-control float-left w-25" name="productUnit">
{{--                                @error("categoryName")--}}
{{--                                <span class="ml-2 text-danger"> {{ $message }}</span>--}}
{{--                                @enderror--}}
                            </div>
                            <div class="clearfix mb-2">
                                <label for="txtManufNation" class="float-left mr-3 w-25">Quốc gia sản xuất: </label>
                                <input id="txtManufNation" type="text" class="form-control float-left w-25" name="manufNation">
{{--                                @error("categoryName")--}}
{{--                                <span class="ml-2 text-danger"> {{ $message }}</span>--}}
{{--                                @enderror--}}
                            </div>
                            <div class="clearfix mb-2">
                                <label for="txtProductPrice" class="float-left mr-3 w-25">Giá bán: </label>
                                <input id="txtProductPrice" type="number" class="form-control float-left w-25" name="productPrice">
{{--                                @error("categoryName")--}}
{{--                                <span class="ml-2 text-danger"> {{ $message }}</span>--}}
{{--                                @enderror--}}
                            </div>
                            <div class="clearfix mb-2">
                                <label for="txtProductDes" class="float-left mr-3 w-25">Mô tả: </label>
                                <textarea id="txtProductDes" type="text" class="form-control float-left w-25" name="productDes"></textarea>
                            </div>
                            <div class="clearfix mb-2">
                                <label for="slCategoryCode" class="float-left mr-3 w-25">Chọn danh mục: </label>
                                <select id="slCategoryCode" name="categoryCode" class="form-control float-left w-25">
                                    @foreach($category_data as $category)
                                        <option value="{{ $category->CategoryCode }}">{{ $category->CategoryName }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="clearfix text-center w-50">
                                <input type="submit" value="Lưu" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
