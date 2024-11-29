<template>
    <div id="app">
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Attendance</th>
            <th>Leaves</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in items" :key="index">
            <td>{{ item.date }}</td>
            <td>{{ item.attendance }}</td>
            <td>{{ item.leaves }}</td>
            <td>{{ item.remarks }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        items: [
          // Add your data here
        ]
      };
    }
  };
  </script>