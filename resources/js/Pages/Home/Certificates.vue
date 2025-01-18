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
});
</script>

<template >
    <Head title="Certificates" />
    
      <NavBar2 class="">
        <div class="flex align-items-center gap-2">
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
                :href="route('contact')"
                class=" text-black dark:text-white hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
                ><Button class="  p-2 text-sm ">CONTACT US</Button></Link
            >
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
      <div class="bg-tint-primary dark:bg-black h-content md:mt-20">
        <h1 class="text-2xl md:text-5xl font-extrabold flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400  ">CERTIFICATES</h1>

      <div  class="p-5 md:p-10  grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade" data-aos-duration="3000">
<div class=""><PdfPreview pdfUrl="../../../images/certificates/NABCB.pdf" pdfImage="../../../images/certificates/NABCB.png" pdfName="NABCB" /></div>
<div class=""><PdfPreview pdfUrl="../../../images/certificates/PNGRB.pdf" pdfImage="../../../images/certificates/PNGRB.png" pdfName="PNGRB" /></div>
<div class=""><PdfPreview pdfUrl="../../../images/certificates/ISO_9001_mumbai.pdf" pdfImage="../../../images/certificates/ISO_9001_mumbai.png" pdfName="ISO 9001 Mumbai" /></div>
<div class=""><PdfPreview pdfUrl="../../../images/certificates/Udham_registration_QSSPL.pdf" pdfImage="../../../images/certificates/Udham_registration_QSSPL.png" pdfName="Udham Registration QSSPL" /></div>
<div class=""><PdfPreview pdfUrl="../../../images/certificates/MSME_qspl.pdf" pdfImage="../../../images/certificates/MSME_qspl.png" pdfName="MSME QSSPL" /></div>
<div class=""><PdfPreview pdfUrl="../../../images/certificates/NABL.pdf" pdfImage="../../../images/certificates/NABL.png" pdfName="NABL" /></div>

    </div>
    </div>
        
 <Footer/>
</template>

