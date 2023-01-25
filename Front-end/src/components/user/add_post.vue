<template>
    <div data-dial-init class="fixed right-6 bottom-6 group">
        <button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" aria-expanded="false"
            class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
            <svg aria-hidden="true" class="w-8 h-8 transition-transform group-hover:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            <span class="sr-only">Open actions menu</span>
        </button>
    </div>
    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ajouter un post</h3>
                    <form class="space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">votre status</label>
                            <textarea v-model="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                        </div>
                        <div class="w-full">              
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Image</label>
                            </div>
                            <div>
                                <input @change="onFile" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
                            </div>
                        </div>
                        <button type="button" data-modal-hide="authentication-modal" @click="add_post" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import Cookies from "vue-cookies";
import axios from 'axios'
    export default{
        name:'add_post',
        data(){
            return {
                status:'',
                image:''
            }
        },
        methods:{
            add_post:function(){
                var data = new FormData();
                data.append('id',Cookies.get("id"));
                data.append('status', this.status);
                data.append('image', this.image);
                axios.post("http://localhost/alanTuring_posts/Posts/add_post", data)
                    .then((res)=>{
                        if(res.data="ajouter"){
                            this.status='';
                            this.image=''
                        }
                    } )
                this.$emit('add_post');
            },
            onFile(e) {
                const files = e.target.files
                if (!files.length) return
                this.image=files[0].name
            },
        },
        emits: ["add_post"],
    }
</script>