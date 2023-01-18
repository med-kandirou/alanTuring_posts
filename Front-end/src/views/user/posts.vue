<template>
    <Header />
    <Post />
    <Add_post />
</template>

<script>
import Header from '../../components/user/navbar.vue'
import Post from '../../components/user/post.vue'
import Add_post from '../../components/user/add_post.vue'

export default{
    name:'index',
    components:{
        Header,
        Post,
        Add_post
    }
}
</script>