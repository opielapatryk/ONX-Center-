<template>
    <div style="margin:5vh;">
        <h3 class="text-center">Add Customer</h3><br/>
        <div class="d-flex flex-column align-items-center">

            <label for="name">Name:</label>
            <input class="w-25" name="name" type="text" v-model="name" /> <br />
            <label for="email">Email: </label>
    
            <input class="w-25" name="email" type="text" v-model="email" /> <br />
            <label for="phone">Phone: </label>
    
            <input class="w-25" name="phone" type="text" v-model="phone" /> <br />
            <label for="employee_name">Employee name: </label>
    
            <input class="w-25" name="employee_name" type="text" v-model="employee_name" /> <br />
            <label for="car_brand">Car brand: </label>
    
            <input class="w-25" name="car_brand" type="text" v-model="car_brand" /> <br />
            <label for="car_model">Car model: </label>
    
            <input class="w-25" name="car_model" type="text" v-model="car_model" /> <br />
            <label for="number_plate">Number plate: </label>
    
            <input class="w-25" name="number_plate" type="text" v-model="number_plate" /> <br />
            
            <router-link class="btn btn-primary" to="/">
                <button @click="addCustomer" class="btn btn-primary">Add</button>
            </router-link>
        </div>
      </div>
  </template>
  
  <script>
  import axios from "axios";
  export default {
    name: "CreateCustomer",
    data() {
      return {
        name: '',
        email: '',
        phone: '',
        employee_name : '',
        car_brand: '',
        car_model: '',
        number_plate: '',
      };
    },
    methods: {
      async addCustomer() {
        try {
            const response = await axios.post(
            "http://localhost:8000/api/customers/create", 
            {
                name: this.name,
                email : this.email,
                phone : this.phone,
                employee_name : this.employee_name,
                car_brand : this.car_brand,
                car_model : this.car_model,
                number_plate : this.number_plate,
            }
            );
            const customerId = response.data.id;
            
            await axios
            .post(
            "http://localhost:8000/api/employees/create", 
            {
                name: this.employee_name,
                customer_id: customerId
            });

            await axios
            .post(
            "http://localhost:8000/api/customercar/create", 
            {
                brand: this.car_brand,
                model: this.car_model,
                number_plate: this.number_plate,
                customer_id: customerId
            });

            await axios
            .post(
            "http://localhost:8000/api/orders/create", 
            {
                number: null,
                value: null,
                customer_id: customerId
            });
        } catch(e) {
            console.log(e.response.data);
        }
        },
    },
  };
  </script>