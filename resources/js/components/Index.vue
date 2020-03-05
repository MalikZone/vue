<template>
    <div class="card">
        <div class="card-header">
            <router-link to="/create" class="btn btn-primary float-right">add book</router-link>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>@</th>
                        <th>Books</th>
                        <th>Descriptions</th>
                        <th colspan="3">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Darr</td>
                        <td>Darr</td>
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