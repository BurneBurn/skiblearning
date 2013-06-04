function cacheFragen(fragen){
	for(var i=0; i<fragen.length; i++){
		localStorage.setItem('titel'+i, fragen[i].titel);
		localStorage.setItem('question'+i, fragen[i].frage);
		window.alert(fragen[i].frage+" cached!");
	}
}

function cache(data){	
	if (!navigator.online){
		localStorage.clear();
		console.log('Browser is online!');
		window.alert(data);
		cacheFragen(data);
		display();
	}else{
		console.log('Browser is offline!');
		display();
	}
}

function getCachedFragen(){
	var res = new Array();
	for(var i=0; i<(localStorage.length/2); i++){
		if(localStorage.getItem('question'+i) != "undefined"){
			res[i]['fragen'] = localStorage.getItem('question'+i);
			res[i]['titel'] = localStorage.getItem('titel'+i);
		}
	}
	return res;
}
//
//function getCachedFragenTitel(){
//	var res = new Array();
//	for(var i=0; i<localSotrage.length; i++){
//		if(localStorage.getItem('titel'+i) != "undefined"){
//			res[i] = localStorage.getItem('titel'+i)
//		}else{
//			break;
//		}
//	}
//}

function display(){
	var fragen = getCachedFragen();
	var titel = getCachedFragen();
	
	for(var i=0; i<fragen.length; i++){
		var str = "<tr>";
		str += 	"<td>"+i+"</td>";
		str += 	"<td onclick=slide(this.id);>" +
				"<span style=color:blue>"+titel[i]+"</span>" +
				"</td>" +
				"</tr>";
		$("#fragen").append(str);
		
		str = ""
		str = 	"<tr>";
		str+=	"<td colspan=4>" +
				"<div id=frage"+i+" style=display-none;>" +
				fragen[i] +
				"/n" +
				"/n" +
				"<input type=button value=Prüfen onclick=checkFrage(frage"+i+")>" +
				"</div>" +
				"</td>" +
				"</tr>";
		$("#fragen").append(str);
	}
}




