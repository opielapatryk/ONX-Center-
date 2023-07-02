<template>
  <div v-for="data in customer">
    <h3 class="text-center">Customer Details</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>Key</td>
          <td>Value</td>
          <td>Options</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            Name: 
          </td>
          <td>
            {{ data.name }}
          </td>
          <td>
            <button class="btn btn-success" @click="showCustomer(customer.id)">Edit</button>
        </td>
        </tr>
        <tr>
          <td>
            Email: 
          </td>
          <td>
            {{ data.email }}
          </td>
          <td>
            <button class="btn btn-success" @click="showCustomer(customer.id)">Edit</button>
        </td>
        </tr>
        <tr>
          <td>
            Phone: 
          </td>
          <td>
            {{ data.phone }}
          </td>
          <td>
            <button class="btn btn-success" @click="showCustomer(customer.id)">Edit</button>
        </td>
        </tr>
        <tr v-for="dataEmp in employee" >
          <td v-if="dataEmp.customer_id === data.id">
            Employee: 
          </td>
          <td v-if="dataEmp.customer_id === data.id">
              {{ dataEmp.name }}
          </td>
          <td v-if="dataEmp.customer_id === data.id">
            <button class="btn btn-success" @click="showCustomer(customer.id)">Edit</button>
        </td>
        </tr>
        <!-- Last Order -->
        <tr v-for="dataOrder in order"> 
          <td v-if="dataOrder.customer_id === data.id">
            Last order number: 
          </td>
          <td v-if="dataOrder.customer_id === data.id">
            {{ dataOrder.number }}
          </td>
          <td v-if="dataOrder.customer_id === data.id">
            <button class="btn btn-success" @click="showCustomer(customer.id)">Edit</button>
        </td>
        </tr>
        <!-- Last Order End -->
        <!-- Order Value -->
        <tr v-for="dataOrder in order"> 
          <td v-if="dataOrder.customer_id === data.id">
            Order value: 
          </td>
          <td v-if="dataOrder.customer_id === data.id">
            {{ dataOrder.value }}
          </td>
          <td v-if="dataOrder.customer_id === data.id">
            <button class="btn btn-success" @click="showCustomer(customer.id)">Edit</button>
          </td>
        </tr>
        <!-- Order End -->
        <b class="text-center text-danger align-middle">NAMES FOR CAR BRAND AND CAR MODEL ARE RANDOMLY GENERATED WITH FAKER !!!</b>
        <tr v-for="dataCustomerCar in customercar">
          <td v-if="dataCustomerCar.customer_id === data.id">
            Customer car brand: 
          </td>
          <td v-if="dataCustomerCar.customer_id === data.id">
            {{ dataCustomerCar.brand }}
          </td>
          <td v-if="dataCustomerCar.customer_id === data.id">
            <button class="btn btn-success" @click="showCustomer(customer.id)">Edit</button>
        </td>
        </tr>
        <tr v-for="dataCustomerCar in customercar">
          <td v-if="dataCustomerCar.customer_id === data.id">
            Customer car model: 
          </td>
          <td v-if="dataCustomerCar.customer_id === data.id">
            {{ dataCustomerCar.model }}
          </td>
          <td v-if="dataCustomerCar.customer_id === data.id">
              <button class="btn btn-success" @click="showCustomer(customer.id)">Edit</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'ListCustomer',
  data() {
    return {
      customer: null,
      employee: null,
      order: null,
      customercar: null
    };
  },
  created() {
    const customerId = this.$route.params.id;

    axios
      .get(`http://localhost:8000/api/customer/${customerId}`)
      .then(response => {
        this.customer = response.data;
      })
      .catch(error => {
        console.log(error);
      });

      axios
        .get(`http://localhost:8000/api/employees`)
        .then(response => {
          this.employee = response.data;
        })
        .catch(error => {
          console.log(error);
        });

        axios
        .get(`http://localhost:8000/api/orders`)
        .then(response => {
          this.order = response.data;
        })
        .catch(error => {
          console.log(error);
        });

        axios
        .get(`http://localhost:8000/api/customercar`)
        .then(response => {
          this.customercar = response.data;
        })
        .catch(error => {
          console.log(error);
        });
      }
};
</script>