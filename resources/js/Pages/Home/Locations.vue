<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Button from 'primevue/button';
import Footer from '@/Components/Footer.vue';
import NavBar2 from '@/Components/NavBar2.vue';
import DarkModeToggle from '@/Components/DarkModeToggle.vue';

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: {
    type: String,
    required: true,
  },
  phpVersion: {
    type: String,
    required: true,
  },
  metaTitle: String,
  metaDescription: String,
});
</script>

<template>
  <Head>
    <title>{{ metaTitle }}</title>
    <meta name="description" :content="metaDescription" />
    <meta
      name="keywords"
      content="QSS India, Industrial Inspection, Testing Laboratory, Noida Office, Mumbai Office, Delhi Lab, Vashi Laboratory, Indore Lab, Gandhidham Lab, Rajkot Office, Unjha Office, Mundra Office, Nagpur Office, Vizag Office"
    />

    <!-- Open Graph -->
    <meta property="og:title" :content="metaTitle" />
    <meta property="og:description" :content="metaDescription" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.qssindia.in/locations" />
    <meta property="og:image" content="/images/qss-cover.jpg" />
  </Head>

  <NavBar2>
    <div class="flex align-items-center">
      <DarkModeToggle />
      <div>
        <div v-if="canLogin" class="p-2">
          <Link v-if="$page.props.auth.user" :href="route('dashboard')">
            <Button class="border-2 p-4 border-red-600 text-red-600">
              Dashboard
            </Button>
          </Link>

          <template v-else>
            <Link :href="route('login')">
              <Button
                class="border-2 p-2 rounded-full text-sm border-red-600 md:font-extrabold text-red-600"
              >
                Employee Login
              </Button>
            </Link>
          </template>
        </div>
      </div>
    </div>
  </NavBar2>

  <div class="bg-white dark:bg-black dark:text-white font-medium">
    <h1
      class="text-2xl mt-12 md:text-5xl font-medium flex justify-center py-5 md:py-10 bg-gradient-to-r from-orange-100 to-red-400 dark:text-black"
    >
      <span class="font-extrabold pr-2">OUR</span>LOCATIONS
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-5">
      <!-- NOIDA -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Noida - Office</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          <span itemprop="streetAddress">B-27 Logix Technova, Sector 132</span>,
          <span itemprop="addressLocality">Noida</span>,
          <span itemprop="addressRegion">UP</span> -
          <span itemprop="postalCode">201301</span>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+918591924990" itemprop="telephone">+91-8591924990</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:info@qssindia.in" itemprop="email">info@qssindia.in</a>
        </p>
      </div>

      <!-- MUMBAI -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Mumbai - Office</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          <span itemprop="streetAddress">Flat-8, Wing-A, 3rd Floor, Moiz Apartment, 12th TPS Road, Santacruz (East)</span>,
          <span itemprop="addressLocality">Mumbai</span> -
          <span itemprop="postalCode">400055</span>, MH
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+918591924990" itemprop="telephone">+91-8591924990</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:info@qssindia.in" itemprop="email">info@qssindia.in</a>
        </p>
      </div>

      <!-- DELHI -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Delhi - Office & Lab</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          Quality Services & Solutions Pvt Ltd, Plot No. 10, Second Floor, DSIDC Scheme III, Industrial Area Phase-II, Okhla
          <span itemprop="addressLocality">New Delhi</span> -
          <span itemprop="postalCode">110020</span>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+918595343496" itemprop="telephone">+91-8595343496</a>

          <a href="tel:+918882376753" itemprop="telephone">+91-8882376753</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:qss_del@qssindia.com" itemprop="email">qss_del@qssindia.com</a>
        </p>
      </div>

      <!-- VASHI -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Vashi - Office & Laboratory</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          Plot No. 70 & 71, 2nd Floor, Sector 19/A, Near Fab Pranava Hotel, Vashi,
          <span itemprop="addressLocality">Navi Mumbai</span> -
          <span itemprop="postalCode">400705</span>, MH
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+912227830016" itemprop="telephone">+91-22-27830016/17</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:agri.mumbai@qitservices.in" itemprop="email">agri.mumbai@qitservices.in</a>
        </p>
      </div>

      <!-- INDORE -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Indore – Office & Laboratory</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          202-205 Sapphire Twins, Scheme No. 54, Opposite Malhar Mega Mall, A. B. Road,
          <span itemprop="addressLocality">Indore</span> -
          <span itemprop="postalCode">452010</span>, MP
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+917314001048" itemprop="telephone">+91-731-4001048/49</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:vp.agri@qitservices.in" itemprop="email">vp.agri@qitservices.in</a>
        </p>
      </div>

      <!-- GANDHIDHAM ADMIN -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Gandhidham – Admin Office</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          Plot No. 81, Sector 1/A, Near Hero Bike Showroom,
          <span itemprop="addressLocality">Gandhidham, Kutch</span> -
          <span itemprop="postalCode">370201</span>, GJ
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+919099008293" itemprop="telephone">+91-9099008293</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:agri.gujarat@qitservices.in" itemprop="email">agri.gujarat@qitservices.in</a>
        </p>
      </div>

      <!-- GANDHIDHAM LAB -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Gandhidham – Laboratory</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          Plot No. 11, Sector 10/C, GIDC, Kandla Port Road, Near TTC Weighbridge,
          <span itemprop="addressLocality">Gandhidham, Kutch</span> -
          <span itemprop="postalCode">370201</span>, GJ
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+919998989723" itemprop="telephone">+91-9998989723</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:info.kandla@qitservices.in" itemprop="email">info.kandla@qitservices.in</a>
        </p>
      </div>

      <!-- RAJKOT -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Rajkot – Field Office</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          Shivaastha Residency, Near Siddhivinayak Mandap, B/h. ADB Hotel, Ronki,
          <span itemprop="addressLocality">Rajkot</span> -
          <span itemprop="postalCode">360006</span>, GJ
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+919998989724" itemprop="telephone">+91-9998989724</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:agri.gujarat@qitservices.in" itemprop="email">agri.gujarat@qitservices.in</a>
        </p>
      </div>

      <!-- UNJHA -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Unjha – Field Office</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          3rd Floor, Tirupati Complex, Opp. APMC Gate No. 8,
          <span itemprop="addressLocality">Unjha</span> -
          <span itemprop="postalCode">384170</span>, GJ
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+919723810755" itemprop="telephone">+91-9723810755</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:agri.gujarat@qitservices.in" itemprop="email">agri.gujarat@qitservices.in</a>
        </p>
      </div>

      <!-- MUNDRA -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Mundra – Field Office</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          Office No. 10, Ground Floor, Milin Ashok Complex, GIDC, Dhrub,
          <span itemprop="addressLocality">Mundra, Kutch</span> -
          <span itemprop="postalCode">370421</span>, GJ
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+919727779966" itemprop="telephone">+91-9727779966</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:Gujaratoperations@qitservices.in" itemprop="email">Gujaratoperations@qitservices.in</a>
        </p>
      </div>

      <!-- NAGPUR -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Nagpur – Office</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          Plot No. 238, 1st Floor, Ram Nagar,
          <span itemprop="addressLocality">Nagpur</span> -
          <span itemprop="postalCode">440033</span>, MH
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+919503591117" itemprop="telephone">+91-9503591117</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:agri.nagpur@qitservices.in" itemprop="email">agri.nagpur@qitservices.in</a>
        </p>
      </div>

      <!-- VIZAG -->
      <div class="border-2 border-black rounded p-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="text-xl font-bold" itemprop="name">Vizag – Office</h2>
        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          D. No. 27-32-9/2, 2nd Floor, 75 ft. Road, Near Hotel Dolphin,
          <span itemprop="addressLocality">Visakhapatnam</span> -
          <span itemprop="postalCode">530001</span>, AP
        </p>
        <p class="py-2 flex">
          <i class="pi pi-phone text-2xl"></i>
          <a href="tel:+919503591117" itemprop="telephone">+91-9503591117</a>
        </p>
        <p class="py-2 flex">
          <i class="pi pi-envelope text-2xl"></i>
          <a href="mailto:agri.nagpur@qitservices.in" itemprop="email">agri.nagpur@qitservices.in</a>
        </p>
      </div>
    </div>
  </div>

  <Footer />
</template>
