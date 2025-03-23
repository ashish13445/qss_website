<script setup>
import {  Link } from '@inertiajs/vue3';
import Menubar from 'primevue/menubar';

import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import NavLink from '@/Components/NavLink.vue';
const items = [
  { label: 'About Us', to: 'about'},
  { label: 'Our Sectors' , to: 'sector'},
  { label: 'Our Services' , to: 'services'},
  { label: 'Our Team' , to: 'management'},
  { label: 'Certificates', to: 'certificates' },
  
  // { label: 'C', to: 'about' },


  // Add more items as needed
]

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
<style scoped>
.p-menubaritem:hover {
  background-color: tint-primary; 
  color: white; 
}

</style>
<template >

    <Menubar :model="items" class=" bg-white p-2 px-4 md:px-10" >
    <template #start>
      <Link :href="route('home')" :active="route().current('home')">
        <div class="flex flex-col justify-center">
                                    <ApplicationLogo
                                        class="block h-12 w-auto fill-current text-gray-800"
                                    />
                                    <!-- <p class="text-sm font-bold text-black">Quality Services & Solutions Pvt. Ltd. </p> -->
                                    
       
                                  </div>
                                </Link>
    </template>
    <template #item="{ item, props, hasSubmenu, root }">
      <a  class="flex align-items-center p-menubaritem " v-bind="props.action">
        <!-- <span :class="item.icon" /> -->
        <span class="ml-2 font-extrabold">
          <NavLink :href="item.to" class="flex" :active="route().current(item.to)">
         <h1 class="text-black font-bold">{{ item.label }}</h1> 
        </NavLink>
         </span>
        <span
          v-if="item.shortcut"
          class="ml-auto border-1 surface-border border-round surface-100 text-xs p-1"
        >{{ item.shortcut }}</span>
        <i
          v-if="hasSubmenu" class="focus:bg-red-300 " 
          :class="['pi pi-angle-down', { 'pi-angle-down ml-2': root, 'pi-angle-right ml-auto': !root }]"
        ></i>
      </a>
    </template>

    <template  #end >
      <slot/>
    </template>
  </Menubar>

</template>

