
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
		showModal() {
			console.log('ok');
			var modal = document.getElementById("myModal");

			if(modal) {
				modal.style.display = 'block';
				console.log(modal.style.display);
			}

		},
		closeModal() {
			var modal = document.getElementById("myModal");
			modal.style.display = "none";
		},
		closeModalOnWindow(){
			var modal = document.getElementById("myModal");
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}

		},

		Save (event) {
			event.preventDefault(); //blocca il form per far eseguire il resto del codice

			var date = new Date();
			date.setTime(date.getTime() + (60 * 1000));
			Cookies.set('nome', this.nome, { expires: date })
			Cookies.set('cognome', this.cognome, { expires: date })
			Cookies.set('indirizzo', this.indirizzo, { expires: date })
			Cookies.set('cartCookie', this.cart, { expires: date })

			const form = document.getElementById('payment-form');

			dropinInstance.requestPaymentMethod((error, payload) =>
			{
				if (error) console.error(error);

				document.getElementById('nonce').value = payload.nonce;
				form.submit();
			});

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

		this.showModal();

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
			// assegno ad array restaurants la risposta API
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
		this.cartCookie = (Cookies.get('cartCookie') !== 'undefined') && Cookies.get('cartCookie')
		this.totalPriceCookie = (Cookies.get('totalPrice') !== 'undefined') && Cookies.get('totalPrice')

		if(sessionStorage.nome){
			this.nome = sessionStorage.nome;
		}
		if(sessionStorage.cognome){
			this.cognome = sessionStorage.cognome;
		}
		if(sessionStorage.indirizzo){
			this.indirizzo = sessionStorage.indirizzo;
		}
		if(sessionStorage.cartCookie){
			this.cart = JSON.parse(sessionStorage.cartCookie);
		}
		if(sessionStorage.totalPriceCookie){
			this.totalPrice = sessionStorage.totalPriceCookie;
		}
},
// fine mounted

	watch: {
		nome(newNome){
			sessionStorage.nome = newNome;
			Cookies.set('nome', this.nome)
		},
		cognome(newCognome){
			sessionStorage.cognome = newCognome;
			Cookies.set('cognome', this.cognome)
		},

		indirizzo(newIndirizzo){
			sessionStorage.indirizzo = newIndirizzo;
			Cookies.set('indirizzo', this.indirizzo)
		},

		cart(newCart){
			sessionStorage.cartCookie = JSON.stringify(newCart);
			Cookies.set('cartCookie', this.cart)
		},

		totalPrice(){
			sessionStorage.totalPriceCookie = Math.round(this.totalPrice * 100)/100;
			Cookies.set('totalPriceCookie', this.totalPrice)
		},


	}

});
