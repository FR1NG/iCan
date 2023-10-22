<script setup>
import Notification from './custom/Notification.vue';

const routes = [
    {name: 'ProductsList', text: 'Products List'},
    {name: 'CategoriesList', text: 'Categories List'},
]
</script>

<template>
<div class="bg-white">
<div class="navbar bg-info text-white">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
            <router-link v-for="route in routes" :key="route.name" :to="{name: route.name}">
                <li>
                    <a>{{ route.text}}</a>
                </li>
            </router-link>
          </ul>
    </div>
    <router-link :to="{name: 'Home'}">
        <a class="btn btn-ghost normal-case text-xl">iCan</a>
    </router-link>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
        <router-link v-for="route in routes" :key="route.name" :to="{name: route.name}">
            <li>
                <a>{{ route.text}}</a>
            </li>
        </router-link>
    </ul>
  </div>
</div>

  <div class="relative isolate px-6 pt-14 lg:px-8">
    <Notification/>
    <slot></slot>
  </div>
</div>
</template>
