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
                <img src="../../../../images/agriculture-products.png" data-aos="zoom-in" class="w-60 md:w-full pr-10">
            </div>
           
        <div class="w-2/3" data-aos="zoom-in" >

        <h2 class=" font-bold text-gray-800  my-2 ">Core Services</h2>
        <ul class="list-disc list-inside text-gray-700 ">
            <li>Procurement & Supervision</li>
            <li>Laboratory Testing</li>
            <li>Inspections, Surveys & Audits</li>
            <li>Warehouse & Plant Oversight</li>
            <li>Quality Certifications</li>
        </ul>

        <h2 class="font-bold text-gray-800  my-2 ">Key Products</h2>
        <ul class="list-disc list-inside text-gray-700 ">
            <li>Animal Feeds</li>
            <li>Agricultural Products</li>
            <li>Edibles & Non-Edibles</li>
        </ul>

        <h2 class=" font-bold text-gray-800 my-2 ">Tests Conducted</h2>
        <div class="text-sm text-gray-700 space-y-3">
            <p><strong>Quality Parameters:</strong> Moisture, ash, gluten, oil content.</p>
            <p><strong>Contaminants:</strong> Pesticide residue, aflatoxin.</p>
            <p><strong>Oil-Specific Tests:</strong> FFA (Free Fatty Acids), iodine value.</p>
            <p><strong>Others:</strong> ICUMSA color for sugar analysis.</p>
            <p><strong>Edibles:</strong> Nutritional, contaminants, microbial, and sensory analysis.</p>
            <p><strong>Water:</strong> pH, TDS, and microbial safety.</p>
            <p><strong>Soft Goods:</strong> Fabric quality, durability, and chemical safety.</p>
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