<template>
    <div :style="{'background-image': 'url(/assets/img.jpg)'}">
        <Header/>
        <b-container fluid="lg" class="bv-example-row bv-example-row-flex-cols">
            <h1>Beauty salon</h1>
            <h4>BARBER SHOP - HAIR STYLE - COSMETICS -MAKEUP</h4>
            <h5>Services</h5>
            <b-row style="justify-content: center">
                <div v-for="(item, index) in services_types">
                    <b-col>
                        <b-card
                            :title="item.name"
                            img-alt="Image"
                            :img-src="'assets/service_type_images/'+ item.photo_name"
                            img-top
                            tag="article"
                            style="max-width: 20rem;"
                            class="mb-2"
                        >
                            <b-card-text>
                                Duration: {{item.duration}} minutes
                            </b-card-text>
                            <b-card-text>
                                Price: {{item.price}} euros
                            </b-card-text>
                        </b-card>
                    </b-col>
                    </div>
            </b-row>
            <h5>Products</h5>
            <b-row style="justify-content: center">
                <div v-for="(item, index) in products">
                    <b-col>
                        <b-card
                            :title="item.brand"
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
            <h5>Our team</h5>
            <b-row style="justify-content: center">
                <div v-for="(item, index) in ourTeam">
                    <b-col>
                        <b-card
                            :title="item.user.name"
                            img-alt="Image"
                            :img-src="'assets/employees_images/'+ item.photo_name"
                            img-top
                            tag="article"
                            style="max-width: 20rem;"
                            class="mb-2"
                        >
                            <b-card-text>
                                Positioning: {{item.service_type.name}}
                            </b-card-text>
                        </b-card>
                    </b-col>
                </div>
            </b-row>
            <b-row>
                <Footer></Footer>
            </b-row>
        </b-container>
    </div>
</template>


<script>
import ExampleComponent from './ExampleComponent.vue';
import ServicesComponent from './ServicesComponent.vue';
import Header from './Header.vue';
import Footer from './Footer.vue';
import axios from 'axios';
export default {
    components: {
        Footer,
        ExampleComponent,
        ServicesComponent,
        Header
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

        axios.get('/staff').then(res => {
            this.ourTeam = res.data.data.slice(0, 3)
        })
    }
}
</script>

<style scoped>
h1, h4 {
    text-align: center;
}
h5 {
    padding: 20px;
    text-align: center;
}
img {
    width: 200px !important;
    height: 200px
}
div {
    justify-content: center;
}
</style>
