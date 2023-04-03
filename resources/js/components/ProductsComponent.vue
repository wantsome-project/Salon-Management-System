<template>
    <b-container fluid="lg" class="bv-example-row bv-example-row-flex-cols">
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
    </b-container>
</template>

<script>
import axios from "axios";
import Header from "./Header.vue";
import Footer from "./Footer.vue"
export default {
    components: {
        Header,
        Footer
    },

    data() {
        return  {
            products: [],
        }
    },

    mounted() {
        axios.get('/products').then(res => {
            this.products = res.data.data
        })
        console.log('Component mounted.')
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
