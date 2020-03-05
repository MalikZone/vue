<template>
    <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       Tambah Buku
                   </div>
                   <div class="card-body">
                       <form action="">
                           <div class="form-group">
                               <input type="text" placeholder="enter data..." class="form-control">
                           </div>
                           <div class="form-group">
                               <textarea name="" id="" cols="30" rows="10" placeholder="enter data..." class="form-control"></textarea>
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
                    description: ""
                },
                errors: []
            }
        },

        // Fetches posts when the component is created.
        methods:{
            submitPost(){
                axios.get(`http://jsonplaceholder.typicode.com/posts`)
                .then(response => {
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
