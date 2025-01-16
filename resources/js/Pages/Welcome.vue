<template>
  <Head title="Home"></Head>
    <NavBar2 class="">
  <div class="flex align-items-center gap-2">
    
    <div>
        <div v-if="canLogin" class="p-2">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="font-semibold  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
            ><Button class="border-2 p-4 border-orange-400 text-orange-400 ">Dashboard</Button></Link
        >

        <template v-else>
          <div class="">
            <Link
                :href="route('contact')"
                class=" text-black  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
                ><Button class="  p-2 text-sm ">CONTACT US</Button></Link
            >
    
            <Link
                :href="route('login')"
                class="  hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
                ><Button class="border-2  p-2 px-4 border-orange-400 rounded-full text-sm md:font-extrabold text-orange-400 ">Employee Login </Button></Link
            >
    
          </div>

        </template>

    </div>

    </div>
  </div>
    </NavBar2>
   <div class="card h-content xl:h-screen">
    <Galleria 
      :value="images" 
      :responsiveOptions="responsiveOptions" 
      :numVisible="2" 
      :circular="true" 
      :autoPlay="true"
      :transitionInterval="5000"
      :showItemNavigators="true"
      :showThumbnails="false"
    >
      <!-- Main Image Template -->
      <template #item="slotProps">
        <div class="relative w-full h-full">
          <img 
            :src="slotProps.item.itemImageSrc" 
            :alt="slotProps.item.alt" 
            class="w-full h-full max-h-screen object-cover filter brightness-75" 
          />
          
          <div 
            class="text-center absolute inset-0 flex flex-col items-center justify-center text-white   bg-black bg-opacity-25 px-5 md:px-40" data-aos="fade-up" data-aos-duration="1500"
          >
          <h1 class="text-2xl md:text-6xl font-black md:pb-5">QUALITY IS OUR BUSINESS</h1>
            <p class="text-sm md:text-2xl md:px-20">{{ slotProps.item.title }}</p>
            <div class="m-5">
              <Link
                :href="route('sector')"
                class="font-semibold  hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500 m-2"
                ><Button class="text-white px-6 md:px-10 py-3 bg-gradient-to-r from-orange-500 to-red-500 rounded-full border-orange-400 text-sm border-2 hover:border-orange-400 hover:bg-transparent">SERVICES </Button></Link
            >
            <Link
                :href="route('contact')"
                class="font-semibold  hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500 m-2"
                ><Button class="border-2 hover:text-white px-5 md:px-8 py-3 border-orange-400 hover:bg-gradient-to-r from-orange-500 to-red-500 rounded-full text-sm text-orange-400 ">CONTACT US </Button></Link
            >
            </div>
            
          </div>
          
        </div>
      </template>
    </Galleria>
    </div>
    <!-- certificates -->
  <!-- <div class="h-content  md:mb-10 pt-3">
    <Carousel :value="certificates" :numVisible="4" :numScroll="1"  circular :autoplayInterval="5000">
    <template #item="slotProps">
        <div class="   rounded-md m-2 p-3 flex justify-center">
                    <img :src="`../../images/certificates/${slotProps.data.image}`"  class="w-16 h-16 md:w-40 md:h-40 rounded-md" />   
        </div>
    </template>
</Carousel>
  </div> -->
  <div class="h-content xl:h-screen md:px-20 md:py-10">
      <h1 class="text-black text-center  font-medium text-2xl md:text-5xl p-5 px-5  md:mb-20" > <span class="font-extrabold">OUR</span> SECTORS</h1>
      
   
    <div class='grid grid-rows-2 xl:grid-rows-1 grid-flow-col gap-3 xl:gap-28 tracking-wide p-5' >
  

    <div class='h-72 sm:h-96 relative  flex flex-col items-center border-4 border-orange-500 hover:bg-gradient-to-r from-orange-500 to-red-500 rounded-3xl hover:text-white'>
            <img class='absolute w-40 md:w-60 -top-16 md:-top-28  ' src="/images/consumer-goods.png" width={200} height={200} alt="consulting"/>
            <h2 class='text-md md:text-xl font-extrabold pt-14 md:pt-20 px-5 text-center'>Consumer Goods</h2>
            <p class='px-5 pt-2 text-xs md:text-sm text-ellipsis overflow-hidden whitespace-pre-wrap  w-42 mb-2'>
              QSS offers a range of services across 2 broad categories of Consumer Goods namely,<br/>
1. Consumer Non Durables - Fast Moving Consumer Goods (FMCG) <br/>
2. Soft Goods
Our Consumer Non Durables team has the expertise to provide quality and quantity services for Edible Items (perishable items such as frozen fruits & vegetables, meat, sea food & processed food items) and Water.            </p>
        </div>
        <div class='mt-5 md:mt-0 h-72 sm:h-96 relative  flex flex-col items-center border-4 border-orange-500 hover:bg-gradient-to-r from-orange-500 to-red-500 rounded-3xl  hover:text-white'>
          <img class='absolute w-32 md:w-60 -top-16 md:-top-36 mr-5' src="/images/agriculture-products.png" width={200} height={200} alt="marketing"/>
            <h2 class='text-md md:text-xl font-extrabold pt-14 md:pt-20  px-5 text-center'>Agriculture Produce & Products</h2>
            <p class='px-5 md:px-10 pt-2 text-xs md:text-sm text-ellipsis overflow-hidden whitespace-pre-wrap  w-42 mb-2'>
              QSS provides a range of services including procurement supervision, weight control,
               systematic sampling, process monitoring, laboratory services,
                commissioning supervision, material balancing, various surveys (insurance, draught, break bulk),
                 cleanliness inspection, loading/discharge supervision, photographic evidence, 
                 damage surveys, plant monitoring, warehouse management, and quality management auditing. 
            </p>
        </div>
        
        <div class='h-72  sm:h-96 relative  flex flex-col items-center border-4 border-orange-500 hover:bg-gradient-to-r from-orange-500 to-red-500 rounded-3xl  hover:text-white'>
          <img class='absolute w-32 md:w-60 -top-16 md:-top-32 ' src="/images/engineer.png" width={200} height={200} alt="staffing"/>
            <h2 class='text-md md:text-xl font-extrabold pt-14 md:pt-20  px-5 text-center'>Engineering </h2>
            <p class='px-5 md:px-10 pt-2 text-xs md:text-sm text-ellipsis overflow-hidden whitespace-pre-wrap  w-42 mb-1'>
              Our Engineering Division Services cover all types of inspection activities in various sectors namely General Engineering Industry,
               Telecom Industry, Foundries, Power & Energy Sector, Electrical and Electronic Industries, Generation,
                Transmission and Distribution,
               Cement Industry, Automobile Industry, Material Handling equipments, Oil & Gas Sector, etc.</p>
        </div>
        
        
    </div>
    
    
    <div class="flex justify-center md:py-10">
      <Link
                :href="route('sector')"
                class="  hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500 m-2"
                ><Button class="px-5 py-3  md:px-10 md:py-5 bg-gradient-to-r from-orange-500 to-red-500 rounded-full border-orange-400 text-medium border-2 hover:border-orange-400 hover:bg-transparent">Check out more </Button></Link
            >    </div>

    </div>
    <div class="relative h-content xl:h-screen p-2 my-10 border-2 rounded-lg">
  <!-- Background Image -->
  <img src="/images/coal_in_bag.jpg" 
       class="absolute inset-0 w-full h-full opacity-30 object-cover rounded-lg" 
       alt="Coal in Bag Background">
      <h1 class="text-black text-center  font-medium text-2xl md:text-5xl p-5 md:p-10  opacity-90" > <span class="font-extrabold">ABOUT</span> US</h1>
      <p class="tracking-wide font-medium text-sm md:text-xl  text-center relative md:px-40">
        Quality Services and Solutions Pvt. Ltd. is a leading Indian Inspection, Testing and Certification Group with an operational network in more than 18 cities across India and an associated network in 11 countries within the Asian Continent.

Established in the year 1999, our Company has already set up a comprehensive, 
meticulous and efficient services and systems network in various sectors such as Agriculture,
 Engineering, Minerals and Metals - both locally and on an international scale. More than 450 highly trained,
  dedicated and specialized workforce support us in all our endeavors across the country.
   QSSPL presence in the global arena is ensured through our International Association.
      </p>
      <div class="flex justify-center relative">
        <div class="p-5 flex flex-col items-center">
          <img src="/images/25.png" class="w-40 h-40 md:w-60 md:h-60 ">
          <p class="text-lg w-48 text-center">Experience of Delivering Quality & Third Party Inspections</p>
        </div>
        <div class="p-5 flex flex-col items-center">
          <img src="/images/9.png" class="w-40 h-40 md:w-60 md:h-60 ">
          <p class="text-lg w-48 text-center">
            Experience in Coal Quality Sampling and Analysis
          </p>

        </div>

      </div>
    </div>

<div class="h-content  md:p-40 py-0">
  <h1 class="text-black text-center  font-medium text-2xl md:text-5xl  px-10  " > <span class="font-extrabold">OUR</span> CLIENTS</h1>
  <div class="md:py-10 ">
    <div  class="md:border-2 border-gray-300 p-5 grid md:grid-cols-4 grid-cols-3 gap-2 ">
      
  <div class="flex  justify-center" v-for="client in clients"><img class="md:opacity-80 hover:opacity-100 h-12 md:h-24 w-auto" :src="`../../images/clients/${client.image}`" ></div>
</div>
  </div>
</div>

<div class="h-content p-10 bg-gray-200">
  <h1 class="text-2xl md:text-5xl font-medium flex justify-center  md:p-10"><span class="font-extrabold pr-1">WHY </span> QSSPL ?</h1>

  <div class="md:flex">
    <Fieldset  class="border-2 my-5" >
    <template #legend>
        <div class="flex items-center gap-4 py-2 px-2 ">
           <span><i class="material-icons text-orange-400 text-4xl">devices</i></span>
            <span class="text-base md:text-xl">IT Solution</span>
        </div>
    </template>
    <p class="m-0 text-base  px-5 pb-3">
      We would deploy digital platform for sample collection, preparation and
tracking of samples. The platform will have live streaming of CCTV footage
from Sample preparation room
    </p>
</Fieldset>
<Fieldset  class="border-2 my-5" >
    <template #legend>
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-orange-400 text-4xl">video_call</i></span>
            <span class=" text-base md:text-xl">Monitoring</span>
        </div>
    </template>
    <p class="m-0 text-base   px-1 pb-3">
      We will have dedicated 24*7 available team for monitoring ground operations
and addressing any issue in real time.
    </p>
</Fieldset>
<Fieldset  class="border-2 my-5" >
    <template #legend>
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-orange-400 text-4xl">record_voice_over</i></span>
            <span class="text-base md:text-xl ">Customer
Support</span>
        </div>
    </template>
    <p class="m-0 text-base  px-5 pb-3">
      We shall have a Dedicated Customer Support team to address any issues
they may face. The team may be reached through call, text, WhatsApp
groups or e-mail.

    </p>
</Fieldset>
<Fieldset  class="border-2 my-5" >
    <template #legend>
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-orange-400 text-4xl">precision_manufacturing</i></span>
            <span class=" text-base md:text-xl">Mechanized Sampling
Process
</span>
        </div>
    </template>
    <p class="m-0 text-base  px-5 pb-3">
      Sampling procedure involves drawing samples from every 8th truck in which
other trucks will get affected , which create congested environment. Multiple
Exit points in some areas also create hindrances for sampling.
    </p>
</Fieldset>
  </div>
</div>
<h1 class="text-2xl md:text-5xl font-medium flex justify-center pt-10 md:pt-20 "><span class="font-extrabold pr-1">CONTACT </span>US</h1>

<div class="md:py-10  md:flex  w-full items-center">
  
    <div class="w-full flex flex-col justify-center items-start  h-content  gap-4 p-10 md:px-20 ">

    <InputGroup class="">
        <InputGroupAddon>
            <i class="pi pi-user"></i>
        </InputGroupAddon>
        <InputText placeholder="Name" />
    </InputGroup>
    
    <InputGroup class="">
        <InputGroupAddon>
            <i class="pi pi-id-card"></i>
        </InputGroupAddon>
        <InputNumber placeholder="Organization" />
    </InputGroup>
    
    <InputGroup class="">
        <InputGroupAddon>
            <i class="pi pi-google"></i>
        </InputGroupAddon>
        <InputText placeholder="Email" />
    </InputGroup>
    <InputGroup class="">
        <InputGroupAddon>
            <i class="pi pi-phone"></i>
        </InputGroupAddon>
        <InputText placeholder="Contact" />
    </InputGroup>
    <InputGroup class="">
        <InputText placeholder="Query" />
    </InputGroup>
    <PrimaryButton class="">Submit</PrimaryButton>
     </div>
    
     <!-- <Divider layout="vertical" class="md:border-2 border-red-600" /> -->
      <img src="/images/contact-us.png" class="w-auto h-96 hidden xl:block">

     <div class="w-full   md:m-20 p-5 md:p-0 flex flex-col items-center ">
        <div class="bg-orange-100  p-5 rounded font-medium m-2 w-full">
            <a href="tel:+918591924990">
            <span><i class="pi pi-phone pr-2"></i>8591924990</span>
            
            </a>
        </div>
<div class="border-2  border-orange-900   rounded font-extrabold m-2 w-full flex items-center">
    <div>
        <span class="p-5"><i class="pi pi-google"></i></span>
        </div>
        <div class="font-medium p-4">
            <p class="pl-5 p-2 hover:underline"> office@qssindia.in</p>
            <p class="pl-5 p-2 hover:underline"> info@qssindia.in</p>
            <p class="pl-5 p-2 hover:underline"><i class=""></i> coal@qssindia.in</p>
    
            </div>
            
</div>

    </div></div>


<Footer ></Footer>
</template>
<script setup>

import Fieldset from 'primevue/fieldset';
import Button from 'primevue/button';
import { Head,Link } from '@inertiajs/vue3';
import Timeline from 'primevue/timeline';
import Panel from 'primevue/panel';
import Footer from '@/Components/Footer.vue';
import NavBar2 from '@/Components/NavBar2.vue';
import Accordion from 'primevue/accordion';
import AccordionTab from 'primevue/accordiontab';
import Carousel from 'primevue/carousel';
import { ref, onMounted } from "vue";
import Galleria from 'primevue/galleria';

import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const images = ref([
    {
        itemImageSrc: '/images/coal.jpg',
        alt: 'Image 1',
        
        title: 'QSSPL handles the third party sampling, preparation and analysis of coal supplied to consumers by Coal India Limited.'
    },
    
    {
        itemImageSrc: '/images/farming.jpg',
        alt: 'Image 2',
        title: 'We are a leading Indian Inspection, Testing and Certification Group with an operational network in more than 18 cities across India'
    }
    // Add more images as needed
]);
const responsiveOptions = ref([
    {
        breakpoint: '1300px',
        numVisible: 4
    },
    {
        breakpoint: '1300px',
        numVisible: 1
    }
]);
const clients = [{image:'coal_india.webp'},

// {image:'hpgcl.png'},
{image: 'mahagenco.webp'},
{image: 'mp_power.webp'},
{image: 'npl.webp'},
{image: 'ntpc.webp'},
// {image: 'qci.png'},
{image: 'rpcl.webp'},
{image: 'UPRVUNL.webp'},
{image: 'vedanta.webp'},
{image: 'aditya_birla.webp'},
{image: 'HPSIBL.png'},
{image: 'HITACHI.png'},
{image: 'BSES_YAMUNA.png'},
{image: 'ABB.png'},
{image: 'ITC.png'},
{image: 'MPMKVVCL.png'},
{image: 'JINDAL_POWER.png'},
{image: 'TATA_POWER.png'},
{image: 'CSPGCL.png'},
{image: 'GSECL.png'},
{image: 'DB_POWER.png'},
{image: 'JSW.png'},
{image: 'APGENCO.png'},
{image: 'RRVUNL.png'},

];
const certificates = [{image:'nabl-image.webp'},

// {image:'hpgcl.png'},
{image: 'nabcb-image.webp'},
{image: 'iso-9001-mumbai-image.webp'},
{image: 'pngrb-image.webp'},
{image: 'msme-qspl-image.webp'},
{image: 'Udham_registration_QSSPL.png'},
{image: 'HSIBL.png'},
{image: 'HITACHI.png'},
{image: 'BSES_YAMUNA.png'},
{image: 'ABB.png'},
{image: 'ITC.png'},
{image: 'MPMKVVCL.png'},
{image: 'JINDAL_POWER.png'},
{image: 'TATA_POWER.png'},
{image: 'CSPGCL.png'},
{image: 'GSECL.png'},
{image: 'DB_POWER.png'},
{image: 'JSW.png'},
{image: 'APGENCO.png'},
{image: 'RRVUNL.png'},


];
const events= [{image: 'collection.webp',
                name: 'Collection',
              icon: 'construction',
            content: 'Sample Collection by Road/Rail following the methodology outlined in BIS standards.'},
            {image: 'preparation.webp',
                name: 'Preparation',
              icon: 'orangeeem',
            content: `
      <ol class= "pl-2 list-disc">
        <li>Sample preparation in respective areas in a mechanized way.</li>
        <li>Samples are prepaorange in accordance with BIS standards.</li>
        <li>Final Sample prepaorange and divided into four parts.</li>
        <li>The Lab Sample is sealed in a metal bottle and transported to the Testing Lab for analysis.</li>
      </ol>
    `},
            {image: 'analysis.webp',
                name: 'Analysis',
              icon: 'manage_search',
            content: 'Samples are analyzed for Moisture, Ash, Volatile Matter, Fixed Carbon, and Gross Calorific Value as per IS standard, and Equilibrated Moisture is also determined at 60 RH and 40 °c'},
            {image: 'report.webp',
                name: 'Reporting',
              icon: 'assignment',
            content: 'Results are published within 7-10 calendar days. We provide consolidated reports on a daily, weekly, monthly, and quarterly basis, accessible through our IT platform.'},
            ];

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        requiorange: true,
    },
    phpVersion: {
        type: String,
        requiorange: true,
    },
});

</script>
