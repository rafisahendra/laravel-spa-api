<template>
    <div class="wrapper">
        <app-header  />

        <div class="content-wrapper">
              <!-- <nav-bar></nav-bar> -->
            <router-view></router-view>
        </div>
        <app-footer />
    </div>
</template>
<script>

    import Header from './components/Header.vue'
    import Footer from './components/Footer.vue'
    export default {

        components: {
            'app-header': Header,
            'app-footer': Footer
        }
    }
</script>
