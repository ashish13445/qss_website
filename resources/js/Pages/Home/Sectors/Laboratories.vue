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
  <h1 class="text-2xl md:text-5xl font-medium flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400 dark:text-black">Laboratories Service Sector</h1>

 <section id="laboratories" class="p-10 flex flex-col md:flex-row items-center" >
            <div class="md:w-1/3">
                <img src="../../../../images/microscope.png" class="w-40 md:w-full md:p-10" data-aos="zoom-in" data-aos-duration="1000">
            </div>
            <div class="md:w-2/3" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-medium md:text-xl font-bold py-2 text-red-600">r</h1>
            <h2 class=" font-bold text-gray-800 my-2">Functionality of the Laboratories and Compliances:</h2>
        <div class="text-gray-700 space-y-2 text-sm">
            <p><strong class="font-semibold">Independent and Impartial Assistance:</strong> Reliable, accurate, and impartial analytical results.</p>
            <p><strong class="font-semibold">Comprehensive Product Analysis:</strong> Testing ensures compliance from exploration to delivery.</p>
            <p><strong class="font-semibold">Skilled Team & Advanced Techniques:</strong> Staffed with experts using classical and modern techniques for reliable results.</p>
            <p><strong class="font-semibold">ISO/IEC 17025:2017 Compliant:</strong> Adheres to international testing standards.</p>
            <p><strong class="font-semibold">NABL & EIC Accredited:</strong> Laboratories certified for mineral and material testing and global compliance.</p>
        </div>
 </div>
        </section>
        </div></div>
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