<script setup>
    import CreateCategory from './CreateCategory.vue';
    import { useCategoryStore } from '@/stores/category';
    import { storeToRefs } from 'pinia';

    const categoryStore = useCategoryStore();
    const { categories } = storeToRefs(categoryStore);
    const headers = [
        'Name',
        'Parent Category',
        'Number of Products',
        'Actions'
    ]

    // fetching data from the backend
    categoryStore.getCategories();
</script>

<template>
<div class="overflow-x-auto">
<create-category :categories="categoryStore.itemsForSelect"></create-category>
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th>
          <label>
            <input type="checkbox" class="checkbox" />
          </label>
        </th>
            <th v-for="header in headers">{{ header }}</th>
      </tr>
    </thead>
    <tbody>
      <!-- records -->
      <tr v-for="category in categories" :key="category.id">
        <th>
            {{ category.id }}
        </th>
        <td> {{ category.name }} </td>
        <td> {{ category?.parent?.name || 'None' }} </td>
        <td> {{ category.products_count }} </td>
        <th>
          <button class="btn btn-ghost btn-xs">edit</button>
          <button class="btn btn-ghost btn-xs">delete</button>
        </th>
      </tr>
    </tbody>
    <!-- foot -->
    <tfoot>
      <tr>
        <th></th>
            <th v-for="header in headers">{{ header }}</th>
        <th></th>
      </tr>
    </tfoot>

  </table>
</div>
</template>

