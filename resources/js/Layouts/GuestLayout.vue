<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="h-screen flex flex-col justify-center items-center p-6  bg-gray-100 dark:bg-gray-900">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-auto h-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >


        
            <slot />
        </div>
    </div>
</template>
