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
     metaTitle: String,
  metaDescription: String
});
const data = [{name: 'Shashank Mehta',
                title: 'Director',
                label: 'test',
                image: 'coal.png'}]


                import { ref } from 'vue'

const activeTab = ref('board')

const active =
  'px-6 py-2 bg-red-900 text-white rounded-lg font-medium'
const inactive =
  'px-6 py-2 bg-gray-200 text-gray-700 rounded-lg'


  const team = [
  {
    name: 'Asmit Agrawal',
    position: 'CHRO',
    department: 'Admin & Finance',
    departmentDetails:
      'Handles audits, ISO compliance, documentation and process reviews.',
    photo: '/images/team/asmit_agrawal.png',
    email : 'asmit@qssindia.in'
  },
  {
    name: 'Asmit Agrawal',
    position: 'CHRO',
    department: 'Admin & Finance',
    departmentDetails:
      'Handles audits, ISO compliance, documentation and process reviews.',
    photo: '/images/team/asmit_agrawal.png',
    email : 'asmit@qssindia.in'
  },
  
]
</script>

<template >
<Head>
    <title>{{ metaTitle }}</title>
    <meta name="description" :content="metaDescription">
  </Head>    
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
                :href="route('login')"
                class="font-semibold  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2  p-2 rounded-full text-sm border-red-600 md:font-extrabold text-red-600 ">Employee Login </Button></Link
            >

            

            
          
    
        </template>

    </div>

    </div>
  </div>

        </NavBar2>
        
      
    <div class="bg-white" v-if="activeTab==='board'">
      
          <h1
      class="text-2xl md:mt-12 md:text-5xl font-medium text-center py-5 md:py-10
             bg-gradient-to-r from-orange-100 to-red-400"
    >
      <span class="font-extrabold pr-2">OUR</span>TEAM
    </h1>
      <div class="md:flex px-0 mx-0 md:px-32 "> <div class="w-screen py-5 "> <div class=" flex justify-center"> <img alt="user header" class=" h-auto w-auto " src="../../../images/team/padhye.png" /> </div> <div class=" text-xs md:text-lg text-center my-5 p-5 bg-red-900 text-white hover:bg-red-700"> <h2 class="text-sm md:text-md font-medium">Mr. Uday Padhye<br/>Director Technical</h2> </div> </div> <Divider/> <div class=" w-screen py-5"> <div class=" flex justify-center"> <img alt="user header" class="h-auto w-auto md:filter brightness-125" src="../../../images/team/vivek.png" /> </div> <div class="text-xs md:text-lg text-center my-5 p-5 bg-red-900 text-white hover:bg-red-700"> <h2 class="text-sm md:text-md font-medium">Mr. Vivek Sondhi <br/> Director-Operations</h2> </div> </div> <Divider/> <div class="w-screen py-5 "> <div class=" flex justify-center "> <img alt="user header" class="w-auto h-auto filter brightness-125" src="../../../images/team/mridul.png" /> </div> <div class=" text-xs md:text-lg text-center my-5 p-5 bg-red-900 hover:bg-red-700 text-white "> <h2 class="text-sm md:text-md font-medium">Mr. Mridul Kohli<br/>Director-Marketing</h2> </div> </div> <Divider/> <div class="w-screen py-5"> <div class="flex justify-center "> <img alt="user header" class=" h-auto w-auto filter brightness-125" src="../../../images/team/nakul_gupta.png" /> </div> <div class=" text-sm md:text-lg text-center my-5 px-2 py-5 bg-red-900 text-white hover:bg-red-700"> <h2 class="text-sm md:text-md font-medium">Mr. Nakul Gupta <br/> Executive Director/CEO</h2> </div> </div> </div> </div>


    <!-- <div class="bg-white ">
    <h1
      class="text-2xl md:mt-12 md:text-5xl font-medium text-center py-5 md:py-10
             bg-gradient-to-r from-orange-100 to-red-400"
    >
      <span class="font-extrabold pr-2">OUR</span>TEAM
    </h1>

    <div class="flex justify-center gap-4 my-6">
      <button
        @click="activeTab = 'board'"
        :class="activeTab === 'board' ? active : inactive"
      >
        Board of Directors
      </button>

      <button
        @click="activeTab = 'team'"
        :class="activeTab === 'team' ? active : inactive"
      >
        Departments
      </button>
    </div>

    <div class="bg-white" v-if="activeTab==='board'"> <div class="md:flex px-0 mx-0 md:px-32 "> <div class="w-screen py-5 "> <div class=" flex justify-center"> <img alt="user header" class=" h-auto w-auto " src="../../../images/team/padhye.png" /> </div> <div class=" text-xs md:text-lg text-center my-5 p-5 bg-red-900 text-white hover:bg-red-700"> <h2 class="text-sm md:text-md font-medium">Mr. Uday Padhye<br/>Director Technical</h2> </div> </div> <Divider/> <div class=" w-screen py-5"> <div class=" flex justify-center"> <img alt="user header" class="h-auto w-auto md:filter brightness-125" src="../../../images/team/vivek.png" /> </div> <div class="text-xs md:text-lg text-center my-5 p-5 bg-red-900 text-white hover:bg-red-700"> <h2 class="text-sm md:text-md font-medium">Mr. Vivek Sondhi <br/> Director-Operations</h2> </div> </div> <Divider/> <div class="w-screen py-5 "> <div class=" flex justify-center "> <img alt="user header" class="w-auto h-auto filter brightness-125" src="../../../images/team/mridul.png" /> </div> <div class=" text-xs md:text-lg text-center my-5 p-5 bg-red-900 hover:bg-red-700 text-white "> <h2 class="text-sm md:text-md font-medium">Mr. Mridul Kohli<br/>Director-Marketing</h2> </div> </div> <Divider/> <div class="w-screen py-5"> <div class="flex justify-center "> <img alt="user header" class=" h-auto w-auto filter brightness-125" src="../../../images/team/nakul_gupta.png" /> </div> <div class=" text-sm md:text-lg text-center my-5 p-5 bg-red-900 text-white hover:bg-red-700"> <h2 class="text-sm md:text-md font-medium">Mr. Nakul Gupta <br/> Executive Director/CEO</h2> </div> </div> </div> </div>

    <div
      v-if="activeTab === 'team'"
      class=""
    >
      <div class="overflow-x-auto px-6 md:px-60 py-10">
  <table class="min-w-full border border-gray-200 rounded-lg">
    <thead class="bg-gray-100">
      <tr>
        <th class="p-4 text-left"></th>
        <th class="p-4 text-left">Name</th>
        <th class="p-4 text-left">Position</th>
        <th class="p-4 text-left">Department</th>
      </tr>
    </thead>

    <tbody>
      <tr
        v-for="(member, index) in team"
        :key="index"
        class="border-t hover:bg-gray-50 "
      >
        <td class="p-4 flex justify-center">
          <img
            :src="member.photo"
            alt="member"
            class="w-20 h-20  object-cover"
          />
        </td>

        <td class="p-4 font-medium">
          {{ member.name }}
        </td>
         <td class="p-4 font-medium">
          {{ member.position }}
        </td>

        <td class="p-4 relative group cursor-pointer">
          <span class="text-red-900 font-medium underline">
            {{ member.department }}
          </span>

          <div
            class="absolute left-0 top-full mt-2 w-64 bg-white border shadow-lg
                   rounded-lg p-4 text-sm opacity-0 scale-95
                   group-hover:opacity-100 group-hover:scale-100
                   transition-all duration-200 z-20"
          >
            <h4 class="font-semibold text-red-900 mb-1">
              {{ member.department }}
            </h4>
            <p class="text-gray-600">
              {{ member.departmentDetails }}
            </p>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

    </div>
  </div> -->
        
 <Footer/>
</template>

