function findmatch(){
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('results').innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open('GET','search.inc.php?user_query='+document.search.user_query.value, true);
	xmlhttp.send();
}