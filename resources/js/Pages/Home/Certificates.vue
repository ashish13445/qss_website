<script setup>
import { Head,Link } from '@inertiajs/vue3';
import NavBar2 from '@/Components/NavBar2.vue';

import Button from 'primevue/button';
import Image from 'primevue/image';
import Footer from '@/Components/Footer.vue';
import PdfPreview from '@/Components/PdfPreview.vue';
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

const certificates = [
  { name: "NABL MP", url: "/images/certificates/NABL-MP.pdf", image: "/images/certificates/nabl-new.png" },
  { name: "NABL Maharashtra", url: "/images/certificates/NABL-MAHARASHTRA.pdf", image: "/images/certificates/nabl-new.png" },
  { name: "QAI Chhattisgarh", url: "/images/certificates/QAI-CHHATISGARH.pdf", image: "/images/certificates/QAI.png" },
  { name: "QAI Jharkhand", url: "/images/certificates/QAI-JHARKHAND.pdf", image: "/images/certificates/QAI.png" },
  { name: "IBP Assam", url: "/images/certificates/IBP-ASSAM.pdf", image: "/images/certificates/IBP.png" },
  { name: "UDYAM Registration", url: "/images/certificates/UDYAM-REGISTRATION.pdf", image: "/images/certificates/Udyam.png" },
]
</script>

<template >
<Head>
    <title>{{ metaTitle }}</title>
    <meta name="description" :content="metaDescription">
  </Head>    
      <NavBar2 class="">
        <div class="flex items-center">
    <DarkModeToggle/>
    <div class="">
        <div v-if="canLogin" class="p-2">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="text-black  hover:text-gray-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            ><Button class="border-2 md:p-4 p-2 text-sm border-red-600 text-red-600 ">Dashboard</Button></Link
        >

        <template v-else>
            
            <Link
                :href="route('login')"
                class="font-semibold  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2 p-2 rounded-full text-sm  border-red-600 md:font-extrabold text-red-600 ">Employee Login </Button></Link
            >
          
    
        </template>

    </div>

    </div>
  </div>
      </NavBar2>
      <div class=" dark:bg-black h-content md:mt-12">
        <h1 class="text-2xl md:text-5xl font-extrabold flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400  ">CERTIFICATES</h1>

      <div class="p-5 md:p-10 grid grid-cols-2 md:grid-cols-4 gap-6">
  <div v-for="(cert, index) in certificates" :key="index" 
       class="bg-white dark:bg-gray-900 rounded-xl shadow-md hover:shadow-xl transition p-4 flex flex-col items-center">
    
    <!-- Certificate Thumbnail -->
    <img :src="cert.image" alt="cert.pdf" class="h-32 object-contain mb-3" />
    
    <!-- Title -->
    <h2 class="text-center font-semibold text-sm md:text-base mb-2">{{ cert.name }}</h2>

    <!-- Action -->
    <a :href="cert.url" target="_blank">
      <Button class="bg-red-600 hover:bg-red-700 text-white text-xs md:text-sm rounded-full px-4 py-2">
        View Certificate
      </Button>
    </a>
  </div>
</div>

    </div>
        
 <Footer/>
</template>

