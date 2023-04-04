<template>
    <b-container fluid="lg" class="bv-example-row bv-example-row-flex-cols">
            <b-row align-h="around">
                <b-col cols="6">
                    <h3>Contact us</h3>
                    <table>
                        <tr>
                            <th>Address:</th>
                            <td>Bd. Unirii, nr. 6, bl. A4, scara B ,interfon 22, Iasi</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><a href="mailto:sirbuanca2@gmail.com">sirbuanca2@gmail.com</a></td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><a href="tel:0725630610">0725 630 610</a></td>
                        </tr>
                        <tr>
                            <th>Program:</th>
                            <td>Monday-friday: 09:00 – 21:00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Saturday: 09:00 – 17:00</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>Sunday: close</td>
                        </tr>
                    </table>
                </b-col>
                <b-col cols="6">
                    <b-form @submit="onSubmit" v-if="show">
                        <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-1" label="Name" label-for="input-1">
                            <b-form-input
                            id="input-1"
                            placeholder="Enter name"
                            v-model="form.name"
                            required
                            >
                            </b-form-input>
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-2" label="Email" label-for="input-2">
                            <b-form-input
                                id="input-2"
                                type="email"
                                placeholder="Enter email"
                                v-model="form.email"
                                required
                            >
                            </b-form-input>
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-3" label="Phone" label-for="input-3">
                            <b-form-input
                                id="input-3"
                                type="number"
                                placeholder="Enter Phone"
                                v-model="form.phone"
                                required
                            >
                            </b-form-input>
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-4" label="Subject" label-for="input-4">
                            <b-form-input
                                id="input-4"
                                type="text"
                                placeholder="Enter Subject"
                                v-model="form.subject"
                                required
                            >
                            </b-form-input>
                        </b-form-group>
                        <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-5" label="Message" label-for="input-5">
                            <b-form-textarea
                                id="input-5"
                                type="textarea"
                                row="5"
                                placeholder="Enter your message"
                                v-model="form.message"
                                required
                            >
                            </b-form-textarea>
                        </b-form-group>
                        <div class="te">
                            <h6><small>By using this contact form you agree to the <a class="text-muted" href="/">terms and conditions</a></small></h6>
                            <b-button variant="outline-primary" type="submit">Submit</b-button>
                        </div>
                        <span v-if="success.length > 0" style="color: green">{{success}}</span>
                    </b-form>
                </b-col>
            </b-row>
        </b-container>
</template>

<script>

export default {
    data() {
        return  {
           form: {
               name: '',
               email: '',
               phone: '',
               subject: '',
               message: ''
           },
            show: true,
            success: '',
        }
    },

    methods: {
        onSubmit(event) {
            event.preventDefault();
            const formData = new FormData();
            Object.keys(this.form).forEach((key) => {
                formData.append(key, this.form[key]);
            })

            axios.post('/contact?api=true', formData).then(
               (response) => {
                   if (response) {
                       this.success = response.data.message
                       this.onReset()
                   }
            })
        },
        onReset() {
            // Reset our form values
            this.form.email = ''
            this.form.name = ''
            this.form.phone = ''
            this.form.subject = ''
            this.form.m = ''
            // Trick to reset/clear native browser form validation state
            this.show = false
            this.$nextTick(() => {
                this.show = true
            })
        }
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
