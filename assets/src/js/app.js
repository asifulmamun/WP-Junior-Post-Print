// import "./app.css";

import "./app.scss";

console.log("Log app.js");


// Print
// function includeExternalFiles(printWindow) {
//   // Get all linked CSS files
//   var cssLinks = document.querySelectorAll('link[rel="stylesheet"]');
//   cssLinks.forEach(function(link) {
//       var href = link.getAttribute('href');
//       printWindow.document.write('<link rel="stylesheet" href="' + href + '">');
//   });

//   // Get all external JavaScript files
//   var jsScripts = document.querySelectorAll('script[src]');
//   jsScripts.forEach(function(script) {
//       var src = script.getAttribute('src');
//       printWindow.document.write('<script src="' + src + '"></script>');
//   });
// }

// document.getElementById('printBtn').addEventListener('click', function() {
//   var printContents = document.getElementById('main').innerHTML;
//   var originalContents = document.body.innerHTML;

//   var printWindow = window.open('', '_blank');
//   printWindow.document.open();
//   printWindow.document.write('<html><head><title>Print</title></head><body>' + printContents + '</body></html>');
//   includeExternalFiles(printWindow);
//   printWindow.document.close();

//   printWindow.print();

//   printWindow.onafterprint = function() {
//       printWindow.close();
//       document.body.innerHTML = originalContents;
//   };
// });


// Print
document.getElementById('printBtn').addEventListener('click', function() {
  window.print();
});

// Go Back
document.getElementById("goBackButton").addEventListener("click", function() {
  window.history.back();
});