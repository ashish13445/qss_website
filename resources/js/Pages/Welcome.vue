<template>
  <Head title="Home"></Head>
    <NavBar2 class="">
  <div class="flex align-items-center gap-2">
    <DarkModeToggle/>
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
                :href="route('login')"
                class="  hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
                ><button 
  class="px-5 py-2 rounded-full bg-gradient-to-r from-orange-500 to-pink-500 
         text-white font-semibold shadow-md hover:shadow-lg 
         hover:from-orange-600 hover:to-pink-600 
         transition-all duration-300 ease-in-out">
  Login
</button></Link
            >
    
          </div>

        </template>

    </div>

    </div>
  </div>
    </NavBar2>
    <div class="lg:flex">

   <div class="card h-content xl:h-screen  mt-10 md:mt-0 pb-3 w-full xl:w-2/3">
    <Galleria 
      :value="images" 
      
      :numVisible="1" 
      :circular="true" 
      :autoPlay="true"
      :transitionInterval="5000"
      :showItemNavigators="false"
      :showThumbnails="false"
    >
      <!-- Main Image Template -->
      <template #item="slotProps">
        <div class="relative w-full h-full  max-h-screen">
  <!-- Image -->
  <img 
    :src="slotProps.item.itemImageSrc" 
    :alt="slotProps.item.alt" 
    class="w-full h-80 md:h-[80vh] xl:h-screen object-cover  pointer-events-none "
    loading="eager" 
  decoding="async"
  fetchpriority="high"
  data-aos="fade-up"
  data-aos-duration="1000"
  />
  
  <!-- Gradient Overlay -->
  <div class="  "></div>
          
        <div class="flex absolute inset-0 items-end justify-center py-0 px-5 md:ml-20 ">
  <!-- Left Text -->
  <div class="md:w-1/2 md:flex items-center md:py-20" data-aos="fade-up" data-aos-duration="3000">
    <h1 class="text-black text-sm sm:text-sm md:text-3xl xl:text-5xl font-bold tracking-wide leading-snug">
      ASSURING QUALITY;<br/>ENHANCING RELIABILITY
    </h1>
  </div>

  <!-- Right Text -->
  <div class="md:w-1/2 md:flex items-center mt-10 md:my-20 pl-5 md:px-20 border-l-4 border-orange-600" data-aos="fade-up" data-aos-duration="3000">
    <h2 class="text-black text-lg sm:text-sm md:text-xl xl:text-3xl font-light tracking-wide leading-snug">
      25 Years of Excellence in Quality Assurance &<br/>
      Third-Party Inspections
    </h2>
  </div>
</div>

  
        </div>
      </template>
    </Galleria>
    </div>
    <div class="lg:w-1/3 flex justify-center lg:justify-end items-center mt-10 md:mt-14">
      <Galleria
        :value="carousel_images"
        :circular="true"
        :transitionInterval="4000"
        :showThumbnails="false" 
        class="w-full lg:w-3/4 h-80 lg:h-full"
      >
        <template #item="slotProps">
          <img 
            :src="slotProps.item.itemImageSrc" 
            :alt="slotProps.item.alt" 
            class="w-full h-full object-fit"
          />
        </template>
      </Galleria>
    </div>
    </div>

    <div class="md:flex bg-white  dark:bg-black text-black dark:text-white h-content md:h-screen tracking-wide md:pl-5">
      <div class="md:w-1/2 flex  p-10 md:p-0">
<img alt="image indicating coal loading" src="../../images/about.png" class="w-40 h-40 md:w-60 md:h-96 my-20 flex justify-center" data-aos="zoom-in" data-aos-duration="3000">
        <div class=" xl:p-20 " data-aos="zoom-in" data-aos-duration="3000">
          <h2 class="font-normal	  text-lg md:text-3xl">WHO WE ARE?</h2>
          <p class="font-thin text-xs md:text-sm tracking-widest py-5">
            A leading third-party inspection and testing services provider committed to delivering impartial, reliable, and high-quality assessments across industries such as Agriculture, Consumer Goods, Engineering, Minerals, and Metals.
With a strong nationwide presence, QSSPL operates NABL-accredited laboratories across various locations, ensuring that our testing services meet international quality and compliance standards. Our expertise in inspection and testing helps businesses maintain regulatory compliance, enhance product integrity, and ensure operational excellence.
At QSSPL, we go beyond inspection—we deliver trust, accuracy, and confidence to support businesses in achieving their quality and safety objectives efficiently and cost-effectively.
</p>
        </div>
      </div>
      <div class="md:w-1/2 bg-gray-200 dark:bg-gray-800 ">
        <div class="grid grid-cols-2 grid-rows-2  w-full h-content md:h-screen">
  <div class="bg-gray-200 flex items-center justify-center">
    <img alt="image indicating qss ground inspection" src="../../images/inspection.png"  class="w-full h-full object-cover hover:filter hover:brightness-50 hover:transition">
  </div>

  <div class="flex flex-col justify-center" data-aos="fade-up" data-aos-duration="3000">
    <h2 class="text-xl lg:text-5xl text-center py-5">
      INSPECTION
    </h2>
    <p class="font-thin text-xs md:text-sm  p-5 ">
We offer comprehensive and impartial third-party inspection services to ensure quality, compliance, and reliability across industries. Our expertise helps businesses meet regulatory standards, minimize risks, and enhance product integrity.    </p>
    </div>

  <div class="flex flex-col justify-center" data-aos="fade-up" data-aos-duration="1000">
    <h2 class="text-xl lg:text-5xl text-center py-5 ">
      TESTING
    </h2>
    <p class="font-thin text-xs md:text-sm  p-5 ">
We provide precise, reliable, and NABL-accredited testing services across multiple industries, ensuring compliance with national and international standards. Our state-of-the-art laboratories deliver accurate results that help businesses maintain quality, safety, and regulatory compliance with confidence.       </p>
  </div>

  <!-- Second Image at (1,1) -->
  <div class="bg-gray-200 flex items-center justify-center">
    <img alt="image indicating qss lab testing" src="../../images/testing.jpg"  class="w-full h-full object-fit hover:filter hover:brightness-50 hover:transition">
  </div>
</div>

      </div>
    </div>
   
  
    <Services/>
    <div class="bg-white dark:bg-black text-black dark:text-white h-content py-10   relative hidden md:block">
    <img src="../../images/bg.png" 
       class="absolute inset-0 w-full h-full opacity-10 object-cover rounded-lg" 
       alt="Coal in Bag Background">
      <h2 class="text-black dark:text-white text-center  font-medium text-2xl md:text-5xl p-5 px-5  md:mb-5" > <span class="font-extrabold">OUR</span> PRESENCE</h2>
      
    
    <InteractivEmap data-aos="zoom-in" data-aos-duration="3000"/>

  </div>
    <!-- <div class="bg-white dark:bg-black text-black dark:text-white relative h-content  p-2  border-2 rounded-lg">
  <!-- Background Image -->
  <!-- <img src="/images/coal_in_bag.jpg" 
       class="absolute inset-0 w-full h-full opacity-30 object-cover rounded-lg" 
       alt="Coal in Bag Background">
      <h2 class=" text-center  font-medium text-2xl md:text-5xl p-5 md:p-10  opacity-90" data-aos="zoom-in" data-aos-duration="2000" > <span class="font-extrabold">ABOUT</span> US</h2>
      <p class="tracking-wide font-medium text-sm md:text-xl  text-center relative md:px-40 " data-aos="zoom-in" data-aos-duration="2000">
        Quality Services and Solutions Private Limited (QSSPL) is a private organization established in 1999, with a legacy
of 25 years in delivering quality services and conducting third-party inspections. QSSPL specializes in Agriculture,
Engineering, Minerals, and Metals, catering to both local and global markets. The organization boasts a skilled
workforce of over 1,650 professionals and maintains a global presence through strong international associations.
QSSPL operates across 20+ states in India, ensuring a wide-reaching market presence and the ability to meet
diverse regional needs. The company has mastered third-party inspection services, ensuring top-notch quality
assurance for its clients. QSSPL’s commitment to precision and excellence has solidified its reputation as a
trusted and proficient industry leader.
      </p>
      <div class="flex justify-center relative">
        <div class="md:p-5 flex flex-col items-center" data-aos="zoom-in" data-aos-duration="2000">
          <img src="/images/25.png" class="w-40 h-40 md:w-60 md:h-60 ">
          <p class="text-lg w-48 text-center">Experience of Delivering Quality & Third Party Inspections</p>
        </div>
        <div class="md:p-5 flex flex-col items-center" data-aos="zoom-in" data-aos-duration="2000">
          <img src="/images/9.png" class="w-40 h-40 md:w-60 md:h-60 ">
          <p class="text-lg w-48 text-center">
            Experience in Coal Quality Sampling and Analysis
          </p>

        </div>

      </div>
    </div>  -->

<div class="h-content bg-gray-100 dark:bg-black md:px-48 py-0 pt-10 " >
  <h2 class="text-black dark:text-white text-center font-medium text-2xl md:text-5xl px-10 ">
    <span class="font-extrabold">OUR</span> CLIENTS
  </h2>
  <div class="md:py-10 py-5 px-5">
    <div
      class="border-2 border-gray-300 dark:border-gray-700  grid md:grid-cols-9 grid-cols-3 dark:bg-black"
    >
      <div
        class="flex justify-center border border-gray-300 dark:border-gray-700 p-2"
        v-for="client in clients"
        :key="client.id"
      >
        <img
          class="md:opacity-80 hover:opacity-100 h-12 md:h-20 w-auto dark:grayscale dark:invert dark:hover:grayscale-0 dark:hover:invert-0 transition-all"
          :src="`../../images/clients/${client.image}`"
          alt="Client logo"
          data-aos="zoom-in"
          data-aos-duration="3000"
        />
      </div>
    </div>
  </div>
</div>


<div class="h-content p-10 bg-gray-200 dark:bg-black dark:text-white">
  <h2 class="text-2xl md:text-5xl font-medium flex justify-center  md:p-10"><span class="font-extrabold pr-1">WHY </span> QSSPL ?</h2>

  <div class="md:flex ">
    <div  class="border-2 my-5 bg-white dark:bg-black dark:text-white px-4"  data-aos="fade-up" data-aos-duration="1000">
        <div class="flex items-center gap-4 py-2 px-2 ">
           <span><i class="material-icons text-orange-400 text-4xl px-2">verified</i></span>
            <span class="text-base md:text-lg ">Legacy of Trust</span>
        </div>
    <p class="m-0 text-base  px-5 pb-3">
     25+ years of industry experience
    </p>
  </div>
<div  class="border-2 my-5 bg-white dark:bg-black dark:text-white px-4" data-aos="fade-up" data-aos-duration="2000" >
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-orange-400 text-4xl">devices</i></span>
            <span class=" text-base md:text-lg">Technical Excellence</span>
        </div>
    <p class="m-0 text-base   px-1 pb-3">
      Advanced labs and trained personnel
    </p>
  </div>
<div  class="border-2 my-5 bg-white dark:bg-black dark:text-white px-4"  data-aos="fade-up" data-aos-duration="3000">
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-orange-400 text-4xl">badge</i></span>
            <span class="text-base md:text-lg ">Accredited Assurance</span>
        </div>
    <p class="m-0 text-base  px-5 pb-3">
     Internationally recognized certifications
    </p>
  </div>
<div  class="border-2 my-5 bg-white dark:bg-black dark:text-white px-4"  data-aos="fade-up" data-aos-duration="4000" >
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-orange-400 text-4xl">person_search</i></span>
            <span class=" text-base md:text-lg">Client Customization</span>
        </div>
    <p class="m-0 text-base  px-5 pb-3">
      Services tailored to meet unique client requirements
    </p>
  </div>
  <div  class="border-2 my-5 bg-white dark:bg-black dark:text-white px-4"  data-aos="fade-up" data-aos-duration="3000">
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-orange-400 text-4xl">travel_explore</i></span>
            <span class="text-base md:text-lg ">Pan-India Reach</span>
        </div>
    <p class="m-0 text-base  px-5 pb-3">
    Strong presence across major industrial zones
    </p>
  </div>
  </div>
</div>
<div class="bg-white dark:bg-black text-black dark:text-white">


<h2 class="text-2xl md:text-5xl font-medium flex justify-center pt-10 md:pt-20 "><span class="font-extrabold pr-1">CONTACT </span>US</h2>

<div class="md:py-10  md:flex  w-full items-center">
  
    <div class="w-full flex flex-col justify-center items-start  h-content  gap-4 p-10 md:px-20 ">

    <InputGroup class="">
        <InputGroupAddon>
            <i class="pi pi-user"></i>
        </InputGroupAddon>
        <InputText v-model="form.name" placeholder="Name" required="true" :class="{ 'p-invalid': errors.name }" />
       
    </InputGroup>
     <small v-if="errors.name" class="p-error">
          Name is required
      </small>
    <InputGroup class="">
        <InputGroupAddon>
            <i class="pi pi-id-card"></i>
        </InputGroupAddon>
        <InputText v-model="form.organization" placeholder="Organization" required="true" />
        
    </InputGroup>
    <small v-if="errors.organization" class="p-error">
          Organization is required
      </small>
    <InputGroup class="">
        <InputGroupAddon>
            <i class="pi pi-google"></i>
        </InputGroupAddon>
        <InputText v-model="form.email" placeholder="Email" required="true" />
       
    </InputGroup>
     <small v-if="errors.email" class="p-error">
          email is required
      </small>
    <InputGroup class="">
        <InputGroupAddon>
            <i class="pi pi-phone"></i>
        </InputGroupAddon>
        <InputText v-model="form.contact" placeholder="Contact" required="true" />
        
    </InputGroup>
    <small v-if="errors.contact" class="p-error">
          Contact No. is required
      </small>
    <InputGroup class="">
        <InputText v-model="form.query" placeholder="Query" required="true" />
        
    </InputGroup>
    <small v-if="errors.query" class="p-error">
          Query is required
      </small>
    <InputGroup class="">
    <Dropdown
    v-model="form.department"
    :options="departments"
    optionLabel="label"
    optionValue="value"
    placeholder="Select Department"
    required="true"
    
/>

</InputGroup>
<small v-if="errors.department" class="p-error">
          Department is required
      </small>

<PrimaryButton @click="submitForm"  icon="pi pi-spin pi-spinner"
    :loading="loading"
    :disabled="loading">Submit</PrimaryButton>


     </div>
    
     <!-- <Divider layout="vertical" class="md:border-2 border-red-600" /> -->
      <img src="/images/contact-us-2.png" alt="contact us phone " class="w-auto h-96 hidden xl:block" data-aos="fade-left" data-aos-duration="3000">

     <div class="w-full   md:m-20 p-5 md:p-0 flex flex-col items-center ">
        <!-- <div class="bg-orange-100 dark:bg-black  p-5 rounded font-medium m-2 w-full">
            <a href="tel:+918104963103">
            <span><i class="pi pi-phone pr-2"></i>+91 8104963103</span>
            
            </a>
        </div> -->
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
import { ref, onMounted ,reactive} from "vue";
import Galleria from 'primevue/galleria';

import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import InputText from 'primevue/inputtext';
import Dropdown from 'primevue/dropdown';
import InputNumber from 'primevue/inputnumber';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DarkModeToggle from '@/Components/DarkModeToggle.vue';
import InteractivEmap from '@/Components/InteractivEmap.vue';
import Counter from '@/Components/Counter.vue';
import Services from '@/Components/Services.vue';
import axios from 'axios';
const images = ref([
    {
        itemImageSrc: '/images/hero_image_2.webp',
        alt: 'qss text with services filled',
        
        title: 'QSSPL handles the third party sampling, preparation and analysis of coal supplied to consumers by Coal India Limited.'
    },
    
   
    
    // Add more images as needed
]);

const loading = ref(false)
const form = reactive({
    name: '',
    organization: '',
    email: '',
    contact: '',
    query: '',
    department: ''
})
const departments = [
    { label: 'Sales', value: 'sales' },
    { label: 'Support', value: 'support' },
    { label: 'Accounts', value: 'accounts' },
    { label: 'HR', value: 'hr' },
     {label: 'IT', value: 'IT' },
]

const errors = reactive({})

const submitForm = async() => {
    errors.name = !form.name
    errors.email = !form.email
    errors.organization = !form.organization
    errors.contact = !form.contact
    errors.department = !form.department
    errors.query = !form.query

    // stop if any error exists
    if (Object.values(errors).some(e => e)) {
        return
    }
     if (loading.value) return

    loading.value = true

    // submit API
   try {
        const response = await axios.post('/api/contact', {
            name: form.name,
            organization: form.organization,
            email: form.email,
            contact: form.contact,
            query: form.query,
            department: form.department
        })

        // success
        alert('Form submitted successfully')

        // reset form
        Object.keys(form).forEach(key => form[key] = '')

    } catch (error) {
        console.error(error)

        if (error.response?.status === 422) {
            // Laravel validation errors
            console.log(error.response.data.errors)
        } else {
           alert('Submission failed')
        }
    }
    finally {
        loading.value = false
    }


}

const carousel_images = [
  { itemImageSrc: '/images/hero-banner.webp', alt: 'qss banner' },
  { itemImageSrc: '/images/qss-make-in-india.webp', alt: 'make in india' },
  // { itemImageSrc: '/images/img2.jpg', alt: 'Image 2' },
  // { itemImageSrc: '/images/img3.jpg', alt: 'Image 3' },
  // Add more images as needed
]

// Reference for the right carousel Galleria

// Optional: handle thumbnail click to sync with main image
const onThumbnailClick = (event) => {
  console.log('Clicked thumbnail index:', event.index)
  // You can add logic here to update the main Galleria
}
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
{image: 'HPSIBL.webp'},
{image: 'HITACHI.webp'},
{image: 'BSES_YAMUNA.webp'},
{image: 'ABB.webp'},
{image: 'ITC.webp'},
{image: 'MPMKVVCL.webp'},
{image: 'JINDAL_POWER.webp'},
{image: 'TATA_POWER.webp'},
{image: 'CSPGCL.webp'},
{image: 'GSECL.webp'},
{image: 'DB_POWER.webp'},
{image: 'JSW.webp'},
{image: 'APGENCO.webp'},
{image: 'RRVUNL.webp'},
{image : 'wbpdcl.webp'},
{image : 'skh.webp'},
{image : 'aal.webp'},



];
const certificates = [{image:'nabl-image.png'},

// {image:'hpgcl.png'},
{image: 'nabcb-image.png'},
{image: 'iso-9001-mumbai-image.png'},
{image: 'pngrb-image.png'},
{image: 'msme-qspl-image.png'},
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
