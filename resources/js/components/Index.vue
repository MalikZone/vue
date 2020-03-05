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
                    <tr v-for="post of posts">
                        <td>{{post.title}}</td>
                        <td>{{post.description}}</td>
                        <td>
                            <button class="btn btn-info">Details</button>
                        </td>
                        <td>
                            <button class="btn btn-success">Edit</button>
                        </td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
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
        }
    }
</script>