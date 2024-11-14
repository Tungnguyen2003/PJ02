$(function(){
    $(`input[name="search-product"]`).keypress(function (e) {
        if(e.keyCode == 13){
            var value = $(this).val();
            if(value == ""){
                $(".search-product").after("<span class='text-danger'>Bạn chưa nhập từ khóa tìm kiếm</span>");
            }
            else{
                window.location.href = "?search="+value;
            }
        }
    });

    function updateTotalPrice(e){
        var price = parseFloat($(e).closest(".table-row").find(".column-3").text().replace(/[^0-9]/g, ""));
        var quantity = parseFloat($(e).closest(".column-4").find(".num-product").val());
        var total = price*quantity
        $(e).closest(".table-row").find(".column-5").text(total.toLocaleString()+" VND");
    }

    $(".num-product").change(function () {
        updateTotalPrice(this);
    });

    $(".btn-num-product-up, .btn-num-product-down").click(function () {
        updateTotalPrice(this);
    });

    $("#btnUpdateCart").click(function () {
        var selector = $(".table-shopping-cart .table-row");
        var cart = {};
        selector.each(function () {
            var product_code = $(this).find(`input[type="hidden"]`).val();
            var quantity = $(this).find(".num-product").val();
            cart[product_code] = quantity;
        });

        var token = $("#shoppingCartToken").val();

        $.ajax({
            type: "POST",
            url: "cart/update",
            data: {
                "data": cart,
                "_token": token,
            },
            success: function (result) {
                window.location.reload();
            },
            error: function (error) {
                console.log(JSON.stringify(error))
            }
        });
    });

    $(`select[name="shipping"]`).change(function () {
        var shippingOption = parseInt($(this).val());
        var shippingCost = 50000;
        if(shippingOption == 1) shippingCost = 30000;
        $(`span[name="shipping-cost"]`).text(shippingCost.toLocaleString()+" VND");

        var subtotal = parseFloat($(`span[name="subtotal"]`).text().replace(/[^0-9]/g, ""));
        $(`span[name="total-order"]`).text((subtotal+shippingCost).toLocaleString()+" VND");
    });
});
