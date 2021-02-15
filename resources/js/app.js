require('./bootstrap');

var app = new Vue({
	el: '#root',
	data: {
        isActive: false,
		restaurants: [],
	},
	methods: {

        toggleMenu() {         // x menu mobile
			if (this.isActive == false){
				this.isActive = true;
			}
			else {
				this.isActive = false;
			}
		},

		searchFilm(){ // funzione cerca film
			axios
			.get('http://localhost:8000/api/restaurants')
			.then((risposta) =>{

				this.restaurants = risposta.data.results; // assegno ad array restaurants la risposta API
				console.log(this.restaurants);

			}); // fine then
		}, // fine searcFilm
	},

});
