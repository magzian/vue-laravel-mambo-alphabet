<template>
  <motion.header
    ref="header"
    :initial="{ y: -100, opacity: 0 }"
    :animate="{ y: 0, opacity: 1 }"
    :transition="{ duration: 0.8, ease: 'easeInOut' }"
    class="relative z-10 bg-white/80 backdrop-blur-md shadow-lg sticky top-0"
  >
    <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent flex items-center">
          <span class="mr-2">🖨️</span> Mambo Alphabet
        </h1>
      </div>
      <div class="hidden md:flex space-x-8">
        <a href="#home" class="text-gray-700 hover:text-purple-600 transition-colors font-medium">Home</a>
        <a href="#about" class="text-gray-700 hover:text-purple-600 transition-colors font-medium">About</a>
        <a href="#books" class="text-gray-700 hover:text-purple-600 transition-colors font-medium">Products</a>
        <a href="#contact" class="text-gray-700 hover:text-purple-600 transition-colors font-medium">Contact</a>
      </div>
      <button class="md:hidden text-gray-700" @click="toggleMobileMenu">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </nav> 
  </motion.header>
</template>

<script setup>
import { ref } from 'vue'
import { motion } from 'motion-v'

const toggleMobileMenu = () => {
  // Mobile menu toggle functionality can be added here
  console.log('Mobile menu toggled')
}
</script>
