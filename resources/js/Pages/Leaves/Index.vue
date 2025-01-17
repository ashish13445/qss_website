<!-- resources/views/leave/leave-management.blade.php -->

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import axios from 'axios';
import { onMounted } from 'vue';
const errors = ref({
  start_date: '',
  end_date: '',
  reason: '',
  apply_date: ''
  // Add more error fields if needed
});
const isAddLeaveModalOpen = ref(false);
const iswork_from_homeModalOpen = ref(false);

const leaveType = ref('');
const start_date = ref('');
const end_date = ref('');
const apply_date = ref('');
const reason = ref('');
const leaveHistory = ref([]);

const openAddLeaveModal = (type) => {
  leaveType.value = type;
  isAddLeaveModalOpen.value = true;
};

const openwork_from_homeModal = (type) => {
  leaveType.value = type;
  iswork_from_homeModalOpen.value = true;
};
const closeAddLeaveModal = () => {
  isAddLeaveModalOpen.value = false;
};
const closework_from_homeModal = () => {
  iswork_from_homeModalOpen.value = false;
};

const addLeave = (user_id) => {

  let leaveTypeValue = '';
  switch (leaveType.value) {
    case 'PL':
      leaveTypeValue = 'privilege_leave';
      break;
    case 'SL':
      leaveTypeValue = 'sick_leave';
      break;
    case 'CL':
      leaveTypeValue = 'casual_leave';
      break;
    case 'work_from_home':
      leaveTypeValue = 'work_from_home';
      start_date.value = apply_date.value;
      end_date.value = apply_date.value;
      break;  
  }
  axios
    .post('/leave/submit', {
       user_id: user_id,
      start_date: start_date.value,
      end_date: end_date.value,
      reason: reason.value,
      type: leaveTypeValue
    })
    .then((res) => {
      
      closeAddLeaveModal();
      getLeaveHistory();
      
    })
    .catch((error) => {
    // Handle any potential error here
    errors.value =  error.response.data.errors;
  });
    
};

const addwork_from_home = (user_id) => {


axios
  .post('/leave/submit', {
     user_id: user_id,
    start_date: apply_date.value,
    end_date: apply_date.value,
    reason: reason.value,
    type: leaveType.value,
  })
  .then((res) => {
    
    closework_from_homeModal();
    getLeaveHistory();
    
  })
  .catch((error) => {
  // Handle any potential error here
  errors.value =  error.response.data.errors;
});
  
};

const getLeaveHistory = () => {
  axios.get(`/leave/history`).then((res) => {
    leaveHistory.value = res.data;
  });
};
const leaveRequests = ref([]);
const getLeaveRequests = ()=>{
  axios.get('/leave/requests')
  .then((res)=>{
    leaveRequests.value = res.data;
  })
}
onMounted(getLeaveRequests);
onMounted(getLeaveHistory);

const acceptRequest = (leave)=>{
      axios.post('/leave/accept',leave)
      .then(()=>{
        getLeaveRequests();
      });

    }
    const rejectRequest = (leave)=>{
      axios.post('/leave/reject',leave)
      .then(()=>{
        getLeaveRequests();
      });

    }
const userName = ref('');

const getUserName = async (id) => {
  try {
    const response = await axios.get(`/user/${id}`);
    userName.value = response.data.name;
  } catch (error) {
    console.error('Error fetching user name:', error);
  }
};
</script>






<template>
  <Head title="Leave Management" />

  <AuthenticatedLayout>
    <div class="py-12" >
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 dark:text-white  overflow-hidden shadow-sm sm:rounded-lg p-5">
          
          <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full text-left text-bold font-light text-center">
                    <thead class="border border-indigo-900  font-medium dark:border-neutral-500">
                      <tr class="bg-indigo-400 text-white">
                        <th scope="col" class="px-6 py-4 border border-indigo-900">Name</th>
                        <th scope="col" class="px-6 py-4 border border-indigo-900">Start Date</th>
                        <th scope="col" class="px-6 py-4 border border-indigo-900">End Date</th>
                        <th scope="col" class="px-6 py-4 border border-indigo-900">Reason</th>
                        <th scope="col" class="px-6 py-4 border border-indigo-900">Type</th>
                        <th scope="col" class="px-6 py-4 border border-indigo-900">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="leave in leaveRequests.pendingLeaveRequests">
                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{ leave.user.name }}</td>
                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{ leave.start_date}}</td>
                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{ leave.end_date }}</td>
                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{ leave.reason }}</td>
                        <td v-if="leave.type=='privilege_leave'" class="whitespace-nowrap px-6 py-4 border border-indigo-900"><span class="inline-block bg-yellow-600 text-white rounded-full px-2 py-1 text-xs font-semibold mr-2">Privilege Leave</span></td>
                        <td v-if="leave.type=='sick_leave'" class="whitespace-nowrap px-6 py-4 border border-indigo-900"><span class="inline-block bg-green-600 text-white rounded-full px-2 py-1 text-xs font-semibold mr-2">Sick Leave</span></td>
                        <td v-if="leave.type=='casual_leave'" class="whitespace-nowrap px-6 py-4 border border-indigo-900"><span class="inline-block bg-blue-600 text-white rounded-full px-2 py-1 text-xs font-semibold mr-2">Casual Leave</span></td>
                        <td v-if="leave.type=='work_from_home'" class="whitespace-nowrap px-6 py-4 border border-indigo-900"><span class="inline-block bg-red-900 text-white rounded-full px-2 py-1 text-xs font-semibold mr-2">work from home</span></td>

                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">
                          <div class="flex justify-center">
                      <button class="mr-4" @click="acceptRequest(leave)"><span><i class="material-icons" style="color: green;">task_alt</i></span></button>
                      <button @click="rejectRequest(leave)"><span><i class="material-icons" style="color: red;">cancel</i></span></button>
                    </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

    
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Leave Management</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 dark:text-white  overflow-hidden shadow-sm sm:rounded-lg p-5">
          <div class="md:flex">
            <PrimaryButton v-tooltip="'request a privelege leave'" @click="()=>openAddLeaveModal('PL')" class="m-3 md:mr-4" :disabled="$page.props.auth.user.paid_leaves<1">
              <i class="material-icons mx-1">add</i>
              <span>Request (P.L)</span>
              <span class="bg-white rounded-full text-black ml-2 p-2">
                {{$page.props.auth.user.paid_leaves}}
              </span>
              
            </PrimaryButton>
            <PrimaryButton v-tooltip="'request a sick leave'" @click="()=>openAddLeaveModal('SL')" class="m-3 md:mr-4" :disabled="$page.props.auth.user.sick_leaves<1">
              <i class="material-icons mx-1">add</i>
              <span>Request (S.L)</span>
              <span class="bg-white rounded-full text-black ml-2 p-2">
                {{$page.props.auth.user.sick_leaves}}
              </span>
              
            </PrimaryButton>
            <PrimaryButton v-tooltip="'request a casual leave'" @click="()=>openAddLeaveModal('CL')" class="m-3 md:mr-4" :disabled="$page.props.auth.user.casual_leaves<1">
              <i class="material-icons mx-1">add</i>
              <span>Request (C.L)</span>
              <span class="bg-white rounded-full text-black ml-2 p-2">
                {{$page.props.auth.user.casual_leaves}}
              </span>
              
            </PrimaryButton>

            <PrimaryButton style="background-color: red;"v-tooltip="'request Work From Home'" @click="()=>openwork_from_homeModal('work_from_home')" class="m-3 md:mr-4">
              <i class="material-icons mx-1">add</i>
              <span>Request work_from_home</span>
              
              
            </PrimaryButton>
          </div>

          <!-- Add Leave Modal -->
          <Modal :show="isAddLeaveModalOpen" @close="closeAddLeaveModal">
            <div class="modal-content p-5">
              <span class="close" @click="closeAddLeaveModal"><i class="material-icons" style="cursor: pointer;">close</i></span>

              <form @submit.prevent="addLeave($page.props.auth.user.id)">
                <div class="flex ">
                <div class="mt-4 mr-4">
                    <InputLabel for="start_date" value="Start date" />
                    <input type="date" v-model="start_date" autofocus required class="mt-1 block " id="start_date"/> 
                    <InputError class="mt-2" :message="errors.start_date[0]" /> <!-- Bind error message for start_date -->
                    
                </div>
                <div class="mt-4"> 
                    <InputLabel for="end_date" value="End date" />
                    <input type="date" v-model="end_date" autofocus required class="mt-1 block " id="end_date"/> 
                    <InputError class="mt-2" :message="errors.end_date[0]" /> <!-- Bind error message for start_date -->
                </div>
                </div>
               
                <div class="mt-4">
                    <InputLabel for="reason" value="Reason" />

                    <textarea
                        id="reason"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="reason"
                        required
                        autofocus
                    />

                </div>
                <div class="flex items-center justify-end mt-4">
                  <PrimaryButton class="ms-4">Submit Leave Request</PrimaryButton>
                </div>
              </form>
            </div>
          </Modal>
          <Modal :show="iswork_from_homeModalOpen" @close="closework_from_homeModal">
            <div class="modal-content p-5">
              <span class="close" @click="closework_from_homeModal"><i class="material-icons" style="cursor: pointer;">close</i></span>

              <form @submit.prevent="addwork_from_home($page.props.auth.user.id)">
                <div class="flex ">
                <div class="mt-4 mr-4">
                    <InputLabel for="apply_date" value="Date" />
                    <input type="date" v-model="apply_date" autofocus required class="mt-1 block " id="apply_date"/> 
                    <InputError class="mt-2" :message="errors.apply_date[0]" /> <!-- Bind error message for start_date -->
                    
                </div>
                
                </div>
               
                <div class="mt-4">
                    <InputLabel for="reason" value="Reason" />

                    <textarea
                        id="reason"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="reason"
                        required
                        autofocus
                    />

                </div>
                <div class="flex items-center justify-end mt-4">
                  <PrimaryButton class="ms-4">Submit WFH Request</PrimaryButton>
                </div>
              </form>
            </div>
          </Modal>


          <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full text-left text-bold font-light text-center">
                    <thead class="border border-indigo-900  font-medium dark:border-neutral-500">
                      <tr class="bg-indigo-400 text-white">
                        <th scope="col" class="px-6 py-4 border border-indigo-900">Start Date</th>
                        <th scope="col" class="px-6 py-4 border border-indigo-900">End Date</th>
                        <th scope="col" class="px-6 py-4 border border-indigo-900">Reason</th>
                        <th scope="col" class="px-6 py-4 border border-indigo-900">Type</th>
                        <th scope="col" class="px-6 py-4 border border-indigo-900">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="leave in leaveHistory">
                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{ leave.start_date }}</td>
                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{ leave.end_date }}</td>
                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{ leave.reason }}</td>
                        <td v-if="leave.type=='privilege_leave'" class="whitespace-nowrap px-6 py-4 border border-indigo-900"><span class="inline-block bg-yellow-600 text-white rounded-full px-2 py-1 text-xs font-semibold mr-2">Privilege Leave</span></td>
                        <td v-if="leave.type=='sick_leave'" class="whitespace-nowrap px-6 py-4 border border-indigo-900"><span class="inline-block bg-green-600 text-white rounded-full px-2 py-1 text-xs font-semibold mr-2">Sick Leave</span></td>
                        <td v-if="leave.type=='casual_leave'" class="whitespace-nowrap px-6 py-4 border border-indigo-900"><span class="inline-block bg-blue-600 text-white rounded-full px-2 py-1 text-xs font-semibold mr-2">Casual Leave</span></td>
                        <td v-if="leave.type=='work_from_home'" class="whitespace-nowrap px-6 py-4 border border-indigo-900"><span class="inline-block bg-red-900 text-white rounded-full px-2 py-1 text-xs font-semibold mr-2">Work from home</span></td>
                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900" >
                        <span v-if="leave.status == 'approved'" style="color: green;">{{ leave.status }}</span>  
                        <span v-else-if="leave.status == 'pending'" style="color: rgb(255, 196, 0);">{{ leave.status }}</span>  
                        <span v-else style="color: red;">{{ leave.status }}</span>  


                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
