require('./bootstrap');

var app = new Vue({
	el: '#root',
	data: {
        isActive: false,
		restaurants: [],
		dishesList: [],
		selectedCategory: '',
		selectedDish: '',
		totalQuantity: 0,
		showCart: false,
		cart: [],
	},


	methods: {

		cartBtnLessPlus() { // funzione per aggiornare lista item nel carrello
			return this.cart = this.dishesList.filter(product => product.quantity > 0);
    	},

        toggleMenu() {         // x menu mobile
			if (this.isActive == false){
				this.isActive = true;
			}
			else {
				this.isActive = false;
			}
		},

		searchRestaurants(){ // funzione cerca restaurants
			axios
			.get('http://localhost:8000/api/restaurants', {
				params:{
					query: this.selectedCategory
				}
			})
			.then((risposta) =>{
				this.restaurants = risposta.data.results; // assegno ad array restaurants la risposta API
			}); // fine then
		}, // fine searchRestaurants

		updateCart(product, updateType) { // funzione aggiornamento carrello
        	for (let i = 0; i < this.dishesList.length; i++) { //scorro tutti i piatti
        		if (this.dishesList[i].id == product.id) { // se id piatto corrente = id del prodotto

        			if (updateType == 'subtract') { // se la funzione e' di sottrazione

            			if (this.dishesList[i].quantity != 0) { // se la quantita' e' diversa da 0
                			this.dishesList[i].quantity--; // sottrai 1
							return this.totalQuantity = this.dishesList.reduce((total, product) => total + product.quantity,0);
            			}
            		} else {
						this.dishesList[i].quantity++; // altrimenti aggiungi 1
						this.showCart = true;

						return this.totalQuantity = this.dishesList.reduce((total, product) => total + product.quantity,0);

						// return this.cartList = this.dishesList.filter(product => product.quantity > 0);
					}

          		}
        	}
    	}
	}, // fine methods

	mounted() {
		axios
		.get('http://localhost:8000/api/restaurants', {
			params:{
				query: this.selectedCategory
			}
		})
		.then((risposta) =>{
			this.restaurants = risposta.data.results; // assegno ad array restaurants la risposta API
		}); // fine then

		axios
		.get('http://localhost:8000/api/dishes', {
			params:{
				query: this.selectedDish
			}
		})
		.then((risposta) =>{
			this.dishesList = risposta.data.results;
			for (var i = 0; i < this.dishesList.length; i++) {
				this.dishesList[i]['quantity'] = 0; // aggiungo chiave quantity = 0 x tutti i piatti
			}
			// assegno ad array restaurants la risposta API
		}); // fine then

	} // fine mounted

});
