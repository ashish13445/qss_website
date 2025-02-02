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

<template >
    <Head title="Sectors" />
    
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
      <div class="bg-tint-primary h-content  md:mt-0 tracking-wider	">
        <div class="bg-gradient-to-r from-white to-orange-300 dark:from-gray-900 dark:to-black dark:text-white min-h-screen">


    <div>
        <img src="../../../images/sectors.png" class="w-full" 
    </div>
    <h1 class="text-2xl md:text-5xl font-medium flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400 dark:text-black"><span class="font-extrabold pr-1">OUR </span>SECTORS</h1>

    <div class="px-5 md:px-20 flex  flex-col ">
        
        <Link
                :href="route('consumer-goods')"
                class="text-black bg-gray-100 rounded p-5 m-5 hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >
        Consumer Goods Service
        </Link>        
        <Link
                :href="route('agriculture')"
                class="text-black bg-gray-100 rounded p-5 m-5 hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >
        Agricultural Products Service
        </Link>  
        <Link
                :href="route('engineering')"
                class="text-black bg-gray-100 rounded p-5 m-5 hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >
        Engineering Services
        </Link>
        <Link
                :href="route('hydrocarbons')"
                class="text-black bg-gray-100 rounded p-5 m-5 hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >
        Hydrocarbon Services
        </Link>
        <Link
                :href="route('laboratories')"
                class="text-black bg-gray-100 rounded p-5 m-5 hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >
        Laboratories Services
        </Link>
        <Link
                :href="route('minerals')"
                class="text-black bg-gray-100 rounded p-5 m-5 hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >
        Metals, Minerals and Ores Services
        </Link>
        
    </div>
        
    
    </div>
</div>      
 <Footer/>
</template>

