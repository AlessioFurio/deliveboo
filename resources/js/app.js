require('./bootstrap');
// require
var Vue = require('vue')
Vue.use(require('vue-cookies'))

// es2015 module
import Vue from 'vue'
import VueCookies from 'vue-cookies'
Vue.use(VueCookies)

// set default config
Vue.$cookies.config('7d')

// set global cookie
Vue.$cookies.set('theme','default');
Vue.$cookies.set('hover-time','1s');

var app = new Vue({
	el: '#root',
	data: {
		active: false,
        isActive: false,
		restaurants: [],
		dishesList: [],
		selectedCategory: '',
		selectedRestaurant: '',
		totalQuantity: 0,
		totalPrice: 0,
		showCart: false,
		cart: [],
	},


	methods: {


		cartBtnLessPlus() { // funzione per aggiornare lista item nel carrello
			return this.cart = this.dishesList.filter(product => product.quantity > 0);
    	},

        toggleMenu() {         // x menu mobile
			this.isActive = !this.isActive;
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
							this.totalPrice -= this.dishesList[i].price; // sottraggo il prezzo del piatto aggiunto nel carrello al totale
							return this.totalQuantity = this.dishesList.reduce((total, product) => total + product.quantity,0);
            			}
            		} else {
						this.dishesList[i].quantity++; // altrimenti aggiungi 1
						this.totalPrice += this.dishesList[i].price; // aggiungo il prezzo del piatto aggiunto nel carrello al totale
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



		this.selectedRestaurant = window.location.href.slice(34);
		axios
		.get('http://localhost:8000/api/dishes', {
			params:{
				query: this.selectedRestaurant
			}
		})
		.then((risposta) =>{
			this.dishesList = risposta.data.results;
			for (var i = 0; i < this.dishesList.length; i++) {
				this.dishesList[i]['quantity'] = 0; // aggiungo chiave quantity = 0 x tutti i piatti
			}
			// assegno ad array restaurants la risposta API
		}); // fine then

		window.document.onscroll = () => {
      		let navBar = document.getElementById('menu-fixed');
      			if(window.scrollY > navBar.offsetTop){
        		this.active = true;
				document.getElementById('menu-fixed').classList.add("sticky");
        		} else {
        		this.active = false;
				document.getElementById('menu-fixed').classList.remove("sticky");
    		}
    	}

	} // fine mounted

});
