<template>
    <b-navbar>
        <b-navbar-brand href="/test">Beauty Salon</b-navbar-brand>
        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav class="ml-auto">
                <b-nav-item>
                    <router-link to="/service-type">Services</router-link>
                </b-nav-item>
                <b-nav-item>
                    <router-link to="/products">Products</router-link>
                </b-nav-item>
                <b-nav-item>
                    <router-link to="/user">Team</router-link>
                </b-nav-item>
                <b-nav-item>
                    <router-link to="/contact">Contact</router-link>
                </b-nav-item>
                <b-nav-item>
                    <router-link to="/appointment">Appointment</router-link>
                </b-nav-item>
                <b-nav-item-dropdown right>
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
export default{
  name: 'Header',
}
</script>

<style>

</style>
