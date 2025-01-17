<template>
    <div class=" md:flex justify-between   text-gray-700 h-68  px-2 py-5 bg-gray-100 dark:bg-gray-400  md:px-20 ">
        <div class="flex flex-col items-center md:w-1/3 justify-center">
            <ApplicationLogo class="pl-5 text-center" />
            <p class="md:w-80 text-center text-xs md:text-lg p-5">
                Flat-8, Wing-A, 3rd Floor, Moiz Apartment, 12th Tps Road, Santacruz (East), Mumbai 400 055, Maharashtra, India
            </p>
        </div>
        <div class="flex justify-evenly md:w-2/3">

        <div class="">
            <h1 class="text-md md:text-lg    text-gray-700 pb-3">Useful Links</h1>
            <p class="border-2 border-red-600 w-1/2 mb-3"></p>
            <ul>
                <li class="text-sm  py-1  hover:text-red-600"><Link :href="route('about')">About Us</Link></li>
                <li class="text-sm  py-1 hover:text-red-600"><Link :href="route('management')">Management</Link></li>
                <li class="text-sm  py-1 hover:text-red-600"><Link :href="route('contact')">Contact Us</Link></li>
                <li class="text-sm  py-1 hover:text-red-600"><Link :href="route('career')">Career</Link></li>

            </ul>
        </div>
        <div class="">
            <h1 class="text-md md:text-lg  text-gray-700  pb-3">Follow Us</h1>
            <p class="border-2 border-red-600 w-1/2 mb-3"></p>
            <ul>
                <li><a href="https://www.linkedin.com/company/quality-services-&-solutions-qss-/mycompany/"><i class="pi pi-linkedin md:text-4xl"></i></a></li>
            </ul>

        </div>
    </div>

    </div>
    <div class=" flex justify-center w-full p-1 md:px-40   bg-gray-200 dark:bg-black dark:text-white">
        <div class="text-center">Copyright &copy 2024</div>
        
    </div>
</template>
<script setup>
import ApplicationLogo from './ApplicationLogo.vue';
import { Head,Link } from '@inertiajs/vue3';

</script>