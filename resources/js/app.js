/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



Vue.component('example-component', require('./components/ExampleComponent.vue').default);


import * as VueGoogleMaps from 'vue2-google-maps';
import VueGmaps from 'vue-gmaps'
import Axios from 'axios';
Vue.use(VueGmaps, {
    key: 'AIzaSyDwLPahiK39Y_Tw5t292M1EELf8yU_Z2_4'
  })

Vue.use(VueGoogleMaps, {


    load: {
        key: 'AIzaSyDwLPahiK39Y_Tw5t292M1EELf8yU_Z2_4',
        libraries: 'places',
    }
})

const app = new Vue({
    el: '#app',
    data(){
        return {
            droplocs: [],
            errors: [],
            name: 'Jeffrey',
            infoWindowOptions: {

                pixelOffset: {
                    width: 0,
                    height: -35,
                }

            },
            activeDroplocs: {},
            infoWindowOpened: false,
           
        }

    },
    created(){
        axios.get('/api/pinpoint')
        .then((response) => this.droplocs = response.data)
        .catch((error) => console.error(error));

    },
    methods: {
        getPosition(r) {
            return {
                lat: parseFloat(r.latitude),
                lng: parseFloat(r.longitude)
            }

        },
        handleMarkerClicked(r){
            this.activeDroplocs = r; 
            this.infoWindowOpened = true;
        },
        handleInfoWindowClose(){
            this.activeDroplocs = {};
            this.infoWindowOpened = false
        },
        handleMapClick(e){
            this.droplocs.push({
                name: "Placeholder",
                hours: "00:00am - 00:00pm",
                city: "Philippines",
                state: "Manila",
                latitude: e.latLng.lat(),
                longitude: e.latLng.lng()


            });
            axios.post('api/pinpoint',{
                name: this.name, 
                address: 'Manila',
                hours: "00:00am - 00:00pm",
                city: "Philippines", 
                state: "Manila", 
                latitude: e.latLng.lat(), 
                longitude: e.latLng.lng()
           })
                   .then((response)=>{
   
                  console.log(response)
   
                   })
            
            
        },

       
           

        
        
        
      
        
    },
            computed: {
                mapCenter() {
                    if(!this.droplocs.length){
        return{
            lat: 10,
            lng: 10
        }
                    }
                    //for each

                    return {
                        lat: parseFloat(this.droplocs[0].latitude),
                        lng: parseFloat(this.droplocs[0].longitude)
                    }


                },

                infoWindowPosition() {

                    return {
                        lat: parseFloat(this.activeDroplocs.latitude),
                        lng: parseFloat(this.activeDroplocs.longitude),
                    };
                  
    
                },


            }
});
