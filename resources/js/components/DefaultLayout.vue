<template>
    <div :style="{'background-image': 'url(/assets/img.jpg)'}" id="default-layout">
       <Header></Header>
       <main>
           <router-view />
       </main>
       <Footer></Footer>
   </div>
</template>

<script>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
export default {
    name: 'default-layout',
    components:{
        Footer,
        Header
    }
}
</script>
