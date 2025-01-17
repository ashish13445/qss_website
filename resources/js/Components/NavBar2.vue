<script setup>
import {  Link } from '@inertiajs/vue3';


import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import NavLink from '@/Components/NavLink.vue';
import { ref } from 'vue';

  const isMobileMenuOpen = ref(false);

  const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
  };

</script>
<template>

<nav class=" md:fixed  md:z-10 md:top-0 md:w-full subpixel-antialiased tracking-wide	">
  <div class="mx-auto  pt-4 px-2 sm:px-6 lg:px-8 bg-white dark:bg-black dark:text-white" >
    <div class="relative md:flex h-12 md:h-16 md:items-center justify-between border-b-2 md:border-0 ">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <!--  -->
      </div>
      <div class="flex flex-1 items-center justify-center  sm:justify-start">
        <div class="hidden md:flex flex-shrink-0 items-center">
            <ApplicationLogo/>
        </div>
        <div class="hidden sm:ml-6 md:block h-full w-full">
          <div class="flex  justify-between items-center h-full">
            <div class="flex space-x-4">
                <NavLink :href="route('home')" :active="route().current('home')" class=" text-black dark:text-white hover:text-gray-700  p-3 xl:px-7 text-base font-bol" ><i class="material-icons text-blue-300">home</i></NavLink>
            <NavLink :href="route('about')" :active="route().current('about')" class="text-black dark:text-white  hover:text-gray-700  p-3  xl:px-7 text-base font-bol">ABOUT US</NavLink>
            <NavLink :href="route('sector')" :active="route().current('sector')" class="text-black dark:text-white  hover:text-gray-700  p-3 xl:px-7 text-base font-bol">OUR SECTORS</NavLink>
            <NavLink :href="route('background')" :active="route().current('background')" class="  text-black dark:text-white  hover:text-gray-700  p-3 xl:px-7 text-base font-bol">OUR BACKGROUND</NavLink>
            <NavLink :href="route('certificates')" :active="route().current('certficates')" class="  text-black dark:text-white  hover:text-gray-700  p-3 xl:px-7 text-base font-bol">CERTIFICATES</NavLink>
            
        </div>
                
            <div>
                <slot/>
            </div>
            
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
           </div>
        </div>
      </div>
      <div class="md:hidden">
      <div class="flex justify-between items-center h-10 px-4 sm:px-6 lg:px-8 bg-white dark:bg-black">
        <!-- Logo -->
        <div class="flex-shrink-0">
          <ApplicationLogo />
        </div>
        <!-- Mobile Menu Button -->
        <button @click="toggleMobileMenu" type="button" class="inline-flex justify-center items-center w-10 h-10 text-black dark:text-white hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
          <!-- Icon -->
          <svg v-if="!isMobileMenuOpen" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
          <svg v-else class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <!-- Mobile Menu -->
      <transition name="slide-fade">
        <div v-if="isMobileMenuOpen" class="flex justify-end ">
          <div class="px-2 py-3 relative top-5 z-50 bg-white dark:bg-gray-800 flex flex-col w-1/2 ">
            <!-- Nav Links -->
            <Link class="py-2 mx-5 focus:text-red-600 " :href="route('home')" :active="route().current('home')"><i class="material-icons text-red-600">home</i></Link>
            <Link class="py-2 mx-5 focus:text-red-600 " :href="route('about')" :active="route().current('about')">ABOUT US</Link>
            <Link class="py-2 mx-5 focus:text-red-600 " :href="route('sector')" :active="route().current('sector')">OUR SECTORS</Link>
            <Link class="py-2 mx-5 focus:text-red-600 " :href="route('background')" :active="route().current('background')">OUR BACKGROUND</Link>
            <Link class="py-2 mx-5 focus:text-red-600 " :href="route('certificates')" :active="route().current('certificates')">CERTIFICATES</Link>
            <div class="font-bold px-1"><slot/></div>
          </div>
        </div>
      </transition>
    </div>
    </div>
    </div>
</nav>
</template>

