<template>
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
              :href="route('contact')"
              class=" text-black dark:text-white hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
              ><Button class="  p-2 text-xs md:text-sm ">CONTACT US</Button></Link
          >
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
            <div class="md:w-1/3">
                <img src="../../../../images/engineering.png" class="w-40 md:w-96" data-aos="zoom-in" data-aos-duration="1000">
            </div>
            <div class="md:w-2/3" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-medium md:text-xl font-bold py-2 text-red-600"></h1>
            <h2 class=" font-bold text-gray-800 my-2">Core Services</h2>
        <ul class="list-disc list-inside text-gray-700 ">
            <li>Expediting & Progress Reporting</li>
            <li>Plant Audits & Project Site Supervision</li>
            <li>Expert Deputation for Overseas Inspections</li>
            <li>Non-Destructive Testing (NDT) Services</li>
        </ul>

        <h2 class=" font-bold text-gray-800 my-2">Key Products</h2>
        <ul class="list-disc list-inside text-gray-700 ">
            <li>Transformers</li>
            <li>Boilers</li>
            <li>Material Handling Equipment</li>
            <li>Transmission Towers</li>
        </ul>

        <h2 class=" font-bold text-gray-800 my-2">Tests Conducted</h2>
        <div class=" text-gray-700 text-sm">
            <p><strong>Non-Destructive Testing (NDT):</strong> RT (Radiographic Testing), UT (Ultrasonic Testing), MPT (Magnetic Particle Testing), PT (Penetrant Testing)</p>
            <p><strong>Fabrication & Erection Inspections</strong></p>
            <p><strong>Explosives Inspections</strong></p>
            <p><strong>Packing/Loading Inspections</strong></p>
        </div>
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