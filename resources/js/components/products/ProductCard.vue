<script setup>
defineProps(['name', 'description', 'categories', 'image', 'price'])

</script>

<template>
    <div class="card w-96 bg-base-100 shadow-xl">
      <figure><img :src="image" alt="Product" /></figure>
      <div class="card-body">
        <h2 class="card-title">
            {{ name }}
                <div class="badge badge-secondary">{{price}} Dhs</div>
        </h2>
            <p>{{ description}}</p>
        <div class="card-actions justify-end">
            <div v-for="category in categories" class="badge badge-outline">{{category.name}}</div>
        </div>
      </div>
    </div>
</template>
