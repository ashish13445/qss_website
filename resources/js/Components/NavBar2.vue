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

<nav class="fixed top-0 w-full z-30 shadow-md bg-white dark:bg-black dark:text-white transition-all">
  <div class="mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      
      <!-- Left Logo -->
      <div class="flex-shrink-0 flex items-center">
        <ApplicationLogo />
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center ml-10 space-x-6">
        <NavLink :href="route('home')" :active="route().current('home')" class="text-black dark:text-white hover:text-gray-700 p-2 text-base !font-bold">
          <i class="material-icons text-blue-300">home</i>
        </NavLink>

        <!-- About QSS Dropdown -->
        <div class="relative group">
          <div class="cursor-pointer dark:text-white hover:text-gray-700 p-2 text-base font-bold">ABOUT QSS</div>
          <div class="absolute hidden group-hover:block left-0 w-64 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <ul class="py-2 text-gray-800 dark:text-gray-200 text-sm">
              <li><Link :href="route('about')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">ABOUT US</Link></li>
              <li><Link :href="route('management')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">OUR TEAM</Link></li>
              <li><Link :href="route('mission')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">OUR MISSION</Link></li>
            </ul>
          </div>
        </div>

        <!-- Sectors Dropdown -->
        <div class="relative group ">
          <div class="cursor-pointer dark:text-white hover:text-gray-700 p-2 text-base font-bold">SECTORS</div>
          <div class="absolute hidden group-hover:block left-0  w-64 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <ul class="py-2 text-gray-800 dark:text-gray-200 text-sm">
              <li><Link :href="route('consumer-goods')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">CONSUMER GOODS</Link></li>
              <li><Link :href="route('agriculture')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">AGRICULTURE PRODUCTS</Link></li>
              <li><Link :href="route('engineering')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">ENGINEERING</Link></li>
              <li><Link :href="route('hydrocarbons')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">HYDROCARBONS</Link></li>
              <li><Link :href="route('laboratories')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">LABORATORIES</Link></li>
              <li><Link :href="route('minerals')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">METALS, MINERALS & ORES</Link></li>
            </ul>
          </div>
        </div>
        <div>
          
        </div>
        <NavLink :href="route('certificates')" :active="route().current('certificates')" class="text-black dark:text-white hover:text-gray-700  text-base !font-bold">CERTIFICATES</NavLink>
        <NavLink :href="route('locations')" :active="route().current('locations')" class="text-black dark:text-white hover:text-gray-700  text-base !font-bold">LOCATIONS</NavLink>
        <NavLink :href="route('contact')" :active="route().current('contact')" class="text-black dark:text-white hover:text-gray-700  text-base !font-bold">CONTACT</NavLink>
      </div>

      <!-- Right Slot -->
      <div class="hidden md:flex items-center ml-auto">
        <slot />
      </div>

      <!-- Mobile Menu Button -->
      <div class="md:hidden">
        <button @click="toggleMobileMenu" type="button" class="inline-flex items-center justify-center w-10 h-10 text-black dark:text-white focus:outline-none">
          <svg v-if="!isMobileMenuOpen" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
          <svg v-else class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <transition name="fade">
    <div v-if="isMobileMenuOpen" class="md:hidden px-4 pt-2 pb-4 space-y-2 bg-white dark:bg-gray-800 shadow-lg rounded-b-lg">
      <Link :href="route('home')" class="block py-2">Home</Link>
      <Link :href="route('about')" class="block py-2">About Us</Link>
      <Link :href="route('sector')" class="block py-2">Our Sectors</Link>
      <Link :href="route('background')" class="block py-2">Our Background</Link>
      <Link :href="route('certificates')" class="block py-2">Certificates</Link>
      <Link :href="route('contact')" class="block py-2">Contact</Link>
      <div class="font-bold"><slot /></div>
    </div>
  </transition>
</nav>

</template>

