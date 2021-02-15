require('./bootstrap');

var app = new Vue({
	el: '#root',

	data: {
        isActive: false,
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


	}, // fine methods

});
