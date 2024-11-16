@extends("layout.admin")
@section("main")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title"> Thêm mới Danh mục sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route("admin.category.save") }}">
                            @csrf
                            <div class="clearfix mb-2">
                                <label for="txtCategoryName" class="float-left mr-3 w-25">Tên Danh mục: </label>
                                <input id="txtCategoryName" type="text" class="form-control float-left w-25" name="categoryName">
                                @error("categoryName")
                                    <span class="ml-2 text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="clearfix mb-2">
                                <label for="txtCategoryDes" class="float-left mr-3 w-25">Mô tả: </label>
                                <textarea id="txtCategoryDes" type="text" class="form-control float-left w-25" name="categoryDes"></textarea>
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
