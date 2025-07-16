<template>
  <section id="books" class="relative z-10 py-20">
    <div class="container mx-auto px-6">
      <h3 
        v-motion
        :initial="{ y: 50, opacity: 0 }"
        :visible-once="{ y: 0, opacity: 1, transition: { duration: 800 } }"
        class="text-4xl md:text-5xl font-bold text-center mb-16 text-gray-800"
      >
        Our Printing Products & Services
      </h3>
      <div class="relative max-w-6xl mx-auto">
        <div class="flex items-center justify-between mb-6">
          <button @click="prev" :disabled="carouselStart === 0" class="px-4 py-2 rounded-full bg-purple-100 text-purple-600 font-bold shadow hover:bg-purple-200 disabled:opacity-50">&#8592; Prev</button>
          <button @click="next" :disabled="carouselStart + 1 >= books.length" class="px-4 py-2 rounded-full bg-purple-100 text-purple-600 font-bold shadow hover:bg-purple-200 disabled:opacity-50">Next &#8594;</button>
        </div>
        <motion.div
          :key="carouselStart"
          :initial="{ x: direction === 1 ? 300 : -300, opacity: 0 }"
          :animate="{ x: 0, opacity: 1 }"
          :transition="{ duration: 0.5, ease: 'easeInOut' }"
          class="flex flex-row justify-center items-center gap-8"
        >
          <div 
            v-for="(book, index) in visibleBooks"
            :key="book.id"
            class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group hover:scale-105"
            style="min-width:320px;max-width:400px;width:100%"
          >
            <img :src="book.image" alt="Book Image" class="h-48 w-full object-cover" />
            <div class="p-6">
              <h4 class="text-xl font-semibold mb-2 text-gray-800">{{ book.title }}</h4>
              <p class="text-gray-600 mb-4">{{ book.description }}</p>
              <div class="flex justify-between items-center">
                <span class="text-2xl font-bold text-purple-600">{{ book.price }}</span>
                <!-- <button 
                  @click="addToCart(book)"
                  class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full hover:shadow-lg transition-all duration-300"
                >
                  Add to Cart
                </button> -->
              </div>
            </div>
          </div>
        </motion.div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, computed } from 'vue'
import { motion } from 'motion-v'

const books = ref([
  {
    id: 1,
    title: 'Custom Shirt Printing',
    description: 'High-quality t-shirt printing for events, businesses, and personal use. Choose your design and color!',
    price: 'From 9.99',
    image: '/images/shirt2.jpeg',
  },
  {
    id: 2,
    title: 'Children’s Coloring Books',
    description: 'Fun and educational coloring books for kids. Vibrant pages, creative themes, and bulk discounts.',
    price: 'From 5.99',
    image: '/images/color1.jpeg',
   
  },
  {
    id: 3,
    title: 'Business Banners',
    description: 'Durable, eye-catching banners for promotions, events, and storefronts. Custom sizes available.',
    price: 'From 19.99',
    image: '/images/banner.jpeg',
  },
]) 

const carouselStart = ref(0)
const visibleBooks = computed(() => books.value.slice(carouselStart.value, carouselStart.value + 3))

function next() {
  if (carouselStart.value + 3 < books.value.length) {
    carouselStart.value++
  }
}

function prev() {
  if (carouselStart.value > 0) {
    carouselStart.value--
  }
}

const addToCart = (book) => {
  // Emit event to parent or handle cart logic
  console.log('Added to cart:', book.title)
  // You can emit an event here: emit('add-to-cart', book)
}
</script>
