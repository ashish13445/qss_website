<template>
    <div class="text-4xl text-orange-300 font-bold">
      {{ displayedValue }}+
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted, watch } from "vue";
  
  const props = defineProps({
    startValue: {
      type: Number,
      default: 0
    },
    endValue: {
      type: Number,
      required: true
    },
    duration: {
      type: Number,
      default: 2000 // Animation duration in milliseconds
    }
  });
  
  const displayedValue = ref(props.startValue);
  
  const animateCounter = () => {
    const startTime = performance.now();
    const updateCounter = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / props.duration, 1);
      displayedValue.value = Math.floor(
        props.startValue + progress * (props.endValue - props.startValue)
      );
  
      if (progress < 1) {
        requestAnimationFrame(updateCounter);
      }
    };
  
    requestAnimationFrame(updateCounter);
  };
  
  onMounted(animateCounter);
  
  // Re-run animation if `endValue` changes
  watch(() => props.endValue, animateCounter);
  </script>
  