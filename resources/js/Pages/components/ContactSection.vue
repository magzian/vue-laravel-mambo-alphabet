<template>
  <section 
    id="contact" 
    class="relative z-10 bg-gradient-to-r from-purple-600 to-pink-600 py-20 text-white"
  >
    <div class="container mx-auto px-6">
      <div class="max-w-4xl mx-auto">
        <h3 
          v-motion
          :initial="{ y: 50, opacity: 0 }"
          :visible-once="{ y: 0, opacity: 1, transition: { duration: 800 } }"
          class="text-4xl md:text-5xl font-bold text-center mb-16"
        >
          Request a Quote or Contact Us
        </h3>
        <div class="grid md:grid-cols-2 gap-12">
          <div 
            v-motion
            :initial="{ x: -50, opacity: 0 }"
            :visible-once="{ x: 0, opacity: 1, transition: { duration: 800 } }"
          >
            <h4 class="text-2xl font-semibold mb-6">Contact Information</h4>
            <div class="space-y-4">
              <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">📧</div>
                <span>hello@printworks.com</span>
              </div>
              <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">📞</div>
                <span>+1 (555) 987-6543</span>
              </div>
              <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">📍</div>
                <span>456 Print Avenue, Business City</span>
              </div>
            </div>
          </div>
          <form 
            v-motion
            :initial="{ x: 50, opacity: 0 }"
            :visible-once="{ x: 0, opacity: 1, transition: { duration: 800, delay: 200 } }"
            @submit.prevent="submitForm"
            class="space-y-4"
          >
            <input 
              v-model="name"
              type="text" 
              placeholder="Your Name" 
              required
              class="w-full px-4 py-3 rounded-lg bg-white/20 backdrop-blur-sm border border-white/30 placeholder-white/70 text-white focus:outline-none focus:ring-2 focus:ring-white/50"
            >
            <input 
              v-model="email"
              type="email" 
              placeholder="Your Email" 
              required
              class="w-full px-4 py-3 rounded-lg bg-white/20 backdrop-blur-sm border border-white/30 placeholder-white/70 text-white focus:outline-none focus:ring-2 focus:ring-white/50"
            >
            <textarea 
              v-model="message"
              placeholder="Your Message" 
              rows="4" 
              required
              class="w-full px-4 py-3 rounded-lg bg-white/20 backdrop-blur-sm border border-white/30 placeholder-white/70 text-white focus:outline-none focus:ring-2 focus:ring-white/50 resize-none"
            ></textarea>
            <button 
              type="submit" 
              :disabled="isSubmitting"
              class="w-full bg-white text-purple-600 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-300 disabled:opacity-50"
            >
              {{ isSubmitting ? 'Sending...' : 'Send Message' }}
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { router } from "@inertiajs/vue3";
import Swal from 'sweetalert2'


const name = ref('');
const email = ref('');
const message = ref('');
const isSubmitting = ref(false);

const submitForm = async () => {
  isSubmitting.value = true;
  const formData = new FormData();
  formData.append('name', name.value);
  formData.append('email', email.value);
  formData.append('message', message.value);


  try {
    await router.post('/contact/submit', formData, {
      onSuccess: (page) => {
        isSubmitting.value = false;
        Swal.fire({
          icon: 'success',
          title: 'Message Sent',
          text: 'Thank you for contacting us! We will get back to you soon.',
          confirmButtonText: 'OK'
        });

        // Reset form
        name.value = '';
        email.value = '';
        message.value = '';
      },
      onError: (error) => {
        isSubmitting.value = false;
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'There was an error sending your message. Please try again later.',
          confirmButtonText: 'OK'
        });
      }
    });
  }
  catch (error) {
    isSubmitting.value = false;
    console.error('Error submitting form:', error);
  }
}

/* const form = reactive({
  name: '',
  email: '',
  message: ''
}); */

/* const submitForm = async () => {
  

  

  try {
    // Simulate form submission
    await new Promise(resolve => setTimeout(resolve, 2000));

    Swal.fire({
      icon: 'success',
      title: 'Message Sent',
      text: 'Thank you for contacting us! We will get back to you soon.',
      confirmButtonText: 'OK'
    });

    // Reset form
    form.name = '';
    form.email = '';
    form.message = '';
  } catch (error) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'There was an error sending your message. Please try again later.',
      confirmButtonText: 'OK'
    });
  } finally {
    isSubmitting.value = false;
  }
} */





</script> 
