window.onload = function(){
	var divs = document.getElementsByClassName("th-photo");
	var replaces = document.getElementsByClassName("replace");
	// 给六边形定位
	for ( var i = 0; i < divs.length; i++) {
		divs[i].index = i;
		replaces[i].index = i;
		if (i <= 5) {
			replaces[i].style.left = 83 * i + "px";
			replaces[i].style.top = 13 + "px";
			divs[i].style.left = 83 * i + "px";
		}
		else if (i <= 10 && i > 5) {
			replaces[i].style.left = 42 + (i - 6) * 83 + "px";
			replaces[i].style.top = 85 + "px";
			divs[i].style.left = 42 + (i - 6) * 83 + "px";
			divs[i].style.top = 72 + "px";
		}
		else if (i <=14 && i > 10) {
			replaces[i].style.left = 83 + (i - 11) * 83 + "px";
			replaces[i].style.top = 157 + "px";
			divs[i].style.left = 83 + (i - 11) * 83 + "px";
			divs[i].style.top = 144 + "px";
		}
		else {
			replaces[i].style.top = 229 + "px";
			replaces[i].style.left = 124 + (i - 15) * 83 + "px";
			divs[i].style.left = 124 + (i - 15) * 83 + "px";
			divs[i].style.top = 216 + "px";
		}
		divs[i].onclick = function(){
			var ele = this;
			setTimeout(function(){
				ele.style.display = "none";
				replaces[ele.index].className = "back";
			},500);
			setTimeout(function(){
				var back = document.getElementsByClassName("back")[0];
				back.className = "replace";
				ele.style.display = "block";
			},1500);
			return false;
		}
	}
}