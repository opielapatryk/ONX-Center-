
<template>
    <div id="app">
        <div class="d-flex flex-column">
            <!-- <button class="btn btn-primary" @click="createCustomer()">Add new customer</button><br/> -->
            <h3 class="text-center">All Customers</h3><br/>
        </div>
        
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="customer in customers" :key="customer.id">
                <td>{{ customer.id }}</td>
                <td>{{ customer.name }}</td>
                <td>{{ customer.email }}</td>
                <td>{{ customer.phone }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deleteCustomer(customer.id)">Delete</button>
                        <button class="btn btn-info" @click="showCustomer(customer.id)">Details</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
import axios from 'axios';

    export default {
        data() {
            return {
                customers: []
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/customers')
                .then(response => {
                    this.customers = response.data;
                });
        },
        methods: {
            // createCustomer(){
            //     axios
            //         .post('http://localhost:8000/api/customers/create')
            //         .then(response => {
            //             console.log(response.data);
            //         });
            // },
            deleteCustomer(id) {
                axios
                    .delete(`http://localhost:8000/api/customer/destroy/${id}`)
                    .then(response => {
                        let i = this.customers.map(item => item.id).indexOf(id);
                        this.customers.splice(i, 1);
                    });
            },
            showCustomer(id) {
            axios
                .get(`http://localhost:8000/api/customer/${id}`)
                .then(response => {
                this.selectedCustomer = response.data;
                this.$router.push({
                    name: 'ListCustomer',
                    params: {
                    id: id,
                    }
                });
                })
                .catch(error => {
                console.log(error);
                });
            }

        }

    }
</script>