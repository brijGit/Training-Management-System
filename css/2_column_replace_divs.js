// JavaScript Document
function clearOld (absoluteDivName) {
	// hides a div and absolutely positions it outside of the viewable area of the page.
	var absoluteDiv = document.getElementById(absoluteDivName);
	absoluteDiv.style.visibility = 'hidden';
	absoluteDiv.style.overflow = 'hidden';
	absoluteDiv.style.display = 'none';
	absoluteDiv.style.top = '-2px';
	absoluteDiv.style.left = '-2px';
	absoluteDiv.style.width = '1px';
	absoluteDiv.style.height = '1px';
}

function replaceDivs(floatDivId, absoluteDivId, floatDivIdBG, floatDivIdBGColor) {
	// This function replaces the contents of the floating div with the contents of the absolutely positioned div.
	var floatDiv = document.getElementById(floatDivId);
	var absoluteDiv = document.getElementById(absoluteDivId);
	var leftHTML = absoluteDiv.innerHTML;
	floatDiv.innerHTML = leftHTML;
	// clear the inner HTML of the absolutely positioned div and hide it to be safe.
	absoluteDiv.innerHTML = null;
	clearOld (absoluteDivId);
	// assign background and background color to the floating div.
	var bgStyle = 'URL(' + floatDivIdBG + ') top left repeat-y ' + floatDivIdBGColor;
	floatDiv.style.background = bgStyle;
}
