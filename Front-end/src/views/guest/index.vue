<template>
    <Header />
    <Landing />
    <About />
</template>

<script>
import Header from '../../components/guest/header.vue'
import Landing from '../../components/guest/landing.vue'
import About from '../../components/guest/about.vue'
export default{
    name:'index',
    components:{
        Header,
        Langing,
        About
    }
}
</script>