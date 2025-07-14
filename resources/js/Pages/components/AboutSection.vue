<template>
  <section 
    id="about" 
    ref="aboutSection"
    class="relative z-10 bg-white/60 backdrop-blur-sm py-20"
  >
    <div class="container mx-auto px-6">
      <div class="max-w-4xl mx-auto text-center">
        <h3 
          v-motion
          :initial="{ y: 50, opacity: 0 }"
          :visible-once="{ y: 0, opacity: 1, transition: { duration: 800 } }"
          class="text-4xl md:text-5xl font-bold mb-8 text-gray-800"
        >
          About Our Printing Services
        </h3>
        <p 
          v-motion
          :initial="{ y: 50, opacity: 0 }"
          :visible-once="{ y: 0, opacity: 1, transition: { duration: 800, delay: 200 } }"
          class="text-lg text-gray-600 mb-12 leading-relaxed"
        >
          We bring your ideas to life with high-quality printing for shirts, children’s coloring books, and business banners. Our team combines creativity, precision, and fast service to deliver products that make an impact—whether for fun, learning, or promotion.
        </p>
        <div class="grid md:grid-cols-3 gap-8">
          <div 
            v-for="(feature, index) in features"
            :key="index"
            v-motion
            :initial="{ y: 50, opacity: 0 }"
            :visible-once="{ y: 0, opacity: 1, transition: { duration: 600, delay: index * 200 } }"
            class="bg-white/80 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300"
          >
            <div class="text-4xl mb-4">{{ feature.icon }}</div>
            <h4 class="text-xl font-semibold mb-3 text-gray-800">{{ feature.title }}</h4>
            <p class="text-gray-600">{{ feature.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'

const features = ref([
  {
    icon: '🎨', 
    title: 'Creative Design',
    description: 'Beautifully illustrated books that capture children\'s imagination and make learning visually engaging.'
  },
  {
    icon: '🧠',
    title: 'Educational Content',
    description: 'Carefully crafted content that follows proven educational methods to enhance learning outcomes.'
  },
  {
    icon: '❤️',
    title: 'Child-Friendly',
    description: 'Safe, age-appropriate content designed specifically for young learners with their development in mind.'
  }
])
</script>
