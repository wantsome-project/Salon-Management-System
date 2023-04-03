<template>
    <b-container fluid="lg" class="bv-example-row bv-example-row-flex-cols">
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
    </b-container>
</template>

<script>
import axios from "axios";
export default {

    data() {
        return  {
            services_types: []
        }
    },

    mounted() {
        axios.get('/service_types').then(res => {
            this.services_types = res.data.data
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
