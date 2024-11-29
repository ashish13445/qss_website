<script setup>
import { onMounted, reactive } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Attendance from '../Components/Attendance.vue';
import ProjectUsers from '../Pages/Admin/ProjectUsers.vue'
import AreaUsers from '../Pages/Admin/AreaUsers.vue'
import axios from 'axios';
import { ref,watch } from 'vue';
import { Head } from '@inertiajs/vue3';
const user = ref({});
const log_in_time = ref('');
const log_out_time = ref('');

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
  log_in_time.value = attendance.data[attendance.data.length-1].clock_in;
  log_out_time.value = attendance.data[attendance.data.length-1].clock_out;
}
onMounted(fetchUser);





const clockedIn = ref(false);
        const timerRunning = ref(false);
        const timer = ref(0);

        const clockIn = () => {
            axios.get('/clock-in')
            .then((res)=>{
                clockedIn.value = true;
                
            startTimer();
            })

        };

        const clockOut = () => {
            axios.get('/clock-out')
            .then((res)=>{
                clockedIn.value = false;
            stopTimer(); 
            })

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



</script>

<template>
    <Head title="Dashboard" />
    

    <AuthenticatedLayout>
        
        <template #header  >
            <div >
            <div class="py-5">
                    <div> <span class="text-2xl font-extrabold">{{ user.name }}</span></div>
                    <div><span class="font-extrabold text-gray-400">{{ user.employee_id }}</span></div>
                    <div><span class="font-extrabold text-gray-400">{{ user.designation }} ({{ user.domain }})</span></div>

                </div>
 


                
            </div>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="">
                        <div v-if="timerRunning" class="p-4 text-blue-800 font-bold">
                            <span class="text-red-800 font-bold text-3xl">{{ formatTime(timer) }}</span>
                            <p class="text-small text-gray-400">Time spent</p>
                        </div>
                        <div class="flex justify-between p-4">
                            <div class="p-4 text-blue-800 font-bold">
                            <h1>Login Time: <span class="text-red-800 font-bold">{{ log_in_time }}</span></h1>
                        </div>
                        <div class="p-4 text-blue-800 font-bold">
                            <h1>Logout Time: <span class="text-red-800 font-bold">{{ log_out_time }}</span></h1>
                        </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                    <ProjectUsers/>
                </div>
            </div>    
        </div>

       
    </AuthenticatedLayout>
</template>
