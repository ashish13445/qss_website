<script setup>
import { Head,Link } from '@inertiajs/vue3';
import Footer from '@/Components/Footer.vue';
import { ref } from 'vue';
import NavBar2 from '@/Components/NavBar2.vue';

import Knob from 'primevue/knob';
import Button from 'primevue/button';
import DarkModeToggle from '@/Components/DarkModeToggle.vue';
const value = ref(25);
const value2 = ref(9);

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

<template >
    <Head title="About" />
 
    
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
                ><Button class="  p-2 text-sm ">CONTACT US</Button></Link
            >
            <Link
                :href="route('login')"
                class="font-semibold  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2 p-2 text-sm rounded-full  border-red-600 text-red-600 md:font-extrabold">Login </Button></Link
            >
          
    
        </template>

    </div>

    </div>
  </div>
      </NavBar2>
<div class="w-full md:tracking-wider ">

        <div class=" flex justify-evenly   w-full ">
          
          <section class="relative ">
<img class="h-full object-cover opacity-50 " src="../../../../public/images/grain.png" >
          </section>

            <section class="absolute font-medium text-sm md:text-medium    md:p-5">
              <h1 class="text-2xl md:text-5xl font-medium flex justify-center pt-10 md:pt-20 md:pb-10"><span class="font-extrabold pr-1">ABOUT </span>US</h1>

              <div class="py-10 px-5 hover:border-red-800 rounded text-xs md:text-sm ">

                Quality Services and Solutions Private Limited (QSSPL) is a private organization established in 1999, with a legacy
of 25 years in delivering quality services and conducting third-party inspections. QSSPL specializes in Agriculture,
Engineering, Minerals, and Metals, catering to both local and global markets. The organization boasts a skilled
workforce of over 1,650 professionals and maintains a global presence through strong international associations.
QSSPL operates across 20+ states in India, ensuring a wide-reaching market presence and the ability to meet
diverse regional needs. The company has mastered third-party inspection services, ensuring top-notch quality
assurance for its clients. QSSPL’s commitment to precision and excellence has solidified its reputation as a
trusted and proficient industry leader.
QSSPL professionalism is firmly anchored within our salient Core Values namely: <br/><br/>
<ol class="">
  <li>
    1. Impartiality
  </li>
  <li>
    2. Independence
  </li>
<li>
  3. Integrity
</li>
<li>
  4. Expertise
</li>
<li>
  5. Quality of Service

</li>
</ol>
<br/>
QSSPL Services are customer focused and customized, dedicated to the customers cause, responsive, efficient, value adding and most of all cost effective without compromising <span class="text-red-600">“Quality of Service”</span>.

              </div>
             
            </section>
            
            </div>

            
            
                      
          
</div>
      <Footer/>  
</template>

