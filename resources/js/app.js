require('./bootstrap');

var app = new Vue({
	el: '#root',
	data: {
        isActive: false,
		restaurants: [],
		dishesList: [],
		selectedCategory: '',
		selectedDish: '',
		products: [
		   	{
				id: 1,
				name: 'Product 1',
				description: 'This is an incredibly awesome product',
				quantity: 0,
		    },
		    {
				id: 2,
				name: 'Product 2',
				description: 'This is an incredibly awesome product',
				quantity: 0,
		    },
		    {
				id: 3,
				name: 'Product 3',
				description: 'This is an incredibly awesome product',
				quantity: 0,
		    }
		],
		showCart: false,

	},
	methods: {

		provalog(){
			console.log(this.dishesList);
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

		updateCart(product, updateType) {
        	for (let i = 0; i < this.dishesList.length; i++) {
        		if (this.dishesList[i].id === product.id) {
        			if (updateType === 'subtract') {
            			if (this.dishesList[i].quantity !== 0) {
                			this.dishesList[i].quantity--;
            			}
            		} else {
              			this.dishesList[i].quantity++;
					}
            break;
          	}
        }
      }
	}, // fine methods

	computed: {
		cart() {
	      	return this.dishesList.filter(product => product.quantity > 0);
    	},
    	totalQuantity() {
      		return this.dishesList.reduce((total, product) => total + product.quantity,0);
    	}
  	},

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
				this.dishesList[i]['quantity'] = 0;
			}
			// assegno ad array restaurants la risposta API
		}); // fine then

	} // fine mounted

});
