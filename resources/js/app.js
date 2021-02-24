
import axios from 'axios'

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
		nome: '',
   		cognome: '',
   		indirizzo: '',
   		cartCookie: [],
		totalPriceCookie: 'ciao',
	},


	methods: {

		provaLog(){
			console.log(this.totalPriceCookie);
		},

		Save () {
			var date = new Date();
			date.setTime(date.getTime() + (60 * 1000));
			Cookies.set('nome', this.nome, { expires: date })
			Cookies.set('cognome', this.cognome, { expires: date })
			Cookies.set('indirizzo', this.indirizzo, { expires: date })
			// Cookies.set('cartCookie', this.cart, { expires: date })



    },

    	Clear () {
			Cookies.remove('nome')
			Cookies.remove('email')
			Cookies.remove('indirizzo')
			Cookies.remove('cartCookie')

			this.nome = ''
			this.cognome = ''
			this.indirizzo = ''
			this.cartCookie = ''

  	},


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
							this.totalPrice = Math.round(this.totalPrice * 100)/100 - Math.round(this.dishesList[i].price * 100)/100;
							 // sottraggo il prezzo del piatto aggiunto nel carrello al totale
							return this.totalQuantity = this.dishesList.reduce((total, product) => total + product.quantity,0);
            			}
            		} else {
						this.dishesList[i].quantity++; // altrimenti aggiungi 1
						this.totalPrice = Math.round(this.totalPrice * 100)/100 + Math.round(this.dishesList[i].price * 100)/100; // aggiungo il prezzo del piatto aggiunto nel carrello al totale
						this.showCart = true;
						return this.totalQuantity = this.dishesList.reduce((total, product) => total + product.quantity,0);

						// return this.cartList = this.dishesList.filter(product => product.quantity > 0);
					}
          		}
        	}
    	},

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
				if (this.cart.length) {
						for (var j = 0; j < this.cart.length; j++) {
							if (this.cart[j].id == this.dishesList[i].id) {
								this.dishesList[i] = this.cart[j];
							}
						}
					}
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

		var date = new Date();
		date.setTime(date.getTime() + (100000000 * 1000));
		Cookies.set('nome', this.nome, { expires: date })
		Cookies.set('cognome', this.cognome, { expires: date })
		Cookies.set('indirizzo', this.indirizzo, { expires: date })
		Cookies.set('cartCookie', this.cart, { expires: date })
		Cookies.set('totalPriceCookie', this.totalPrice, { expires: date })

		this.nome = (Cookies.get('nome') !== 'undefined') && Cookies.get('nome')
    	this.cognome = (Cookies.get('cognome') !== 'undefined') && Cookies.get('cognome')
    	this.indirizzo = (Cookies.get('indirizzo') !== 'undefined') && Cookies.get('indirizzo')
		this.cartCookie = (Cookies.get('cart') !== 'undefined') && Cookies.get('cart')
		this.totalPriceCookie = (Cookies.get('totalPrice') !== 'undefined') && Cookies.get('totalPrice')

		if(localStorage.nome){
			this.nome = localStorage.nome;
		}
		if(localStorage.cartCookie){
			this.cart = JSON.parse(localStorage.cartCookie);
		}
		if(localStorage.totalPriceCookie){
			this.totalPrice = localStorage.totalPriceCookie;
		}
},
// fine mounted

	watch: {
		nome(newNome){
			localStorage.nome = newNome;
		},

		cart(){
			localStorage.cartCookie = JSON.stringify(this.cart);
		},

		totalPrice(){
			localStorage.totalPriceCookie = Math.round(this.totalPrice * 100)/100;

		},


	}

});
