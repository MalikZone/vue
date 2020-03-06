<template>
    <div class="card">
        <div class="card-header">
            <router-link to="/create" class="btn btn-primary float-right">add book</router-link>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Books</th>
                        <th>Descriptions</th>
                        <th colspan="3">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="post, index of posts">
                        <td>{{post.title}}</td>
                        <td>{{post.description}}</td>
                        <td>
                            <router-link :to="{name: 'readPost', params:{id:post.id}}" class="btn btn-info">Details</router-link>
                        </td>
                        <td>
                            <router-link :to="{name: 'editPost', params:{id:post.id}}" class="btn btn-success">Edit</router-link>
                        </td>
                        <td>
                            <button type="submit" v-on:click="submitPostDelete(post.id, index)" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
            posts: [],
            errors: []
            }
        },

        // Fetches posts when the component is created.
        created() {
            axios.get('/posts')
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

         methods:{
            submitPostDelete(id, index){
                if (confirm("delete data ?")) {
                    axios.delete('/posts/' + id)
                    .then(response => {
                        console.log(response)
                        // JSON responses are automatically parsed.
                        this.posts.splice(index, 1)
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })   
                }
            }
        },

    }
</script>