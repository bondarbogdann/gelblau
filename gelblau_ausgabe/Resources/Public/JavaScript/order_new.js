$("input:radio[name ='paymentOptions']").change(function () {
    if ($("#directRadio").is(":checked")) {
        $('#directCollapse').collapse('show');
    } else {
        $('#directCollapse').collapse('hide');
    }
});

$("#invoice").click(function () {
    if (this.checked) {
        $('#name').prop('required', true);
        $('#username_row').addClass("required");
        $('#address').prop('required', true);
        $('#useraddress_row').addClass("required");
    } else {
        $('#name').prop('required', false);
        $('#username_row').removeClass("required");
        $('#address').prop('required', false);
        $('#useraddress_row').removeClass("required");
    }
});

$("#order_form").submit(function() {
    if($('#paypalRadio').is(':checked')) {document.getElementById('paypalLink').click();}
});