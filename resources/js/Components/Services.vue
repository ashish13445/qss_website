<template>
  <div class="md:flex bg-gray-100 dark:bg-black min-h-screen md:p-20 md:my-3">
    
    <!-- Sidebar (Vertical Tabs) -->
    <div class="p-6 w-full md:w-1/3">
      <h2 class="text-black dark:text-white text-2xl font-bold mb-6">
        SECTORS WE WORK IN
      </h2>
      <ul class="space-y-3">
        <li
          v-for="(tab, index) in tabs"
          :key="index"
          @click="selectedTab = index"
          class="py-3 px-5 text-base cursor-pointer rounded-lg font-medium transition-all duration-300"
          :class="selectedTab === index 
            ? 'bg-orange-600 text-white shadow-md' 
            : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700'"
        >
          {{ tab.name }}
        </li>
      </ul>
    </div>

    <!-- Content Area -->
    <div class="md:w-2/3 flex flex-col md:flex-row items-center justify-center text-center md:text-left">
      <img
        :src="tabs[selectedTab].image"
        alt="Sector Image"
        class="w-28 h-28 md:w-60 md:h-60 rounded-full object-cover shadow-lg"
      />

      <div class="m-6 p-6 md:p-10 bg-white dark:bg-gray-800 rounded-xl shadow-md ml-0 md:ml-6">
        <h1 class="text-xl md:text-3xl font-semibold text-gray-900 dark:text-white mb-4">
          {{ tabs[selectedTab].name }}
        </h1>
        
        <p class="text-gray-700 dark:text-gray-300 max-w-md mb-4">
          <section v-html="tabs[selectedTab].content"></section>
        </p>

        <Link :href="currentRoute" 
          class="inline-block text-blue-600 dark:text-blue-400 font-medium hover:underline">
          Read More →
        </Link>
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
  