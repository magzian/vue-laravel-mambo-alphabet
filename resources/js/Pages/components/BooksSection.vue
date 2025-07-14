<template>
  <section id="books" class="relative z-10 py-20">
    <div class="container mx-auto px-6">
      <h3 
        v-motion
        :initial="{ y: 50, opacity: 0 }"
        :visible-once="{ y: 0, opacity: 1, transition: { duration: 800 } }"
        class="text-4xl md:text-5xl font-bold text-center mb-16 text-gray-800"
      >
        Our Book Collection
      </h3>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <div 
          v-for="(book, index) in books"
          :key="index"
          v-motion
          :initial="{ y: 50, opacity: 0, scale: 0.9 }"
          :visible-once="{ y: 0, opacity: 1, scale: 1, transition: { duration: 600, delay: index * 150 } }"
          class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group hover:scale-105"
        >
          <div class="h-48 bg-gradient-to-br from-purple-200 to-pink-200 flex items-center justify-center text-6xl">
            {{ book.emoji }}
          </div>
          <div class="p-6">
            <h4 class="text-xl font-semibold mb-2 text-gray-800">{{ book.title }}</h4>
            <p class="text-gray-600 mb-4">{{ book.description }}</p>
            <div class="flex justify-between items-center">
              <span class="text-2xl font-bold text-purple-600">${{ book.price }}</span>
              <button 
                @click="addToCart(book)"
                class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full hover:shadow-lg transition-all duration-300"
              >
                Add to Cart
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'

const books = ref([
  {
    id: 1,
    title: 'ABC Adventure',
    description: 'Join our characters on an exciting journey through the alphabet with fun activities and colorful illustrations.',
    price: '12.99',
    emoji: '🔤'
  },
  {
    id: 2,
    title: 'Letter Land',
    description: 'Explore a magical world where each letter has its own personality and story to tell.',
    price: '14.99',
    emoji: '🏰'
  },
  {
    id: 3,
    title: 'Phonics Fun',
    description: 'Learn letter sounds through interactive games and memorable rhymes that stick.',
    price: '13.99',
    emoji: '🎵'
  },
  {
    id: 4,
    title: 'Writing Wonders',
    description: 'Practice letter formation with guided exercises and fun tracing activities.',
    price: '11.99',
    emoji: '✍️'
  },
  {
    id: 5,
    title: 'Alphabet Animals',
    description: 'Meet adorable animals for each letter while learning the alphabet in a fun way.',
    price: '15.99',
    emoji: '🦁'
  },
  {
    id: 6,
    title: 'Story Starters',
    description: 'Build vocabulary and reading skills with engaging short stories for each letter.',
    price: '16.99',
    emoji: '📖'
  }
])

const addToCart = (book) => {
  // Emit event to parent or handle cart logic
  console.log('Added to cart:', book.title)
  // You can emit an event here: emit('add-to-cart', book)
}
</script>
