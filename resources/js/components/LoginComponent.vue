<template>
    <div :style="{'background-image': 'url(/assets/img.jpg)'}">
        <Header/>
        <b-container fluid="lg" class="bv-example-row bv-example-row-flex-cols">
            <h3>Login</h3>
            <b-row align-h="around">
                <b-col cols="6">
                    <b-form @submit.prevent="onSubmit" v-if="show">
                        <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-3" label="E-Mail address" label-for="input-3">
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

                        <b-form-checkbox
                            id="checkbox-1"
                            v-model="form.remember"
                            name="checkbox-1"
                            value="accepted"
                            unchecked-value="not_accepted"
                        >
                            Remember me
                        </b-form-checkbox>

                        <div class="te">
                            <h6><small>By using this contact form you agree to the <a class="text-muted" href="/">terms and conditions</a></small></h6>
                            <b-button variant="outline-primary" type="submit">Login</b-button>
                            <a href="">Forgot your password?</a>
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
                email: '',
                password: '',
                remember: false,
            },
            show: true,
            success: '',
        }
    },

    methods: {
        ...mapActions(["LogIn"]),
        async onSubmit() {
            const user = new FormData();
            user.append('email', this.form.email);
            user.append('password', this.form.password);
            user.append('remember', this.form.remember);

            try {
                await this.LogIn(this.form)
                this.$router.push('/');
            } catch (error) {
                this.success = error.message;
            }
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
