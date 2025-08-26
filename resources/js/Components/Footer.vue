<template>
  <footer class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-white">
    <div class="max-w-7xl mx-auto px-4 py-10 md:flex md:justify-between md:items-start">
      
      <!-- Address Section -->
      <div class="flex flex-col items-center md:items-start md:w-1/3 mb-8 md:mb-0 text-center md:text-left">
        <ApplicationLogo class="mb-4" />
        <p class="text-xs md:text-sm lg:text-base">
          Flat-8, Wing-A, 3rd Floor, Moiz Apartment, 12th Tps Road, Santacruz (East), Mumbai 400 055, Maharashtra, India
        </p>
      </div>

      <!-- Links Section -->
      <div class="flex flex-col md:flex-row md:space-x-16 justify-center md:w-2/3">
        <!-- Useful Links -->
        <div class="mb-6 md:mb-0">
          <h2 class="text-sm md:text-lg font-semibold mb-2">Useful Links</h2>
          <div class="h-0.5 w-12 bg-red-600 mb-4"></div>
          <ul class="space-y-2">
            <li class="hover:text-red-600"><Link :href="route('about')">About Us</Link></li>
            <li class="hover:text-red-600"><Link :href="route('management')">Management</Link></li>
            <li class="hover:text-red-600"><Link :href="route('contact')">Contact Us</Link></li>
            <li class="hover:text-red-600"><Link :href="route('career')">Career</Link></li>
          </ul>
        </div>

        <!-- Social Links -->
        <div>
          <h2 class="text-sm md:text-lg font-semibold mb-2">Follow Us</h2>
          <div class="h-0.5 w-12 bg-red-600 mb-4"></div>
          <div class="flex space-x-4">
            <a href="https://www.linkedin.com/company/quality-services-&-solutions-qss-/mycompany/" target="_blank" rel="noopener">
              <i class="pi pi-linkedin text-2xl md:text-4xl hover:text-blue-700"></i>
            </a>
            <!-- Add other social icons here -->
          </div>
        </div>
      </div>

    </div>

    <!-- Copyright -->
    <div class="bg-gray-200 dark:bg-gray-900 text-gray-700 dark:text-gray-300 text-center py-3">
      &copy; 2024 Quality Services & Solutions
    </div>
  </footer>
</template>

<script setup>
import ApplicationLogo from './ApplicationLogo.vue';
import { Head,Link } from '@inertiajs/vue3';

</script>