// Banner Code Generator by Memoria / displaycoffee.
// Last updated 09.16.18.
bannerCodeGenerator('.bcg-banners img', '#bcg-code code');

// You only need to add this function once
function bannerCodeGenerator(bannerImages, bannerCode) {
	// Re-usable variables
	var codeBlock = document.querySelector(bannerCode).innerHTML;
	var currentImage = codeBlock.match(/src=\"(.*?)\"/)[1];
	var currentAlt = codeBlock.match(/alt=\"(.*?)\"/)[1];

	// Loop through all banner images and attach onclick event
	var bannerArray = document.querySelectorAll(bannerImages);
	for (var i = 0; i < bannerArray.length; i++) {
		bannerArray[i].onclick = function(e) {
			changeBannerCode(e, currentImage, currentAlt);
		};
	}

	// Function to change banner code
	function changeBannerCode(e, image, alt) {
		// Element that has been clicked
		var selector = e.target || e.srcElement;

		// Replace current image src and alt with new element alt and src
		document.querySelector(bannerCode).innerHTML = codeBlock.replace(image, selector.src).replace(alt, selector.alt);
	}
}
