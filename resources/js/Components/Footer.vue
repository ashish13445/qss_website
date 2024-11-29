<template>
    <div class=" flex justify-between bg-tint-primary md:border-t-4 border-purple-400 text-gray-700 h-68  px-2 py-5 md:p-5 md:px-20 ">
        <div class="flex flex-col items-center  justify-center">
            <ApplicationLogo class=" md:pl-5" />

        </div>
        <div >
            <h1 class="text-md  md:text-3xl font-bold text-gray-700 pb-3">Useful Links</h1>
            <p class="border-2 border-red-600 w-1/2 mb-3"></p>
            <ul>
                <li class="text-sm md:text-xl py-1  hover:text-red-600"><Link :href="route('about')">About Us</Link></li>
                <li class="text-sm md:text-xl py-1 hover:text-red-600"><Link :href="route('management')">Management</Link></li>
                <li class="text-sm md:text-xl py-1 hover:text-red-600"><Link :href="route('contact')">Contact Us</Link></li>
                <li class="text-sm md:text-xl py-1 hover:text-red-600"><Link :href="route('career')">Career</Link></li>

            </ul>
        </div>
        <div class="">
            <h1 class="text-md md:text-3xl font-bold text-gray-700  pb-3">Follow Us</h1>
            <p class="border-2 border-red-600 w-1/2 mb-3"></p>
            <ul>
                <li><a href="https://www.linkedin.com/company/quality-services-&-solutions-qss-/mycompany/"><i class="pi pi-linkedin md:text-4xl"></i></a></li>
            </ul>

        </div>
    </div>
    <div class=" flex justify-center w-full p-5 md:px-40 bg-purple-400 text-xl text-gray-200 font-extrabold">
        <div class="md:px-40">Copyright &copy 2024</div>
        
    </div>
</template>
<script setup>
import ApplicationLogo from './ApplicationLogo.vue';
import { Head,Link } from '@inertiajs/vue3';

</script>