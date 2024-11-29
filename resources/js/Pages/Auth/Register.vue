<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    employee_id: '',
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    designation: '',
    domain: '',
    joining_date: null
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="employee_id" value="Employee Id" />

                <TextInput
                    id="employee_id"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.employee_id"
                    required
                    autofocus
                    autocomplete="employee_id"
                />

                <InputError class="mt-2" :message="form.errors.employee_id" />
            </div>
            <div class="mt-4">
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="mt-4">
                <InputLabel for="designation" value="Designation" />

                <TextInput
                    id="designation"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.designation"
                    required
                    autocomplete="designation"
                />

                <InputError class="mt-2" :message="form.errors.designation" />
            </div>

            <div class="mt-4">
                <InputLabel for="domain" value="Domain" />

                <TextInput
                    id="domain"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.domain"
                    required
                    autocomplete="domain"
                />

                <InputError class="mt-2" :message="form.errors.domain" />
            </div>

            <div class="mt-4">
                <InputLabel for="joining_date" value="Joining Date" />

                <input
                id="joining_date"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.joining_date"
                    required
                    autocomplete="joining_date">

                <InputError class="mt-2" :message="form.errors.joining_date" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Already registered?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
