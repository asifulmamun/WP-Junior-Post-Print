// import "./app.css";

import "./app.scss";

console.log("Log app.js");


// Print
document.getElementById('printBtn').addEventListener('click', function() {
    var printContents = document.getElementById('main').innerHTML;
    var originalContents = document.body.innerHTML;
    
    // Create a new window with the content to print
    var printWindow = window.open('', '_blank');
    printWindow.document.open();
    printWindow.document.write('<html><head><title>Print</title></head><body>' + printContents + '</body></html>');
    printWindow.document.close();

    // Trigger printing
    printWindow.print();

    // Restore the original content of the document
    printWindow.onafterprint = function() {
      printWindow.close();
      document.body.innerHTML = originalContents;
    };
  });