<script setup>
    import CreateCategory from './CreateCategory.vue';

    const headers = [
        'Name',
        'Parent',
        'Number of Products',
        'Actions'
    ]
</script>

<template>
<div class="overflow-x-auto">
<create-category></create-category>
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
      <!-- row 2 -->
      <tr>
        <th>
            id
        </th>
        <td> one </td>
        <td> two </td>
        <td>tree</td>
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

