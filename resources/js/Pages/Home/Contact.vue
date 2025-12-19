
<template >
<Head>
    <title>{{ metaTitle }}</title>
    <meta name="description" :content="metaDescription">
  </Head>    <div class="bg-tint-primary h-content">
      <NavBar2 class="">
        <div class="flex align-items-center gap-2">
    <DarkModeToggle/>
    <div class="">
        <div v-if="canLogin" class="p-2">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            ><Button class="border-2  p-2 text-sm  border-red-600 text-red-600 ">Dashboard</Button></Link
        >

        <template v-else>
            
            <Link
                :href="route('login')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2 rounded-full p-2 text-sm  border-red-600 font-extrabold text-red-600 ">Employee Login </Button></Link
            >
          
    
        </template>

    </div>

    </div>
  </div>
      </NavBar2>
      
      <div class="md:mt-20 dark:bg-black">

        <div id="map" class="" style="height: 400px;z-index: 0;"></div>
       </div> 
       
    </div>
 
    <div class="p-5 md:flex justify-between w-full dark:bg-black">
    <Fieldset class="md:w-1/3 m-2 dark:bg-black dark:text-white border-2" toggleable="true">
    <template #legend>
        <div class="flex items-center gap-2 px-2">
            <i class="material-icons text-red-600">apartment</i>
            <span class="font-bold">Head Office</span>
        </div>
    </template>
    <p class="m-0">
        Flat-8, Wing-A, 3rd Floor, Moiz Apartment, 12th Tps Road, Santacruz (East), Mumbai 400 055, Maharashtra, India</p>
</Fieldset>
<Fieldset class="md:w-1/3 m-2 dark:bg-black dark:text-white border-2" toggleable="true">
    <template #legend>
        <div class="flex items-center gap-2 px-2">
            <i class="material-icons text-blue-600">science</i>
            <span class="font-bold">Laboratory</span>
        </div>
    </template>
    <p class="m-0">
        Vigyan Vihar Colony, Near Airport, Barwadda, Dhanbad, Jharkhand - 826 004. </p>
</Fieldset>
<Fieldset class="md:w-1/3 m-2 dark:bg-black dark:text-white border-2" toggleable="true">
    <template #legend>
        <div class="flex items-center gap-2 px-2">
            <i class="material-icons text-green-600 ">support_agent</i>
            <span class="font-bold">Branch Office</span>
        </div>
    </template>
    <p class="m-0">
        2nd Floor, 13 Charotar Society, Opp. New Alka Restaurant, Manisha Char Rasta, Old Padra Road, Baroda, Gujarat – 390 020.</p>
</Fieldset>
 </div>
 <div class="dark:bg-black dark:text-white">
 <h1 class="text-4xl md:text-5xl font-medium flex justify-center pt-20 "><span class="font-extrabold pr-1">CONTACT </span>US</h1>

<div class="py-10  md:flex  w-full items-center dark:bg-black dark:text-white">
  
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

<PrimaryButton @click="submitForm" icon="pi pi-spin pi-spinner"
    :loading="loading"
    :disabled="loading">Submit</PrimaryButton>   
     </div>
    
     <!-- <Divider layout="vertical" class="md:border-2 border-red-600" /> -->
      <img src="/images/contact-us-2.png" class="w-auto h-96 hidden md:block">

     <div class="w-full   md:m-20 p-10 md:p-0 flex flex-col items-center ">
        <!----<div class="bg-orange-100 dark:bg-black p-5 rounded font-medium m-2 w-full">
            <a href="tel:+918104963103">
            <span><i class="pi pi-phone pr-2"></i>+91 8104963103</span>
            
            </a>
        </div>-->
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
 <Footer/>
</template>


<script setup>
import { Head,Link } from '@inertiajs/vue3';
import Button from 'primevue/button';
import { ref, onMounted ,reactive} from "vue";
import L from 'leaflet';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Fieldset from 'primevue/fieldset';
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import Divider from 'primevue/divider'
import Footer from '@/Components/Footer.vue';
import NavBar2 from '@/Components/NavBar2.vue';
import Dropdown from 'primevue/dropdown';
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
import axios from 'axios';

const loading = ref(false)



import DarkModeToggle from '@/Components/DarkModeToggle.vue';

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
    { label: 'IT', value: 'IT' },
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
        alert(response.data.message)

        // reset form
        Object.keys(form).forEach(key => form[key] = '')

    } catch (error) {
        console.error(error)

        if (error.response?.status === 422) {
            // Laravel validation errors
            console.log(error.response.data.errors)
        } else {
            alert('Something went wrong. Please try again.')
        }
    }
    finally {
        loading.value = false
    }

}










// Define Leaflet map as a ref
const map = ref(null);
onMounted(() => {
  // Initialize the Leaflet map
  map.value = L.map('map').setView([20, 0], 2); // Set initial center and zoom level

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map.value);

  const createCustomIcon = (iconUrl) => {
  return L.icon({
    iconUrl: iconUrl,
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    tooltipAnchor: [16, -28],
    shadowSize: [41, 41],
    shadowAnchor: [12, 41]
  });
};

const markerColors = ['red', 'blue', 'green'];

  // Function to create a marker with a popup containing a link to Google Maps
  const createMarker = (lat, lng, popupContent,customIconColor) => {
    const marker = L.marker([lat, lng],{ icon: L.divIcon({ className: 'leaflet-div-icon', html: `<i class="pi pi-map-marker text-3xl font-extrabold"  style='color: ${customIconColor};'></i>` }) }).addTo(map.value);
    marker.bindPopup(popupContent);
    return marker;
  };
  // Add markers for each location with links to Google Maps
  const marker1 = createMarker(19.082379540260924, 72.80407541440516, '<strong>Corporate Office/Head Office</strong><br><a href="https://www.google.com/maps?q=19.082379540260924,72.80407541440516" target="_blank">View on Google Maps</a>',markerColors[0]);
  const marker2 = createMarker(23.818207, 86.427579, '<strong>Laboratory</strong><br><a href="https://www.google.com/maps?q=23.818207,86.427579" target="_blank">View on Google Maps</a>',markerColors[1]);
  const marker3 = createMarker(22.318314, 73.180240, '<strong>Branch Office</strong><br><a href="https://www.google.com/maps?q=22.318314,73.180240" target="_blank">View on Google Maps</a>',markerColors[2]);

  // Create a group for the markers
  const markersGroup = L.featureGroup([marker1, marker2, marker3]);

  // Fit the map to the bounds of the markers
  map.value.fitBounds(markersGroup.getBounds());
});
</script>

<style scoped>
a#pv_id_2_0_header_action{
color: #f0f0f0; /* Set your desired background color */
  border-bottom: 2px solid #007bff; /* Set your desired border color */
}
</style>