<template>
  <app-layout>
    <div class="product-list-page mb-4">
      <div class="py-3 text-2xl text-center text-black bg-primary font-bold">
        Item List
      </div>
      <div class="p-8 divide-y">
        <Item v-for="(item, index) in products" :item="item" :key="index" @click="$inertia.visit(route('product.detail', { id: item.id }))" />
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Item from '@/Components/Product/Item'

export default {
  props: ['products'],

  components: {
    Item,
    AppLayout
  }
}
</script>
