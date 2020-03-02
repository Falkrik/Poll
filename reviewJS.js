var number = -1;

function choose(i) {
	$("#R" + number).removeClass("active");
	number = i;
	$("#R" + i).addClass("active");
}

function send() {
	if(number != -1) {
		data = {};

		data["NUMBER"] = number;
		data["DATE"] = new Date().toJSON().slice(0,10).replace(/-/g,'');

		$.post("sendReview.php", data, function(data, textStatus) {
			console.log(data["result"]);
		}, "json")
	}

}

function getSummary(date) {
	data = {};

	data["DATE"] = new Date().toJSON().slice(0,10).replace(/-/g,'');

	$.post("getSummary.php", data, function(data, textStatus) {
		alert(data["result"]);
	}, "json");
}