<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import axios from 'axios';


import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const notifications = ref([]);
const count = ref(0);
const showingNavigationDropdown = ref(false);

const fetchNotifications = async () => {
  try {
    const response = await axios.get('/api/notifications');
    notifications.value = response.data.notifications;
    count.value = notifications.value.length;
  } catch (error) {
    console.error('Error fetching notifications:', error);
  }
};

const markAsRead = async (id) => {
  try {
    await axios.get(`/api/notifications/markAsRead/${id}`);
    await fetchNotifications();
  } catch (error) {
    console.error('Error marking notification as read:', error);
  }
};

const pollingInterval = 20000; 
let pollingTimer;

const startPolling = () => {
  pollingTimer = setInterval(fetchNotifications, pollingInterval);
};

const stopPolling = () => {
  clearInterval(pollingTimer);
};

onMounted(() => {
  fetchNotifications(); 
  startPolling(); 
});

onUnmounted(stopPolling);
</script>


<template>
    
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100 ">

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">

                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800"
                                    />
                                </Link>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('dashboard')" class="flex" :active="route().current('dashboard')">
                                   <span><i class="material-icons mr-2 text-blue-600">home</i></span>Dashboard
                                </NavLink>
                                <NavLink :href="route('attendance.page')" :active="route().current('attendance.page')">
                                    <span><i class="material-icons mr-2 text-green-600">edit_calendar</i></span>Attendance
                                </NavLink>  
                                <NavLink v-if=" $page.props.auth.user.email==='admin@qssindia.in'"  :href="route('projects')" :active="route().current('projects')">
                                    <span><i class="material-icons mr-2 text-yellow-600">task</i></span> Projects 
                                </NavLink>  
                                <NavLink :href="route('leaves')" :active="route().current('leaves')">
                                    <span><i class="material-icons mr-2 text-red-600">receipt_long</i></span> Leaves
                                </NavLink>  
                                <NavLink :href="route('holidays')" :active="route().current('holidays')">
                                    <span><i class="material-icons mr-2 text-purple-600">history_edu</i></span> Holidays
                                </NavLink>    
                                <NavLink :href="route('salary')" :active="route().current('salary')">
                                    <span><i class="material-icons mr-2 text-purple-600">money</i></span> Salary
                                </NavLink>                        
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">

                            <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                                @click="fetchNotifications"
                                                >
                                            <svg height="30px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="30px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M381.7,225.9c0-97.6-52.5-130.8-101.6-138.2c0-0.5,0.1-1,0.1-1.6c0-12.3-10.9-22.1-24.2-22.1c-13.3,0-23.8,9.8-23.8,22.1   c0,0.6,0,1.1,0.1,1.6c-49.2,7.5-102,40.8-102,138.4c0,113.8-28.3,126-66.3,158h384C410.2,352,381.7,339.7,381.7,225.9z"/><path d="M256.2,448c26.8,0,48.8-19.9,51.7-43H204.5C207.3,428.1,229.4,448,256.2,448z"/></g></svg>
                                            <span v-if="count > 0" class="bg-red-500 text-white rounded-full px-2 " style="margin-left: -7px;margin-bottom: 19px;">{{ count }}</span>
    
                                        </button>
                                        </span>
                                    </template>

                                    <template #content>

                                        <ul>
                                            <li v-for="notification in notifications" :key="notification.id">
                                                <span @click="markAsRead(notification.id)">
                                                <DropdownLink :href="notification.data.link">
                                                   {{ notification.data.message }}
                                                </DropdownLink>
                                            </span>

                                            </li>
                                        </ul>
                                    </template>
                                </Dropdown>
                            </div>

                        <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('attendance.page')" :active="route().current('attendance.page')">
                            Attendance
                        </ResponsiveNavLink>
                        <ResponsiveNavLink v-if=" $page.props.auth.user.id===1"  :href="route('projects')" :active="route().current('projects')">
                            Projects
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('leaves')" :active="route().current('leaves')">
                            Leaves
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('holidays')" :active="route().current('holidays')">
                            Holidays
                        </ResponsiveNavLink>
                    </div>

                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% ... text-white" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
