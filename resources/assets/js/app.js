
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
/*require('./jquery.meanmenu.fork');*/
require('./jquery.meanmenu');
require('jquery.tagify');
require('./js');

import Autocomplete from 'vue2-autocomplete-js';
//var Vue2Autocomplete = require('vue2-autocomplete-js');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*
Vue.component('example', require('./components/Example.vue'));
*/

Vue.component('texterm', require('./components/TaxTerm.vue'));


const app = new Vue({
    el: '#app',

    data() {
      return {
        type: "123",
      };
    },

   components: {
      Autocomplete
    },
    methods: {

		callbackEvent: function (data) {
		console.log(data);
		},

      getData(obj){
        console.log(obj);
      }
/*      setValue(val) {
        this.type = val
      },*/

      /*setValueData(obj){
      	this.type = 'data';
        console.log(obj);
      }*/
    }
});

