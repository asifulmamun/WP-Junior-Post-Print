/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/app.js":
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./app.scss */ \"./src/js/app.scss\");\n// import \"./app.css\";\n\nconsole.log(\"Log app.js\");\n\n// Print\ndocument.getElementById('printBtn').addEventListener('click', function () {\n  window.print();\n});\n\n// Go Back\ndocument.getElementById(\"goBackButton\").addEventListener(\"click\", function () {\n  window.history.back();\n});\n\n// https://html2canvas.hertzen.com/\ndocument.getElementById('download').addEventListener('click', downloadCanvasAsImage);\nfunction downloadCanvasAsImage() {\n  var scale = 4;\n  html2canvas(document.querySelector(\"#main\"), {\n    scale: scale\n  }).then(function (canvas) {\n    // Convert canvas to data URL\n    var dataURL = canvas.toDataURL('image/png');\n\n    // Create a link element\n    var downloadLink = document.createElement('a');\n    downloadLink.href = dataURL;\n\n    // Set the download attribute to specify the file name\n    downloadLink.download = pageTitle;\n\n    // Simulate a click to trigger the download\n    document.body.appendChild(downloadLink);\n    downloadLink.click();\n    document.body.removeChild(downloadLink);\n  });\n}\n\n// En to Bn\nfunction en2bnNumber(number) {\n  var english_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];\n  var bangla_numbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];\n  return number.toString().split('').map(function (digit) {\n    return bangla_numbers[english_numbers.indexOf(digit)];\n  }).join('');\n}\n\n// Determine the suffix for the day\nfunction getSuffix(day) {\n  switch (day) {\n    case 1:\n    case 21:\n    case 31:\n      return \"লা\";\n    case 2:\n    case 22:\n      return \"রা\";\n    case 3:\n    case 23:\n      return \"রা\";\n    case 4:\n    case 24:\n      return \"ঠা\";\n    default:\n      return \"ই\";\n  }\n}\n\n// Calculate Islamic date\nfunction calculatingIslamicDate(date, adjust) {\n  var today = date ? new Date(+date) : new Date();\n  if (adjust) {\n    today.setDate(today.getDate() + +adjust);\n  }\n  var day = today.getDate();\n  var month = today.getMonth();\n  var year = today.getFullYear();\n  var m = month + 1;\n  var y = year;\n  if (m < 3) {\n    y -= 1;\n    m += 12;\n  }\n  var a = Math.floor(y / 100);\n  var b = 2 - a + Math.floor(a / 4);\n  if (y < 1583) b = 0;\n  if (y == 1582) {\n    if (m > 10) b = -10;\n    if (m == 10) {\n      b = 0;\n      if (day > 4) b = -10;\n    }\n  }\n  var jd = Math.floor(365.25 * (y + 4716)) + Math.floor(30.6001 * (m + 1)) + day + b - 1524;\n  b = 0;\n  if (jd > 2299160) {\n    a = Math.floor((jd - 1867216.25) / 36524.25);\n    b = 1 + a - Math.floor(a / 4);\n  }\n  var bb = jd + b + 1524;\n  var cc = Math.floor((bb - 122.1) / 365.25);\n  var dd = Math.floor(365.25 * cc);\n  var ee = Math.floor((bb - dd) / 30.6001);\n  day = bb - dd - Math.floor(30.6001 * ee);\n  month = ee - 1;\n  if (ee > 13) {\n    cc += 1;\n    month = ee - 13;\n  }\n  year = cc - 4716;\n  var wd = ((jd + 1) % 7 + 7) % 7 + 1;\n  var iyear = 10631. / 30.;\n  var epochastro = 1948084;\n  var epochcivil = 1948085;\n  var shift1 = 8.01 / 60.;\n  var z = jd - epochastro;\n  var cyc = Math.floor(z / 10631.);\n  z = z - 10631 * cyc;\n  var j = Math.floor((z - shift1) / iyear);\n  var iy = 30 * cyc + j;\n  z = z - Math.floor(j * iyear + shift1);\n  var im = Math.floor((z + 28.5001) / 29.5);\n  if (im == 13) im = 12;\n  var id = z - Math.floor(29.5001 * im - 29);\n  return [day,\n  // calculated day (CE)\n  month - 1,\n  // calculated month (CE)\n  year,\n  // calculated year (CE)\n  jd - 1,\n  // julian day number\n  wd - 1,\n  // weekday number\n  id,\n  // islamic date\n  im - 1,\n  // islamic month\n  iy // islamic year\n  ];\n}\n\n// Write Islamic date\nfunction writeIslamicDate(date, adjustment) {\n  var wdNames = [\"আহাদ\", \"ইথনিন\", \"থুলাথা\", \"আরবা\", \"খামস\", \"জুমু'আহ\", \"সাবত\"];\n  var iMonthNames = [\"মহররম\", \"সফর\", \"রবিউল আউয়াল\", \"রবিউস সানি\", \"জমাদিউল আউয়াল\", \"জমাদিউস সানি\", \"রজব\", \"শাবান\", \"রমজান\", \"শাওয়াল\", \"জিলকদ\", \"জিলহজ\"];\n  var iDate = calculatingIslamicDate(date, adjustment);\n  var outputIslamicDate = en2bnNumber(iDate[5]) + getSuffix(iDate[5]) + \" \" + iMonthNames[iDate[6]] + \" \" + en2bnNumber(iDate[7]);\n  return outputIslamicDate;\n}\n\n// Get today's date\nvar today = new Date();\nvar day = today.getDate();\nvar monthNames = [\"জানুয়ারী\", \"ফেব্রুয়ারী\", \"মার্চ\", \"এপ্রিল\", \"মে\", \"জুন\", \"জুলাই\", \"আগস্ট\", \"সেপ্টেম্বর\", \"অক্টোবর\", \"নভেম্বর\", \"ডিসেম্বর\"];\nvar month = monthNames[today.getMonth()];\nvar year = today.getFullYear();\nvar banglaDayString = new buetDateConverter().convert(\"l\");\nvar banglaDateString = new buetDateConverter().convert(\"d F, Y\");\ndocument.getElementById('banglaDayString').textContent = 'প্রিন্ট এর তারিখঃ ' + banglaDayString;\ndocument.getElementById('banglaDateString').textContent = banglaDateString;\ndocument.getElementById('englishDateString').textContent = en2bnNumber(day) + getSuffix(day) + \" \" + month + \" \" + en2bnNumber(year);\ndocument.getElementById('arabicDateString').textContent = writeIslamicDate(new Date(), 0);\n\n//# sourceURL=webpack://empty-project/./src/js/app.js?");

/***/ }),

/***/ "./src/js/app.scss":
/*!*************************!*\
  !*** ./src/js/app.scss ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://empty-project/./src/js/app.scss?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/js/app.js");
/******/ 	
/******/ })()
;