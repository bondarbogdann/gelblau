$("input:radio[name ='exampleRadios']").change(function () {
    if ($("#directRadio").is(":checked")) {
        $('#directCollapse').collapse('show');
    } else {
        $('#directCollapse').collapse('hide');
    }
});

$("#invoice").click(function () {
    if (this.checked) {
        $('#name').prop('required', true);
        $('#address').prop('required', true);
    } else {
        $('#name').prop('required', false);
        $('#address').prop('required', false);
    }
});