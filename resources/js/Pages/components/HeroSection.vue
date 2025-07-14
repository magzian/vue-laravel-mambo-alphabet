<template>
  <section id="home" class="relative z-10 min-h-screen container mx-auto px-6 py-20">
    <div class="text-center max-w-4xl mx-auto">
      <h2 
        v-motion
        :initial="{ y: 50, opacity: 0 }"
        :enter="{ y: 0, opacity: 1, transition: { duration: 1000, delay: 200 } }"
        class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-purple-600 via-pink-600 to-yellow-500 bg-clip-text text-transparent leading-tight py-5"
      >
        Your One-Stop Printing Solution
      </h2>
      
      <p 
        v-motion
        :initial="{ y: 50, opacity: 0 }"
        :enter="{ y: 0, opacity: 1, transition: { duration: 1000, delay: 400 } }"
        class="text-xl md:text-2xl text-gray-700 mb-8 leading-relaxed py-1"
      >
        We specialize in custom shirt printing, vibrant children's coloring books, and eye-catching business banners. Fast turnaround, quality results, and creative designs for every need!
      </p>
      <div 
        v-motion
        :initial="{ y: 50, opacity: 0 }"
        :enter="{ y: 0, opacity: 1, transition: { duration: 1000, delay: 600 } }"
        class="flex flex-col sm:flex-row gap-4 justify-center"
      >
        <button 
          @click="viewServices"
          class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300"
        >
          View Services
        </button>
        <button 
          @click="getQuote"
          class="border-2 border-purple-500 text-purple-500 px-8 py-4 rounded-full text-lg font-semibold hover:bg-purple-500 hover:text-white transition-all duration-300"
        >
          Get a Quote
        </button>
      </div>
    </div>
  </section>
</template>

<script setup>
const exploreBooks = () => {
  document.querySelector('#books')?.scrollIntoView({ behavior: 'smooth' })
}

const learnMore = () => {
  document.querySelector('#about')?.scrollIntoView({ behavior: 'smooth' })
}
</script>

<style scoped>
@media (max-width: 768px) {
  .text-5xl {
    font-size: 2.5rem;
  }
  .text-7xl {
    font-size: 3rem;
  }
}
</style>
