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
                :href="route('contact')"
                class=" text-black dark:text-white   hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
                ><Button class="  p-2 text-sm ">CONTACT US</Button></Link
            >
    
            <Link
                :href="route('login')"
                class="  hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
                ><Button class="border-2  p-2 px-4 border-orange-400 rounded-full text-sm md:font-extrabold text-orange-400 ">Login </Button></Link
            >
    
          </div>

        </template>

    </div>

    </div>
  </div>
    </NavBar2>
   <div class="card h-content xl:h-screen pb-3">
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
        <div class="relative w-full h-full max-h-screen">
  <!-- Image -->
  <img 
    :src="slotProps.item.itemImageSrc" 
    :alt="slotProps.item.alt" 
    class="w-full h-96 md:h-screen object-cover  pointer-events-none "
    loading="eager" 
  decoding="async"
  fetchpriority="high"
  data-aos="fade-up"
  data-aos-duration="1000"
  />
  
  <!-- Gradient Overlay -->
  <div class="  "></div>
          
         <div class="flex absolute inset-0 items-end justify-center py-0 px-5 md:px-20">
          <div class="w-1/2 flex items-center  md:py-28  " data-aos="fade-up" data-aos-duration="3000">
    <h1 class="text-black md:text-3xl xl:text-5xl font-bold tracking-wide">
      ASSURING QUALITY; <br/> ENHANCING RELIABILITY
    </h1>
  </div>
  
  <div class="w-1/2 flex items-center  md:my-20  pl-5 md:px-10 border-l-4 border-blue-600" data-aos="fade-up" data-aos-duration="3000">
    <h1 class="text-black  md:text-3xl xl:text-5xl font-thin	tracking-wide">
      25 Years of Excellence in Quality Assurance &
 Third-Party Inspections
    </h1>
  </div>
         </div>

  
        </div>
      </template>
    </Galleria>
    </div>

    <div class="md:flex bg-white  dark:bg-black text-black dark:text-white h-content md:h-screen tracking-wide md:pl-5">
      <div class="md:w-1/2 flex  p-10 md:p-0">
<img src="../../images/about.png" class="w-40 h-40 md:w-60 md:h-96 my-20 flex justify-center" data-aos="zoom-in" data-aos-duration="3000">
        <div class=" xl:p-20 text-center" data-aos="zoom-in" data-aos-duration="3000">
          <h1 class="font-normal	  text-lg md:text-3xl">WHO WE ARE?</h1>
          <p class="font-thin text-xs md:text-sm tracking-widest py-5">
            We are a private organization established in 1999, with a legacy of 25 years in delivering quality services and conducting third-party inspections. We specializes in Agriculture, Engineering, Minerals, and Metals, catering to both local and global markets. The organization boasts a skilled workforce of over 1,650 professionals and maintains a global presence through strong international associations. We operates across 20+ states in India,
             ensuring a wide-reaching market presence and the ability to meet diverse regional needs. The company has mastered third-party inspection services, ensuring top-notch quality assurance for its clients. Our commitment to precision and excellence has solidified its reputation as a trusted and proficient industry leader
          </p>
        </div>
      </div>
      <div class="md:w-1/2 bg-gray-200 dark:bg-gray-800 ">
        <div class="grid grid-cols-2 grid-rows-2  w-full h-screen">
  <div class="bg-gray-200 flex items-center justify-center">
    <img src="../../images/inspection.png" alt="Image 1" class="w-full h-full object-cover hover:filter hover:brightness-50 hover:transition">
  </div>

  <div class="flex flex-col justify-center" data-aos="fade-up" data-aos-duration="3000">
    <h1 class="text-xl md:text-5xl text-center py-5">
      INSPECTION
    </h1>
    <p class="font-thin text-xs md:text-sm tracking-widest p-5 text-center">
Our testing services ensure accuracy, compliance, and safety across minerals, consumer goods, agriculture, and laboratories. We use state-of-the-art technology and globally recognized methodologies to deliver precise and reliable results.        </p>
  </div>

  <div class="flex flex-col justify-center" data-aos="fade-up" data-aos-duration="1000">
    <h1 class="text-xl md:text-5xl text-center py-5 ">
      TESTING
    </h1>
    <p class="font-thin text-xs md:text-sm tracking-widest p-5 text-center">
      Our testing services ensure accuracy, compliance, and safety across minerals, consumer goods, agriculture, and laboratories. We use state-of-the-art technology and globally recognized methodologies to deliver precise and reliable results.
       </p>
  </div>

  <!-- Second Image at (1,1) -->
  <div class="bg-gray-200 flex items-center justify-center">
    <img src="../../images/testing.png" alt="Image 2" class="w-full h-full object-fit hover:filter hover:brightness-50 hover:transition">
  </div>
</div>

      </div>
    </div>
   
  
  <!-- <div class="bg-white dark:bg-black text-black dark:text-white h-content md:px-20  relative">
    <img src="../../images/bg.png" 
       class="absolute inset-0 w-full h-full opacity-10 object-cover rounded-lg" 
       alt="Coal in Bag Background">
      <h1 class="text-black dark:text-white text-center  font-medium text-2xl md:text-5xl p-5 px-5  md:mb-24" > <span class="font-extrabold">OUR</span> SECTORS</h1>
      
   
    <div class='grid grid-rows-3 xl:grid-rows-2 grid-flow-col gap-28  xl:gap-28 tracking-wide p-5' >
  
      <Link
                :href="route('consumer-goods')"
        data-aos="zoom-in"  class='select-none h-20 md:h-auto w-48 md:w-full  relative  flex flex-col items-center border-2 md:border-4 border-orange-500 hover:bg-gradient-to-r from-orange-200 to-red-500 md:from-orange-500  md:to-red-500 rounded-3xl hover:text-white'>
            <img class='hidden md:block absolute w-20 md:w-48 -top-10 md:-top-28  ' src="/images/consumer_goods.png" width={200} height={200} alt="consulting" />
            <h2 class='text-md  md:font-extrabold  py-5  md:pt-20 px-2  text-center'>Consumer Goods</h2>
            <div class="hidden sm:block">
              <div class=' px-5 pt-2 text-xs md:text-sm text-ellipsis overflow-hidden whitespace-pre-wrap  w-42 mb-2 '>
              <p class=" md:mb-4 text-xs md:text-sm px-5 ">
    QSS specializes in two key categories:
  </p>
  <ul class="px-5 list-disc list-inside space-y-1 text-xs md:text-sm  text-ellipsis overflow-hidden whitespace-pre-wrap ">
    <li><span class="">Consumer Non-Durables (FMCG):</span> Expert services for perishable items like frozen fruits, vegetables, seafood, processed foods, and water.</li>
    <li><span class="">Soft Goods:</span> Tailored solutions to meet diverse needs.</li>
  </ul>
</div> 
            </div>
           
</Link>
<Link
                :href="route('agriculture')"
            data-aos="zoom-in"  data-aos-duration="2000" class=' select-none h-20  md:mt-0 h-auto w-48 md:w-full relative  flex flex-col items-center border-2 md:border-4 border-orange-500 hover:bg-gradient-to-r  from-orange-200 to-red-500 md:from-orange-500  md:to-red-500 rounded-3xl  hover:text-white'>
          <img class='hidden md:block absolute w-32 md:w-60 -top-16 md:-top-36 mr-5' src="/images/agriculture-products.png" width={200} height={200} alt="marketing"/>
            <h2 class='text-md  md:font-extrabold py-5  md:pt-20 px-2  text-center'>Agriculture Produce & Products</h2>
            <div class="hidden sm:block">
            <div class='px-5 pt-2 text-xs  text-ellipsis overflow-hidden whitespace-pre-wrap  w-42 mb-2'>
              <p class="text-xs md:text-sm px-5">We offer comprehensive solutions, including:</p>
              <ul class="px-5 list-disc list-inside space-y-1 text-xs  md:text-sm p-2 text-ellipsis overflow-hidden whitespace-pre-wrap">
    <li><span class="">Procurement Supervision</span></li>
    <li><span class="">Quality & Weight Control</span></li>
    <li><span class="">Sampling & Process Monitoring</span></li>
    <li><span class="">Laboratory & Auditing Services</span></li>
    <li>
      <span class="">Surveys</span> (insurance, draught, damage, etc.)
    </li>
    <li><span class="">Plant & Warehouse Management</span></li>
    <li><span class="">Loading/Discharge Supervision</span></li>
    <li><span class="">Photographic Documentation</span></li>
  </ul>
</div>
            </div>
      </Link>
      <Link
                :href="route('engineering')"
          data-aos="zoom-in"  data-aos-duration="4000" class=' select-none h-20 md:h-auto w-48 md:w-full relative  flex flex-col items-center border-2 md:border-4 border-orange-500 hover:bg-gradient-to-r  from-orange-200 to-red-500 md:from-orange-500  md:to-red-500 rounded-3xl  hover:text-white'>
          <img class='hidden md:block absolute w-20 md:w-48 -top-10 md:-top-32 ' src="/images/engineering.png" width={200} height={200} alt="staffing"/>
            <h2 class='text-md  md:font-extrabold py-5 md:pt-20  px-2 md:px-5 text-center'>Engineering </h2>
            <div class="hidden sm:block">
            <div class='px-5   text-xs md:text-sm text-ellipsis overflow-hidden whitespace-pre-wrap  w-42 mb-1'>
              <p class="text-xs md:text-sm px-5">
    Our services encompass a wide range of inspection activities across various sectors, including:
  </p>
  <ul class="list-disc px-5 list-inside space-y-1 text-xs md:text-sm md:pb-5 text-xs p-2 text-ellipsis overflow-hidden whitespace-pre-wrap">
    <li><span class="">General Engineering Industry</span></li>
    <li><span class="">Telecom Industry</span></li>
    <li><span class="">Foundries</span></li>
    <li><span class="">Power & Energy Sector</span></li>
    <li><span class="">Electrical & Electronic Industries</span></li>
    <li><span class="">Generation, Transmission, and Distribution</span></li>
    <li><span class="">Cement Industry</span></li>
    <li><span class="">Automobile Industry</span></li>
    <li><span class="">Material Handling Equipment</span></li>
    <li><span class="">Oil & Gas Sector</span></li>
  </ul></div>
        </div>
        
      </Link>
      <Link
                :href="route('laboratories')"
                
         data-aos="zoom-in"  data-aos-duration="4000" class=' select-none h-20 md:h-auto w-48 md:w-full relative  flex flex-col items-center border-2 md:border-4 border-orange-500 hover:bg-gradient-to-r  from-orange-200 to-red-500 md:from-orange-500  md:to-red-500 rounded-3xl  hover:text-white'>
          <img class='hidden md:block absolute w-20 md:w-48 -top-10 md:-top-32 ' src="/images/microscope.png" width={200} height={200} alt="staffing"/>
            <h2 class='text-md  md:font-extrabold py-5 md:pt-20  px-2 md:px-5 text-center'>Laboratories </h2>
            <div class="hidden sm:block">
            <div class='px-5  text-xs md:text-sm text-ellipsis overflow-hidden whitespace-pre-wrap  w-42 mb-1'>
    
  <ul class="list-disc px-5 list-inside space-y-1 text-xs md:text-sm md:pb-5 text-xs p-2 text-ellipsis overflow-hidden whitespace-pre-wrap">
    <li>Independent and Impartial Assistance: Reliable, accurate, and impartial analytical results.</li>
            <li>Comprehensive Product Analysis: Testing ensures compliance from exploration to delivery.</li>
            <li>Skilled Team & Advanced Techniques: Staffed with experts using classical and modern techniques for reliable results.</li>
            <li>ISO/IEC 17025:2017 Compliant: Adheres to international testing standards.</li>
            <li>NABL & EIC Accredited: Laboratories certified for mineral and material testing and global compliance.</li>
       
  </ul></div>
        </div>
        
      </Link>
      <Link
                :href="route('hydrocarbons')"
           data-aos="zoom-in"  data-aos-duration="4000" class=' select-none h-20 md:h-auto w-48 md:w-full relative  flex flex-col items-center border-2 md:border-4 border-orange-500 hover:bg-gradient-to-r  from-orange-200 to-red-500 md:from-orange-500  md:to-red-500 rounded-3xl  hover:text-white'>
          <img class='hidden md:block absolute w-20 md:w-60 -top-10 md:-top-32 ' src="/images/hydrocarbon.png" width={200} height={200} alt="staffing"/>
            <h2 class='text-md  md:font-extrabold py-5 md:pt-20  px-2 md:px-5 text-center'>Hydrocarbons </h2>
            <div class="hidden sm:block">
            <div class='px-5 text-sm  text-ellipsis overflow-hidden whitespace-pre-wrap  w-42 mb-1'>
              <h2 class="px-5 text-sm ">Core Services:</h2>
        <ul class="list-disc list-inside  text-sm px-5">
            <li>Pipeline Inspections</li>
            <li>Project Construction & Shutdown Inspections</li>
            <li>Stage-Wise Fabrication Inspections</li>
            <li>Technical Safety Audits</li>
        </ul>

        <h2 class=" px-5 text-sm ">Key Focus Areas:</h2>
        <ul class="list-disc list-inside  text-sm   px-5">
            <li>Oil & Gas Pipelines</li>
            <li>Petrochemical Plants</li>
            <li>Refineries</li>
            <li>Fertilizer Plants</li>
            <li>City Gas Distribution Networks</li>
        </ul>
      </div>
        </div>
        
      </Link>
      <Link
                :href="route('minerals')"
              data-aos="zoom-in"  data-aos-duration="4000" class=' select-none h-20 md:h-auto w-48 md:w-full relative  flex flex-col items-center border-2 md:border-4 border-orange-500 hover:bg-gradient-to-r  from-orange-200 to-red-500 md:from-orange-500  md:to-red-500 rounded-3xl  hover:text-white'>
          <img class='hidden md:block absolute w-20 md:w-48 -top-10 md:-top-32 ' src="/images/coal.svg" width={200} height={200} alt="staffing"/>
            <h2 class='text-md  md:font-extrabold py-5 md:pt-20  px-2 md:px-5 text-center'>Metals, Minerals & Ores </h2>
            <div class="hidden sm:block">
            <div class='px-5   text-xs md:text-sm text-ellipsis overflow-hidden whitespace-pre-wrap  w-42 mb-1'>
              <h2 class="px-5 text-sm ">Core Services:</h2>
        <ul class="list-disc list-inside  text-sm px-5">
          <li>Inspection & Supervision: Quality and handling checks across the supply chain.</li>
            <li>Sampling & Testing: Comprehensive material testing for quality assurance.</li>
            <li>Quantity Verification: Weight and number assessments (Draught Survey, Tally).</li>
            <li>Packaging & Transport Monitoring: Supervision of packing, labeling, and condition.</li>
            <li>Quality Assurance & Verification: Analysis and certification for quality.</li>
        </ul>

      </div>
        </div>
        
  </Link>
      
      </div>
        
    </div> -->
    
    
    <!-- <div class="flex justify-center md:py-0">
      <Link
                :href="route('sector')"
                class="  hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500 m-2"
                ><Button class="px-5 py-3  md:px-10 md:py-5 bg-gradient-to-r  from-orange-200 to-red-500 md:from-orange-500  md:to-red-500 rounded-full border-orange-400 text-medium border-2 hover:border-orange-400 hover:bg-transparent">Check out more </Button></Link
            >    </div>

    </div> -->
    <Services/>
    <div class="bg-white dark:bg-black text-black dark:text-white h-content py-10   relative">
    <img src="../../images/bg.png" 
       class="absolute inset-0 w-full h-full opacity-10 object-cover rounded-lg" 
       alt="Coal in Bag Background">
      <h1 class="text-black dark:text-white text-center  font-medium text-2xl md:text-5xl p-5 px-5  md:mb-5" > <span class="font-extrabold">OUR</span> PRESENCE</h1>
      
    
    <InteractivEmap data-aos="zoom-in" data-aos-duration="6000"/>

  </div>
    <!-- <div class="bg-white dark:bg-black text-black dark:text-white relative h-content  p-2  border-2 rounded-lg">
  <!-- Background Image -->
  <!-- <img src="/images/coal_in_bag.jpg" 
       class="absolute inset-0 w-full h-full opacity-30 object-cover rounded-lg" 
       alt="Coal in Bag Background">
      <h1 class=" text-center  font-medium text-2xl md:text-5xl p-5 md:p-10  opacity-90" data-aos="zoom-in" data-aos-duration="2000" > <span class="font-extrabold">ABOUT</span> US</h1>
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
  <h1 class="text-black dark:text-white text-center font-medium text-2xl md:text-5xl px-10 ">
    <span class="font-extrabold">OUR</span> CLIENTS
  </h1>
  <div class="md:py-10 py-5 px-5">
    <div
      class="border-2 border-gray-300 dark:border-gray-700  grid md:grid-cols-5 grid-cols-3 dark:bg-black"
    >
      <div
        class="flex justify-center border border-gray-300 dark:border-gray-700 p-2"
        v-for="client in clients"
        :key="client.id"
      >
        <img
          class="md:opacity-80 hover:opacity-100 h-12 md:h-24 w-auto dark:grayscale dark:invert dark:hover:grayscale-0 dark:hover:invert-0 transition-all"
          :src="`../../images/clients/${client.image}`"
          alt="Client logo"
        />
      </div>
    </div>
  </div>
</div>


<div class="h-content p-10 bg-gray-200 dark:bg-black dark:text-white">
  <h1 class="text-2xl md:text-5xl font-medium flex justify-center  md:p-10"><span class="font-extrabold pr-1">WHY </span> QSSPL ?</h1>

  <div class="md:flex ">
    <div  class="border-2 my-5 bg-white dark:bg-black dark:text-white px-4" >
        <div class="flex items-center gap-4 py-2 px-2 ">
           <span><i class="material-icons text-orange-400 text-4xl px-2">devices</i></span>
            <span class="text-base md:text-xl ">IT Solution</span>
        </div>
    <p class="m-0 text-base  px-5 pb-3">
      We would deploy digital platform for sample collection, preparation and
tracking of samples. The platform will have live streaming of CCTV footage
from Sample preparation room
    </p>
  </div>
<div  class="border-2 my-5 bg-white dark:bg-black dark:text-white px-4" >
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-orange-400 text-4xl">video_call</i></span>
            <span class=" text-base md:text-xl">Monitoring</span>
        </div>
    <p class="m-0 text-base   px-1 pb-3">
      We will have dedicated 24*7 available team for monitoring ground operations
and addressing any issue in real time.
    </p>
  </div>
<div  class="border-2 my-5 bg-white dark:bg-black dark:text-white px-4" >
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-orange-400 text-4xl">record_voice_over</i></span>
            <span class="text-base md:text-xl ">Customer
Support</span>
        </div>
    <p class="m-0 text-base  px-5 pb-3">
      We shall have a Dedicated Customer Support team to address any issues
they may face. The team may be reached through call, text, WhatsApp
groups or e-mail.

    </p>
  </div>
<div  class="border-2 my-5 bg-white dark:bg-black dark:text-white px-4" >
        <div class="flex items-center gap-4 py-2 px-2">
           <span><i class="material-icons text-orange-400 text-4xl">precision_manufacturing</i></span>
            <span class=" text-base md:text-xl">Mechanized Sampling
Process
</span>
        </div>
    <p class="m-0 text-base  px-5 pb-3">
      Sampling procedure involves drawing samples from every 8th truck in which
other trucks will get affected , which create congested environment. Multiple
Exit points in some areas also create hindrances for sampling.
    </p>
  </div>
  </div>
</div>
<div class="bg-white dark:bg-black text-black dark:text-white">


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
        <div class="bg-orange-100 dark:bg-black  p-5 rounded font-medium m-2 w-full">
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
import { ref, onMounted } from "vue";
import Galleria from 'primevue/galleria';

import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DarkModeToggle from '@/Components/DarkModeToggle.vue';
import InteractivEmap from '@/Components/InteractivEmap.vue';
import Counter from '@/Components/Counter.vue';
import Services from '@/Components/Services.vue';

const images = ref([
    {
        itemImageSrc: '/images/hero_image.webp',
        alt: 'Image 1',
        
        title: 'QSSPL handles the third party sampling, preparation and analysis of coal supplied to consumers by Coal India Limited.'
    },
    
   
    
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
const clients = [{image:'coal_india.png'},

// {image:'hpgcl.png'},
{image: 'mahagenco.png'},
{image: 'mp_power.png'},
{image: 'npl.png'},
{image: 'ntpc.png'},
// {image: 'qci.png'},
{image: 'rpcl.png'},
{image: 'UPRVUNL.png'},
{image: 'vedanta.png'},
{image: 'aditya_birla.png'},
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
{image : 'wbpdcl.png'}

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
