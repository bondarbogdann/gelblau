$(document).ready(function() {
  $('ul.nav li.active').removeClass('active');
});

$("#downloadButton").click(function () {
  document.getElementById('pdfLink').click();
});