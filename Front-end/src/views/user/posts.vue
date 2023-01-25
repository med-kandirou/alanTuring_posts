<template>
    <Header :name="nom" :email="email" />
    <div v-for="post in posts">
        <Post @addcomment="addcomment"  @addlike="addlike" :name="post.nom" :content="post.content" :date="post.date_ajout" :id_p="post.id_p" :likes="post.likes" />
    </div>
    <Add_post @add_post="getPosts" />






<!-- Modal toggle -->
<button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Toggle modal
</button>

<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Commentaires
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Envoyer</button>
            </div>
        </div>
    </div>
</div>













</template>

<script>
import Cookies from "vue-cookies";
import axios from 'axios'
import Header from '../../components/user/navbar.vue'
import Post from '../../components/user/post.vue'
import Add_post from '../../components/user/add_post.vue'

export default{
    
    name:'index',
    data(){
        return {
            nom:Cookies.get("nom"),
            email:Cookies.get("email"),
            posts:null
        }
    },
    emits:['add_post'],
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
        addlike:function(id){
            var form = new FormData();
            form.append('id',id)
            axios.post("http://localhost/alanTuring_posts/Posts/addlike/",form)
                .then((res)=>{
                    if(res.data=="ajouter"){
                        this.getPosts();
                    }
                }
            )
        },addcomment:function(id){
            var form = new FormData();
            form.append('id',id)
            axios.post("http://localhost/alanTuring_posts/Posts/addcomment/",form)
                .then((res)=>{
                    if(res.data=="ajouter"){
                        this.getPosts();
                    }
                }
            )
        }
    },
    mounted(){
        this.getPosts();
    }
    
}
</script>