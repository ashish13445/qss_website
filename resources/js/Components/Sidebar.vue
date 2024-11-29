<template>
    <aside class="sidebar">
      <!-- Sidebar content goes here -->
      <div>
        <h2>Sidebar</h2>
        <!-- Add links or other sidebar content -->
        <router-link to="/">Home</router-link>
        <router-link to="/dashboard">Dashboard</router-link>
        <!-- Add more links as needed -->
      </div>
    </aside>
  </template>
  
  <style scoped>
  .sidebar {
    background-color: #333;
    color: white;
    width: 200px;
    padding: 20px;
  }
  
  .sidebar a {
    color: white;
    text-decoration: none;
    margin-bottom: 10px;
    display: block;
  }
  </style>
  