<template>
    <div style="margin:5vh;">
        <h3 class="text-center">Add Customer</h3><br/>
        <div class="d-flex flex-column align-items-center">

            <label for="name">Name:</label>
            <input class="w-25" name="name" type="text" v-model="name" placeholder="Joe Doe"/> <br />
            
            <label for="email">Email: </label>
    
            <input class="w-25" name="email" type="text" v-model="email" placeholder="email@example.com"/> <br />
            
            <label for="phone">Phone: </label>
    
            <input class="w-25" name="phone" type="text" v-model="phone" placeholder="123123123"/> <br />
            
            <label for="employee_name">Employee name: </label>
    
            <input class="w-25" name="employee_name" type="text" v-model="employee_name" placeholder="Joe Doe"/> <br />
            
            <label for="car_brand">Car brand: </label>
    
            <input class="w-25" name="car_brand" type="text" v-model="car_brand" placeholder="Ford"/> <br />
            
            <label for="car_model">Car model: </label>
    
            <input class="w-25" name="car_model" type="text" v-model="car_model" placeholder="Focus"/> <br />
            
            <label for="number_plate">Number plate: </label>
    
            <input class="w-25" name="number_plate" type="text" v-model="number_plate" placeholder="12345"/> <br />
            <div v-if="errors.length">
                <ul class="alert alert-danger">
                  <li v-for="error in errors" :key="error">{{ error }}</li>
                </ul>
              </div>

                <button @click="addCustomer" class="btn btn-primary">Add</button>
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
        errors: []
      };
    },
    methods: {
      async addCustomer() {
        this.errors = [];
        if (!this.name) {
        this.errors.push("Name is required.");
      }
      // Dodaj inne reguły walidacji dla innych pól formularza

      // Sprawdź, czy wystąpiły błędy walidacji
      if (this.errors.length) {
        return; // Przerwij funkcję w przypadku błędów walidacji
      }
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
            this.$router.push("/");

        } catch(e) {
            console.log(e.response.data);
        }
        },
    },
  };
  </script>