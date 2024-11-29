<template>

<div>
      <canvas id="myChart" height="100" width="400" ></canvas>
    </div>
  <div>
    <div class="flex 		justify-start pl-8 pt-10 ">
      <div class="month-selector ">
        <div class="flex">
        <i @click="selectPreviousMonth" class="material-icons" style="cursor: pointer;">arrow_back_ios</i>
        <span class="px-4 text-xl font-bold text-blue-900">{{ new Date(selectedMonth).toLocaleDateString("en-US", { month: "short", year: "numeric" }) }}</span>
        <i @click="selectNextMonth" class="material-icons" style="cursor: pointer;">arrow_forward_ios</i>
      </div>
    </div>
    </div>
    <!-- <div class="flex justify-evenly bg-slate-100		p-3 ">
    <div class="p-7 text-center bg-white rounded-xl" style="width: 30%;">
      <p><i class="material-icons " style="color: green;font-size: 50px;">work_history</i></p>
      <h1 class="font-black		text-xl">{{ getAverageWorkingHours() }}</h1>
      <p class="block text-sm font-medium text-gray-600">Average working hours</p>
    </div>
    <div class="p-7 text-center bg-white	rounded-xl" style="width: 30%;"> 
      <p><i class="material-icons " style="color: blue;font-size: 50px;">login</i></p>
      <h1 class="font-black	text-xl	">{{ getAverageLoginTime() }}</h1>
      <p class="block text-sm font-medium text-gray-600" >Average In Time</p>
    </div>
    <div class="p-7 text-center bg-white	rounded-xl" style="width: 30%;">
      <p><i class="material-icons " style="color: blue;font-size: 50px;">logout</i></p>
      <h1 class="font-black	text-xl	">{{ getAverageLogoutTime() }}</h1>
      <p class="block text-sm font-medium text-gray-600">Average Out Time</p>
    </div>
    </div> -->


    <table class="min-w-full text-left text-bold font-light text-center ">
          <thead class="border bg-indigo-900  font-medium dark:border-neutral-500">
            <tr class="bg-indigo-400 text-white">
              <th scope="col" class="px-6 py-4 border border-indigo-900">Date</th>
              <th scope="col" class="px-6 py-4 border border-indigo-900">Login Time</th>
              <th scope="col" class="px-6 py-4 border border-indigo-900">Logout Time</th>
              <th scope="col" class="px-6 py-4 border border-indigo-900">Location</th>
              <th scope="col" class="px-6 py-4 border border-indigo-900">Work Hours</th>
              <th scope="col" class="px-6 py-4 border border-indigo-900">Remarks</th>
              <th scope="col" class="px-6 py-4 border border-indigo-900">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="">
            <tr v-for="(week, index) in calendar" :key="index" style="display: flex;flex-direction: column;">
          
              <tr v-for="day in week" :key="day.date" :class="{ 'empty-cell': !day.date,'holiday': isHoliday(day.date) ,'leave':isLeaveApproved(day.date) }" class="" style="border: 1px solid #ddd; display: flex;height: 50px;">
              
                <tr style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%;">
                  <div class="date">{{ day.date ? day.date.getDate() : '' }}</div>
<div class="day">{{ day.date ? daysOfWeek[day.date.getDay()] : '' }}</div>
                </tr>
              
            </tr>

        </tr>

          </td>
          <td>
            <tr v-for="(week, index) in calendar" :key="index" style="display: flex;flex-direction: column;">
          
          <tr v-for="day in week" :key="day.date" :class="{ 'empty-cell': !day.date,'holiday': isHoliday(day.date)  }"  class="" style="border: 1px solid #ddd; display: flex;height: 50px;min-width: 100px;">
            
            <tr style="display: flex; flex-direction: column; align-items: center;justify-content: center;width: 100%;font-weight: bolder;">
            {{ getAttendanceForDate(day.date) }}
            </tr>
              
            
          </tr>
          </tr>
          </td>
          <td>
            <tr v-for="(week, index) in calendar" :key="index" style="display: flex;flex-direction: column;">
          
          <tr v-for="day in week" :key="day.date" :class="{ 'empty-cell': !day.date,'holiday': isHoliday(day.date)  }"  class="" style="border: 1px solid #ddd; display: flex;height: 50px;">
            
            <tr style="display: flex; flex-direction: column; align-items: center;justify-content: center;width: 100%;font-weight: bolder;">
            {{ getAttendanceForDateLogout(day.date) }}
            </tr>
              
            
          </tr>
          </tr>
          </td>
          <td>
            <tr v-for="(week, index) in calendar" :key="index" style="display: flex;flex-direction: column;">
          
          <tr v-for="day in week" :key="day.date" :class="{ 'empty-cell': !day.date,'holiday': isHoliday(day.date)  }"  class="" style="border: 1px solid #ddd; display: flex;height: 50px;">
            
            <tr style="display: flex; flex-direction: column; align-items: center;justify-content: center;width: 100%;font-weight: bolder;">
              <div class="relative inline-block group">
                <i class="pi pi-map-marker" v-tooltip="getLoginLocation(day.date)!== '' && getLoginLocation(day.date)!== null?getLoginLocation(day.date): ''"></i>

</div>
            
            </tr>
              
            
          </tr>
          </tr>
          </td>
          <td>
            <tr v-for="(week, index) in calendar" :key="index" style="display: flex;flex-direction: column;">
          
          <tr v-for="day in week" :key="day.date" :class="{ 'empty-cell': !day.date,'holiday': isHoliday(day.date)  }"  class="" style="border: 1px solid #ddd; display: flex;height: 50px;">
            
            <tr style="display: flex; flex-direction: column; align-items: center;justify-content: center;width: 100%;font-weight: bolder;">
            {{getAttendanceForDateLogout(day.date)?getWorkingHours(day.date):''}}
            
            </tr>
              
            
          </tr>
          </tr>
          </td>
          
          <td>
            <tr v-for="(week, index) in calendar" :key="index" style="display: flex;flex-direction: column;">
          
          <tr v-for="day in week" :key="day.date" :class="{ 'empty-cell': !day.date,'holiday': isHoliday(day.date) }"  class="" style="border: 1px solid #ddd; display: flex;height: 50px;">
            
            <tr style="display: flex; flex-direction: column; align-items: center;justify-content: center;width: 100%;font-weight: bolder;">
                <!-- {{getRemarks(day.date) }} -->
                <span v-if="getRemarks(day.date) == 'present'" class="text-green-500	font-extrabold">Present</span>
                <span v-else-if="getRemarks(day.date) == 'sick_leave'" class="text-yellow-500	font-extrabold">sick leave</span>
                <span v-else-if="getRemarks(day.date) == 'casual_leave'" class="text-yellow-500	font-extrabold">casual leave</span>
                <span v-else-if="getRemarks(day.date) == 'privilege_leave'" class="text-yellow-500	font-extrabold">privilege leave</span>
                <span v-else-if="getRemarks(day.date) == 'rest'" class="text-blue-500	font-extrabold">Week Off</span>
                <span v-else-if="getRemarks(day.date) == 'holiday'" class="text-yellow-500	font-extrabold">Holiday</span>
                <span v-else-if="getRemarks(day.date) == 'work from home' || getRemarks(day.date) == 'work_from_home'" class="text-yellow-500	font-extrabold">Work From Home</span>
                <span v-else class="text-red-500	">Absent</span>

            </tr>
              
            
          </tr>
          </tr>
          </td>

          <td>
            <tr v-for="(week, index) in calendar" :key="index" style="display: flex;flex-direction: column;">
          
          <tr v-for="day in week" :key="day.date" :class="{ 'empty-cell': !day.date,'holiday': isHoliday(day.date)  }"  class="" style="border: 1px solid #ddd; display: flex;height: 50px;">
            
            <tr style="display: flex; flex-direction: column; align-items: center;justify-content: center;width: 100%;font-weight: bolder;">
                <!-- <button class="flex border border-red-500 bg-red-100 hover:bg-red-500 hover:text-white p-1"  @click="openRegularizeModal(day.date)">
                  <i class="material-icons mx-1">manage_history</i>
                  <span>regularize</span>
                </button> -->
                <!-- <PrimaryButton @click="openRegularizeModal(day.date)"><i class="material-icons mx-1">manage_history</i>
                  <span>regularize</span></PrimaryButton> -->
                  <i v-tooltip="'Regularize your entry'" @click="openRegularizeModal(day.date)" class="pi pi-spin pi-cog" style="font-size: 1.5rem; cursor: pointer;"></i>
                
                <Modal :show="isRegularizeModalOpen" @close="closeRegularizeModal">
  <div class="modal-content p-5">
    <span class="close" @click="closeRegularizeModal"><i class="material-icons" style="cursor: pointer;">close</i></span>

    <!-- Multi-step modal content -->
    <template v-if="currentStep == 1">
      <!-- Step 1: Select Regularize Type -->
      <form @submit.prevent="nextStep" class="flex flex-col p-5">
        <label for="regularizeType" class="p-3">Select Regularize Type:</label>
        <select v-model="selectedRegularizeType">
          <option value="missedPunch">Missed Punch</option>
          <option value="workFromHome">Work from Home</option>
        </select>

        <PrimaryButton type="submit" class="mt-5">Next</PrimaryButton>
      </form>
    </template>

    <template v-else-if="currentStep == 2">
      <!-- Step 2: Fill Clock In/Out and Reporting Manager -->
      <form @submit.prevent="submitRegularizeRequest" class="flex flex-col p-5">
        <div v-if="selectedRegularizeType == 'missedPunch'" class="flex flex-col p-5">
          <label for="clockIn" class="p-3">Clock In:</label>
        
        <input type="datetime-local" v-model="clockIn" />

        <label for="clockOut" class="p-3">Clock Out:</label>
        <input type="datetime-local" v-model="clockOut" />


        </div>
        
        <label for="reportingManager" class="p-3">Reporting Manager:</label>
        <!-- {{ reporting_managers }} -->
        <!-- <select v-model="reporting_manager">
      <option v-for="manager in reporting_managers" :key="manager.id" :value="manager.id">
        {{ manager.name }}
      </option>
    </select> -->
      <div v-for="manager in reporting_managers">
        <ul>
          <li class="bg-gray-100 p-3 my-3">{{manager.name}}</li>
        </ul>

      </div>
        <PrimaryButton type="submit" class="mt-5">Submit</PrimaryButton>
      </form>
    </template>
  </div>
</Modal>
            </tr>
              
            
          </tr>
          </tr>
          </td>
        </tr>
        
          
      </tbody>
    </table>

  </div>
</template>

<style scoped>
body {
  font-family: 'Arial', sans-serif;
  text-align: center;
  margin: 20px;
}

/* table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
} */

/* th{
  border: 1px solid #ddd;  
   padding: 10px; 
  text-align: center;
} */

/* th {
  background-color: #f2f2f2;
} */

.month-selector {
  margin-bottom: 20px;
}

.empty-cell {
  color: #ccc;
  height: 0px;
  
}

.attendance_container {
  display: flex;
  flex-direction: column;
}

.day-column {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.date {
  font-weight: bold;
}

.day {
  color: #666;
}
.holiday {
  background-color: rgba(211, 138, 138, 0.623);
}
.leave {
  background-color: rgba(160, 211, 138, 0.623);
}
.attendance {
  /* margin-top: 10px; */
  display: flex;
  flex-direction: column;
}

.login-time,
.logout-time {
  margin-top: 5px;
}

/* Additional style to make each day's column equal width */
.attendance_container {
  flex: 1;
}
</style>
  
  <script setup>
  import axios from 'axios';
import { stringify } from 'postcss';
  import { ref, onMounted, computed,reactive } from 'vue';
  import Chart from 'chart.js/auto';
import Modal from './Modal.vue';
import PrimaryButton from './PrimaryButton.vue';
import { resolveDynamicComponent } from 'vue';



  //regularize request

  const isRegularizeModalOpen = ref(false);
const selectedRegularizeType = ref('');
const clockIn = ref('');
const clockOut = ref('');

const currentStep = ref(1);
const selectedDate = ref('');
const user = ref({});
const reporting_managers = ref([]);
const reporting_manager = ref({});
const reportingManager = ref('');

const openRegularizeModal = (date) => {
  
  isRegularizeModalOpen.value = true;
  currentStep.value = 1; // Reset to the first step
  // ... (other initialization logic)
  selectedDate.value = date;
  axios.get('api/user')
    .then((res) => {
      user.value = res.data;
      reporting_managers.value = user.value.reporting_managers
    //   axios.get(`/user/${user.value.reporting_manager_id}`)
    // .then((res)=> 
    // {
    //   reporting_manager.value = res.data
    // })    
      });

};

const closeRegularizeModal = () => {
  isRegularizeModalOpen.value = false;
  // Reset all form fields and other data
  selectedRegularizeType.value = '';
  clockIn.value = '';
  clockOut.value = '';
  reportingManager.value = '';
  currentStep.value = 1;
};

const nextStep = () => {
  // Validate and process data for the first step
  // You can add more validation logic as needed
  if (selectedRegularizeType.value) {
    currentStep.value = 2; // Move to the second step
  } else {
    // Show an error message or handle validation error
  }
};

const submitRegularizeRequest = () => {
  axios.get('api/user')
    .then((res) => {
      user.value = res.data; // Assuming the user data is in the 'data' property of the response

//       const requestForFormatted = new Date(selectedDate.value).toLocaleDateString();
//       const parts = requestForFormatted.split('/');
// const formattedDate = `${parts[2]}-${parts[0].padStart(2, '0')}-${parts[1].padStart(2, '0')}`;
const date = new Date(selectedDate.value);
const year = date.getFullYear();
const month = String(date.getMonth() + 1).padStart(2, '0'); // Adding 1 because January is 0
const day = String(date.getDate()).padStart(2, '0');

// Construct the formatted date string in 'YYYY-MM-DD' format
const formattedDate = `${year}-${month}-${day}`;

      if(selectedRegularizeType.value == 'workFromHome'){
        axios.post('/regularize/create', {
        user_id: user.value.id,
        regularize_type : selectedRegularizeType.value,
        request_for: formattedDate,
        clock_in: null,
        clock_out:null,
        reporting_manager_ids: user.value.reporting_managers.map(manager => manager.id), // Assuming reporting_manager is an array of selected managers
        status: 0
      }) 
      }
      else{
        axios.post('/regularize/create', {
        user_id: user.value.id,
        regularize_type : selectedRegularizeType.value,
        request_for: formattedDate,
        clock_in: clockIn.value,
        clock_out:clockOut.value,
        reporting_manager_ids: user.value.reporting_managers.map(manager => manager.id), // Assuming reporting_manager is an array of selected managers
        status: 0
      })
      }
      
      closeRegularizeModal();
    })
    .catch((error) => {
      // Handle error
      console.error('Error fetching user data:', error);
    });
};



  
  const attendanceData = ref([]);
  const fetchTimeEntries =  async() => {
    try {
        const userResponse = await axios.get('api/user');
        user.value = userResponse.data;

        const attendanceResponse = await axios.get('/attendance_by_month/user', {
            params: {
                month: selectedMonth.value,
                user_id: user.value.id
            }
        });
        attendanceData.value = attendanceResponse.data;
    } catch (error) {
        console.error('Error fetching attendance data:', error);
    }
  };
  const selectedMonth = ref(getCurrentMonth());
const maxMonth = getCurrentMonth();

function getCurrentMonth(offset = 0) {
  const now = new Date();
  now.setMonth(now.getMonth() - offset);
  now.setDate(1);
  now.setMonth(now.getMonth() + 1);
  now.setDate(0);
  return `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}`;
}  const calendar = ref([]);
  const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  
  const updateCalendar = async() => {
    await fetchTimeEntries();
    
  const today = new Date();
  const selectedMonthDate = new Date(selectedMonth.value);
  const firstDay = new Date(selectedMonthDate.getFullYear(), selectedMonthDate.getMonth(), 1);
  const lastDay = new Date(
    selectedMonthDate.getFullYear(),
    selectedMonthDate.getMonth() + 1,
    0
  );

  // Set the last day to be today only for the currently selected month
  if (
    today.getFullYear() == selectedMonthDate.getFullYear() &&
    today.getMonth() == selectedMonthDate.getMonth()
  ) {
    lastDay.setDate(today.getDate());
  }
  const daysInMonth = lastDay.getDate();
  const startDay = firstDay.getDay();

  let currentDay = daysInMonth;
  const calendarData = [];

  for (let i = 0; i < 6; i++) {
    const week = [];
    for (let j = 0; j < 7; j++) {
      if ((i === 0 && j < startDay) || currentDay < 1) {
      } else {
        const date = new Date(selectedMonthDate.getFullYear(), selectedMonthDate.getMonth(), currentDay);

        week.push({ date });
        currentDay--;
      }
    }
    calendarData.push(week);
  }

  calendar.value = calendarData;

  

const labels = calendar.value.flat().map((day) => new Date(day.date).toLocaleDateString());


const data = labels.map((date) => {
  const offset = new Date().getTimezoneOffset();
  const adjustedDate = new Date(date).getTime() - offset * 60 * 1000;
  const formattedDate = new Date(adjustedDate).toISOString().slice(0, 10);
  const attendanceEntry = attendanceData.value.find((entry) => {
  const entryDate = new Date(entry.date);
  const formattedEntryDate = new Date(formattedDate);
  
  return (
    entryDate.getFullYear() === formattedEntryDate.getFullYear() &&
    entryDate.getMonth() === formattedEntryDate.getMonth() &&
    entryDate.getDate() === formattedEntryDate.getDate()
  );
});    
    
  const working_hours = attendanceEntry&& attendanceEntry.working_hours?attendanceEntry.working_hours: '0:00:00';
  const workingHoursDecimal = convertToDecimalHours(working_hours);
return workingHoursDecimal;
  
});



 
// console.log(data);
  // Update chartData
  chartData.value.labels = labels;
  chartData.value.datasets[0].data = data;

  // Create a bar chart
  const ctx = document.getElementById('myChart').getContext('2d');
  const existingChart = Chart.getChart('myChart');
if (existingChart) {
    // Destroy the existing chart
    existingChart.destroy();
}
  new Chart(ctx, {
    type: 'bar',
    data: chartData.value,
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });

};

const convertToDecimalHours = (timeString) => {
    // Split the time string into hours, minutes, and seconds
    const [hours, minutes, seconds] = timeString.split(':').map(Number);

    // Calculate the total working hours including the fractional part
    const totalHours = hours + (minutes / 60) + (seconds / 3600);

    // Return the total hours rounded to two decimal places
    return totalHours.toFixed(2);
};

const selectPreviousMonth = () => {
  selectedMonth.value = getPreviousMonth(selectedMonth.value)
  updateCalendar();
};
const selectNextMonth = () => {
  selectedMonth.value = getNextMonth(selectedMonth.value)
  updateCalendar();
};

const getPreviousMonth = (currentMonth) => {
  const current = new Date(currentMonth);
  const previousMonth = new Date(current.getFullYear(), current.getMonth() - 1, 1);
  return formatDate(previousMonth);
};

const getNextMonth = (currentMonth) => {
  const current = new Date(currentMonth);
  const nextMonth = new Date(current.getFullYear(), current.getMonth() + 1, 1);
  return formatDate(nextMonth);
};
const formatDate = (date) => {
  return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}`;
};

onMounted(() => {
  document.addEventListener('keydown', handleKeyDown);
});

const handleKeyDown = (event) => {

  if (event.key === 'ArrowLeft') selectPreviousMonth();
  else if (event.key === 'ArrowRight') selectNextMonth();
};


  

  
  const getAttendanceForDate = (date) => {
    const offset = new Date().getTimezoneOffset();
const adjustedDate = new Date(date).getTime() - offset * 60 * 1000;
const formattedDate = new Date(adjustedDate).toISOString().slice(0, 10);
    const attendanceEntry = attendanceData.value.find((entry) => entry.date === formattedDate);
    
    const login_time = new Date(attendanceEntry?attendanceEntry.clock_in : '').toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    return ((login_time==='05:30:00 AM') || (!attendanceEntry)) ?'-': login_time;
  };
  const getAttendanceForDateLogout = (date) => {
    const offset = new Date().getTimezoneOffset();
const adjustedDate = new Date(date).getTime() - offset * 60 * 1000;
const formattedDate = new Date(adjustedDate).toISOString().slice(0, 10);    const attendanceEntry = attendanceData.value.find((entry) => entry.date === formattedDate);
    const logout_time = new Date(attendanceEntry?attendanceEntry.clock_out : '').toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    return ((logout_time==='05:30:00 AM') || (!attendanceEntry)) ?'-': logout_time;
  };
  


const getWorkingHours = (date) => {
  const offset = new Date().getTimezoneOffset();
  const adjustedDate = new Date(date).getTime() - offset * 60 * 1000;
  const formattedDate = new Date(adjustedDate).toISOString().slice(0, 10);

  const attendanceEntry = attendanceData.value.find((entry) => entry.date === formattedDate);
  
  const working_hours = attendanceEntry?attendanceEntry.working_hours: 0;
  
return working_hours;
};

const getLoginLocation = (date) => {
  const offset = new Date().getTimezoneOffset();
  const adjustedDate = new Date(date).getTime() - offset * 60 * 1000;
  const formattedDate = new Date(adjustedDate).toISOString().slice(0, 10);

  const attendanceEntry = attendanceData.value.find((entry) => entry.date === formattedDate);
  
  const login_location = attendanceEntry?attendanceEntry.location: '';
  
return login_location;
};

const getRemarks = (date) => {
  const offset = new Date().getTimezoneOffset();
  const adjustedDate = new Date(date).getTime() - offset * 60 * 1000;
  const formattedDate = new Date(adjustedDate).toISOString().slice(0, 10);

  const attendanceEntry = attendanceData.value.find((entry) => entry.date === formattedDate);
  
  const remarks = attendanceEntry?attendanceEntry.remarks: 'absent';
return remarks;
};
const getWorkingSeconds = (date)=>{
  const offset = new Date().getTimezoneOffset();
const adjustedDate = new Date(date).getTime() - offset * 60 * 1000;
const formattedDate = new Date(adjustedDate).toISOString().slice(0, 10);    
let workingHours = 0; // Default value in case attendanceEntry is not found
let totalWorkingSeconds = 0;
const attendanceEntry = attendanceData.value.find(entry => entry.date === formattedDate);

if (attendanceEntry && attendanceEntry.working_hours) {
  console.log(attendanceEntry.working_hours);
  const [hours, minutes, seconds] = attendanceEntry.working_hours.split(":").map(Number);
  // Calculate total working hours (assuming 1 hour = 3600 seconds)
  totalWorkingSeconds = hours * 3600 + minutes * 60 + seconds;
  workingHours = totalWorkingSeconds / 3600; // Convert seconds to hours
}

return totalWorkingSeconds;
}


const getTotalWorkingSeconds = ()=>{   
let total_seconds = 0;
attendanceData.value.map((entry)=>{
  
    total_seconds += getWorkingSeconds(entry.date);
  console.log("total:"+total_seconds); 
   

})

return total_seconds;   
  }

  const getAverageWorkingSeconds = ()=>{
    if(attendanceData.value.length !==0){
      const average = getTotalWorkingSeconds()/attendanceData.value.length;
    return average;
    }
    
  }

  const getAverageWorkingHours = ()=>{
    return formatTime(getAverageWorkingSeconds());
  }
  const getAverageLoginTime = ()=>{
    
      const numericValues = attendanceData.value.map(time => {
        const [hours, minutes, seconds] = time.clock_in?time.clock_in.toString().substring(11).split(':'): '';
        return (+hours * 60 * 60 + +minutes * 60 + +seconds) * 1000;
      });
      const averageNumericValue = numericValues.reduce((acc, val) => acc + val, 0) / numericValues.length;

      const averageHours = Math.floor(averageNumericValue / (60 * 60 * 1000));
      const averageMinutes = Math.floor((averageNumericValue % (60 * 60 * 1000)) / (60 * 1000));
      const averageSeconds = Math.floor((averageNumericValue % (60 * 1000)) / 1000);

      const formattedTime = new Date(0, 0, 0, averageHours, averageMinutes, averageSeconds);

      const formattedTimeString = formattedTime.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit', hour12: true });

      return formattedTimeString;

  }


  const getAverageLogoutTime = ()=>{
    
    const numericValues = attendanceData.value.map(time => {
      if(!time.clock_out){
      return (+0) * 1000;
      }
        const [hours, minutes, seconds] = time.clock_out.toString().substring(11).split(':');
      return (+hours * 60 * 60 + +minutes * 60 + +seconds) * 1000;
      
     
    });
    const averageNumericValue = numericValues.reduce((acc, val) => acc + val, 0) / numericValues.length;

    const averageHours = Math.floor(averageNumericValue / (60 * 60 * 1000));
    const averageMinutes = Math.floor((averageNumericValue % (60 * 60 * 1000)) / (60 * 1000));
    const averageSeconds = Math.floor((averageNumericValue % (60 * 1000)) / 1000);

    const formattedTime = new Date(0, 0, 0, averageHours, averageMinutes, averageSeconds);

    const formattedTimeString = formattedTime.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit', hour12: true });

    return formattedTimeString;

}  

const getTotalWorkingHours = ()=>{
  const total_seconds = getTotalWorkingSeconds();
  return formatTime(total_seconds);
}
  const formatTime = (seconds) => {
    const hours = Math.floor(seconds / 3600);
    const remainingMinutes = Math.floor((seconds % 3600) / 60);
    const remainingSeconds = seconds % 60;

    const formattedHours = hours > 0 ? `${hours}:` : '';
    const formattedMinutes = `${remainingMinutes}:`;
    const formattedSeconds = `${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;

    return `${formattedHours}${formattedMinutes}${formattedSeconds}`;
};
  
  onMounted(updateCalendar);

  const isHoliday = (date)=>{
    var str = "" + date;
    if(str.substring(0,3) === 'Sun'){
      return true;
    }
  }

  const status = ref(false);

const isLeaveApproved = (date) => {
  // const formattedDate = new Date(date).toISOString().split('T')[0];
  // axios.get(`/leave/${formattedDate}`)
  //   .then((res) => {
  //     status.value = res.data; // Assuming the response contains the status
  //     console.log(`${date} => ${status.value}`);
  //   })
  //   .catch((error) => {
  //     console.error('Error fetching leave status:', error);
  //   });
    
};

const chartData = ref({
  labels: [],
  datasets: [
    {
      label: 'Working Hours',
      data: [],
      backgroundColor: 'rgb(60, 179, 113)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
    },
  ],
});

  </script>
  
 