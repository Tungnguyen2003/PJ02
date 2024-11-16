@extends("layout.admin")
@section("main")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title"> Chuyển hàng giữa các kho</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route("admin.product.save") }}" enctype="multipart/form-data">
                            @csrf
                            <div class="clearfix mb-2">
                                <label for="slCategoryCode" class="float-left mr-3 w-25">Nguồn chuyển hàng: </label>
                                <select id="slCategoryCode" name="categoryCode" class="form-control float-left w-25">
                                    @foreach($warehouses as $wh)
                                        <option value="{{ $wh->WarehouseCode }}">{{ $wh->WarehouseName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix mb-2">
                                <label for="slCategoryCode" class="float-left mr-3 w-25">Điểm chuyển hàng: </label>
                                <select id="slCategoryCode" name="categoryCode" class="form-control float-left w-25">
                                    @foreach($warehouses as $wh)
                                        <option value="{{ $wh->WarehouseCode }}">{{ $wh->WarehouseName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix mb-2">
                                <label for="slCategoryCode" class="float-left mr-3 w-25">Mã sản phẩm: </label>
                                <select id="slCategoryCode" name="categoryCode" class="form-control float-left w-25">
                                    @foreach($products as $pd)
                                        <option value="{{ $pd->ProductCode }}">{{ $pd->ProductName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix mb-2">
                                <label for="txtProductUnit" class="float-left mr-3 w-25">Số lượng: </label>
                                <input id="txtProductUnit" type="number" class="form-control float-left w-25" name="productUnit">
                                                                @error("categoryName")
                                                                <span class="ml-2 text-danger"> {{ $message }}</span>
                                                                @enderror
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
