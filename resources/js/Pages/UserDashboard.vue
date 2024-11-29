<script setup>
import { onMounted, reactive } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Birthday from '@/Components/Birthday.vue';
import axios from 'axios';
import { ref,watch } from 'vue';
import { Head } from '@inertiajs/vue3';
import Chart from 'chart.js/auto';
import iziToast from 'izitoast';
import Modal from '@/Components/Modal.vue';
import Listbox from 'primevue/listbox';
import 'izitoast/dist/css/iziToast.min.css';
const attendanceData = ref([]);
import Message from 'primevue/message';
const lat = ref();
const long = ref();
const office_coordinates_diff = ref(null);
const office_coordinates_diff_2= ref(null);
onMounted(async () => {
    try {
        const response = await axios.get('/attendance');
        attendanceData.value = response.data;

        renderChart();
    } catch (error) {
        console.error('Error fetching attendance data:', error);
    }
});
const convertToDecimalHours = (timeString) => {
    const [hours, minutes, seconds] = timeString.split(':').map(Number);

    const totalHours = hours + (minutes / 60) + (seconds / 3600);

    return totalHours.toFixed(2);
};
const renderChart = () => {
    const ctx = document.getElementById('attendanceChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: attendanceData.value.map(entry => entry.date), 
            datasets: [{
                label: 'Attendance',
                data: attendanceData.value.map((entry) => {
                    const working_hours = entry.working_hours?entry.working_hours: '0:00:00';
                    const working_hours_decimal = convertToDecimalHours(working_hours);
                    return working_hours_decimal;
                }),
                backgroundColor: 'rgb(60, 179, 113)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}; 
const user = ref({});
const log_in_time = ref('');
const log_out_time = ref('');
const location = ref(null);
const fetchUser = async () => {
 const response = await axios.get('api/user');
 user.value = response.data;

  const clockInStatusResponse = await axios.get('/check-clock-in');
  clockedIn.value = clockInStatusResponse.data.clockedIn;

  if (clockedIn.value) {
    const clockInTimeString = clockInStatusResponse.data.clockInTime;
    const clockInTime = new Date(clockInTimeString);

     log_in_time.value = new Date(clockInTimeString).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
   
    const currentTime = new Date();
    const secondsSinceClockIn = Math.floor((currentTime - clockInTime) / 1000);
    timer.value = secondsSinceClockIn;
    console.log(timer.value)
    startTimer()
  }

  const attendance = await axios.get('attendance');
  console.log(attendance);
  log_in_time.value = attendance.data[attendance.data.length].clock_in;
  log_out_time.value = attendance.data[attendance.data.length].clock_out;
}
onMounted(fetchUser);





const getLocation = ()=>{
    navigator.geolocation.getCurrentPosition(function(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    lat.value = latitude;
    long.value = longitude;
    office_coordinates_diff.value = (Math.sqrt(Math.pow(parseFloat(lat.value) - 28.6031121, 2) + Math.pow(parseFloat(long.value) - 77.3668853, 2)) * 111.12);
     office_coordinates_diff_2.value = (Math.sqrt(Math.pow(parseFloat(lat.value) - 28.6137217, 2) + Math.pow(parseFloat(long.value) - 77.374597, 2)) * 111.12);

    // Use OpenStreetMap Nominatim API for reverse geocoding
    var apiUrl = `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`;
    
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.display_name) {
                var locationName = data.display_name;
                location.value = locationName;
            }
        })
        .catch(error => {
            console.error('Error fetching location:', error);
        });
}
, function (error) {
                alert(error.code + ": " + error.message);
            }, {
                enableHighAccuracy: true,
                maximumAge: 10000,
                timeout: 5000
            });
}
onMounted(getLocation)

const clockedIn = ref(false);
        const timerRunning = ref(false);
        const timer = ref(0);

        const clockIn = (location) => {
            
            axios.post('/clock-in',{
                location: location
            })
            .then((res)=>{
                clockedIn.value = true;
                iziToast.success({
                    title: 'OK',
                    message: 'Successfully Clocked In!',
                });
                log_in_time.value = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            startTimer();
            })
            .catch((error)=>{
                iziToast.error({
                    title: '',
                    message: 'Cannot  Clock in today.',
                });
                stopTimer();
            })

        };


        const clockOut = () => {
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
                    axios.get('/clock-out')
                    .then((res)=>{
                        clockedIn.value = false;
                    stopTimer(); 
                    })
                    
                }, true],
                ['<button>NO</button>', function (instance, toast) {
        
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
        
                }],
            ],
        });
 

        };

        const startTimer = () => {
            timerRunning.value = true;
            

            const intervalId = setInterval(() => {
                timer.value += 1;
            }, 1000);

            const stopTimerWatcher = watch(clockedIn, (newValue) => {
    if (!newValue) {
      clearInterval(intervalId);
      timerRunning.value = false;
      stopTimerWatcher();
    }
  });
        };

        const stopTimer = () => {
            timerRunning.value = false;
        };
        const formatTime = (seconds) => {
    const hours = Math.floor(seconds / 3600);
    const remainingMinutes = Math.floor((seconds % 3600) / 60);
    const remainingSeconds = seconds % 60;

    const formattedHours = hours > 0 ? `${hours}:` : '';
    const formattedMinutes = `${remainingMinutes}:`;
    const formattedSeconds = `${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;

    return `${formattedHours}${formattedMinutes}${formattedSeconds}`;
};

const isBirthday = () =>{
    const userDOB = new Date(user.value.dob);
const today = new Date();
const currentMonth = today.getMonth() + 1;
const currentDay = today.getDate();
console.log(userDOB.getDate());
if (userDOB.getMonth() + 1 === currentMonth && userDOB.getDate() === currentDay) {
    return "Happy Birthday";
}
}
const isWorkAnniversary = () =>{
    const userJoining = new Date(user.value.joining_date);
const today = new Date();
const currentMonth = today.getMonth() + 1;
const currentDay = today.getDate();
if (userJoining.getMonth() + 1 === currentMonth && userJoining.getDate() === currentDay) {
    return "Happy Work Anniversary";
}
}

const searchQuery = ref('');
const users = ref([]);
const getAllUsers = () =>{
axios.get('/admin/users')
.then((res)=>{
    users.value = res.data;
})
}
onMounted(getAllUsers);
// const filteredUsers = computed(() => {
//   const query = searchQuery.value.toLowerCase();
//   return users.value.filter(user => user.name.toLowerCase().includes(query));
// });


const isSearchModalOpen  = ref(false);
const openSearchModal =(user)=>{
  isSearchModalOpen.value = true;
  
}
const closeSearchModal = ()=>{
  isSearchModalOpen.value = false;
 
}
</script>

<template>
    <Head title="Dashboard" />
    

    <AuthenticatedLayout>
        <template #header  >
            <div >

            <div class="p-5 flex justify-between">
                <div>
                    <div> <span class="text-2xl font-extrabold">{{ user.name }}</span></div>
                    <div><span class="font-extrabold text-gray-400">{{ user.employee_id }}</span></div>
                    <div><span class="font-extrabold text-gray-400">{{ user.designation }} ({{ user.domain }})</span></div>
</div>
<button @click="openSearchModal()"><span><i class="pi pi-search p-1" style="font-size: 0.8rem"></i> Search </span></button>
        <!-- Attendance Modal -->
<Modal :show="isSearchModalOpen" @close="closeSearchModal"  >
    <div class="flex">
        <div>
    <span class="relative">
    <Listbox v-model="searchQuery" :options="users" filter optionLabel="name" class="w-full md:w-[14rem]" />
    

</span>
  </div>
  <div class="p-2">
    <h1 class="text-xl font-extrabold">{{ searchQuery.name }} </h1>
    <p class=" font-extrabold">{{ searchQuery?searchQuery.project.title: null }}</p>
    <p class="text-blue-500">{{ searchQuery.designation }}</p>
    <div v-if="searchQuery" class="p-3 bg-gray-200">
        <h1 class="font-extrabold">Contact Details</h1>
        <p>Email - {{ searchQuery.email }}</p>
        <p>Phone - {{ searchQuery.mobile_no }}</p>
    </div>
  </div> 
    </div>
    
  
</Modal>

                </div>
               
            <div>
                <div v-if="!clockedIn" class="flex mx-5">
                
                <!-- <div v-if=" (Math.abs(parseFloat(lat) - 28.6031121) <= 0.1) && (Math.abs(parseFloat(long) - 77.3668853) <= 0.1)">
                    <button v-tooltip="'Click to Clock in'" @click="clockIn(location)"><i class="material-icons hover:font-extrabold">schedule</i></button>

                </div> -->
                <div v-if = "office_coordinates_diff!==null">
                    <div >
                                       <button v-tooltip="'Click to Clock in'" @click="clockIn(location)"><i class="material-icons hover:font-extrabold">schedule</i></button>
                               </div>

                </div>
                <div v-else>
                    <i class="pi pi-spin pi-spinner" style="font-size: 1.5rem"></i>

                </div>
                
            </div>
            <div v-else class="flex mx-5">
                <button v-tooltip="'Click to clock out'" @click="clockOut"><i class="material-icons " style="color: blue;">schedule</i></button>
            </div>


        </div>


                
            </div>

              <div>
                <div v-if="isBirthday()">
                    <Message >Happy Birthday !</Message>
                </div>
                <div v-if="isWorkAnniversary()">
                    <Message severity="success">Happy Work Anniversary !</Message>
                </div>
 
  </div>

 
        </template>


<template>

  
</template>




        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h3 class=" p-4 text-gray-400 font-extrabold text-2xl">Time & Attendance</h3>
                    <div class="lg:flex p-4">
                        <div v-if="timerRunning" class="p-4 text-blue-800 font-bold mr-4 lg:w-1/4 my-auto">
                            <span class="text-blue-600 font-extrabold text-6xl">{{ formatTime(timer) }}</span>
                            <p class="text-small text-gray-400">Time spent</p>
                        </div>
                        <div v-else class="p-4 text-blue-800 font-bold mr-4 lg:w-1/4 my-auto">
                            <span class="text-blue-600 font-extrabold text-6xl">0:00:00</span>
                            <p class="text-small text-gray-400">Time spent</p>
                        </div>
                        <div class="mr-4 lg:w-1/4 my-auto">
                            <div class="p-4 bg-blue-100 rounded font-bold">
                            <span class="text-blue-600 text-xl font-bold">{{ log_in_time }}</span>
                            <p class="text-small text-gray-400 ">Clock In Time</p>
                        </div>
                    </div>
                        <div class="lg:w-1/2">
                            <canvas ref="attendanceChart" id="attendanceChart" width="800" height="400"></canvas>
                        </div>

                        
                        
                    </div>

                </div>
            </div>
        </div>
        <div class="py-6">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                    <Birthday/>
                </div>
            </div>
          
        </div>
       
    </AuthenticatedLayout>
</template>
