<template>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Example Component</div>
            <div class="card-body">
                Welcome to Homepage
                <br/>
                <router-link to="/user">Go to User</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
