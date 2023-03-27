<template>
    <div :style="{'background-image': 'url(/assets/img.jpg)'}">
        <Header/>
        <b-container fluid="lg" class="bv-example-row bv-example-row-flex-cols">
            <h4>Make an appointment</h4>
            <b-col cols="6">
                <b-form @submit="onSubmit" v-if="show">
                    <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-1" label="Service Type" label-for="input-1">
                        <b-form-select v-model="form.service_type_id" :options="servicesType"></b-form-select>
                    </b-form-group>
                    <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-2" label="Employee" label-for="input-2">
                        <b-form-select v-model="form.employee_id" :options="employees"></b-form-select>
                    </b-form-group>
                    <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-3" label="Pick a date" label-for="input3">
                        <b-form-datepicker
                            id="example-datepicker"
                            class="mb-2"
                            v-model="form.appointment_date"
                        >
                        </b-form-datepicker>
                    </b-form-group>

                    <b-form-group label-cols="4" label-cols-lg="2" label-size="default" id="input-group-3" label="Pick a time" label-for="input3">
                        <b-form-select v-model="form.appointment_time" :options="timeRanges"></b-form-select>
                    </b-form-group>

                    <div class="te">
                        <h6><small>By using this contact form you agree to the <a class="text-muted" href="/">terms and conditions</a></small></h6>
                        <b-button variant="outline-primary" type="submit">Submit</b-button>
                    </div>
                    <span v-if="success.length > 0" style="color: green">{{success}}</span>
                </b-form>
            </b-col>
        </b-container>
    </div>
</template>
<script>
import Header from "./Header.vue";
import Footer from "./Footer.vue"
import axios from "axios";
import { mapActions } from 'vuex';
import {addAppointment} from "../store/appointment/actions";
export default {
    components: {
        Header,
        Footer
    },
    props: {

    },

    data() {
        return  {
            form: {
                service_type_id: 0,
                employee_id: 0,
                appointment_date: '',
                appointment_time: ''
            },
            employees: [],
            servicesType: [],
            timeRanges: [],
            selected: null,
            show: true,
            success: '',
        }
    },

    methods: {
        ...mapActions({
            addAppointment
        }),

        onSubmit(event) {
            event.preventDefault();

            console.log('here');
            this.addAppointment({
                service_type_id: this.form.service_type_id,
                employee_id: this.form.employee_id,
                appointment_date: this.form.appointment_date,
                appointment_time: this.form.appointment_time
            }).then((response) => {
                this.success = response.data.message;
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
        axios.get('/appointment').then(res => {
            this.servicesType = res.data.servicesType;
            this.employees = res.data.employees;
            this.timeRanges = res.data.timeRanges;
        })
        console.log('Component mounted.')
    }
}
</script>
<style scoped>
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

