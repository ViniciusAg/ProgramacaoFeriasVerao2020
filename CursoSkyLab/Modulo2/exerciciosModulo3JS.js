/*
//Acess informations of some website, using API  
var xhr = new XMLHttpRequest();

//Method and URI for request the page
xhr.open("GET", "https://developer.mozilla.org/pt-BR/docs/Web/API/XMLHttpRequest/send", true);
xhr.send();

xhr.onreadystatechange = function()
{
	if (xhr.readyState === 4)
	{
		console.log(JSON.parse);
	}
}
*/

/*
//Using Ajax libray 

//Promices 

var myPromice = function() {
	return new Promise(function(resolve, reject) {
		var xhr = new XMLHttpRequest();
		xhr.open("GET", "https://pokeapi.co/api/v2/pokemon/ditto/", true);
		xhr.send();
		xhr.onreadystatechange = function() {
			if (xhr.readyState === 4) {
				if (xhr.status === 200) {
					resolve(JSON.parse(xhr.responseText));
				}
				else {
					reject("Error in request");
				}
			} 
		}
	});
}

//The function will be called 
myPromice()
	.then(function(response) { //If response was execute, then a action will be execute too
		console.log(response);
	})
	//If an error happen, other thing happen
	.catch(function(error) {
		console.warn(error);
	});

*/

//Using the library Axios
//Asincrone requests 

axios.get("https://pokeapi.co/api/v2/pokemon/ditto/")
		.then(function(response) { //If response was execute, then a action will be execute too
			console.log(response.data.abilities);
		})
		//If an error happen, other thing happen
		.catch(function(error) {
			console.warn(error);
		});
