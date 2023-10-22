<script setup>
import Notification from './custom/Notification.vue';

const routes = [
    {name: 'ProductsList', text: 'Products List'},
    {name: 'CategoriesList', text: 'Categories List'},
]
</script>

<template>
<div class="bg-white">
  <header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
      </div>
      <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <router-link v-for="route in routes" :key="route.name" :to="{name: route.name}">
            <a href="#" class="text-sm font-semibold leading-6 text-gray-900">{{ route.text}}</a>
        </router-link>
      </div>
    </nav>
  </header>

  <div class="relative isolate px-6 pt-14 lg:px-8">
    <Notification/>
    <slot></slot>
  </div>
</div>
</template>
