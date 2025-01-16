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
});
</script>

<template >
    <Head title="Sectors" />
    
      <NavBar2 class="">
        <div class="flex align-items-center gap-2">
    
    <div class="">

        <div v-if="canLogin" class="p-2">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="text-black  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            ><Button class="border-2 p-4 border-red-600 text-red-600 ">Dashboard</Button></Link
        >

        <template v-else>
            <Link
                :href="route('contact')"
                class=" text-black  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500"
                ><Button class="  p-2 text-xs md:text-sm ">CONTACT US</Button></Link
            >
            <Link
                :href="route('login')"
                class="text-black  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2  rounded-full p-2 text-xs md:text-sm border-red-600 md:font-extrabold text-red-600 ">Employee Login </Button></Link
            >
          
    
        </template>

    </div>

    </div>
  </div>
      </NavBar2>
      <div class="bg-tint-primary h-content  md:mt-0 tracking-wider	">
<div class="bg-white">


    <div>
        <img src="../../../images/sectors.png" class="w-full" 
    </div>
    <h1 class="text-2xl md:text-5xl font-medium flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400 "><span class="font-extrabold pr-1">OUR </span>SECTORS</h1>

    <div class="px-5 md:px-20 pb-10">
        <section class="pb-10 flex flex-col md:flex-row items-center" >
            <div class="md:w-1/3">
                <img src="../../../images/consumer-goods.png" class="w-40 md:w-full">
            </div>
            <div class="md:w-2/3">
                <h1 class="text-medium md:text-xl font-semibold py-2 text-red-600">Consumer Goods Service Sector</h1>
            <p class="text-xs md:text-sm">
                QSS offers a range of services across 2 broad categories of Consumer Goods namely,<br/>
1.  Consumer Non Durables - <strong>F</strong>ast <strong>M</strong>oving <strong>C</strong>onsumer <strong>G</strong>oods (FMCG)<br/>
2.  Soft Goods <br/>
Our Consumer Non Durables team has the expertise to provide quality and quantity services for Edible Items (perishable items such as frozen fruits & vegetables, meat, sea food & processed food items) and Water.
            </p>
            </div>
            
        </section>
        <section class="pb-10 flex flex-col md:flex-row items-center" >
            <div class="md:w-1/3">
                <img src="../../../images/agriculture-products.png" class="w-40 md:w-full pr-10">
            </div>
            <div class="md:w-2/3">
            <h1 class="text-medium md:text-xl font-bold py-2 text-red-600">Agriculture Produce & Products </h1>
            <p class="text-xs md:text-sm">
                QSS provides a range of services including procurement supervision, weight control, systematic sampling, process monitoring, laboratory services, commissioning supervision, material balancing, various surveys (insurance, draught, break bulk), cleanliness inspection, loading/discharge supervision, photographic evidence, damage surveys, plant monitoring, warehouse management, and quality management auditing. They issue quality and quantity certificates for products such as animal feeds, food grains, oilseeds, spices, oils, and fats.
</p>
            <ul class="list-disc">
                <li>
                    <h3 class="text-xs md:text-sm md:text-md font-bold py-2 text-gray-600">
                        Animal Feeds: Soybean meal, rapeseed meal, cotton seed cake, castor seed meal, guar korma, etc.
                    </h3>
                    <p class="text-xs md:text-sm">
                        Tests: Moisture, protein, sand/silica, oil, fiber, urease activity, self-heating test.
                    </p>

                </li>
                <li>
                    <h3 class="text-xs md:text-sm md:text-md font-bold py-2 text-gray-600">
                        Agricultural Products:
                    </h3>
<p class="text-xs md:text-sm">
    <ul class="list-disc px-5 text-xs md:text-sm">
    <li>Food grains: Chickpeas, wheat, rice, jowar, bajra, maize, etc.
    </li>
    <li>Oilseeds: Sesame, groundnut, soya, sunflower, castor, etc.
    </li>
    <li>Spices: Cumin, fennel, fenugreek, turmeric, chili, coriander, etc.
    </li>
    <li>Oils: Groundnut, soya, rapeseed, rice bran, etc.
    </li>
    <li>Sugar</li>
    <li>Tests: Moisture, refractions, ash, density, length, curcumin, gluten, FFA, iodine value, peroxide value, saponification value, Lovibond color, pesticide residue, ochratoxin, aflatoxin, SHU, oil content, refractive index, polarization, ICUMSA color.





</li>

    </ul>
</p>
                </li>

            </ul>
        </div>
        </section>
        <section class="pb-10 flex flex-col md:flex-row items-center" >
            <div class="md:w-1/3">
                <img src="../../../images/engineer.png" class="w-40 md:w-full">
            </div>
            <div class="md:w-2/3">
            <h1 class="text-medium md:text-xl font-bold py-2 text-red-600">Engineering Service Sector</h1>
            <div class="text-xs md:text-sm">
                <p><span class="px-2">Our Engineering Division Services cover all types of inspection activities in various sectors namely <b>General Engineering Industry, Telecom Industry, Foundries, Power &amp; Energy Sector, Electrical and Electronic Industries, Generation, Transmission and Distribution, Cement Industry, Automobile Industry, Material Handling equipments, Oil &amp; Gas Sector, etc. </b></span></p><br/>
<span class="px-2">Some of the specific services are listed below:</span>
<ul>
    <li>1. <span class="px-2">Pre-qualification / Pre-award survey.</span></li>
    <li>2. <span class="px-2">Procurement Inspection of all engg: Mechanical/ Electrical.</span></li>
    <li>3. <span class="px-2">Expediting &amp; Progress Reporting</span></li>
    <li>4. <span class="px-2">Design Verification &amp; Drawing Approval - This service is offered for Power and distribution transformers, pressure vessels and material handling equipments such as Cranes, Fork Lifts etc.</span></li>
    <li>5. <span class="px-2">NDT Service in RT, UT, MPT, PT&nbsp; &amp; Evaluation.</span></li>
    <li>6. <span class="px-2">Audits/ Surveys of Plants, Projects, Natural Gas and Distribution  Networks</span></li>
    <li>7. <span class="px-2">Project site supervision &amp; inspection for Erection &amp; Commissioning, etc.</span></li>
    <li>8. <span class="px-2">Inspection &amp; supervision of Heavy Steel Structure, Transmission Towers, etc during Fabrication &amp; Erection.</span></li>
    <li>9. <span class="px-2">Inspection of Explosives.</span></li>
    <li>10. <span class="px-2">Supervision of packing, marking, stuffing, loading and unloading.</span></li>
    <li>11. <span class="px-2">Witnessing of type tests.</span></li>
    <li>12. <span class="px-2">Deputation of experts for overseas inspection and supervision work.</span></li>
    <li>13. <span class="px-2">Stage-wise and final inspection of     </span>
    <ul class="px-10">
        <li>1. <span class="px-2">Power and distribution transformers, sub-station equipments, HV &amp; LV switch gear and control panels.</span></li>
        <li>2. <span class="px-2">Material handling equipments like all EOT cranes, Conveyors, Gear Boxes etc.</span></li>
        <li>3. <span class="px-2">Pressure Vessels, Heat Exchangers, Boilers, Boiler Equipments etc.</span></li>
    </ul>
    </li>
</ul>
</div>
</div>
        </section>
        <section class="pb-10 flex flex-col md:flex-row items-center" >
            <div class="md:w-1/3">
                <img src="../../../images/hydrocarbon.png" class="w-40 md:w-full md:p-10">
            </div>
            <div class="md:w-2/3">
            <h1 class="text-medium md:text-xl font-bold py-2 text-red-600">Hydrocarbons Service Sector</h1>
            <div class="text-xs md:text-sm">
                <p><span class="px-2">Today&rsquo;s Oil &amp; Gas Sector is continuously evolving with the ever-increasing demand due to voracious consumption patterns. The global crude oil production is characteristically on the decline. Hardly any confidence is being generated considering the conservative figures reflected on the existing deposits front. Keeping this in mind and the surging demand, the existing reserves need to be utilized prudently and with utmost safety.</span></p>
<p><span class="px-2">We at QSS provide a wide range of inspection services provided to ascertain Quality, and safety to reduce risks across the various stages of supply and demand across the Oil &amp; Gas sector through a team of highly trained technical experts.</span></p>
<p><span class="px-2">Our scopes have included:</span></p>
<ul>
    <li>1. <span class="px-2">Inspection Services for Cross Country Oil &amp; Gas Pipeline &amp; City Gas                     Distribution set up.</span></li>
    <li>2. <span class="px-2">Inspection during project construction/ Shut down for Petrochemical Industry,                     Refineries and Fertilizer Plants.</span></li>
    <li>3. <span class="px-2">Stage wise inspection during Fabrication of Tank, Pressure Vessel, Reactor, Heat                     Exchange, etc.</span></li>
    <li>4. <span class="px-2">Technical Safety audit of Cross Country Hydrocarbon Pipeline &amp;                     its utilities.</span></li>
    <li>5. <span class="px-2">Technical Safety audit of City Gas distribution network including                     CNG stations -Domestic, Commercial &amp; Industrial Consumers of                     Natural Gas.</span></li>
</ul></div>
</div>
        </section>
        <section class="pb-10 flex flex-col md:flex-row items-center" >
            <div class="md:w-1/3">
                <img src="../../../images/microscope.png" class="w-40 md:w-full md:p-10">
            </div>
            <div class="md:w-2/3">
            <h1 class="text-medium md:text-xl font-bold py-2 text-red-600">Laboratories Service Sector</h1>
            <div class="text-xs md:text-sm">
                <p><span class="px-2">QSS laboratories offer the much-needed <b>independent</b> and <b>impartial</b> assistance to your business in the form of most reliable and accurate analytical results with a rapid turn around. Our laboratories undertake product evaluation to ascertain the product conformity to the specifications and standards as required by the local and international norms across the various stages such as exploration, prospecting, processing and delivery through shipment.</span></p>
<p><span class="px-2">We offer a range of testing services through a team of appropriately and highly experienced professionals who are adept with time-tested classical analysis and the modern instrumental methods.</span></p>
<p><span class="px-2">All our laboratories are governed by the QSS quality system based as per <b>ISO/IEC 17025:2005</b>.The main laboratories testing&nbsp; Minerals &amp; Ores are approved and accredited by <b>NABL</b> and <b>EIC</b>.</span></p>
 </div>
 </div>
        </section>
        <section class="pb-10 flex flex-col md:flex-row items-center" >
            <div class="md:w-1/3">
                <img src="../../../images/coal.svg" class="w-40 md:w-full md:p-20">
            </div>
            <div class="md:w-2/3">
            <h1 class="text-medium md:text-xl font-bold py-2 text-red-600">Metals, Minerals, Ores & Chemicals Service Sector</h1>
            <div class="text-xs md:text-sm">
                <p><span class="px-2">QSS provides a wide range of services to the Metals, Minerals, Ores and Chemicals sectors.</span></p>
<p><span class="px-2">We offer <b>Inspection</b>, <b>Supervision</b>, <b>Sampling</b>, <b>Testing</b> services as required for</span></p>
<ul>
    <li>1. <span class="px-2">Minerals, Ores &amp; Concentrates (Iron Ore &ndash; Lumps &amp; Pellets, Manganese Ore, Chrome Ores, etc.)</span></li>
    <li>2. <span class="px-2">Energy Minerals (Coal, Coke, Met Coke, etc.)</span></li>
    <li>3. <span class="px-2">Industrial Minerals (Bentonite, Gypsum, Salt, Soda Ash, Talc, Zeolite, etc)</span></li>
    <li>4. <span class="px-2">Raw materials for Cement, Steel &amp; Fertilizer Industries</span></li>
    <li>5. <span class="px-2">Raw and finished Fertilizers</span></li>
    <li>6. <span class="px-2">Building Stones (Granite, Limestone, Marble, Sandstone, Slate, etc.)</span></li>
    <li>7. <span class="px-2">Steel &amp; Scrap Metal</span></li>
    <li>8. <span class="px-2">Chemicals</span></li>
</ul>
<p><span class="px-2">Our regular scopes include:</span></p>
<ul>
    <li>1. <span class="px-2">Supervision of sampling at mine heads and delivery ends.</span></li>
    <li>2. <span class="px-2">Onsite quality testing laboratories.</span></li>
    <li>3. <span class="px-2">Load port / Disport Quality &amp; Quantity Inspection &amp; Supervision</span></li>
    <li>4. <span class="px-2">Quantity (Weight &amp; Numbers) determination, verification and assessments such as Draught Survey (Initial, Intermediate &amp; Final), Tally.</span></li>
    <li>5. <span class="px-2">Stuffing &amp; Loading Supervision.</span></li>
    <li>6. <span class="px-2">Inspection of cleanliness and load worthiness of vessel hatch/hold containers, as applicable.</span></li>
    <li>7. <span class="px-2">Transportable Moisture Limit (TML) Assessments.</span></li>
    <li>8. <span class="px-2">Inspection of packaging type and condition, checking marking &amp; labelling, damage to units, stowage, etc. Visual survey for units at point of loading to match purchase order specifications.</span></li>
    <li>9. <span class="px-2">Supervision for standardization / bagging / packing - Loss assessment of bulk / bagged material during handling, transit and transportation.</span></li>
    <li>10. <span class="px-2">Sampling and sample preparation across various stages of transport and storage.</span></li>
    <li>11. <span class="px-2">Laboratory Testing, Analysis and Certification for various quality parameters.</span></li>
    <li>12. <span class="px-2">Stock verification for periodic inventory checks &ndash; out turn reports.</span></li>
    <li>13. <span class="px-2">Provision of Photographic Evidence across various stages as required.</span></li>
</ul>
<span class="px-2">Over the last few years QSS has emerged as one of the leading independent third party surveyors in the mineral sector both locally and internationally.</span>
</div>
</div>
        </section>
    </div>
        
    
    </div>
</div>      
 <Footer/>
</template>

