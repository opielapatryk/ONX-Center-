<template>
  <div>
    <h2>Customer Details</h2>
    <p>Name: {{ customer.name }}</p>
    <p>Email: {{ customer.email }}</p>
    <p>Phone: {{ customer.phone }}</p>
  </div>
</template>

<script>
export default {
  name: 'ListCustomer',
  data() {
    return {
      customer: {}
    };
  },
  created() {
    const customerId = this.$route.params.id;
    axios
      .get(`http://localhost:8000/api/customer/${customerId}`)
      .then(response => {
        this.customer = response.data;
        this.customer.name = response.data[0].name;
        this.customer.email = response.data[0].email;
        this.customer.phone = response.data[0].phone;
      })
      .catch(error => {
        console.log(error);
      });
  }
}
</script>
