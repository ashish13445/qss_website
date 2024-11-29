<template>
    <AuthenticatedLayout>
      <Head title="Holidays Management" />
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Holidays Management</h2>
      </template>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
            
            <Calendar
              expanded
              v-model="selectedDate"
              :attributes="holidays"
            />
            <div class="p-5" v-if="$page.props.auth.user.email== 'admin@qssindia.in' " >
                <form @submit.prevent="addHoliday">
                    <InputLabel for="selectedDate" value="Select Date"/>
                <input id="selectedDate" type="date" v-model="selectedDate"  class="mt-1 block " >
                <InputLabel for="reason" value="Ocassion"/>
                <input id="reason" type="text" v-model="reason"  class="mt-1 block " >
                <SecondaryButton type="submit"  class="mt-4 " >Submit</SecondaryButton>
                </form>


            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Calendar, DatePicker } from 'v-calendar';
  import 'v-calendar/style.css';
  import { Head } from '@inertiajs/vue3';
  import { onMounted, ref, watch } from 'vue';
  import InputLabel from '@/Components/InputLabel.vue';
  import SecondaryButton from '@/Components/SecondaryButton.vue';
import axios from 'axios';
  const selectedDate = ref('');
  const holidays = ref([]);
  const reason = ref('');
  const addHoliday = () => {
  if (selectedDate.value) {
    axios.post('/holidays/add',{
        name: reason.value,
        date: selectedDate.value
    })
    .then((response)=>{
        fetchHolidays();
    })

  }
  }
  const fetchHolidays = ()=>{
    axios.get('/holidays/get')
    .then((res)=>{
        holidays.value = res.data.map(holiday=>({
            content: 'red',
            dates: holiday.date,
            dot: true,   
            highlight:{
                color: 'red',
      fillMode: 'light',
            },     // Boolean, String, Object
            popover: { label: holiday.name, placement: 'auto' }, // Date(s) to highlight
        }));
    });
  }

  onMounted(fetchHolidays);

  </script>
  