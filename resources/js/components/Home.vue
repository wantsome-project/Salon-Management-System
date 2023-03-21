<template>
    <div :style="{'background-image': 'url(/assets/img.jpg)'}">
        <b-navbar>
            <b-navbar-brand href="#">Beauty Salon</b-navbar-brand>
            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav class="ml-auto">
                    <b-nav-item>
                        <router-link to="/service-type">Services</router-link>
                    </b-nav-item>
                    <b-nav-item>
                        <router-link to="/user">Products</router-link>
                    </b-nav-item>
                    <b-nav-item>
                        <router-link to="/user">Team</router-link>
                    </b-nav-item>
                    <b-nav-item>
                        <router-link to="/user">Contact</router-link>
                    </b-nav-item>
                    <b-nav-item>
                        <router-link to="/user">Appointment</router-link>
                    </b-nav-item>
                    <b-nav-item-dropdown right>
                        <!-- Using 'button-content' slot -->
                        <template #button-content>
                            <em>Login or register</em>
                        </template>
                        <b-dropdown-item href="#">Login</b-dropdown-item>
                        <b-dropdown-item href="#">Register</b-dropdown-item>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
        <h1>Beauty salon</h1>
        <h4>BARBER SHOP - HAIR STYLE - COSMETICS -MAKEUP</h4>
        <b-container fluid="xl">
         <b-row>
             <b-col>
                 Services
             </b-col>
         </b-row>
         <b-row>
                <div v-for="(item, index) in services_types">
                    <b-col>
                        <b-card
                            title="Services"
                            img-alt="Image"
                            :img-src="'assets/service_type_images/'+ item.photo_name"
                            img-top
                            tag="article"
                            style="max-width: 20rem;"
                            class="mb-2"
                        >
                            <b-card-text>
                                {{item.name}}
                            </b-card-text>
                        </b-card>
                    </b-col>
                    </div>
         </b-row>
           <b-row>
               <b-col>
                   Products
               </b-col>
           </b-row>
            <b-row>
                <div v-for="(item, index) in products">
                    <b-col>
                        <b-card
                            title="Products"
                            img-alt="Image"
                            :img-src="'assets/products_images/'+ item.photo_name"
                            img-top
                            tag="article"
                            style="max-width: 20rem;"
                            class="mb-2"
                        >
                            <b-card-text>
                                {{item.type}}
                            </b-card-text>
                        </b-card>
                    </b-col>
                </div>
            </b-row>
        </b-container>
    </div>
</template>


<script>
import ExampleComponent from "./ExampleComponent.vue";
import ServicesComponent from "./ServicesComponent.vue"
import axios from "axios";
export default {
    components: {
        ExampleComponent,
        ServicesComponent
    },
    data() {
        return {
            services_types: [],
            products: [],
            ourTeam: [],
        }
    },
    mounted() {
       axios.get('/service_types').then(res => {
            this.services_types = res.data.data.slice(0, 3)
        })

        axios.get('/products').then(res => {
            this.products = res.data.data.slice(0, 3)
        })
        console.log('Component mounted.', this.services_types, this.products)
    }
}
</script>

<style>
*{
    box-sizing:border-box;
    margin:0;
}

h1, h4 {
    text-align: center;
}

img {
    width: 200px !important;
    height: 200px
}
</style>
