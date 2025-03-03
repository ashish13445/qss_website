<template>
  <AuthenticatedLayout>
    <Head title="Salary Management" />
    
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Salary Management</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
          
          <!-- Upload Salary Button (Only for Admin) -->
          <button 
            class="bg-red-500 p-2 rounded text-white" 
            v-if="$page.props.auth.user.email === 'admin@qssindia.in'" 
            @click="openUploadPage"
          >
            Upload Salary
          </button>

          <!-- Salary Data Display -->
          <div v-if="salaries && Object.keys(salaries).length">
            <div v-for="(months, year) in salaries" :key="year" class="p-10">
              <h3 class="text-xl font-semibold">{{ year }}</h3>
              
              <!-- Grid Layout for Months -->
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-10">
                <div v-for="(details, month) in months" :key="month">
                  
                  <div v-for="salary in details" :key="salary.employee_id" class="p-4 border rounded-md bg-white shadow">
                    <h4 class="font-semibold">{{ getMonthName(month) }}</h4>
                    <p><strong>Net Salary:</strong> {{ formatCurrency(salary.net_salary) }}</p>

                    <!-- Download Salary Slip Button -->
                    <button 
                      @click.prevent="downloadSalarySlip(salary.employee_id, month, year)"
                      class="block mt-3 text-center bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-800"
                    >
                      Download Salary Slip
                    </button>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- No Salary Records Found -->
          <p v-else class="text-gray-500 text-center">No salary records available.</p>

        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import axios from 'axios';

// Salary Data
const salaries = ref({});

// ✅ Fetch Salaries and Handle Errors
const getSalaries = async () => {
  try {
    const response = await axios.get('/salary/list');
    salaries.value = response.data || {}; // Ensure it's always an object
  } catch (error) {
    console.error("Error fetching salaries:", error);
    salaries.value = {}; // Prevent errors if API fails
  }
};

// ✅ Open Upload Page in New Tab (For Admins)
const openUploadPage = () => {
  window.open('/salary/upload', '_blank');
};

// ✅ Download Salary Slip
const downloadSalarySlip = async (employee_id, monthName, year) => {
  try {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    const response = await axios.post("/salary/slip", 
      { employee_id, month: monthName, year }, 
      {
        responseType: "blob", // Expect binary response (PDF)
        headers: { "X-CSRF-TOKEN": csrfToken } // Ensure CSRF token is included
      }
    );

    // Ensure response is a PDF
    const contentType = response.headers["content-type"];
    if (!contentType.includes("pdf")) {
      throw new Error("Invalid response format. Expected PDF.");
    }

    // Create a PDF blob and trigger download
    const blob = new Blob([response.data], { type: "application/pdf" });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = `Salary_Slip_${employee_id}_${monthName}_${year}.pdf`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
  } catch (error) {
    console.error("Error downloading salary slip:", error);
    alert(error.response?.data?.message || "Failed to download salary slip. Please try again.");
  }
};

// ✅ Convert Month Number to Month Name
const getMonthName = (month) => {
  const monthNames = [
    "January", "February", "March", "April", "May", "June", 
    "July", "August", "September", "October", "November", "December"
  ];
  return monthNames[month - 1] || "Unknown Month";
};

// ✅ Format Salary as Currency (INR)
const formatCurrency = (amount) => {
  return new Intl.NumberFormat("en-IN", { style: "currency", currency: "INR" }).format(amount);
};

// ✅ Fetch Salaries on Page Load
onMounted(getSalaries);
</script>
