<template>
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            <table class="min-w-full text-left text-bold font-light text-center">
              <thead class="border border-indigo-900  font-medium dark:border-neutral-500">
                <tr class="bg-indigo-400 text-white">
                  <th scope="col" class="px-6 py-4 border border-indigo-900">Requested By</th>
                  <th scope="col" class="px-6 py-4 border border-indigo-900">Request Type</th>
                  <th scope="col" class="px-6 py-4 border border-indigo-900">Request For</th>
                  <th scope="col" class="px-6 py-4 border border-indigo-900">Requested On</th>
                  <th scope="col" class="px-6 py-4 border border-indigo-900">Clock In</th>
                  <th scope="col" class="px-6 py-4 border border-indigo-900"> Clock Out</th>
                  <th scope="col" class="px-6 py-4 border border-indigo-900">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="request in requests"
                  class="border border-indigo-900 transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                  <td class="whitespace-nowrap px-6 py-4 font-medium border border-indigo-900">{{request.user.name}}</td>
                  <td class="whitespace-nowrap px-6 py-4 font-medium border border-indigo-900">{{request.regularize_type}}</td>
                  <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{new Date(request.request_for).toLocaleDateString()}}</td>
                  <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{new Date(request.created_at).toDateString()}}</td>
                  <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{new Date(request.clock_in).toLocaleTimeString()}}</td>
                  <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{new Date(request.clock_out).toLocaleTimeString()}}</td>
                  <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">
                    <div class="flex justify-center">
                      <button v-tooltip="'accept request'" class="mr-4" @click="acceptRequest(request)"><span><i class="material-icons" style="color: green;">task_alt</i></span></button>
                      <button v-tooltip="'reject request'" @click="rejectRequest(request)"><span><i class="material-icons" style="color: red;">cancel</i></span></button>
                    </div>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </template>
    <script setup>
    import axios from 'axios';
    import { onMounted } from 'vue';
    import { ref } from 'vue';
    const requests  = ref([]);
    const user = ref({});
    const getRequests = ()=>{
        axios.get('api/user')
        .then((res)=>{
        user.value = res.data;
        axios.get('/regularize/requests',{
            params:{
                reporting_manager_id: user.value.id
                
            }
           
        })
        .then((res)=> {
            requests.value = res.data
        })
        })
    }
    
    onMounted(getRequests);

    const acceptRequest = (request)=>{
      axios.post('/regularize/accept',request)
      .then(()=>{
        getRequests();
      });
      
    }

    const rejectRequest = (request)=>{
      axios.post('/regularize/reject',request)
      .then(()=>{
        getRequests();
      });
    }
    </script>