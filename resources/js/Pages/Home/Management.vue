<script setup>
import { Head,Link } from '@inertiajs/vue3';
import Button from 'primevue/button';
import Footer from '@/Components/Footer.vue';
import NavBar2 from '@/Components/NavBar2.vue';

import OrganizationChart from 'primevue/organizationchart';


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
const data = [{name: 'Shashank Mehta',
                title: 'Director',
                label: 'test',
                image: 'coal.png'}]
</script>

<template >
    <Head title="Management" />
    
      <NavBar2 class="">
        <div class="flex align-items-center gap-2">
    
    <div class="">

        <div v-if="canLogin" class="p-2">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            ><Button class="border-2 p-4 border-red-600 text-red-600 ">Dashboard</Button></Link
        >

        <template v-else>
            <Link
                :href="route('contact')"
                class=" text-black  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
                ><Button class="  p-2 text-sm ">CONTACT US</Button></Link
            >
            <Link
                :href="route('login')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2 rounded-full p-2 text-sm border-red-600 font-extrabold text-red-600 ">Employee Login </Button></Link
            >
          
    
        </template>

    </div>

    </div>
  </div>
      </NavBar2>
      <div class="bg-tint-primary h-content  md:mt-20">
      <div class="bg-white">


        <div class="pt-10 px-10 md:px-20 grid grid-cols-2 md:grid-cols-4 gap-4   ">
<div class=" hidden md:block w-48">
   
  
</div>
    
<div class="bg-white rounded w-36 md:w-44 border-2 border-black">
    <img src="../../../images/team/shashank_mehta.png" class="w-44 h-auto rounded-t">
    <section class="p-1 md:p-2 flex flex-col items-center text-center">
        <h1 class="text-sm md:text-medium py-1 font-bold">Shashank Mehta</h1>
    <p class="">Director</p>
    </section>

</div>
<div class="bg-white rounded w-36 md:w-44 border-2 border-black">
    <img src="../../../images/team/aditi_mehta.png" class="w-44 h-auto rounded-t">
    <section class="p-1 md:p-2 flex flex-col items-center text-center">
        <h1 class="text-sm md:text-medium py-1 font-bold">Aditi Mehta</h1>
    <p class="">Managing Director</p>
    </section>

</div>
<div class=" w-48">
   
  
</div>

</div>
<div class="px-10 md:px-64 py-10 flex justify-center md:mr-40">
    
    <div class="bg-white rounded text-center w-30 md:w-44 border-2 border-black ">
    <img src="../../../images/team/nakul_gupta.png" class="w-44 h-auto rounded-t">
    <section class="p-1 md:p-2 flex flex-col items-center text-center">
        <h1 class="text-sm md:text-medium py-1 font-bold">Nakul Gupta</h1>
    <p class="text-sm">Chief Operating Officer</p>
    </section>

</div>
</div>

<div class="pt-10 px-10 md:px-20 md: mb-20 grid grid-cols-2 md:grid-cols-4 gap-4   ">
    <div class="hidden md:block w-48">
   
  
</div>
    
<div class="bg-white rounded w-30 md:w-44  border-2 border-black">
    <img src="../../../images/team/asmit_agrawal.png" class="w-44 h-auto rounded-t">
    <section class="p-1 md:p-2 flex flex-col items-center text-center">
        <h1 class="text-sm md:text-medium py-1 font-bold">Asmit Agrawal</h1>
    <p class="text-sm">Ass. General Manager (Finance & Admin)</p>
    </section>

</div>
<div class="bg-white rounded w-30 md:w-44  border-2 border-black">
    <img src="../../../images/team/kushagra.png" class="w-44 h-auto rounded-t">
    <section class="p-1 md:p-2 flex flex-col items-center text-center">
        <h1 class="text-sm md:text-medium py-1 font-bold">Kushagra Kathuria</h1>
    <p class="text-sm">Ass. General Manager (Operations)</p>
    </section>

</div>
</div>

      </div>
    
    </div>
        
 <Footer/>
</template>

