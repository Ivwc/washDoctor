function chkform(formname) {
    var chk = true;
    var error = "以下栏位不能空白<br>";
    $("." + formname).find('.form-input').each(function(k, v) {
        if ($(v).val() == "") {
            if ($(v).data('other-chk') != "") {
                if ($("." + formname).find('input[name=' + $(v).data('other-chk') + ']').val() == "") {
                    chk = false;
                    error += $(v).data('empty') + "<br>";
                }
            } else {
                chk = false;
                error += $(v).data('empty') + "<br>";
            }
        }
    });
    return { status: chk, error: error };
}

function getBase64(file) {
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function() {
        $('.image-preview').attr('src', reader.result);
        $('.image-input').attr('data-base64', reader.result);
    };
    reader.onerror = function(error) {
        console.log('Error: ', error);
    };
}