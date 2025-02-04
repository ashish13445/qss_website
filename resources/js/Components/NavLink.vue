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
        ? 'inline-flex items-center px-1 pt-1 border-b-2 text-white  text-sm font-medium leading-5  focus:outline-none border-orange-600 text-orange-600 transition duration-150 ease-in-out font-bold'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5   hover:text-orange-600  focus:outline-none   transition duration-150 ease-in-out font-bold'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
