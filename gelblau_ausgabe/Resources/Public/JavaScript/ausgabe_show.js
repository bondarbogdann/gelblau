$(document).ready(function() {
  $('ul.nav li.active').removeClass('active');
});

$("#downloadButton").bind("click touchstart", function(){
  window.open($("#pdfLink").attr("href"), '_blank');
});