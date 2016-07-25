var path = "/rollerei/web/bundles/frontend/img/zahlen/";
var extension = ".png";

function showDate(date){
	if(isDate(date) == true){
		var dateStr = date.getDate()+"."+(date.getMonth()+1)+"."+date.getFullYear();
		showDateStr(dateStr)
	}else{
		showDateStr(date)
	}
}
function showDateStr(dateStr){
	var splittedDate = dateStr.split(".");
	var day = splittedDate[0], month = splittedDate[1],
		year = splittedDate[2];
	if(day.length > 1){
		showDay(day[0],day[1]);
	}else{
		showDay("0",day[0]);
	}
	
	if(month.length > 1){
		showMonth(month[0],month[1]);
	}else{
		showMonth("0",month[0]);
	}
	
	showYear(year[0], year[1], year[2], year[3]);
}

function showDay(d1, d2){
	document.getElementById("d1").src = path + d1+extension;
	document.getElementById("d1").alt = d1;
	document.getElementById("d2").src = path + d2+extension;
	document.getElementById("d2").alt = d2;
}
function showMonth(m1, m2){
	document.getElementById("m1").src = path + m1+extension;
	document.getElementById("m1").alt = m1;
	document.getElementById("m2").src = path + m2+extension;
	document.getElementById("m2").alt = m2;
}
function showYear(y1, y2, y3, y4){
	document.getElementById("y1").src = path + y1+extension;
	document.getElementById("y1").alt = y1;
	document.getElementById("y2").src = path + y2+extension;
	document.getElementById("y2").alt = y2;
	document.getElementById("y3").src = path + y3+extension;
	document.getElementById("y3").alt = y3;
	document.getElementById("y4").src = path + y4+extension;
	document.getElementById("y4").alt = y4;
}
function isDate(obj){
	return Object.prototype.toString.call(obj) === "[object Date]";
}