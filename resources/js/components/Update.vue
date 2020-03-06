<template>
    <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       Edit Book
                   </div>
                   <div class="card-body">
                       <form v-on:submit="submitPostEdit()">
                           <div class="form-group">
                               <input type="text" v-model="posts.title" class="form-control">
                           </div>
                           <div class="form-group">
                               <textarea v-model="posts.description" cols="30" rows="10" class="form-control"></textarea>
                           </div>
                           <div class="form-group">
                                <router-link to="/" class="btn btn-info">back</router-link>
                               <button class="btn btn-success">Save</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data: function() {
            return {
                posts: {
                    title: "",
                    description: "",
                },
                errors: []
            }
        },

        created() {
            let id = this.$route.params.id
            axios.get('/posts/' + id + '/edit')
            .then(response => {
            // JSON responses are automatically parsed.
            this.posts = response.data
            })
            .catch(e => {
            this.errors.push(e)
            })

            // async / await version (created() becomes async created())
            //
            // try {
            //   const response = await axios.get(`http://jsonplaceholder.typicode.com/posts`)
            //   this.posts = response.data
            // } catch (e) {
            //   this.errors.push(e)
            // }
        },

        // Fetches posts when the component is created.
        methods:{
            submitPostEdit(){
                let id = this.$route.params.id
                axios.patch('/posts/' + id, this.posts)
                .then(response => {
                    console.log(response)
                    this.$router.push({path:'/'})
                    // JSON responses are automatically parsed.
                    this.posts = response.data
                })
                .catch(e => {
                    this.errors.push(e)
                })
            }
        }
    }
</script>
