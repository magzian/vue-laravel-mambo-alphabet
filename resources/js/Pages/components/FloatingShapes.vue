<template>
  <div class="fixed inset-0 pointer-events-none z-0" aria-hidden="true">
    <motion.div
      v-for="(shape, index) in floatingShapes"
      :key="index"
      :class="['absolute', shape.class]"
      :style="{ left: shape.left, top: shape.top }"
      :initial="{ opacity: 0, y: 20, rotate: 0 }"
      :animate="{
        opacity: 0.2,
        y: [20, -20, -10, -15, 0],
        rotate: [0, 5, -5, 3, 0]
      }"
      :transition="{
        delay: parseFloat(shape.delay),
        duration: parseFloat(shape.duration),
        repeat: Infinity,
        repeatType: 'loop',
        ease: 'easeInOut'
      }"
    >
      {{ shape.content }}
    </motion.div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { motion } from 'motion-v'

const floatingShapes = ref([
  { content: '👕', class: 'text-4xl', left: '10%', top: '20%', delay: '0', duration: '6' }, // Shirt
  { content: '📚', class: 'text-3xl', left: '80%', top: '15%', delay: '1', duration: '8' }, // Book
  { content: '🖼️', class: 'text-5xl', left: '15%', top: '60%', delay: '2', duration: '7' }, // Banner
  { content: '🖨️', class: 'text-3xl', left: '85%', top: '70%', delay: '0.5', duration: '9' }, // Printer
  { content: '☕', class: 'text-4xl', left: '5%', top: '80%', delay: '1.5', duration: '6' }, // Mug
  { content: '�️', class: 'text-3xl', left: '90%', top: '40%', delay: '2.5', duration: '8' }, // Sticker
  { content: '📄', class: 'text-4xl', left: '25%', top: '10%', delay: '3', duration: '7' }, // Flyer
  { content: '🎨', class: 'text-3xl', left: '70%', top: '85%', delay: '1.8', duration: '9' }, // Design
])
</script>
