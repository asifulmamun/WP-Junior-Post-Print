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

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./app.scss */ \"./src/js/app.scss\");\n// import \"./app.css\";\n\n\nconsole.log(\"Log app.js\");\n\n// Print\n// function includeExternalFiles(printWindow) {\n//   // Get all linked CSS files\n//   var cssLinks = document.querySelectorAll('link[rel=\"stylesheet\"]');\n//   cssLinks.forEach(function(link) {\n//       var href = link.getAttribute('href');\n//       printWindow.document.write('<link rel=\"stylesheet\" href=\"' + href + '\">');\n//   });\n\n//   // Get all external JavaScript files\n//   var jsScripts = document.querySelectorAll('script[src]');\n//   jsScripts.forEach(function(script) {\n//       var src = script.getAttribute('src');\n//       printWindow.document.write('<script src=\"' + src + '\"></script>');\n//   });\n// }\n\n// document.getElementById('printBtn').addEventListener('click', function() {\n//   var printContents = document.getElementById('main').innerHTML;\n//   var originalContents = document.body.innerHTML;\n\n//   var printWindow = window.open('', '_blank');\n//   printWindow.document.open();\n//   printWindow.document.write('<html><head><title>Print</title></head><body>' + printContents + '</body></html>');\n//   includeExternalFiles(printWindow);\n//   printWindow.document.close();\n\n//   printWindow.print();\n\n//   printWindow.onafterprint = function() {\n//       printWindow.close();\n//       document.body.innerHTML = originalContents;\n//   };\n// });\n\n// Print\ndocument.getElementById('printBtn').addEventListener('click', function () {\n  window.print();\n});\n\n// Go Back\ndocument.getElementById(\"goBackButton\").addEventListener(\"click\", function () {\n  window.history.back();\n});\n\n//# sourceURL=webpack://empty-project/./src/js/app.js?");

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