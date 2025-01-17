<template>
    <div class="flex items-center space-x-4">
      
      <button
        @click="toggleDarkMode"
        class="p-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200"
      >
        {{ isDark ? '🌞' : '🌙' }}
      </button>
      
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  
  export default {
    setup() {
      // Reactive state for dark mode
      const isDark = ref(false);
  
      // Initialize dark mode based on localStorage or system preference
      onMounted(() => {
        const userPrefersDark =
          localStorage.getItem('theme') === 'dark' ||
          (!localStorage.getItem('theme') &&
            window.matchMedia('(prefers-color-scheme: dark)').matches);
  
        if (userPrefersDark) {
          document.documentElement.classList.add('dark');
          isDark.value = true;
        }
      });
  
      // Toggle dark mode
      const toggleDarkMode = () => {
        isDark.value = !isDark.value;
  
        if (isDark.value) {
          document.documentElement.classList.add('dark');
          localStorage.setItem('theme', 'dark');
        } else {
          document.documentElement.classList.remove('dark');
          localStorage.setItem('theme', 'light');
        }
      };
  
      return {
        isDark,
        toggleDarkMode,
      };
    },
  };
  </script>
  
  <style scoped>
  /* Optional custom styles for the button */
  </style>
  