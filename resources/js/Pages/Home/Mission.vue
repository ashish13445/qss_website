<script setup>
import { Head,Link } from '@inertiajs/vue3';
import Button from 'primevue/button';
import Footer from '@/Components/Footer.vue';
import NavBar2 from '@/Components/NavBar2.vue';

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
    <Head title="Mission" />
    <div class="bg-tint-primary h-content">
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

    
    </div>
    
    <div class=" flex items-center mt-10 bg-gray-200">
        <div class="w-1/3  pl-5 md:pl-20  flex items-center justify-between text-sm md:text-xl font-medium bg-red-700 my-10  text-white rounded-r-full" data-aos="fade-right" data-aos-duration="2000">
            <h1 class="py-10 md:text-4xl">OUR  PURPOSE</h1>
            <img class="rounded-full w-60 hidden  md:block" src="../../../images/purpose.png">
            </div>
            <div class="w-2/3 p-5 md:p-20  text-sm md:text-xl font-medium text-red-900" data-aos="fade-right" data-aos-duration="2000">
                Assuring Quality: Enhancing Reliability
                        </div>
    </div>
    <div class=" flex items-center bg-gray-200">
        <div class="w-1/3  pl-5 md:pl-20  flex items-center justify-between  text-sm md:text-xl font-medium bg-red-700 my-10  text-white rounded-r-full" data-aos="fade-right" data-aos-duration="3000">
            <h1 class="py-10 md:text-4xl">OUR  MISSION</h1>
            <img class="rounded-full w-60 hidden  md:block" src="../../../images/mission.png">
            </div>
            <div class="w-2/3 p-5 md:p-20   text-sm md:text-xl font-medium text-red-900" data-aos="fade-right" data-aos-duration="3000">
                To provide professional & customer-focused testing and inspection services. Enhancing reliability & trustworthiness for our clients pan industry worldwide.
            </div>
    </div>
    <div class=" flex items-center bg-gray-200">
        <div class="w-1/3  pl-5 md:pl-20  flex items-center justify-between  text-sm md:text-xl font-medium bg-red-700 my-10  text-white rounded-r-full" data-aos="fade-right" data-aos-duration="3000">
            <h1 class="py-10 md:text-4xl">OUR  VISION</h1>
            <img class="rounded-full w-60 hidden  md:block" src="../../../images/vision.png">

            </div>
            <div class="w-2/3 p-5 md:p-20  text-sm md:text-xl font-medium text-red-900" data-aos="fade-right" data-aos-duration="3000">
                To be the most trusted testing and inspection agency setting benchmarks for excellence and customer satisfaction for the sustainable growth of clients, stakeholders and QSSPL. 
            </div>
    </div>

        
             <Footer/>
</template>

