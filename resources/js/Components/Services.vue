<template>
    <div class="md:flex bg-gray-200 dark:bg-black h-content md:min-h-screen  md:p-20 md:my-3">
      <!-- Sidebar (Vertical Tabs) -->
      <div class="p-5 md:p-0 w-full md:w-1/3">
        <h2 class="text-white text-lg  md:text-2xl font-semibold p-5 md:m-4">Sectors we work in</h2>
        <ul class="">
          <li
            v-for="(tab, index) in tabs"
            :key="index"
            @click="selectedTab = index"
            class="p-1 md:p-4 md:m-4 text-xs md:text-lg font-light cursor-pointer border border-white transition-all md:rounded-full "
            :class="selectedTab === index ? 'bg-white text-gray-800' : 'hover:bg-white hover:text-gray-800 bg-gray-600 dark:bg-gray-800 text-white hover:dark:text-white'"
          >
            {{ tab.name }}
          </li>
        </ul>
      </div>
  
      <!-- Content Area -->
      <div class="md:w-2/3  flex flex-col md:flex-row  items-center justify-center text-center">
        <img
          :src="tabs[selectedTab].image"
          alt="Sector Image"
          class="w-24 h-24 md:w-60 md:h-60 rounded-full object-cover mb-4"
        />
        <div class="m-5 p-5 md:p-10 bg-gray-600 rounded-lg ml-5">
            <h1 class="text-lg md:text-2xl text-white p-5">{{ tabs[selectedTab].name }}</h1>
        <p class="text-white max-w-md ">
            <section v-html="tabs[selectedTab].content"></section>

        </p>
        <Link :href="currentRoute" class=" text-white underline  items-center justify-between">Read More </Link>

    </div>
        
      </div>
    </div>
  </template>
  
  <script setup >
import { Link } from '@inertiajs/vue3';
import { ref, reactive ,computed} from 'vue';

const selectedTab = ref(0);

const tabs = reactive([
  {
    name: "Consumer Goods",
    route: "consumer-goods",
    content: `<div class="text-start">
      <div class='pt-2 text-xs md:text-sm mb-2'>
        <p class="md:mb-4 text-xs md:text-sm px-5">
          QSS specializes in two key categories:
        </p>
        <ul class="px-5 list-disc list-inside space-y-1 text-xs md:text-sm">
          <li><span class="">Consumer Non-Durables (FMCG):</span> Expert services for perishable items like frozen fruits, vegetables, seafood, processed foods, and water.</li>
          <li><span class="">Soft Goods:</span> Tailored solutions to meet diverse needs.</li>
        </ul>
      </div>
    </div>`,
    image: "/images/consumer_goods.png"
  },
  {
    name: "Engineering",
    route: "engineering",
    content: `<div class="text-start">
      <div class='text-xs md:text-sm text-start mb-1'>
        <p class="text-xs md:text-sm text-start">
          Our services encompass a wide range of inspection activities across various sectors, including:
        </p>
        <ul class="list-disc px-5 list-inside space-y-1 text-xs md:text-sm md:pb-5 p-2 text-start">
          <li>General Engineering Industry</li>
          <li>Telecom Industry</li>
          <li>Foundries</li>
          <li>Power & Energy Sector</li>
          <li>Electrical & Electronic Industries</li>
          <li>Generation, Transmission, and Distribution</li>
          <li>Cement Industry</li>
          <li>Automobile Industry</li>
          <li>Material Handling Equipment</li>
          <li>Oil & Gas Sector</li>
        </ul>
      </div>
    </div>`,
    image: "/images/engineering.png"
  },
  {
    name: "Hydrocarbons",
    route: "hydrocarbons",
    content: `<div>
      <div class='px-5 text-sm mb-1'>
        <h2 class="p-5 text-sm text-start">Core Services:</h2>
        <ul class="list-disc list-inside text-sm px-5 text-start">
          <li>Pipeline Inspections</li>
          <li>Project Construction & Shutdown Inspections</li>
          <li>Stage-Wise Fabrication Inspections</li>
          <li>Technical Safety Audits</li>
        </ul>
        <h2 class="p-5 text-sm text-start">Key Focus Areas:</h2>
        <ul class="list-disc list-inside text-sm text-start px-5">
          <li>Oil & Gas Pipelines</li>
          <li>Petrochemical Plants</li>
          <li>Refineries</li>
          <li>Fertilizer Plants</li>
          <li>City Gas Distribution Networks</li>
        </ul>
      </div>
    </div>`,
    image: "/images/hydrocarbon.png"
  },
  {
    name: "Agriculture Products",
    route: "agriculture",
    content: `<div class="text-start">
      <div class='px-5 pt-2 text-xs mb-2'>
        <p class="text-xs md:text-sm px-5">We offer comprehensive solutions, including:</p>
        <ul class="px-5 list-disc list-inside space-y-1 text-xs md:text-sm p-2">
          <li>Procurement Supervision</li>
          <li>Quality & Weight Control</li>
          <li>Sampling & Process Monitoring</li>
          <li>Laboratory & Auditing Services</li>
          <li>Surveys (insurance, draught, damage, etc.)</li>
          <li>Plant & Warehouse Management</li>
          <li>Loading/Discharge Supervision</li>
          <li>Photographic Documentation</li>
        </ul>
      </div>
    </div>`,
    image: "/images/agriculture-products.png"
  },
  {
    name: "Laboratories",
    route: "laboratories",
    content: `<div class="text-start">
      <div class='px-5 text-xs md:text-sm mb-1'>
        <ul class="list-disc px-5 list-inside space-y-1 text-xs md:text-sm md:pb-5 p-2">
          <li>Independent and Impartial Assistance: Reliable, accurate, and impartial analytical results.</li>
          <li>Comprehensive Product Analysis: Testing ensures compliance from exploration to delivery.</li>
          <li>Skilled Team & Advanced Techniques: Staffed with experts using classical and modern techniques for reliable results.</li>
          <li>ISO/IEC 17025:2017 Compliant: Adheres to international testing standards.</li>
          <li>NABL & EIC Accredited: Laboratories certified for mineral and material testing and global compliance.</li>
        </ul>
      </div>
    </div>`,
    image: "/images/microscope.png"
  },
  {
    name: "Metals, Minerals & Ores",
    route: "minerals",
    content: `<div>
      <div class='px-5 text-xs md:text-sm mb-1'>
        <h2 class="px-5 text-sm text-start">Core Services:</h2>
        <ul class="list-disc list-inside text-sm text-start">
          <li>Inspection & Supervision: Quality and handling checks across the supply chain.</li>
          <li>Sampling & Testing: Comprehensive material testing for quality assurance.</li>
          <li>Quantity Verification: Weight and number assessments (Draught Survey, Tally).</li>
          <li>Packaging & Transport Monitoring: Supervision of packing, labeling, and condition.</li>
          <li>Quality Assurance & Verification: Analysis and certification for quality.</li>
        </ul>
      </div>
    </div>`,
    image: "/images/coal.svg"
  }
]);
const currentRoute = computed(() => route(tabs[selectedTab.value].route));

  </script>
  
  <style scoped>
  li {
    transition: all 0.3s ease-in-out;
  }
  </style>
  