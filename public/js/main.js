function btn_plus_minus()
{
    var t = document.getElementById("show-complex-details");
    var d = $("#desc-text");
    var i = $("#desc-img");

    if (d.hasClass("active"))
    {
        i.css('height', d.height())
        d.removeClass("active");
        i.addClass("active");
        $(t).html("");
        $(t).append($("#minus").clone());
    }
    else
    {
        i.removeClass("active");
        d.addClass("active");
        $(t).html("");
        $(t).append($("#plus").clone());
    }
}


$(document).ready(function () {

});