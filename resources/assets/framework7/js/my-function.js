function chkform(formname) {
    var chk = true;
    var error = "以下栏位不能空白<br>";
    $("." + formname).find('.form-input').each(function(k, v) {
        if ($(v).val() == "") {
            chk = false;
            error += $(v).data('empty') + "<br>";
        }
    });
    return { status: chk, error: error };
}