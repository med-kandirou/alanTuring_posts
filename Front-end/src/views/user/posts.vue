<template>
    <Header />
    <div v-for="post in posts">
        <Post :name="post.nom" :content="post.content" :data="post.date_ajout" :id_p="post.id_p" />
    </div>
    <Add_post />
</template>

<script>
import axios from 'axios'
import Header from '../../components/user/navbar.vue'
import Post from '../../components/user/post.vue'
import Add_post from '../../components/user/add_post.vue'

export default{
    name:'index',
    data(){
        return {
            posts:null
        }
    },
    components:{
        Header,
        Post,
        Add_post
    },
    methods:{
        getPosts:function (){
            axios.post("http://localhost/alanTuring_posts/Posts/getPosts")
                .then((res)=>this.posts=res.data)
        },
        getsession:function(){
                axios.get("http://localhost/alanTuring_posts/Users/getsession")
                    .then((res)=>console.log(res) )
            }
    },
    mounted(){
        this.getsession(),
        this.getPosts();
    }
}
</script>