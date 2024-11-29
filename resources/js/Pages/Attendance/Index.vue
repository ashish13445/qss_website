<script setup>
import { onMounted, reactive ,ref} from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Attendance from '../../Components/Attendance.vue'
import Attendance2 from '../../Components/Attendance2.vue'

import RegularizeRequests from '../../Components/RegularizeRequests.vue'
import RecievedRequests from '../../Components/RecievedRequests.vue'

import { Head } from '@inertiajs/vue3';
const state = reactive({
 user: {}
});
function fetchUser() {
 return axios.get('api/user')
 .then(response => {
  state.user = response.data;
  const urlParams = new URLSearchParams(window.location.search);
            const tabToShow = urlParams.get('tab');
            if (tabToShow) {
                activeTab.value = tabToShow;
            }
});
}
onMounted(fetchUser);
const activeTab = ref('tab1');
</script>


<template>
 <Head title="Demo" />
 <AuthenticatedLayout>
   <template #header>
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       Attendance
     </h2>
   </template>
<div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
         <div class="lg:p-6 text-gray-900">
          <div>
  <div>
    <div class="flex justify-evenly">
      <button
        @click="activeTab = 'tab1'"
        :class="{ 'bg-blue-500 text-white': activeTab === 'tab1' }"
        class="px-4 py-2  text-sm lg:text-xl lg:rounded focus:outline-none"
      >
        STATUS
      </button>
      <button
        @click="activeTab = 'tab2'"
        :class="{ 'bg-blue-500 text-white': activeTab === 'tab2' }"
        class="px-4 py-2 text-sm lg:text-xl lg:rounded focus:outline-none"
      >
        REGULARIZE REQUEST SENT
      </button>
      <!-- Add more buttons for additional tabs -->
      <button
      
        @click="activeTab = 'tab3'"
        :class="{ 'bg-blue-500 text-white': activeTab === 'tab3' }"
        class="px-4 py-2 text-sm lg:text-xl lg:rounded focus:outline-none"
      >
        REGULARIZE REQUEST RECIEVED
      </button>
    </div>

    <div v-if="activeTab === 'tab1'" class="mt-4 overflow-x-auto">
      <!-- Content for Tab 1 -->
      <p><Attendance/></p>
      <!-- <p><Attendance2/></p> -->
    </div>
    <div v-if="activeTab === 'tab2'" class="mt-4">
      <!-- Content for Tab 2 -->
      <p><RegularizeRequests/></p>
    </div>
    <div v-if="activeTab === 'tab3'" class="mt-4" >
      <!-- Content for Tab 2 -->
      <p><RecievedRequests/></p>
    </div>
    <!-- Add more divs for additional tab content -->
  </div>
</div>
         </div>
       </div>
     </div>
   </div>
 </AuthenticatedLayout>
</template>