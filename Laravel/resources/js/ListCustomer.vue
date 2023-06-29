<template>
    <div>
      <h2>Customer Details</h2>
      <p>Name: {{ $route.params.name }}</p>
      <p>Email: {{ $route.params.email }}</p>
      <p>Phone: {{ $route.params.phone }}</p>
    </div>
  </template>  
  
  <script>
  export default {
    name: 'ListCustomer',
  }
  </script>