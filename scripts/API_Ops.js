const display_actors = document.getElementById("actors")
function getActors() {
	const birthDate = document.getElementById("birthdate").value;
	const [year, month, day] = birthDate.split("-");
	const url = `https://online-movie-database.p.rapidapi.com/actors/list-born-today?month=${month}&day=${day}`;
	const headers = {
        'X-RapidAPI-Key': 'ac42e0bfaemsh40fb043863b6c8ep146bc1jsn6b5979a8e25e',
    'X-RapidAPI-Host': 'online-movie-database.p.rapidapi.com'
    };

	async function fetchDataWithDelay(url, headers) {
		const response = await fetch(url, { headers });
		const data = await response.json();
		for (let i = 0; i < data.length; i++) {
			const id = data[i].split("/")[2];
			await new Promise(resolve => setTimeout(resolve, 301));
			printName(id)
		}
	}

	fetchDataWithDelay(url, headers)
		.catch(error => console.error(error));

}
function printName(actorId) {
	const options = {
		method: 'GET',
		headers: {
			'X-RapidAPI-Key': 'ac42e0bfaemsh40fb043863b6c8ep146bc1jsn6b5979a8e25e',
    'X-RapidAPI-Host': 'online-movie-database.p.rapidapi.com'
		}
	};
	const display = (actr) => {
        if(actr){display_actors.innerHTML += `<li>${actr}</li>`;}
	}
	fetch(`https://online-movie-database.p.rapidapi.com/actors/get-bio?nconst=${actorId}`, options)
		.then(response => response.json())
		.then(response => display(response.name))
		.catch(err => console.error(err));

}






