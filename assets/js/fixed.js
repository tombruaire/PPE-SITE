(function() {

	// Fonction scrollY()
	var scrollY = function () {
		var supportPageOffset = window.pageXOffset !== undefined;
		var isCSS1Compat = ((document.compatMode || "") === "CSS1Compat");
		return supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;
	}

	// Variables
	var element = document.querySelector('.navbar')
	var nav = document.querySelector('.nav')
	var rect = element.getBoundingClientRect()
	var top = rect.top + scrollY()
	var fake =  document.createElement('div')
	fake.style.width = rect.width + "px"
	fake.style.height = rect.height + "px"

	// Fonctions
	var onScroll = function() {
		var hasScrollClass = element.classList.contains('fixed-top')
		if (scrollY() > top && !hasScrollClass) {
			element.classList.add('fixed-top')
			element.style.width = rect.width + "px"
			element.parentNode.insertBefore(fake, nav)
		} else if (scrollY() < top && hasScrollClass) {
			element.classList.remove('fixed-top')
			element.parentNode.removeChild(fake)
		}
	}

	var onResize = function () {
		element.style.width = "auto"
		element.classList.remove('fixed-top')
		fake.style.display = "none"
		rect = element.getBoundingClientRect()
		top = rect.top + scrollY()
		fake.style.width = rect.width + "px"
		fake.style.height = rect.height + "px"
		fake.style.display = "block"
		onScroll()
	}

	// Listener
	window.addEventListener('scroll', onScroll)
	window.addEventListener('resize', onResize)

})()

/* Console */
// document.querySelector('.navbar').getBoundingClientRect()
// window.scrollY
