// import "./app.css";
import "./app.scss";
console.log("Log app.js");

// Print
document.getElementById('printBtn').addEventListener('click', function () {
    window.print();
});

// Go Back
document.getElementById("goBackButton").addEventListener("click", function () {
    window.history.back();
});

// // https://html2canvas.hertzen.com/ HTML2Canvas
// const script = document.createElement('script');
// script.src = "https://html2canvas.hertzen.com/dist/html2canvas.min.js";
// document.head.appendChild(script);
// document.getElementById('download').addEventListener('click', downloadCanvasAsImage);
// function downloadCanvasAsImage() {
//     const scale = 4;
//     // const mainElement = document.querySelector("#main");
//     const mainElement = document.querySelector("main");
//     const clone = mainElement.cloneNode(true);
    
//     // Adjust styles to prevent overlap and ensure proper height
//     clone.style.margin = "20px"; // Add margin to prevent overlap
//     clone.style.padding = "10px"; // Add padding for better spacing
//     clone.style.boxSizing = "border-box"; // Ensure padding is included in width/height

//     // Set a minimum height to avoid content overlap
//     clone.style.minHeight = "600px"; // Adjust as necessary for your layout

//     document.body.appendChild(clone);

//     html2canvas(clone, {
//         scale: scale,
//         width: clone.scrollWidth,
//         height: clone.scrollHeight
//     }).then(canvas => {
//         // Convert canvas to data URL
//         const dataURL = canvas.toDataURL('image/png');

//         // Create a link element
//         const downloadLink = document.createElement('a');
//         downloadLink.href = dataURL;
        
//         // Set the download attribute to specify the file name
//         downloadLink.download = pageTitle;
        
//         // Simulate a click to trigger the download
//         document.body.appendChild(downloadLink);
//         downloadLink.click();
//         document.body.removeChild(downloadLink);
//         document.body.removeChild(clone); // Remove the cloned element after download
//     });
// }

// HTML to Image
document.getElementById('download').addEventListener('click', downloadFullPageAsImage);
import domtoimage from 'dom-to-image';
function downloadFullPageAsImage() {
    const fullPageElement = document.getElementById('main'); // Capture the main element for the entire page

    // Create a clone of the main element to ensure styles are applied correctly
    const clone = fullPageElement.cloneNode(true);
    document.body.appendChild(clone);

    // Adjust the clone's position to ensure it captures the correct content
    clone.style.position = 'absolute';
    clone.style.left = '0';
    clone.style.top = '0';
    clone.style.zIndex = '-1'; // Ensure it doesn't interfere with the view

    domtoimage.toJpeg(clone, { 
        quality: 1.0,
        bgcolor: '#ffffff', // Set background color to white for better image quality
        width: clone.scrollWidth, // Set width to the scroll width of the main element
        height: clone.scrollHeight // Set height to the scroll height of the main element
    })
    .then(function (dataUrl) {
        var link = document.createElement('a');
        link.download = pageTitle; // Updated file name for clarity
        link.href = dataUrl;
        link.click();
        document.body.removeChild(clone); // Remove the cloned element after download
    });
}

// En to Bn
function en2bnNumber(number) {
    var english_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    var bangla_numbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
    return number.toString().split('').map(function (digit) {
        return bangla_numbers[english_numbers.indexOf(digit)];
    }).join('');
}

// Determine the suffix for the day
function getSuffix(day) {
    switch (day) {
        case 1: case 21: case 31:
            return "লা";
        case 2: case 22:
            return "রা";
        case 3: case 23:
            return "রা";
        case 4: case 24:
            return "ঠা";
        default:
            return "ই";
    }
}

// Calculate Islamic date
function calculatingIslamicDate(date, adjust) {
    var today = date ? new Date(+date) : new Date();
    if (adjust) {
        today.setDate(today.getDate() + +adjust);
    }

    var day = today.getDate();
    var month = today.getMonth();
    var year = today.getFullYear();
    var m = month + 1;
    var y = year;

    if (m < 3) {
        y -= 1;
        m += 12;
    }

    var a = Math.floor(y / 100);
    var b = 2 - a + Math.floor(a / 4);

    if (y < 1583) b = 0;
    if (y == 1582) {
        if (m > 10) b = -10;
        if (m == 10) {
            b = 0;
            if (day > 4) b = -10;
        }
    }

    var jd = Math.floor(365.25 * (y + 4716)) + Math.floor(30.6001 * (m + 1)) + day + b - 1524;

    b = 0;
    if (jd > 2299160) {
        a = Math.floor((jd - 1867216.25) / 36524.25);
        b = 1 + a - Math.floor(a / 4);
    }

    var bb = jd + b + 1524;
    var cc = Math.floor((bb - 122.1) / 365.25);
    var dd = Math.floor(365.25 * cc);
    var ee = Math.floor((bb - dd) / 30.6001);
    day = (bb - dd) - Math.floor(30.6001 * ee);
    month = ee - 1;

    if (ee > 13) {
        cc += 1;
        month = ee - 13;
    }
    year = cc - 4716;
    var wd = ((jd + 1) % 7 + 7) % 7 + 1;

    var iyear = 10631. / 30.;
    var epochastro = 1948084;
    var epochcivil = 1948085;

    var shift1 = 8.01 / 60.;

    var z = jd - epochastro;
    var cyc = Math.floor(z / 10631.);
    z = z - 10631 * cyc;
    var j = Math.floor((z - shift1) / iyear);
    var iy = 30 * cyc + j;
    z = z - Math.floor(j * iyear + shift1);
    var im = Math.floor((z + 28.5001) / 29.5);

    if (im == 13) im = 12;
    var id = z - Math.floor(29.5001 * im - 29);

    return [
        day,       // calculated day (CE)
        month - 1, // calculated month (CE)
        year,      // calculated year (CE)
        jd - 1,    // julian day number
        wd - 1,    // weekday number
        id,        // islamic date
        im - 1,    // islamic month
        iy         // islamic year
    ];
}

// Write Islamic date
function writeIslamicDate(date, adjustment) {
    var wdNames = ["আহাদ", "ইথনিন", "থুলাথা", "আরবা", "খামস", "জুমু'আহ", "সাবত"];
    var iMonthNames = ["মহররম", "সফর", "রবিউল আউয়াল", "রবিউস সানি", "জমাদিউল আউয়াল", "জমাদিউস সানি",
        "রজব", "শাবান", "রমজান", "শাওয়াল", "জিলকদ", "জিলহজ"];
    var iDate = calculatingIslamicDate(date, adjustment);
    var outputIslamicDate = en2bnNumber(iDate[5]) + getSuffix(iDate[5]) + " " + iMonthNames[iDate[6]] + " " + en2bnNumber(iDate[7]);
    return outputIslamicDate;
}

// Get today's date
var today = new Date();
var day = today.getDate();
var monthNames = ["জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর"];
var month = monthNames[today.getMonth()];
var year = today.getFullYear();

var banglaDayString = new buetDateConverter().convert("l");
var banglaDateString = new buetDateConverter().convert("d F, Y");
document.getElementById('banglaDayString').textContent = 'প্রিন্ট এর তারিখঃ ' + banglaDayString;
document.getElementById('banglaDateString').textContent = banglaDateString;
document.getElementById('englishDateString').textContent = en2bnNumber(day) + getSuffix(day) + " " + month + " " + en2bnNumber(year);
document.getElementById('arabicDateString').textContent = writeIslamicDate(new Date(), 0);