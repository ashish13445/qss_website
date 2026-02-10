<script setup>
import { Head, Link } from '@inertiajs/vue3'
import NavBar2 from '@/Components/NavBar2.vue'
import Footer from '@/Components/Footer.vue'
import DarkModeToggle from '@/Components/DarkModeToggle.vue'
import { ref } from 'vue'

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
     metaTitle: String,
  metaDescription: String
});

const activeTab = ref('csr')

const active =
  'px-6 py-2 bg-red-900 text-white rounded-lg font-medium'
const inactive =
  'px-6 py-2 bg-gray-200 text-gray-700 rounded-lg'

/* Static for now – later you can load via API */
const csrDocuments = [
  {
    title: 'CSR Policy',
    file: '/images/investor/csr/csr-policy.pdf'
  }
]

const annualReturns = [
  { year: '2020–21', file: '/images/investor/annual-return/2020-21.pdf' },
  { year: '2021–22', file: '/images/investor/annual-return/2021-22.pdf' },
  { year: '2022–23', file: '/images/investor/annual-return/2022-23.pdf' },
  { year: '2023–24', file: '/images/investor/annual-return/2023-24.pdf' },
  { year: '2024–25', file: '/images/investor/annual-return/2024-25.pdf' }
]
</script>
<template>
  <Head>
    <title>{{ metaTitle }}</title>
    <meta name="description" :content="metaDescription" />
  </Head>

  <NavBar2>
    <div class="flex align-items-center">
      <DarkModeToggle />

        <div v-if="canLogin" class="p-2">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="text-black md:text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            ><Button class="border-2 p-4 border-red-600 text-red-600 ">Dashboard</Button></Link
        >

        <template v-else>
            
            
            <Link
                :href="route('login')"
                class="font-semibold  hover:text-gray-900  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                ><Button class="border-2  p-2 rounded-full text-sm border-red-600 md:font-extrabold text-red-600 ">Employee Login </Button></Link
            >

            

            
          
    
        </template>

    </div>

    </div>
  </NavBar2>

  <!-- Page Heading -->
  <div class="bg-white">
    <h1
      class="text-2xl md:mt-12 md:text-5xl font-medium text-center py-5 md:py-10
             bg-gradient-to-r from-orange-100 to-red-400"
    >
      <span class="font-extrabold pr-2">INVESTOR</span>INFORMATION
    </h1>

    <!-- Tabs -->
    <div class="flex justify-center gap-4 my-8">
      <button
        @click="activeTab = 'csr'"
        :class="activeTab === 'csr' ? active : inactive"
      >
        CSR
      </button>

      <button
        @click="activeTab = 'annual'"
        :class="activeTab === 'annual' ? active : inactive"
      >
        Annual Return
      </button>
    </div>

    <!-- CSR Tab -->
    <div v-if="activeTab === 'csr'" class="px-6 md:px-60 py-10">
      <div
        v-for="(doc, index) in csrDocuments"
        :key="index"
        class="flex items-center justify-between border p-4 rounded-lg mb-4
               hover:shadow-md transition"
      >
        <span class="font-medium text-gray-700">
          {{ doc.title }}
        </span>

        <a
          :href="doc.file"
          target="_blank"
          class="text-red-900 font-medium underline"
        >
          View / Download
        </a>
      </div>
    </div>

    <!-- Annual Return Tab -->
    <div v-if="activeTab === 'annual'" class="px-6 md:px-60 py-10">
      <table class="min-w-full border border-gray-200 rounded-lg">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-4 text-left">Financial Year</th>
            <th class="p-4 text-left">Document</th>
          </tr>
        </thead>

        <tbody>
          <tr
            v-for="(item, index) in annualReturns"
            :key="index"
            class="border-t hover:bg-gray-50"
          >
            <td class="p-4 font-medium">
              {{ item.year }}
            </td>
            <td class="p-4">
              <a
                :href="item.file"
                target="_blank"
                class="text-red-900 font-medium underline"
              >
                View / Download
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <Footer />
</template>
