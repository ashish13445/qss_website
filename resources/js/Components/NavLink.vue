<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 text-white  text-sm font-medium leading-5  focus:outline-none  bg-gradient-to-r from-orange-400 to-red-600 transition duration-150 ease-in-out font-bold'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5   hover:bg-gradient-to-r from-orange-400 to-red-600 focus:outline-none hover:text-white  transition duration-150 ease-in-out font-bold'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
