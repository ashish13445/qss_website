<script setup>
import { Head,Link } from '@inertiajs/vue3';
import Footer from '@/Components/Footer.vue';
import { ref } from 'vue';
import NavBar2 from '@/Components/NavBar2.vue';

import Knob from 'primevue/knob';
import Button from 'primevue/button';
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
                class="text-black  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="  p-2  md:font-extrabold text-sm ">Contact Us</Button></Link
            >
            <Link
                :href="route('login')"
                class="font-semibold  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2 p-2 text-sm  border-red-600 text-red-600 md:font-extrabold">Employee Login </Button></Link
            >
          
    
        </template>

    </div>

    </div>
  </div>
      </NavBar2>
<div class="w-full md:mt-20 tracking-wider	">

        <div class="100svh  bg-tint-primary md:flex justify-evenly md:p-10  w-full">
          <section class="md:pb-5 md:w-2/6">
<img class="h-full object-cover" src="../../../../public/images/coal.webp" data-aos="fade" data-aos-duration="3000">
          </section>

            <section class=" font-medium text-sm md:text-medium  flex justify-center md:p-5">
              <div class="p-5 py-10 md:p-10 border-t-2 md:border-2   border-red-500 hover:border-red-800 rounded ">
                Quality Services and Solutions Pvt. Ltd. is a leading Indian Inspection, Testing and Certification Group with an operational network in more than 18 cities across India and an associated network in 11 countries within the Asian Continent.<br/><br/>

Established in the year 1999, our Company has already set up a comprehensive, meticulous and efficient services and systems network in various sectors such as Agriculture, Engineering, Minerals and Metals - both locally and on an international scale. More than 450 highly trained, dedicated and specialized workforce support us in all our endeavors across the country. QSSPL presence in the global arena is ensured through our International Association.<br/><br/>

QSSPL offer services that are Unique, Professional and Objective. We at QSSPL do not manufacture, buy or sell (trade) or have any financial interest in any transaction thereby working extremely professionally and independently to ensure minimal risks to customers proactively.<br/><br/>

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
            <section class="py-10 md:py-5 w-2/6 hidden md:block">
              <img class="h-full object-cover"   src="../../../images/coal.png" data-aos="fade" data-aos-duration="3000">
            </section>
            </div>
            <div class="">

            
            <p  class=" p-10 md:p-20 h-3/6  font-bold md:flex  items-center">
                
                <span class="text-center"><Knob  value-color="darkred" range-color="lightgray" :size= "300" class="w-1/6 " v-model="value" :step="10" readonly /></span>
                <span class="w-5/6 px-5">
                  <h1 class="text-4xl md:text-7xl font-extrabold" data-aos="fade-up" data-aos-duration="1500">
                     Years of Experience of Delivering Quality & Third Party Inspections
                  </h1>
                  
                </span> 
            </p>
            </div>
            <div  class=" bg-tint-primary h-5/6 p-10 md:p-20   font-bold md:flex  items-center">
                
                <span><Knob  value-color="darkred" range-color="white" :size= "300" class="w-1/6 " v-model="value2" :step="10" readonly/></span>
                <span class="w-5/6 px-10" >
                  <h1 class="text-4xl  md:text-7xl font-extrabold" data-aos="fade-up" data-aos-duration="1500">
                     Years of Experience in Coal Quality Sampling and Analysis    
                  </h1>
                      
                       </span> 
                      </div>
                      <div class="md:p-20">
            <div class="flex text-center">
              <div data-aos="slide-right" data-aos-duration="1500"class=" w-1/2 m-3  bg-gray-100 font-bold md:flex pb-3 md:pb-0 items-center">
                <div class="md:w-2/5"><img src="../../../images/employees.png" ></div>
                <div class="md:w-3/5 p-3 md:text-xl ">
                  1000+ Employees      
                </div> 
              </div>
              <div data-aos="slide-left" data-aos-duration="1500" class=" w-1/2 m-3  bg-gray-100 font-bold md:flex pb-3 md:pb-0 items-center">
                <div class="md:w-1/3"><img src="../../../images/testing.png" ></div>
                <div class="md:w-2/3 p-3 md:text-xl">
                  Coal Sampling & Testing     
                </div> 
              </div>
        
            </div>
            <div class="flex text-center">
              <div data-aos="slide-right" data-aos-duration="1500" class=" w-1/2 m-3  bg-gray-100 font-bold md:flex  md:pb-0 items-center">
                <div class="md:w-2/5"><img src="../../../images/certified.png" ></div>
                <div class="md:w-3/5 p-3 md:text-xl">
                  NABL, NABCB,ISO 9001:2015    
                </div> 
              </div>
              <div data-aos="slide-left" data-aos-duration="1500" class=" w-1/2 m-3  bg-gray-100 font-bold md:flex pb-3 md:pb-0 items-center">
                <div class="md:w-1/3"><img src="../../../images/hydrocarbon.png" ></div>
                <div class="md:w-2/3 p-3 md:text-xl">
                  Hydrocarbon Safety Audits    
                </div> 
              </div>
            </div>
            <div class="flex text-center">
              <div data-aos="slide-right" data-aos-duration="1500" class=" w-1/2 m-3  bg-gray-100 font-bold md:flex pb-3 md:pb-0 items-center">
                <div class="md:w-2/5"><img src="../../../images/office.png" ></div>
                <div class="md:w-3/5 p-3 md:text-xl">
                  5 Offices across India    
                </div> 
              </div>
              <div data-aos="slide-left" data-aos-duration="1500" class=" w-1/2 m-3  bg-gray-100 font-bold md:flex pb-3 md:pb-0 items-center">
                <div class="md:w-2/5"><img src="../../../images/engineer.png" ></div>
                <div class="md:w-3/5 p-3 md:text-xl">
                  Engineering Equipments Inspection   
                </div> 
              </div>
            </div>








          </div>
</div>
      <Footer/>  
</template>

