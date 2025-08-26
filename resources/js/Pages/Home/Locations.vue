<script setup>
import { Head,Link } from '@inertiajs/vue3';
import Button from 'primevue/button';
import Footer from '@/Components/Footer.vue';
import NavBar2 from '@/Components/NavBar2.vue';
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
</script>

<template >
<Head>
    <title>{{ metaTitle }}</title>
    <meta name="description" :content="metaDescription">
  </Head>    <NavBar2>
            <div class="flex align-items-center">
    <DarkModeToggle/>
    <div class="">

        <div v-if="canLogin" class="p-2">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="text-black md:text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            ><Button class="border-2 p-4 border-red-600 text-red-600 ">Dashboard</Button></Link
        >

        <template v-else>
            
            
            <Link
                :href="route('login')"
                class="font-semibold  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2  p-2 rounded-full text-sm border-red-600 md:font-extrabold text-red-600 ">Employee Login </Button></Link
            >

            

            
          
    
        </template>

    </div>

    </div>
  </div>

        </NavBar2>
    
    <div class="bg-white dark:bg-black dark:text-white font-medium ">
        
        <h1 class="text-2xl mt-12 md:text-5xl font-medium flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400 dark:text-black "><span class="font-extrabold pr-2">OUR</span>LOCATIONS</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 md:grid-rows-2 gap-4 p-5">
<div class="border-2 border-black rounded p-2">
<h2 class="text-xl font-bold">Mumbai - Office & Laboratory</h2>
<p>
Plot No. 70 & 71, 2nd Floor, Sector 19/A,
Near Fab Pranava Hotel, Vashi, Navi
Mumbai - 400705. (MH)
</p>
<p class="py-2 flex"><span ><i class="pi pi-phone text-2xl"></i></span> +91-22-27830016/17</p>
<p class="py-2 flex"><span ><i class="pi pi-envelope text-2xl"></i></span> agri.mumbai@qitservices.in</p>

</div>

<div class="border-2 border-black rounded p-2">
<h2 class="text-xl font-bold">Indore – Office & Laboratory</h2>
<p>
    202-205 Sapphire Twins, Scheme No. 54,
Opposite Malhar Mega Mall, A. B. Road,
Indore – 452010. (MP)
</p>
<p class="py-2 flex"><span ><i class="pi pi-phone text-2xl"></i></span> +91-731-4001048/49</p>
<p class="py-2 flex"><span ><i class="pi pi-envelope text-2xl"></i></span>vp.agri@qitservices.in</p>

</div>
            
<div class="border-2 border-black rounded p-2">
<h2 class="text-xl font-bold">Gandhidham – Admin-Office</h2>
<p>
    Plot No. 81, Sector 1/A, Near Hero Bike
Showroom, Gandhidham – Kutch – 370201.
(Guj.) 
</p>
<p class="py-2 flex"><span ><i class="pi pi-phone text-2xl"></i></span>+91-9099008293</p>
<p class="py-2 flex"><span ><i class="pi pi-envelope text-2xl"></i></span>agri.gujarat@qitservices.in</p>

</div>
<div class="border-2 border-black rounded p-2">
<h2 class="text-xl font-bold">Gandhidham – Laboratory</h2>
<p>
    Plot No. 11, Sector 10/C, GIDC, Kandla Port
Road, Near TTC Weighbridge, Gandhidham
– Kutch – 370201. (Guj.)

</p>
<p class="py-2 flex"><span ><i class="pi pi-phone text-2xl"></i></span>+91-9998989723</p>
<p class="py-2 flex"><span ><i class="pi pi-envelope text-2xl"></i></span>info.kandla@qitservices.in</p>

</div>
<div class="border-2 border-black rounded p-2">
<h2 class="text-xl font-bold">RAJKOT FIELD OFFICE</h2>
<p>
    Shivaastha Residency, Near Siddhivinayak Mandap,
B/h. ADB Hotel, Ronki, Rajkot – 360006. (Guj.) 


</p>
<p class="py-2 flex"><span ><i class="pi pi-phone text-2xl"></i></span>+91-9998989724</p>
<p class="py-2 flex"><span ><i class="pi pi-envelope text-2xl"></i></span>agri.gujarat@qitservices.in</p>

</div>
<div class="border-2 border-black rounded p-2">
<h2 class="text-xl font-bold">UNJHA FIELD OFFICE</h2>
<p>
    3rd Floor, Tirupati Complex, Opp. APMC Gate No. 8,
Unjha – 384170. (Guj.) 


</p>
<p class="py-2 flex"><span ><i class="pi pi-phone text-2xl"></i></span> +91-9723810755</p>
<p class="py-2 flex"><span ><i class="pi pi-envelope text-2xl"></i></span>agri.gujarat@qitservices.in</p>

</div>
<div class="border-2 border-black rounded p-2">
<h2 class="text-xl font-bold">MUNDRA FIELD OFFICE</h2>
<p>
    Office No. 10, Ground Floor, Milin Ashok Complex,
    GIDC, Dhrub, Mundra – Kutch – 370421. (Guj.)


</p>
<p class="py-2 flex"><span ><i class="pi pi-phone text-2xl"></i></span> +91-9727779966</p>
<p class="py-2 flex"><span ><i class="pi pi-envelope text-2xl"></i></span>Gujaratoperations@qitservices.in</p>

</div>
<div class="border-2 border-black rounded p-2">
<h2 class="text-xl font-bold">NAGPUR OFFICE</h2>
<p>
    Plot No. 238, 1st Floor, Ram Nagar, Nagpur
    – 440033. (MH)

</p>
<p class="py-2 flex"><span ><i class="pi pi-phone text-2xl"></i></span> +91-9503591117</p>
<p class="py-2 flex"><span ><i class="pi pi-envelope text-2xl"></i></span>agri.nagpur@qitservices.in</p>

</div>
<div class="border-2 border-black rounded p-2">
<h2 class="text-xl font-bold">VIZAG OFFICE</h2>
<p>
    D. No. 27-32-9/2, 2nd Floor, 75 ft. Road,
Near Hotel Dolphin, Visakhapatnam –
530001. (AP)
</p>
<p class="py-2 flex"><span ><i class="pi pi-phone text-2xl"></i></span> +91-9503591117</p>
<p class="py-2 flex"><span ><i class="pi pi-envelope text-2xl"></i></span>agri.nagpur@qitservices.in</p>

</div>
        </div>
    </div>
         <Footer/>
</template>

