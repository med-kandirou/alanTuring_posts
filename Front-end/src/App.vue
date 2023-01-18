
<template>
  
<router-view /> 


</template>


<script>
import axios from 'axios';
  export default {
    name:'App',
    methods:{
      api1(){
        axios.get("http://localhost/vueMVC/test/getnav")
        .then((res)=>console.log(res))
      },
    }
  }


</script>


<style scoped>

</style>
