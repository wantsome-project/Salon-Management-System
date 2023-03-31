<template>
    <div :style="{'background-image': 'url(/assets/img.jpg)'}">
        <Header/>
        <b-container fluid="lg" class="bv-example-row bv-example-row-flex-cols">
            <h3>Register</h3>
            <b-row align-h="around">
                <b-col cols="6">
                    <b-form @submit.prevent="onSubmit" v-if="show">
                        <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-1" label="Name" label-for="input-1">
                            <b-form-input
                                id="input-1"
                                placeholder="Enter name"
                                v-model="form.name"
                                required
                            >
                            </b-form-input>
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-2" label="Phone" label-for="input-2">
                            <b-form-input
                                id="input-2"
                                type="number"
                                placeholder="Enter Phone"
                                v-model="form.phone"
                                required
                            >
                            </b-form-input>
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-3" label="Email" label-for="input-3">
                            <b-form-input
                                id="input-3"
                                type="email"
                                placeholder="Enter email"
                                v-model="form.email"
                                required
                            >
                            </b-form-input>
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-4" label="Password" label-for="input-4">
                            <b-form-input
                                id="input-4"
                                type="password"
                                v-model="form.password"
                                required
                            >
                            </b-form-input>
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-5" label="Confirm password" label-for="input-5">
                            <b-form-input
                                id="input-5"
                                type="password"
                                v-model="form.password_confirmation"
                                required
                            >
                            </b-form-input>
                        </b-form-group>

                        <div class="te">
                            <h6><small>By using this contact form you agree to the <a class="text-muted" href="/">terms and conditions</a></small></h6>
                            <b-button variant="outline-primary" type="submit">Submit</b-button>
                        </div>
                        <span v-if="success.length > 0" style="color: green">{{success}}</span>
                    </b-form>
                </b-col>
            </b-row>
            <b-row>
                <Footer></Footer>
            </b-row>
        </b-container>
    </div>
</template>

<script>
import Header from "./Header.vue";
import Footer from "./Footer.vue"
import { mapActions } from "vuex";
export default {
    components: {
        Header,
        Footer
    },
    data() {
        return  {
            form: {
                name: '',
                email: '',
                phone: '',
                password: '',
                password_confirmation: ''
            },
            show: true,
            success: '',
        }
    },

    methods: {
        ...mapActions(["Register"]),
        async onSubmit() {
            try {
                await this.Register(this.form)
            } catch (error) {
                this.success = error.message;
            }
        },
        onReset() {
            // Reset our form values
            this.form.email = '';
            this.form.name = '';
            this.form.phone = '';
            // Trick to reset/clear native browser form validation state
            this.show = false;
            this.$nextTick(() => {
                this.show = true;
            })
        },

    },

    mounted() {

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
