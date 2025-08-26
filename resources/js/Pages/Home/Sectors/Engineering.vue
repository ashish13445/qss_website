<template>
    <Head>
    <title>{{ metaTitle }}</title>
    <meta name="description" :content="metaDescription">
  </Head>
    <NavBar2 class="">
      <div class="flex align-items-center gap-2">
  <DarkModeToggle/>
  <div class="">

      <div v-if="canLogin" class="p-2">
      <Link
          v-if="$page.props.auth.user"
          :href="route('dashboard')"
          class="text-black  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          ><Button class="border-2 p-4 border-red-600 text-red-600 ">Dashboard</Button></Link
      >

      <template v-else>
          
          <Link
              :href="route('login')"
              class="text-black  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
              ><Button class="border-2  rounded-full p-2 text-xs md:text-sm border-red-600 md:font-extrabold text-red-600 ">Employee Login </Button></Link
          >
        
  
      </template>

  </div>

  </div>
</div>
    </NavBar2>
    <div class=" h-content  md:mt-0 tracking-wider	">
        <div class="bg-white dark:bg-black text-black dark:text-white h-content   relative">
    <img src="../../../../images/bg.png" 
       class="absolute inset-0 w-full h-full opacity-10 object-cover rounded-lg" 
       alt="Coal in Bag Background">

  <div>
      <img src="../../../../images/sectors.png" class="w-full" 
  </div>
  <h1 class="text-2xl md:text-5xl font-medium flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400 dark:text-black">Engineering Service Sector</h1>

<section id="engineering" class="p-10 flex flex-col md:flex-row items-center" >
            <div class=" w-full md:w-1/3">
                <img src="../../../../images/engineering.png" class="w-40 md:w-96" data-aos="zoom-in" data-aos-duration="1000">
            </div>
            <div class="w-full md:w-1/3" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-medium md:text-xl font-bold py-2 text-red-600"></h1>
            <h2 class=" text-lg md:text-xl font-bold  m-2">Core Services</h2>
            <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">  
        <span class="text-lg md:text-xl text-orange-600 flex items-center">
            <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2"> 
            Expediting & Progress Reporting
        </span> 
    </p>
    
    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">  
        <span class="text-lg md:text-xl text-orange-600 flex items-center">
            <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2"> 
            Plant Audits & Project Site Supervision
        </span> 
    </p>

    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">  
        <span class="text-lg md:text-xl text-orange-600 flex items-center">
            <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2"> 
            Expert Deputation for Overseas Inspections
        </span> 
    </p>

    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">  
        <span class="text-lg md:text-xl text-orange-600 flex items-center">
            <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2"> 
            Non-Destructive Testing (NDT) Services
        </span> 
    </p>

        <h2 class=" text-lg md:text-xl font-bold  m-2">Key Products</h2>
        <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">  
        <span class="text-lg md:text-xl text-orange-600 flex items-center">
            <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2"> 
            Transformers
        </span> 
    </p>
    
    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">  
        <span class="text-lg md:text-xl text-orange-600 flex items-center">
            <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2"> 
            Boilers
        </span> 
    </p>

    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">  
        <span class="text-lg md:text-xl text-orange-600 flex items-center">
            <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2"> 
            Material Handling Equipment
        </span> 
    </p>

    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">  
        <span class="text-lg md:text-xl text-orange-600 flex items-center">
            <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2"> 
            Transmission Towers
        </span> 
    </p>

    
</div>
<div class="w-full md:w-1/3 md:mx-20 rounded-lg shadow-md" data-aos="zoom-in" data-aos-duration="3000">
    <h2 class="bg-blue-600 text-white p-2 text-center font-semibold rounded-t-lg">
        Inspection & Testing Services
    </h2>
    <table class="w-full border border-gray-300 mt-2">
        <tbody>
            <tr><td class="border border-gray-300 p-2">✔ Non-Destructive Testing (NDT)</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Fabrication & Erection Inspections</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Explosives Inspections</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Packing/Loading Inspections</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Expediting & Progress Reporting</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Plant Audits & Project Site Supervision</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Expert Deputation for Overseas Inspections</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Transformers</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Boilers</td></tr>
            <tr class="bg-gray-50 dark:bg-black"><td class="border border-gray-300 p-2">✔ Material Handling Equipment</td></tr>
            <tr><td class="border border-gray-300 p-2">✔ Transmission Towers</td></tr>
        </tbody>
    </table>
</div>

        </section>
        </div>
        </div>
<Footer/>
</template>
<script setup>
import { Head,Link } from '@inertiajs/vue3';
import Button from 'primevue/button';
import Footer from '@/Components/Footer.vue';
import NavBar2 from '@/Components/NavBar2.vue';
import DarkModeToggle from '@/Components/DarkModeToggle.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});


</script>