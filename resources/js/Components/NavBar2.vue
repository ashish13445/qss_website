<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { Link } from '@inertiajs/vue3';

import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import NavLink from '@/Components/NavLink.vue';

const isMobileMenuOpen = ref(false);
const isHovered = ref(false);
const activeSubMenu = ref(null);
const isAboutHovered = ref(false);

const isSectorHovered = ref(false);
// Show the specific submenu when hovered
const showSubMenu = (service) => {
  activeSubMenu.value = service;
};

// Hide the submenu when mouse leaves
const hideSubMenu = (service) => {
  if (activeSubMenu.value === service) {
    activeSubMenu.value = null;
  }
};
const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

// Close mobile menu on click outside
const closeMobileMenu = (event) => {
  const menu = document.querySelector('.mobile-menu');
  const button = document.querySelector('.menu-button');
  if (

    isMobileMenuOpen.value &&
    menu &&
    !menu.contains(event.target) &&
    !button.contains(event.target)
  ) {
    isMobileMenuOpen.value = false;
  console.log('clicked');

  }
};

onMounted(() => {
  document.addEventListener('click', closeMobileMenu);
});

onBeforeUnmount(() => {
  document.removeEventListener('click', closeMobileMenu);
});
</script>


<template>

<nav class="md:fixed   md:z-30 top-0 md:w-full  	">
  <div class="mx-auto  px-2 sm:px-6 lg:px-8 bg-white  dark:bg-black   dark:text-white" >
    <div class="relative md:flex h-16 md:h-20  md:items-center justify-between border-b-2 md:border-0 ">
      
      <div class="flex flex-1 items-center justify-center  sm:justify-start">
        <div class="hidden md:flex flex-shrink-0 items-center">
            <ApplicationLogo/>
        </div>
        <div class="hidden  md:block h-full w-full">
          <div class="flex  justify-between items-center h-full">
            <div class="flex ">
                <NavLink :href="route('home')" :active="route().current('home')" class=" text-black dark:text-white hover:text-gray-700  p-3 xl:px-7 text-base " ><i class="material-icons text-blue-300">home</i></NavLink>
           
                  <!-- <NavLink :href="route('about')" :active="route().current('about')" class="text-black dark:text-white  hover:text-gray-700  p-3  xl:px-7 text-base ">ABOUT US</NavLink> -->
                  <div 
    class="relative" 
    @mouseenter="isAboutHovered = true" 
    @mouseleave="isAboutHovered = false">
    
    <div
      class=" dark:text-white hover:text-gray-700 p-3 xl:px-7 text-base mb-2">
      About QSS
</div>
                  <div 
      v-if="isAboutHovered" 
      class="absolute left-0 w-64 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
      <ul class="py-2 md:text-sm text-gray-800 dark:text-gray-200">
        <li>
          <Link :href="route('about')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">About Us </Link>
        </li>
        <li>
          <Link :href="route('management')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">Our Team </Link>
        </li>
        <li>
          <Link :href="route('mission')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">Our Mission ,Vision & Purpose</Link>
        </li>
        <li>
        </li>
</ul>
</div>
</div>
            <!-- <div 
    class="relative" 
    @mouseenter="isHovered = true" 
    @mouseleave="isHovered = false">
    
    <div
 
      class="text-black dark:text-white  hover:text-gray-700  p-3  xl:px-7 text-base ">
      SERVICES
            </div> -->

    <!-- Main submenu (for Services) -->
    <!-- <div 
      v-if="isHovered" 
      class="absolute left-0 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-lg ">
      <ul class="py-2 md:text-sm text-gray-800 dark:text-gray-200">
         -->
        <!-- Service 1 with submenu -->
        <!-- <li class="relative" 
            @mouseenter="showSubMenu('service1')" 
            @mouseleave="hideSubMenu('service1')">
            <p  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">Inspection</p> -->

          <!-- <div 
            v-show="activeSubMenu === 'service1'"
            class="absolute top-0 left-full mt-0 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <ul class="py-2 text-gray-800 dark:text-gray-200">
              <li>
                <a href="/service1/sub1" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Sub-Service 1.1</a>
              </li>
              <li>
                <a href="/service1/sub2" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Sub-Service 1.2</a>
              </li>
            </ul>
          </div> -->
        <!-- </li> -->

        <!-- Service 2 with submenu -->
        <!-- <li class="relative" 
            @mouseenter="showSubMenu('service2')" 
            @mouseleave="hideSubMenu('service2')">
            <p class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">Testing </p> -->

          <!-- <div 
            v-show="activeSubMenu === 'service2'"
            class="absolute top-0 left-full mt-0 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <ul class="py-2 text-gray-800 dark:text-gray-200">
              <li>
                <a href="/service2/sub1" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Sub-Service 2.1</a>
              </li>
              <li>
                <a href="/service2/sub2" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Sub-Service 2.2</a>
              </li>
            </ul>
          </div> -->
        <!-- </li> -->

        <!-- Service 3 -->
        <!-- <li>
          <Link :href="route('certificates')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">Certification </Link>
        </li>
      </ul> -->
    <!-- </div> -->
  <!-- </div> -->

  <div 
    class="relative" 
    @mouseenter="isSectorHovered = true" 
    @mouseleave="isSectorHovered = false">
    
    <div
      class=" dark:text-white hover:text-gray-700 p-3 xl:px-7 text-base mb-2">
      SECTORS
</div>

    <!-- Main submenu for SECTORS -->
    <div 
      v-if="isSectorHovered" 
      class="absolute left-0 w-64 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
      <ul class="py-2 md:text-sm text-gray-800 dark:text-gray-200">
        <li>
          <Link :href="route('consumer-goods')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">Consumer Goods </Link>
        </li>
        <li>
          <Link :href="route('agriculture')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">Agriculture Products </Link>
        </li>
        <li>
          <Link :href="route('engineering')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">Engineering </Link>
        </li>
        <li>
          <Link :href="route('hydrocarbons')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">Hydrocarbons </Link>
        </li>
        <li>
          <Link :href="route('laboratories')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">Laboratories </Link>
        </li>
        <li>
          <Link :href="route('minerals')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center justify-between">Metals, Minerals and Ores </Link>
        </li>
      </ul>
    </div>
  </div>

 <!---- <NavLink :href="route('background')" :active="route().current('background')" class="  text-black dark:text-white  hover:text-gray-700  p-3 xl:px-7 text-base font-bol">OUR BACKGROUND</NavLink>-->
            <NavLink :href="route('certificates')" :active="route().current('certificates')" class="  text-black dark:text-white  hover:text-gray-700  p-3 xl:px-7 text-base font-bol">CERTIFICATES</NavLink>
            <NavLink :href="route('locations')" :active="route().current('locations')" class="  text-black dark:text-white  hover:text-gray-700  p-3 xl:px-7 text-base font-bol">LOCATIONS</NavLink>

        </div>
                
            <div>
                <slot/>
            </div>
            
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
           </div>
        </div>
      </div>
      <div class="md:hidden ">
      <div class="flex justify-between items-center pt-2 px-4 sm:px-6 lg:px-8 bg-white dark:bg-black">
        <!-- Logo -->
        <div class="flex-shrink-0  ">
          <ApplicationLogo />
        </div>
        <!-- Mobile Menu Button -->
        <button ref="menuButton" @click="toggleMobileMenu" type="button" class=" inline-flex justify-center items-center w-10 h-10 text-black dark:text-white hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
          <!-- Icon -->
          <svg v-if="!isMobileMenuOpen" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
          <svg v-else class="w-8 h-8 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <!-- Mobile Menu -->
      <transition name="fade">
        <div v-if="isMobileMenuOpen" class="flex justify-end ">
          <div class="mobile-menu  relative top-5 z-50 bg-white dark:bg-gray-800 rounded-lg flex flex-col w-1/2 " data-aos="fade-left"  data-aos-duration="5000">
            <!-- Nav Links -->
            <Link class=" px-2 py-2 focus:bg-orange-400  " :href="route('home')" :active="route().current('home')"><i class="material-icons text-red-600">home</i></Link>
            <Link class="focus:bg-orange-400 py-2 px-2" :href="route('about')" :active="route().current('about')">ABOUT US</Link>
            <Link class="focus:bg-orange-400 py-2 px-2" :href="route('sector')" :active="route().current('sector')">OUR SECTORS</Link>
            <Link class="focus:bg-orange-400 py-2 px-2" :href="route('background')" :active="route().current('background')">OUR BACKGROUND</Link>
            <Link class="focus:bg-orange-400 py-2 px-2" :href="route('certificates')" :active="route().current('certificates')">CERTIFICATES</Link>
            <div class="font-bold px-1"><slot/></div>
          </div>
        </div>
      </transition>
    </div>
    </div>
    </div>
</nav>
</template>

