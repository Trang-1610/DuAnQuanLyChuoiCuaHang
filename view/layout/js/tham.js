$(document).ready(function () {
    $('.sln').on('change', function () {
        var tongtien = 0;
        $('.sln').each(function () {
            var gia = $(this).data("price");
            var kl = $(this).val();
            tongtien += gia * kl;
        })
        $(".giatien").val(tongtien.toLocaleString('vi-VN'));
        $(".giatien").attr("value", tongtien.toLocaleString('vi-VN'));
    })
});
