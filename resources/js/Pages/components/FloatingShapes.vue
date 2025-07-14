<template>
  <div class="fixed inset-0 pointer-events-none z-0">
    <div 
      v-for="(shape, index) in floatingShapes" 
      :key="index"
      :class="shape.class"
      :style="{ 
        left: shape.left, 
        top: shape.top,
        animationDelay: shape.delay,
        animationDuration: shape.duration
      }"
      class="absolute animate-float opacity-20"
    >
      {{ shape.content }}
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const floatingShapes = ref([
  { content: '🌟', class: 'text-4xl', left: '10%', top: '20%', delay: '0s', duration: '6s' },
  { content: '📚', class: 'text-3xl', left: '80%', top: '15%', delay: '1s', duration: '8s' },
  { content: '🎨', class: 'text-5xl', left: '15%', top: '60%', delay: '2s', duration: '7s' },
  { content: '✏️', class: 'text-3xl', left: '85%', top: '70%', delay: '0.5s', duration: '9s' },
  { content: '🌈', class: 'text-4xl', left: '5%', top: '80%', delay: '1.5s', duration: '6s' },
  { content: '🎪', class: 'text-3xl', left: '90%', top: '40%', delay: '2.5s', duration: '8s' },
  { content: '🎭', class: 'text-4xl', left: '25%', top: '10%', delay: '3s', duration: '7s' },
  { content: '🎨', class: 'text-3xl', left: '70%', top: '85%', delay: '1.8s', duration: '9s' },
])
</script>

<style scoped>
@keyframes float {
  0%, 100% {
    transform: translateY(0px) rotate(0deg);
  }
  25% {
    transform: translateY(-20px) rotate(5deg);
  }
  50% {
    transform: translateY(-10px) rotate(-5deg);
  }
  75% {
    transform: translateY(-15px) rotate(3deg);
  }
}

.animate-float {
  animation: float infinite ease-in-out;
}
</style>
