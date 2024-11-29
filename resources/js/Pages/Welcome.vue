<template>
  <Head title="Home"></Head>
    <NavBar2 class="">
  <div class="flex align-items-center gap-2">
    
    <div>
        <div v-if="canLogin" class="p-2">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="font-semibold  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            ><Button class="border-2 p-4 border-red-600 text-red-600 ">Dashboard</Button></Link
        >

        <template v-else>
          <div class="">
            <Link
                :href="route('contact')"
                class=" text-black  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="  p-2 text-sm md:font-bold ">Contact Us</Button></Link
            >
    
            <Link
                :href="route('login')"
                class="font-semibold  hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2  p-2 border-red-600 text-sm md:font-extrabold text-red-600 ">Employee Login </Button></Link
            >
    
          </div>

        </template>

    </div>

    </div>
  </div>
    </NavBar2>
  <div class="h-content  flex md:mt-20  md:h-screen md:bg-tint-primary  tracking-wide	 ">

<div style="" class="md:p-4 md:p-10 md:mt-10 md:mx-10 " >
  <div className="md:flex ">
    <div class=" md:hidden block" data-aos="fade" data-aos-duration="3000"><img src="../../../public/images/coal.webp" class=""></div>

  <!-- <img src="../../images/coal.png" class="object-fill  w-screen md:h-full ...">  -->
   <div className="w-full md:w-1/2 py-10 md:mt-10 p-4 md:p-0 text-center md:text-left">
      <h2 style="font-weight: 1000;" className="text-black text-6xl md:text-7xl" data-aos="fade-up" data-aos-duration="1500">
        Quality is Our Business
      </h2>
      <p data-aos="fade-up" data-aos-duration="1500" class=" md:w-2/3 py-2 md:py-7 text-sm md:text-xl  font-bold text-black ">QSSPL handles the third party <span class="text-red-600">sampling</span>,
        <span class="text-red-600">Preparation</span>, and <span class="text-red-600">analysis</span> of coal supplied to
consumers by Coal India Limited.
</p>

    </div>
    <div class="md:w-1/2 md:block hidden" data-aos="fade" data-aos-duration="3000"><img src="../../../public/images/coal.webp" class="border-4 border-black"></div>
</div>
</div>
  </div>
    <!-- certificates -->
  <div class="h-content  md:mb-10 bg-gray-100 pt-3">
    <Carousel :value="certificates" :numVisible="4" :numScroll="1"  circular :autoplayInterval="3000">
    <template #item="slotProps">
        <div class="  dark:border-surface-700 rounded-md m-2 p-3 flex justify-center">
                    <img :src="`../../images/certificates/${slotProps.data.image}`"  class="w-16 h-16 md:w-32 md:h-32 rounded-md" />   
        </div>
    </template>
</Carousel>
  </div>
<div class="h-content md:p-5 p-2 py-16">
  <h1 class="text-black text-center md:text-end  font-extrabold text-4xl md:text-7xl p-5 px-10  tracking-wide" data-aos="fade" data-aos-duration="1500"> <span class="border-b-8 border-red-600 rounded">Our</span> Clients</h1>
  <div class="md:py-10 ">
    <div  class="md:border-2 p-5 grid md:grid-cols-4 grid-cols-3 gap-4">
      
  <div class="flex  justify-center" v-for="client in clients"><img class="md:opacity-80 hover:opacity-100 h-16 md:h-32 w-auto" :src="`../../images/clients/${client.image}`" ></div>
</div>
  </div>
</div>
<div  class="h-content md:bg-tint-primary  bg-gray-100 p-5 pb-10 md:p-10 tracking-wide	" >
  <h1 class="text-gray-700 md:text-black text-4xl md:text-7xl font-extrabold text-black  p-5 px-10 flex justify-center md:justify-start"><span class="border-b-8 border-red-600 rounded">Me</span>thodology</h1>
  <Timeline :value="events" align="alternate" class="hidden lg:block" >
    <template #marker="slotProps">
        <span class="flex w-[2rem] h-[2rem] items-center justify-center text-white rounded-full z-20 shadow-sm" :style="{ backgroundColor: slotProps.item.color }">
            <i class="material-icons bg-white rounded-full text-red-500 p-2">{{ slotProps.item.icon }} </i>
        </span>
    </template>
    <template #content="slotProps">
        <Panel class="md:text-xl"  :header=" slotProps.item.name" toggleable data-aos="fade-up" data-aos-duration="1500">
            <!-- <template #content> -->
              <div class="md:flex m-0 max-h-48 overflow-auto p-0">
                <img v-if="slotProps.item.image" :src="`../../images/${slotProps.item.image}`" :alt="slotProps.item.name" width="200" class="h-auto shadow-sm" />
                  <p class=" md:px-5 py-2 text-sm md:text-base" align="left" v-html="slotProps.item.content"></p>
              </div>
            <!-- </template> -->
          </Panel>
    </template>
</Timeline>
<Accordion :activeIndex="0" class="block lg:hidden bg-tint-primary">
    <AccordionTab class="" v-for="event in events" :key="event.name" >
      <template #header>
            <span class="flex items-center gap-2 w-full">
              <span class="flex w-[2rem] h-[2rem] items-center justify-center text-white rounded-full z-20 shadow-sm" :style="{ backgroundColor: event.color }">
                  <i class="material-icons bg-white rounded-full text-red-500 p-2">{{ event.icon }} </i>
              </span>
              <span class="font-bold whitespace-nowrap px-2	">{{event.name}}</span>
              </span>
        </template>
      <img v-if="event.image" :src="`../../images/${event.image}`" :alt="event.name" width="100%" class="h-auto shadow-sm" />
        <p class="m-1" v-html="event.content"></p>
    </AccordionTab>
</Accordion>
</div>
<div class="h-content p-10 ">
  <h1 class="text-4xl md:text-7xl font-extrabold flex justify-center md:justify-end p-5">Why<span class="text-red-600 pl-2" data-aos="fade-up" data-aos-duration="1500"> QSSPL ?</span></h1>

  <div>
    <Fieldset toggleable class="border-2 my-5" >
    <template #legend>
        <div class="flex items-center gap-4 py-2 px-2 ">
           <span><i class="material-icons text-red-600 ">devices</i></span>
            <span class="font-extrabold text-base md:text-xl">IT Solution</span>
        </div>
    </template>
    <p class="m-0 text-base md:text-xl font-bold px-5 pb-3">
      We would deploy digital platform for sample collection, preparation and
tracking of samples. The platform will have live streaming of CCTV footage
from Sample preparation room
    </p>
</Fieldset>
<Fieldset toggleable class="border-2 my-5" >
    <template #legend>
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-red-600 ">video_call</i></span>
            <span class="font-extrabold text-base md:text-xl">24*7 Monitoring</span>
        </div>
    </template>
    <p class="m-0 text-base md:text-xl font-bold px-5 pb-3">
      We will have dedicated 24*7 available team for monitoring ground operations
and addressing any issue in real time.
    </p>
</Fieldset>
<Fieldset toggleable class="border-2 my-5" >
    <template #legend>
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-red-600 ">record_voice_over</i></span>
            <span class="font-extrabold text-base md:text-xl">Dedicated Customer
Support</span>
        </div>
    </template>
    <p class="m-0 text-base md:text-xl font-bold px-5 pb-3">
      We shall have a Dedicated Customer Support team to address any issues
they may face. The team may be reached through call, text, WhatsApp
groups or e-mail.

    </p>
</Fieldset>
<Fieldset toggleable class="border-2 my-5" >
    <template #legend>
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-red-600 ">precision_manufacturing</i></span>
            <span class="font-extrabold text-base md:text-xl">Mechanized Sampling
Process
</span>
        </div>
    </template>
    <p class="m-0 text-base md:text-xl font-bold px-5 pb-3">
      Sampling procedure involves drawing samples from every 8th truck in which
other trucks will get affected , which create congested environment. Multiple
Exit points in some areas also create hindrances for sampling.
    </p>
</Fieldset>
  </div>
</div>


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
{image: 'aditya_birla.webp'}
];
const certificates = [{image:'nabl-image.webp'},

// {image:'hpgcl.png'},
{image: 'nabcb-image.webp'},
{image: 'iso-9001-mumbai-image.webp'},
{image: 'pngrb-image.webp'},
{image: 'msme-qspl-image.webp'},
{image: 'Udham_registration_QSSPL.png'},



];
const events= [{image: 'collection.webp',
                name: 'Collection',
              icon: 'construction',
            content: 'Sample Collection by Road/Rail following the methodology outlined in BIS standards.'},
            {image: 'preparation.webp',
                name: 'Preparation',
              icon: 'redeem',
            content: `
      <ol class= "pl-2 list-disc">
        <li>Sample preparation in respective areas in a mechanized way.</li>
        <li>Samples are prepared in accordance with BIS standards.</li>
        <li>Final Sample prepared and divided into four parts.</li>
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
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

</script>
