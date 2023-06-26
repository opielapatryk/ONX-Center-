<template>
    <div>
        <h3 class="text-center">All Customers</h3><br/>
 
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
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
                        <!-- <router-link :to="{name: 'edit', params: { id: customer.id }}" >
                            <button class="btn btn-primary">Edit</button>
                        </router-link> -->
                        <button class="btn btn-danger" @click="deleteCustomer(customer.id)">Delete</button>
                        <button class="btn btn-danger" @click="showCustomer(customer.id)">Details</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
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
            deleteCustomer(id) {
                axios
                    .delete(`http://localhost:8000/api/customers/destroy/${id}`)
                    .then(response => {
                        let i = this.customers.map(item => item.id).indexOf(id);
                        this.customers.splice(i, 1);
                    });
            }
        }

    }
</script>