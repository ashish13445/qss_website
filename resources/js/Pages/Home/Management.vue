<script setup>
import { Head,Link } from '@inertiajs/vue3';
import Button from 'primevue/button';
import Footer from '@/Components/Footer.vue';
import NavBar2 from '@/Components/NavBar2.vue';
import DarkModeToggle from '@/Components/DarkModeToggle.vue';
import Divider from 'primevue/divider';


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
const data = [{name: 'Shashank Mehta',
                title: 'Director',
                label: 'test',
                image: 'coal.png'}]
</script>

<template >
    <Head title="Management" />
    
      <NavBar2>
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
                :href="route('contact')"
                class=" text-black  dark:text-white hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
                ><Button class="  p-2 text-sm ">CONTACT US</Button></Link
            >
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
      
      <div class="bg-white">
        <h1 class="text-2xl md:mt-12 md:text-5xl font-medium flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400 dark:text-black "><span class="font-extrabold pr-2">OUR</span>MANAGEMENT</h1>


        <!-- <div class="pt-10 px-10 md:px-20 grid grid-cols-2 md:grid-cols-4 gap-4   ">
<div class=" hidden md:block w-48">
   
  
</div>
    
<div class="bg-white rounded w-36 md:w-44 border-2 border-black">
    <img src="../../../images/team/shashank_mehta.png" class="w-44 h-auto rounded-t">
    <section class="p-1 md:p-2 flex flex-col items-center text-center">
        <h1 class="text-sm md:text-medium py-1 font-bold">Shashank Mehta</h1>
    <p class="">Director</p>
    </section>

</div>
<div class="bg-white rounded w-36 md:w-44 border-2 border-black">
    <img src="../../../images/team/aditi_mehta.png" class="w-44 h-auto rounded-t">
    <section class="p-1 md:p-2 flex flex-col items-center text-center">
        <h1 class="text-sm md:text-medium py-1 font-bold">Aditi Mehta</h1>
    <p class="">Managing Director</p>
    </section>

</div>
<div class=" w-48">
   
  
</div>

</div>
<div class="px-10 md:px-64 py-10 flex justify-center md:mr-40">
    
    <div class="bg-white rounded text-center w-30 md:w-44 border-2 border-black ">
    <img src="../../../images/team/nakul_gupta.png" class="w-44 h-auto rounded-t">
    <section class="p-1 md:p-2 flex flex-col items-center text-center">
        <h1 class="text-sm md:text-medium py-1 font-bold">Nakul Gupta</h1>
    <p class="text-sm">Chief Operating Officer</p>
    </section>

</div>
</div>

<div class="pt-10 px-10 md:px-20 md: mb-20 grid grid-cols-2 md:grid-cols-4 gap-4   ">
    <div class="hidden md:block w-48">
   
  
</div>
    
<div class="bg-white rounded w-30 md:w-44  border-2 border-black">
    <img src="../../../images/team/asmit_agrawal.png" class="w-44 h-auto rounded-t">
    <section class="p-1 md:p-2 flex flex-col items-center text-center">
        <h1 class="text-sm md:text-medium py-1 font-bold">Asmit Agrawal</h1>
    <p class="text-sm">Ass. General Manager (Finance & Admin)</p>
    </section>

</div>
<div class="bg-white rounded w-30 md:w-44  border-2 border-black">
    <img src="../../../images/team/kushagra.png" class="w-44 h-auto rounded-t">
    <section class="p-1 md:p-2 flex flex-col items-center text-center">
        <h1 class="text-sm md:text-medium py-1 font-bold">Kushagra Kathuria</h1>
    <p class="text-sm">Ass. General Manager (Operations)</p>
    </section>

</div>
</div> -->
<div style=" overflow: hidden" class="flex px-5 md:px-40 py-5">
        <div class=" px-4 w-1/5">
            <img alt="user header"  class=" h-auto w-auto " src="../../../images/team/padhye.png" />
        </div>
        <div class="w-4/5 text-xs md:text-lg">
            <h2 class="text-sm md:text-lg font-medium">Mr. Uday Padhye ( Director Technichal)</h2>
            <p class="my-4">
               <p class="py-2">
                He is qualified with M.Sc., M.B.A. degree & having 33 years of experience in the field of Third Party Inspection and Testing related services.
               </p> 
               <p class="py-2">
                He has worked with an MNC for 14 years and later on joined QSS Inspection And Testing Private Limited in 2003 as Branch Manager and now holds the position of MD/CEO.
               </p>
<p class="py-2">
    He leads a team of over 300+ staff with 6 laboratories and 9 offices/operation units spread over Pan-India.
</p>

He leads a top management team comprising of 1 VP and 2 AVPs who work hard to generate, develop and execute the business with Customer Service as the main focus.

He has worked extensively in the field of Agriculture produce and Food products inspection and testing. He has also vast experience in Mineral and fuels related inspection and testing.

He has a customer base of over 900 clients with a mix of local and International clients including Government and Private clients.
            </p>
        </div>
       
</div>
<Divider/>    
<div style=" overflow: hidden" class="flex px-5 md:px-40 py-5">
        <div class=" px-4 w-1/5">
            <img alt="user header"  class="h-auto w-auto md:filter brightness-125" src="../../../images/team/vivek.png" />
        </div>
        <div class="w-4/5 text-xs md:text-lg">
            <h2 class="text-sm md:text-lg font-medium">Mr. Vivek Sondhi
                (Director-Operations)</h2>
            <p class="my-4">
               <p class="py-2">
                30+ years experience in Inspection, Testing, Certification and Calibration Services
            </p> 
               


       </p>
        </div>
       
</div>
<Divider/>
<div style=" overflow: hidden" class="flex px-5 md:px-40 py-5">
        <div class=" px-4 w-1/5">
            <img alt="user header"  class=" h-auto w-auto filter brightness-125" src="../../../images/team/mridul.png" />
        </div>
        <div class="w-4/5 text-xs md:text-lg">
            <h2 class="text-sm md:text-lg font-medium">Mr. Mridul Kohli
                ( Director-Marketing )</h2>
            <p class="my-4">
               <p class="py-2">
                30+ years experience in Inspection, Testing, Certification and Calibration Services
            </p> 
               
      </p>
        </div>
       
</div>
<Divider/> 
<div style=" overflow: hidden" class="flex px-5 ms:px-40 py-5">
        <div class=" px-4 w-1/5">
            <img alt="user header"  class=" h-auto w-auto filter brightness-125" src="../../../images/team/nakul_gupta.png" />
        </div>
        <div class="w-4/5 text-sm md:text-lg">
            <h2 class="text-sm md:text-lgfont-medium">Mr. Nakul Gupta
                ( Executive Directive/CEO )</h2>
            <p class="my-4">
               <p class="py-2">
                9+ years experience in Managerial and Leadership roles for transformative growth
            </p> 
               
      </p>
        </div>
       
</div>
      </div>
    
        
 <Footer/>
</template>

