<template>
    <Header />
    <Post />
</template>

<script>
import Header from '../../components/user/navbar.vue'
import Post from '../../components/user/post.vue'

export default{
    name:'index',
    components:{
        Header,
        Post
    }
}
</script>