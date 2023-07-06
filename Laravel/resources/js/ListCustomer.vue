<template>
  <div v-for="customer in customer">
    <h3 class="text-center">Customer Details</h3>
    
    <table class="table table-bordered">
      <thead>
        <tr>
          <td><b>Title</b></td>
          <td><b class="text-primary">Click Field To Edit</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            Name: 
          </td>
          <td contenteditable @blur="onCellBlur('name', $event.target.textContent)">
            {{ customer.name }}
          </td>
          
        </tr>
        <tr>
          <td>
            Email: 
          </td>
          <td contenteditable @blur="onCellBlur('email', $event.target.textContent)">
            {{ customer.email }}
          </td>
          
        </tr>
        <tr>
          <td>
            Phone: 
          </td>
          <td contenteditable @blur="onCellBlur('phone', $event.target.textContent)">
            {{ customer.phone }}
          </td>
          
        </tr>
        <!-- employee -->
        <tr v-for="dataEmp in employee" >
          <td v-if="dataEmp.customer_id === customer.id">
            Employee: 
          </td>
          <td v-if="dataEmp.customer_id === customer.id" contenteditable @blur="onCellBlurEmployee($event.target.textContent)">
              {{ dataEmp.name }}
          </td>
          <!-- employee end  -->
        </tr>
        <!-- Last Order -->
        <tr v-if="getLastOrdersForCustomer(customer.id).length > 0" v-for="dataOrder in getLastOrdersForCustomer(customer.id)" :key="dataOrder.id">
          <td>
            Last order number:
          </td>
          <td contenteditable @blur="onCellBlurOrder('number', $event.target.textContent)">
            {{ dataOrder.number }}
          </td>
         
        </tr>
        <tr v-else>
          <td>
            Last order number:
          </td>
          <td contenteditable @blur="onCellBlurOrder('number', $event.target.textContent)">
            Empty
          </td>
        </tr>
        <!-- Last Order End -->
        <!-- Order Value -->
        <tr v-if="getLastOrdersForCustomer(customer.id).length > 0" v-for="dataOrder in getLastOrdersForCustomer(customer.id)" :key="dataOrder.id">
          <td>
            Last order value:
          </td>
          <td contenteditable @blur="onCellBlurOrder('value', $event.target.textContent)">
            {{ dataOrder.value }}
          </td>
        </tr>
        <tr v-else>
          <td>
            Last order value:
          </td>
          <td contenteditable @blur="onCellBlurOrder('value', $event.target.textContent)">
            Empty
          </td>
        </tr>
        <!-- Order End -->
        <b class="text-center text-danger align-middle">NAMES FOR CAR BRAND AND CAR MODEL ARE RANDOMLY GENERATED WITH FAKER !!!</b>
        <tr v-for="dataCustomerCar in customercar">
          <td v-if="dataCustomerCar.customer_id === customer.id">
            Customer car brand: 
          </td>
          <td v-if="dataCustomerCar.customer_id === customer.id" contenteditable @blur="onCellBlurCustomerCar('brand',$event.target.textContent)">
            {{ dataCustomerCar.brand }}
          </td>
        </tr>
        <tr v-for="dataCustomerCar in customercar">
          <td v-if="dataCustomerCar.customer_id === customer.id">
            Customer car model: 
          </td>
          <td v-if="dataCustomerCar.customer_id === customer.id" contenteditable @blur="onCellBlurCustomerCar('model',$event.target.textContent)">
            {{ dataCustomerCar.model }}
          </td>
        </tr>
        <tr v-for="dataCustomerCar in customercar">
          <td v-if="dataCustomerCar.customer_id === customer.id">
            Customer car nubmer plate: 
          </td>
          <td v-if="dataCustomerCar.customer_id === customer.id" contenteditable @blur="onCellBlurCustomerCar('number_plate',$event.target.textContent)">
            {{ dataCustomerCar.number_plate }}
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
      customercar: null,
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
      },methods:{
        getLastOrdersForCustomer(customerId) {if (!this.order || this.order.length === 0) {
          return []; 
        }
        
        const filteredOrders = this.order.filter(order => order.customer_id === customerId);
        if (filteredOrders.length === 0) {
          return []; 
        }
              
        const maxOrderNumber = Math.max(...filteredOrders.map(order => order.number));
        return filteredOrders.filter(order => order.number === maxOrderNumber);
        },
        onCellBlur(field, newCellData) {
          let updatedData = {};

          switch (field) {
            case 'name':
              updatedData = {
                id: this.$route.params.id,
                name: newCellData,
                email: this.customer[0].email,
                phone: this.customer[0].phone
              };
              break;
            case 'email':
              updatedData = {
                id: this.$route.params.id,
                name: this.customer[0].name,
                email: newCellData,
                phone: this.customer[0].phone
              };
              break;
            case 'phone':
              updatedData = {
                id: this.$route.params.id,
                name: this.customer[0].name,
                email: this.customer[0].email,
                phone: newCellData
              };
              break;
          }

          axios.put('http://127.0.0.1:8000/api/customers/update', updatedData).then(response => {console.log(response)}).catch(error => {console.log(error)});
        },
        onCellBlurEmployee(newCellData) {
          let customersEmployee = this.employee.filter(emp => emp.customer_id == this.$route.params.id);
          let updatedData = {};
              updatedData = {
                id: customersEmployee[0].id,
                name: newCellData,
                customer_id: customersEmployee[0].customer_id
              };
          axios.put('http://127.0.0.1:8000/api/employees/update', updatedData).then(response => {console.log(response)}).catch(error => {console.log(error)});
        },
        onCellBlurOrder(field,newCellData) {
          let customersOrder = this.order.filter(ord => ord.customer_id == this.$route.params.id);
          let updatedData = {};
          switch (field) {
            case 'number':
              updatedData = {
                id: customersOrder[0].id,
                number: newCellData,
                value:customersOrder[0].value,
                customer_id: customersOrder[0].customer_id
              };
              break;
            case 'value':
              updatedData = {
                id: customersOrder[0].id,
                number: customersOrder[0].number,
                value:newCellData,
                customer_id: customersOrder[0].customer_id
              };
              break;
          }
          
          axios.put('http://127.0.0.1:8000/api/orders/update', updatedData).then(response => {console.log(response)}).catch(error => {console.log(error)});
        },
        onCellBlurCustomerCar(field,newCellData) {
          let customerCar = this.customercar.filter(car => car.customer_id == this.$route.params.id);
          console.log(customerCar[0]);
          let updatedData = {};
          switch (field) {
            case 'brand':
              updatedData = {
                id: customerCar[0].id,
                brand: newCellData,
                model:customerCar[0].model,
                number_plate:11111,
                customer_id: customerCar[0].customer_id
              };
              break;
            case 'model':
              updatedData = {
                id: customerCar[0].id,
                brand: customerCar[0].brand,
                model:newCellData,
                number_plate:11111,
                customer_id: customerCar[0].customer_id
              };
              break;
              case 'number_plate':
              updatedData = {
                id: customerCar[0].id,
                brand: customerCar[0].brand,
                model:customerCar[0].model,
                number_plate:newCellData,
                customer_id: customerCar[0].customer_id
              };
              break;
          }
          axios.put('http://127.0.0.1:8000/api/customercar/update', updatedData).then(response => {console.log(response)}).catch(error => {console.log(error)});
        },
      }
};
</script>