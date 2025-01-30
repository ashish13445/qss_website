<template>
<div class="flex">
    <select v-model="selectedArea" @change="fetchUsers" id="area"
            class="block w-1/4 mt-1 p-2 border border-gray-500 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-xs md:text-sm">
      <option value="">Select Area</option>    
      <option v-for="area in assigned_area" :key="area.id" :value="area.id">{{ area.name }}</option>
    </select>
    </div>

    <div>

      <PrimaryButton style="background-color: rgb(214, 12, 12);" class="my-5" @click="openRestModal" 
      :disabled="checkAnyAttendanceExist()"      >Mark Rest</PrimaryButton>
      <Modal :show="isRestModalOpen" @close="closeRestModal()">
            <div class="p-5">
              <span class="close" @click="closeRestModal()"><i class="material-icons" style="cursor: pointer;">close</i></span>
              <form @submit.prevent="markRestForToday();closeRestModal()">
                <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full text-left text-bold font-light text-center">
                        <thead class="border border-indigo-900  font-medium dark:border-neutral-500">
                          <tr class="bg-indigo-400 text-white">
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Name</th>
                            <th scope="col" class="px-6 py-4 border border-indigo-900">On Rest</th>
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Rest Days</th>


                          </tr>
                          </thead>
                  <tr v-for="user in activeUsers" :key="user.id" class="border border-indigo-900 transition duration-300 ease-in-out lg:hover:bg-neutral-100 dark:border-neutral-500 lg:dark:hover:bg-neutral-600">
                    <td class="whitespace-nowrap px-6 py-4 font-extrabold border border-indigo-900">
                      <label :for="`user-${user.id}`" class="w-1/4">{{ user.name }}</label>
                    </td>
                  <td class="whitespace-nowrap px-6 py-4 font-extrabold border border-indigo-900">
                    <input
                    :id="`user-${user.id}`"
                    type="checkbox"
                    v-model="user.markedRest"
                  />
                  <label :for="`user-${user.id}`" class="ml-2">
                   {{ user.markedRest }}
                  </label>
                  </td>
                  <td class="whitespace-nowrap px-6 py-4 font-extrabold border border-indigo-900">
                    {{ user.rest_days }}
                  </td>

                </tr>
              </table>
                    </div>
                  </div>
                </div>
              </div>

                <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Mark Rest</button>
              </form>
            </div>
          </Modal>
    </div>
    <div>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">{{ project.title }} Attendance Sheet</h2>
      <h2 class="font-extrabold text-2xl text-gray-600 leading-tight">{{ today.toDateString() }}</h2>
        <div class="flex " >
            <div v-for="shift in shifts" :key="shift"  >
        <div class="py-5 pr-8 " >
                <PrimaryButton class="ml-4" :disabled="isAttendanceExist(shift)"   :class="{ 'bg-gray-300': isAttendanceExist(shift) }"  @click="loadAttendanceData();openModalForShift(shift)" @close="closeRegisterModal">
                 <span v-if="shift == 1">

                  Normal Shift 
                  </span>
                  <span v-else>
                    Overtime {{ shift-1 }}
                  </span>
                  
                </PrimaryButton>
                <p v-if="isAttendanceExist(shift)" class="text-center mt-5 font-extrabold text-small  leading-tight text-green-600"><i class="material-icons">done_all</i></p>
        </div>

  
          <Modal :show="getModalState(shift)" @close="closeRegisterModal">
            <div class="p-5">
              <span class="close" @click="closeRegisterModal"><i class="material-icons" style="cursor: pointer;">close</i></span>
              <form @submit.prevent="updateAttendanceForShift(shift); closeRegisterModal()">
<div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full text-left text-bold font-light text-center">
                        <thead class="border border-indigo-900  font-medium dark:border-neutral-500">
                          <tr class="bg-indigo-400 text-white">
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Name</th>
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Attendance</th>
                          </tr>
                          </thead>
                  <tr v-for="user in activeUsers" :key="user.id" class="border border-indigo-900 transition duration-300 ease-in-out lg:hover:bg-neutral-100 dark:border-neutral-500 lg:dark:hover:bg-neutral-600 ">
                    <td class="whitespace-nowrap px-6 py-8 font-extrabold border border-indigo-900 ">
                      <label :for="`user-${user.id}`" class="w-1/4 px-6 py-8">{{ user.name }}</label>
                    </td>
                    <td  class="whitespace-nowrap px-6 py-4 font-extrabold border border-indigo-900 w-1/6">
                      <input
                    :id="`user-${user.id}`"
                    type="checkbox"
                    v-model="getUserAttendance(user.id, shift).present"
                  />
                    </td>

                    </tr></table></div></div></div></div>
                
                <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Update</button>
              </form>
            </div>
          </Modal>
        </div>
        </div>
        <PrimaryButton v-tooltip="'Export as CSV'" class="my-2 mr-2" @click="exportCSV"><i class="pi pi-file-export"></i></PrimaryButton>

    <div v-if="allowed" class="flex flex-col">

         <DataTable v-model:filters="filters" filterDisplay="row" :value="users" showGridlines :sortOrder="-1" paginator :rows="10"  tableStyle="min-width: 50rem" class="text-xs md:text-sm" 
:globalFilterFields="['name']"
>    <Column field="employee_id" header="Employee Id" sortable  style="border: 2px solid black;width: 25%; color:black; font-weight: bolder;" header-style="background-color: #2196F3;color: #ffff; font-weight: bolder"></Column>
    <Column field="name" header="Name" sortable style="border: 2px solid black;width: 40%;color:black; font-weight: bolder;" header-style="background-color: #2196F3;color: #ffff; font-weight: bolder">
      <template #filter="{ filterModel, filterCallback }">
        <InputText
          v-model="filterModel['value']"
          type="text"
          @input="filterCallback()"
          class="p-column-filter"
          placeholder="Search by name"
        />        </template>
    </Column>
    <Column field="email" header="E-mail" sortable style="border: 2px solid black;width: 25%;color:black; font-weight: bolder;" header-style="background-color: #2196F3;color: #ffff; font-weight: bolder">
    </Column>
    <Column header="Regularize"  style="border: 2px solid black;width: 25%;" header-style="background-color: #2196F3;color: #ffff; font-weight: bolder">
    <template #body="{data}" >
      <i class="pi pi-spin pi-cog" @click="openRegularizeModal(data.time_entries,data,data.id)" style="font-size: 2rem; cursor: pointer;"></i>  
      <Modal :show="isRegularizeModalOpen" @close="closeRegularizeModal">
  <div class="p-5">
    <span class="close" @click="closeRegularizeModal">
      <i class="material-icons cursor-pointer">close</i>
    </span>
    <div v-if="!showPage2">
      <h1>Page 1</h1>
      <DataTable
        v-if="isRegularizeModalOpen"
        :value="groupByDateAndShift(attendance_entries)"
        :sortOrder="-1"
        tableStyle=""
        dataKey="id"
        class="text-xs md:text-sm"
      >
        <Column
          field="date"
          header="Date"
          class="column-header"
          header-class="header-background"
        />
        <Column
          header="N.S"
          class="column-header"
          header-class="header-background"
        >
          <template #body="{ data }">
            {{ data.shifts[0].status !== 'absent' ? 1 : 0 }}
          </template>
        </Column>
        <Column
          header="O.S"
          class="column-header"
          header-class="header-background"
        >
          <template #body="{ data }">
            <template v-if="data.shifts[1].status !== 'absent' && data.shifts[2].status === 'absent'">
              1
            </template>
            <template v-else-if="data.shifts[2].status !== 'absent'">
              2
            </template>
            <template v-else>
              0
            </template>
          </template>
        </Column>
        <Column
          header="Remarks"
          class="column-header"
          header-class="header-background"
        >
          <template #body="{ data }">
            <span
              v-if="data.shifts.some(shift => shift.status === 'present')"
              class="text-green-500"
            >
              present
            </span>
            <span
              v-else-if="data.shifts[0].status === 'leave'"
              class="text-yellow-500"
            >
              {{ data.shifts[0].status }}
            </span>
            <span
              v-else-if="data.shifts[0].status === 'rest'"
              class="text-blue-500"
            >
              {{ data.shifts[0].status }}
            </span>
            <span v-else class="text-red-500">
              {{ data.shifts[0].status }}
            </span>
          </template>
        </Column>
        <Column
          header="Regularize"
          class="column-header"
          header-class="header-background"
        >
          <template #body="{ data }">
            <PrimaryButton
              v-if="data.shifts[0].status === 'present'"
              class="m-3 red-background"
              v-tooltip="'mark absent'"
              @click="selectedDate = data.date; deleteAttendance('present')"
            >
              <i class="pi pi-chevron-circle-right"></i>
            </PrimaryButton>
            <PrimaryButton
              v-else-if="data.shifts[0].status === 'rest'"
              class="m-3 red-background"
              v-tooltip="'mark absent'"
              @click="selectedDate = data.date; deleteAttendance('rest')"
            >
              <i class="pi pi-chevron-circle-right"></i>
            </PrimaryButton>
            <div v-else>
              <PrimaryButton
                class="m-3"
                v-tooltip="'mark present'"
                @click="showPage2 = true; selectedDate = data.date"
              >
                <i class="pi pi-chevron-circle-right"></i>
              </PrimaryButton>
              <PrimaryButton
                class="m-3 green-background"
                v-tooltip="'mark rest'"
                @click="selectedDate = data.date; markRest()"
              >
                <i class="pi pi-chevron-circle-right"></i>
              </PrimaryButton>
            </div>
          </template>
        </Column>
      </DataTable> 
    </div>
    <div v-else>
      <div>
        <span>
          <i class="material-icons cursor-pointer text-blue-500" @click="showPage2 = false">arrow_back</i>
        </span>
        <h1>Page 2</h1>
        <p class="font-extrabold">Date: {{ selectedDate }}</p>
        <form @submit.prevent="submitRegularizeRequest" class="flex flex-col p-5">
          <label for="clockIn" class="p-3">Clock In:</label>
          <input type="datetime-local" v-model="clockIn" />
          <label for="reportingManager" class="p-3">Reporting Manager:</label>
          <select v-model="reporting_manager.id">
            <option :value="reporting_manager.id">{{ reporting_manager.name }}</option>
          </select>
          <PrimaryButton type="submit" class="mt-5">Submit</PrimaryButton>
        </form>
      </div>
    </div> 
  </div> 
</Modal>


    </template>
    </Column>
    
    

</DataTable>
        </div>
        </div>
        <div class="flex flex-direction-column justify-end">
          <input type="checkbox" v-model="allowed" /> 
        </div>
        <!-- </div>
        </div>
        
    
      </div> -->
      
  </template>
  <style scoped>
.column-header {
  color: black;
  border: 2px solid black;
  font-weight: bolder;
}

.header-background {
  background-color: #2196f3;
  color: #fff;
  font-weight: bolder;
}

.red-background {
  background-color: red;
}

.green-background {
  background-color: green;
}

.cursor-pointer {
  cursor: pointer;
}

</style>
  <script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import InputText from 'primevue/inputtext';
import Column from 'primevue/column';
import PrimaryButton from '../../Components/PrimaryButton.vue';
import Modal from '../../Components/Modal.vue';
import UpdateUserProfile from '../Profile/Partials/UpdateUserProfile.vue';
import iziToast from 'izitoast';
import 'izitoast/dist/css/iziToast.min.css';
import { watch } from 'vue';
const assigned_area = ref([]);
const selectedArea = ref();
const allowed = ref(false);
const filters = ref({
      'name': { value: null, matchMode: 'contains' }
    });
const deleteAttendance = (status) =>{
  iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Hey',
            message: 'Are you sure about that?',
            position: 'center',
            
            
            buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {
        
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    
                    axios.post('/attendance/delete',{
                      user: selectedUser.value,
                      date: selectedDate.value,
                    status:status
                    })
                    .then(()=>{
                      iziToast.success({
                            title: '',
                            message: 'Attendance Marked Absent',
                            });

                      getUser();
                    })
                    .catch((error)=>{
                      iziToast.error({
                        title: '',
                        message: error.response.data.message,
                      });
                    })
                }, true],
                ['<button>NO</button>', function (instance, toast) {
        
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                }],
            ],
        });

}

const project = ref({});
const currentUser = ref({});
const today = new Date();
const users = ref([]);
const activeUsers = ref([]);
const shifts = [1, 2, 3];
const selectedDate = ref(new Date().toISOString().split('T')[0]);
const userAttendance = ref({});
const showPage2 = ref(false);
const markUnrest = ()=>{
  
}
const checkAnyAttendanceExist =()=> {
    for (let i = 1; i <= 3; i++) { // Assuming shifts range from 0 to 2
      if (isAttendanceExist(i)) {
        return true; // If attendance exists for any shift, return true to disable the button
      }
    }
    return false; // If attendance does not exist for any shift, return false to enable the button
  }
const groupByDateAndShift = (entries) => {
  const grouped = {};

  // Assuming entries contain date in ISO format (YYYY-MM-DD)
  const startDate = new Date();

  startDate.setDate(1);
  const endDate = new Date();

  for (let currentDate = new Date(startDate); currentDate <= endDate; currentDate.setDate(currentDate.getDate() + 1)) {
    const formattedDate = currentDate.toISOString().split('T')[0];
    if (!grouped[formattedDate]) {
      grouped[formattedDate] = {
        date: formattedDate,
        shifts: [],
      };
    }
    // Check if there are entries for each shift
    for (const shift of shifts) {
      const shiftEntry = entries.find(entry => entry.date == formattedDate && entry.shift_no == shift);
      if (shiftEntry) {
        grouped[formattedDate].shifts.push({
          shiftNumber: shift,
          status: shiftEntry.remarks,
        });
      } else {
        // If no entry exists for the shift, mark as absent
        grouped[formattedDate].shifts.push({
          shiftNumber: shift,
          status: 'absent',
        });
      }
    }
  }

  return Object.values(grouped);
};
const selectedUser = ref('');
const reporting_manager = ref({});
const clockIn = ref();
const clockOut = ref();
const isRegularizeModalOpen  = ref(false);
const attendance_entries = ref([]);
const openRegularizeModal =(time,data,user)=>{
  isRegularizeModalOpen.value = true;
 attendance_entries.value = time;
  selectedUser.value = user;
  reporting_manager.value= data.reporting_managers[0];
  // axios.get(`/user/${reporting_manager_id}`)
  //   .then((res)=> 
  //   {
  //     reporting_manager.value = res.data
  //   }) 
    
}
const closeRegularizeModal = ()=>{
  isRegularizeModalOpen.value = false;
  showPage2.value = false;
  selectedDate.value = new Date().toISOString().split('T')[0];
}

const submitRegularizeRequest = () => {
  
//       const requestForFormatted = new Date(selectedDate.value).toLocaleDateString();
//       const parts = requestForFormatted.split('/');
// const formattedDate = `${parts[2]}-${parts[0].padStart(2, '0')}-${parts[1].padStart(2, '0')}`;
const date = new Date(selectedDate.value);
const year = date.getFullYear();
const month = String(date.getMonth() + 1).padStart(2, '0'); // Adding 1 because January is 0
const day = String(date.getDate()).padStart(2, '0');

// Construct the formatted date string in 'YYYY-MM-DD' format
const formattedDate = `${year}-${month}-${day}`;

      axios.post('/regularize/create', {
        user_id: selectedUser.value,
        regularize_type : 'missed punch',
        request_for: formattedDate,
        clock_in: clockIn.value,
        clock_out:clockIn.value,
        reporting_manager_ids: reporting_manager.value.id,
        shift: 1,
        status: 0
      })
      closeRegularizeModal();
    
};

const isRestModalOpen = ref(false);
const openRestModal = ()=>{
  isRestModalOpen.value = true;
}

const closeRestModal = ()=>{
  isRestModalOpen.value = false;
}
onMounted(() => {
  // Load initial data
   getUser();
});

const isAttendanceModalOpen = ref([false, false, false]);

const openModalForShift = (shift) => {
  isAttendanceModalOpen.value[shift - 1] = true;
};

const closeRegisterModal = () => {
  isAttendanceModalOpen.value = [false, false, false];
};

const getUser = () => {
   axios.get('api/user').then((res) => {
    currentUser.value = res.data;
    assigned_area.value = JSON.parse(res.data.assigned_area);
    loadProject();
    // loadUsers();
    loadAttendanceData();
  });
};
const loadProject = () => {
  const projectId = currentUser.value.project_id; // Assuming project_id is a property in currentUser
const areaId = selectedArea.value;
  axios.get(`/project/${projectId}`).then((res) => {
    project.value = res.data;
    loadUsersByArea(areaId); // Assuming area_id is a property in the project data
    loadAttendanceData();
  });
};
const page = ref(1);
const perPage = ref(10);
const totalItems = ref(0);
const loadUsersByArea = (areaId) => {
  axios.get(`/area/user/${areaId}`,{
      params: {
        page: page.value,
        per_page: perPage.value,
      },
    }).then((res) => {
    users.value = res.data.usersWithAttendance.data;
    totalItems.value = res.data.total;
    const activeUsersToday = users.value.filter(user => {
      return !user.time_entries.some(entry => {
        const entryDate = new Date(entry.date).toDateString();
        const currentDate = new Date().toDateString();
        return entryDate == currentDate && entry.remarks == 'rest';
      });
    });
    activeUsers.value = activeUsersToday;
    console.log(activeUsers.value);
  });
};

const loadAttendanceData = () => {
  axios.get('/attendance_by_date/user', {
    params: {
      date: selectedDate.value,
    },
  }).then((res) => {
    initializeUserAttendance(res.data);
  });
};
const exportCSV = () => {
  let csvContent = 'data:text/csv;charset=utf-8,';
  csvContent += 'Name,Employee Id,Designation,Manday,Location,SubLocation,'; // Header row

  // Helper function to get all dates of the previous month
  const getDatesOfPreviousMonth = (year, month) => {
    let dates = [];
    let date = new Date(year, month, 1);
    while (date.getMonth() === month) {
      dates.push(new Date(date));
      date.setDate(date.getDate() + 1);
    }
    return dates;
    
  }

  // Get the current date
  const currentDate = new Date();

  // Calculate the previous month
  const previousMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() ,1);
  
  // Get all dates of the previous month
  const datesOfPreviousMonth = getDatesOfPreviousMonth(previousMonth.getFullYear(), previousMonth.getMonth());

  // Construct the header row with dates
  datesOfPreviousMonth.forEach(date => {
    const dateString = date.toDateString(); // Get date in 'YYYY-MM-DD' format
    csvContent += `${dateString},`;
  });
  csvContent += 'Total Present, Total Absent, Rest, Overtime\r\n'; // Add extra columns

  // Iterate over users
  users.value.forEach(user => {
    // Filter entries from the previous month
    const previousMonthTimeEntries = user.time_entries.filter(entry => {
      const entryDate = new Date(entry.date); // Assuming each time entry has a 'date' property
      return entryDate.getFullYear() === previousMonth.getFullYear() && entryDate.getMonth() === previousMonth.getMonth();
    });

    // Create a map of entries by date for quick lookup
    const entriesByDate = new Map();
    previousMonthTimeEntries.forEach(entry => {
      const entryDate = new Date(entry.date).toDateString() // Get date in 'YYYY-MM-DD' format
      entriesByDate.set(entryDate, entry);
    });

   
    // Initialize the CSV row with user data
    let csvRow = `${user.name},${user.employee_id},${user.designation},${user.manday},${user.project.title},${user.area.name}`;
    
    // Variables to track total present and absent days
    let totalPresent = 0;
    let totalAbsent = 0;
    let totalRest = 0;
    let totalOverTime = 0;
    // Iterate over all dates of the previous month
    datesOfPreviousMonth.forEach(date => {
      const dateString = date.toDateString(); // Get date in 'YYYY-MM-DD' format
      if (entriesByDate.has(dateString)) {
        const entry = entriesByDate.get(dateString);
        csvRow += `,${entry.remarks}`; // Modify to include relevant entry details
        if(entry.remarks == 'present'){
          if(entry.shift_no == 1 || entry.shift_no == null){
            totalPresent++;
          }
          else{
          totalPresent++;
            totalOverTime++;
          }

        }
        else{
          totalRest++;
        }
      } else {
        csvRow += `,A`;
        totalAbsent++;
      }
    });

    // Add total present, total absent, rest, and overtime
    csvRow += `,${totalPresent},${totalAbsent},${totalRest},${totalOverTime}\r\n`; // Assuming rest and overtime values are 0 for now

    csvContent += csvRow;
  });

   // Output the final CSV content
      // Create a link element and trigger a click to download the CSV
      const encodedUri = encodeURI(csvContent);
      const link = document.createElement('a');
      link.setAttribute('href', encodedUri);
      link.setAttribute('download', 'users_atendance.csv');
      document.body.appendChild(link);
      link.click();
    };

const initializeUserAttendance = (attendanceData) => {
  userAttendance.value = {};

  for (const user of users.value) {
    userAttendance.value[user.id] = shifts.map((shift) => {
      const shiftData = attendanceData.find((data) => data.user_id == user.id && data.shift_no == shift);
      return shiftData ? { present: true } : { present: false };
    });
  }
};
watch(selectedArea,loadProject);

const updateAttendanceForShift = async (shift) => {
  try {
  
    const updates = users.value.map((user) => {
      if (getUserAttendance(user.id, shift).present) {
        return {
          user_id: user.id,
          date: selectedDate.value,
          shift,
          present: getUserAttendance(user.id, shift).present,
        };
      } else {
        return null;
      }
    }).filter(Boolean);

    await axios.post('/attendance_by_date/user', { updates });
    console.log(`Attendance updated successfully for all users on Shift ${shift}`);
  } catch (error) {
    console.error(`Error updating attendance for all users on Shift ${shift}:`, error);
  }
};

const getUserAttendance = (userId, shift) => {
    
   
    // Return the attendance data for the specified user and shift
    return userAttendance.value[userId][shift - 1];
};


const getModalState = (shift) => {
  return isAttendanceModalOpen.value[shift - 1];
};

const isAttendanceExist = (shift) => {
  for (const userId in userAttendance.value) {
    if (userAttendance.value.hasOwnProperty(userId) && userAttendance.value[userId][shift - 1].present) {
      return true;
    }
  }
  return false;
};

const markRestForToday = async () => {
  try {
    const selectedUsers = users.value.filter(user => user.markedRest).map(user => user.id);

    // Call your backend API to mark rest for the selected users
    await axios.post('/mark_rest', { users: selectedUsers });
    
    // Optionally, you can update the UI or show a success message here

    console.log('Rest marked successfully for selected users.');
    loadUsersByArea(currentUser.value.area_id);
    closeRestModal(); // Close the modal after marking rest
  } catch (error) {
    console.error('Error marking rest for users:', error);
  }
};

const markRest = ()=>{
  const date = new Date(selectedDate.value);
const year = date.getFullYear();
const month = String(date.getMonth() + 1).padStart(2, '0'); // Adding 1 because January is 0
const day = String(date.getDate()).padStart(2, '0');

// Construct the formatted date string in 'YYYY-MM-DD' format
const formattedDate = `${year}-${month}-${day}`;

      axios.post('/mark-rest', {
        date:formattedDate,
        user: selectedUser.value
      })
      .then((res)=>{
        iziToast.success({
        title: '',
        message: 'user marked rest',
        });
        getUser();
        
 

      })

}
</script>
  