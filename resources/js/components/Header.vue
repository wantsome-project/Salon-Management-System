<template>
    <b-navbar id="header-layout">
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
                    <template #button-content v-if="isLoggedIn">
                        <em>{{ User }}</em>
                    </template>
                    <template #button-content v-else>
                        <em>Login or register</em>
                    </template>
                    <div v-if="isLoggedIn">
                        <b-dropdown-item @click="logOut">Logout</b-dropdown-item>
                    </div>
                    <div v-else>
                        <b-dropdown-item>
                            <router-link to="/login">Login</router-link>
                        </b-dropdown-item>
                        <b-dropdown-item>
                            <router-link to="/register">Register</router-link>
                        </b-dropdown-item>
                    </div>


                </b-nav-item-dropdown>
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: 'Header',
  computed: {
      ...mapGetters({
          User: "StateUser"
      }),
      isLoggedIn: function(){ return this.$store.getters.isAuthenticated},
  },

  methods: {
      async logOut() {
          await this.$store.dispatch('logOut');
          await this.$router.push('/products')
      }
  }
}
</script>

<style>

</style>
