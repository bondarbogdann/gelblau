$(document).ready(function() {
    $('ul.nav li.active').removeClass('active');
  });
  
  $("input:radio[name ='exampleRadios']").change(function () {
      if ($("#directRadio").is(":checked")) {
          $('#directCollapse').collapse('show');
      } else {
          $('#directCollapse').collapse('hide');
      }
  });

  $("#ausgabeAmount").change(function(){
    var amount = +this.value;
    //var price = +$("#ausgabePrice").data("price");
    //var left = +$("#amountLeft").data("left");
    if (amount < 1) {
      amount = 1;
      this.value = 1;
    }
    // if (amount > left){
    //   amount = left;
    //   this.value = left;
    // }
    //$("#money").val(price*amount);
  });

  $("#order_form").submit(function() {
    if($('#paypalRadio').is(':checked')) {document.getElementById('paypalLink').click();}
});