<template>
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
</template>

<script>
import ServicesComponent from "./ServicesComponent.vue";
export default{
  name: 'Header',
components: {
    ServicesComponent
}

}
</script>

<style>

</style>
