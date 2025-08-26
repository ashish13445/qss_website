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
     metaTitle: String,
  metaDescription: String
});

</script>

<template >
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
                class="font-semibold  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2 p-2 text-sm rounded-full  border-red-600 text-red-600 md:font-extrabold">Login </Button></Link
            >
          
    
        </template>

    </div>

    </div>
  </div>
      </NavBar2>
<div class="w-full md:tracking-wider ">

        <div class=" flex justify-evenly   w-full h-screen">
          
          <section class="relative ">
<img class="h-full object-cover opacity-50 " src="../../../../public/images/grain.png" >
          </section>

            <section class="absolute font-medium text-sm md:text-medium    md:p-5">
              <h1 class="text-2xl md:text-5xl font-medium flex justify-center pt-10 md:pt-20 md:pb-10"><span class="font-extrabold pr-1">ABOUT </span>US</h1>

              <div class="py-10 px-5 hover:border-red-800 rounded text-xs md:text-sm ">

                Quality Services and Solutions Private Limited (QSSPL) has been a trusted name in third-party inspections and testing services since 1999. With 25 years of industry excellence, we have built a strong legacy of delivering precision-driven, customer-centric services across diverse industrial sectors, including Agriculture & Food, Engineering and Minerals & Metals.
Our commitment to uncompromising quality and integrity has enabled us to serve both local and international markets with exceptional expertise. Backed by a team of 1,700+ skilled professionals and a robust global network, QSSPL operates across 20+ states in India, ensuring extensive market reach and the ability to meet region-specific needs.
At QSSPL, we have mastered the art of third-party inspection, delivering rigorous testing services that uphold the highest industry standards. Our Core Values define our professional ethos and commitment to excellence:






<ol class="">
  <li>
    ✅ Impartiality – Delivering unbiased and transparent inspections.
  </li>
  <li>
✅ Independence – Operating with complete autonomy for objective assessments.  </li>
<li>
 ✅ Integrity – Upholding the highest ethical standards.
</li>
<li>
 ✅ Expertise – Leveraging deep industry knowledge and skilled professionals.
</li>
<li>
✅ Quality of Service – Ensuring excellence in every engagement.
</li>
</ol>
<br/>
Our services are tailored to meet our client's unique needs, focusing on efficiency, responsiveness, and value addition. At QSSPL, we believe in delivering cost-effective solutions without ever compromising on quality, making us a partner of choice for businesses seeking excellence and reliability in inspection & testing services.

              </div>
             
            </section>
            
            </div>

            
            
                      
          
</div>
      <Footer/>  
</template>

