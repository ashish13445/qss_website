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
    <div class=" h-content  md:mt-0 tracking-wider">
        <div class="bg-white dark:bg-black text-black dark:text-white h-content  relative">
    <img src="../../../../images/bg.png" 
       class="absolute inset-0 w-full h-full opacity-10 object-cover rounded-lg" 
       alt="Coal in Bag Background">


  <div>
      <img src="../../../../images/sectors.png" class="w-full" 
  </div>
  <h1 class="text-2xl md:text-5xl font-medium flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400 dark:text-black">Agriculture Produce & Products</h1>

<section id="agriculture-products" class="py-2 md:p-10 flex flex-col md:flex-row items-center" >
            <div class="md:w-1/3">
                <img src="../../../../images/agriculture-products.png" data-aos="zoom-in" data-aos-duration="3000" class="w-60 md:w-full pr-10">
            </div>
           
        <div class="md:w-1/3" data-aos="zoom-in" >

        <h2 class=" text-lg md:text-xl font-bold m-4 ">Core Services</h2>
        <!-- <ul class="list-disc list-inside text-gray-700 "> -->
            <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2">
        Procurement & Supervision</span>
    
    </p>
    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2">
        Laboratory Testing</span>
    
    </p>
    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2">
        Inspections, Surveys & Audits</span>
    
    </p>
    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2">
        Warehouse & Plant Oversight</span>
    
    </p>
    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2">
        Quality Certifications</span>
    
    </p>
        <!-- </ul> -->

        <h2 class="text-lg md:text-xl font-bold  m-4 ">Key Products</h2>
        <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2">
        Animal Feeds</span>
    
    </p>
    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2">
        Agricultural Products</span>
    
    </p>
    <p class="p-2" data-aos="zoom-in" data-aos-duration="3000">
    <span class="text-lg md:text-xl text-orange-600 flex items-center">
        <img src="../../../../images/arrow-right.png" alt="Icon" class="w-10 h-10 mr-2">
        Edibles & Non-Edibles</span>
    
    </p>
          
        
    </div>
    <div class=" md:w-1/3 rounded-lg shadow-md mx-auto" data-aos="zoom-in" data-aos-duration="3000">
    <h2 class="bg-blue-600 text-white p-2 text-center font-semibold rounded-t-lg">
        Quality Tests
    </h2>
    <table class="w-full border border-gray-300 mt-2">

        <tbody>
            <tr>
                <td class="border border-gray-300 p-2">Moisture, Ash, Microbial & Sensory Analysis</td>
            </tr>
            <tr class="bg-gray-50 dark:bg-black">
                <td class="border border-gray-300 p-2">FFA (Free Fatty Acids), Iodine Value</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Pesticide Residue, Aflatoxin</td>
            </tr>
            <tr class="bg-gray-50 dark:bg-black">
                <td class="border border-gray-300 p-2">Moisture, Ash, Gluten</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Microbial & Sensory Analysis</td>
            </tr>
            <tr class="bg-gray-50 dark:bg-black">
                <td class="border border-gray-300 p-2">ICUMSA Color</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">pH, TDS, Microbial Safety</td>
            </tr>
            <tr class="bg-gray-50 dark:bg-black">
                <td class="border border-gray-300 p-2">Fabric Quality, Durability, Chemical Safety</td>
            </tr>
        </tbody>
    </table>
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