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
     metaTitle: String,
  metaDescription: String
});
</script>

<template >
<Head>
    <title>{{ metaTitle }}</title>
    <meta name="description" :content="metaDescription">
  </Head>    <div class="bg-tint-primary h-content">
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
        <div class="p-20 md:py-36  text-sm md:text-xl font-medium">
            We are always looking for keen and motivated people at all stages of their careers to join our team. We would be happy to hear from you. Please either respond specifically to one of our job vacancies or mail your CV at <code>admin@qssindia.in</code> for future opportunities. </div>
 <Footer/>
</template>

