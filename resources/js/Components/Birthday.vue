
<template>
    <h1 class="text-center mb-5 ">
        <Tag severity="info" class="p-4 text-xl rounded-full" value="Birthdays & Anniversaries"></Tag>
    </h1>

<div class="lg:flex lg:justify-evenly  ">
    <div class="lg:w-1/2 p-20 lg:p-0">
    <Carousel :value="birthdays" :numVisible="1" :numScroll="1" >
    <template #item="slotProps">
        <div class="border border-surface-200 dark:border-surface-700 rounded-md m-2 p-3">

            <div class="mb-2 font-medium">{{ slotProps.data.name }} </div>
            <Tag  class="" >{{new Date(slotProps.data.dob).toDateString().substring(0,11) }}</Tag>
            <div class=" ">
                <div class="mt-0 font-semibold text-xl">Birthday</div>
                <div class="mt-2">
                    <Image src="../../images/birthday.png" class="rounded-full" alt="cake" width="250"/>

                </div>
            </div>
        </div>
    </template>
</Carousel>
</div>

<div class="lg:w-1/2 p-20 lg:p-0">
    <Carousel :value="anniversaries" :numVisible="1" :numScroll="1" >
    <template #item="slotProps">
        <div class="border border-surface-200 dark:border-surface-700 rounded-md m-2 p-3">

            <div class="mb-2 font-medium">{{ slotProps.data.name }} </div>
            <Tag  class="" >{{new Date(slotProps.data.joining_date).toDateString().substring(0,11) }}</Tag>
            <div class=" ">
                <div class="mt-0 font-semibold text-xl">Work Anniversary</div>
                <div class="mt-2">
                    <Image src="../../images/anniversary.png" class="rounded-full" alt="cake" width="250"/>

                </div>
            </div>
        </div>
    </template>
</Carousel>
</div>

</div>

</template>
 
<script setup>
import axios from 'axios';
import Carousel from 'primevue/carousel';
import Tag from 'primevue/tag';
import Image from 'primevue/image';
import { ref } from 'vue';
const birthdays = ref();
const anniversaries = ref();
const fetchEvents = () =>{
    axios.get('/birthdays')
    .then((res)=>{
        birthdays.value = res.data.birthdays;
        anniversaries.value= res.data.anniversaries;
    });
}
fetchEvents();
</script>
