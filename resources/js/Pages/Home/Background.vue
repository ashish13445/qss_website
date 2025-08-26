<script setup>
import { Head,Link } from '@inertiajs/vue3';
import NavBar2 from '@/Components/NavBar2.vue';

import Button from 'primevue/button';
import Footer from '@/Components/Footer.vue';
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
     metaTitle: String,
  metaDescription: String
});
</script>

<template >
<Head>
    <title>{{ metaTitle }}</title>
    <meta name="description" :content="metaDescription">
  </Head>    
        <NavBar2>
            <div class="flex align-items-center gap-2">
    <DarkModeToggle/>
    <div class="">

        <div v-if="canLogin" class="p-2">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="text-black md:text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            ><Button class="border-2 p-4 border-red-600 text-red-600 ">Dashboard</Button></Link
        >

        <template v-else>
            
            
            <Link
                :href="route('login')"
                class="font-semibold  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2  p-2 rounded-full text-sm border-red-600 md:font-extrabold text-red-600 ">Employee Login </Button></Link
            >

            

            
          
    
        </template>

    </div>

    </div>
  </div>

        </NavBar2>
        <div class="bg-tint-primary  md:mt-0">
      <!-- <nav-bar class="">
        <div class="flex align-items-center gap-2">
    
    <div class="">

        <div v-if="canLogin" class="p-2">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="text-black md:text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            ><Button class="border-2 p-4 border-red-600 text-red-600 ">Dashboard</Button></Link
        >

        <template v-else>
            <Link
                :href="route('contact')"
                class="text-black md:text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class=" md:p-4 p-2 text-sm md:font-extrabold  ">Contact Us</Button></Link
            >
            <Link
                :href="route('login')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2 md:p-4 p-2 text-sm border-red-600 md:font-extrabold text-red-600 ">Employee Login </Button></Link
            >
          
    
        </template>

    </div>

    </div>
  </div>
      </nav-bar> -->
      <div class="bg-white dark:bg-black dark:text-white font-medium ">
        <div>
            <img src="../../../images/background.png" class="w-full" data-aos="fade" data-aos-duration="3000" >
        </div>
        <h1 class="text-2xl md:text-5xl font-medium flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400 dark:text-black "><span class="font-extrabold pr-2">OUR</span>BACKGROUND</h1>

        <p class="px-10 md:px-20 py-10 text-xs md:text-sm">QSS has been established by like - minded, former Senior Executives, Directors and Professionals of one of the worlds leading multinational Inspection Company. This highly experienced core team with rich, multifaceted, local and international experience of several decades in various sectors, got together to create QSS with the sole intention of facilitating high quality international and local trade - creating confidence between sellers and buyers.<br/><br/>

Starting at Mumbai the Company today has grown to have offices& laboratories to support Mineral Divisions across India.<br/><br/>

Initially the Company started offering inspection, testing and certification services in the sectors namely Minerals & Ores, Engineering only.<br/><br/>

QSS has quickly become an established brand and diversified into a multitude of other sectors namely Hydrocarbons, Construction Materials, Water, Systems and Laboratories.<br/><br/>

<span class="text-red-600 font-bold">"Quality is our Business"</span></p>
      </div>
    
    </div>
        
 <Footer/>
</template>

