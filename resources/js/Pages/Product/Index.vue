<template>
  <app-layout>
    <div class="product-list-page mb-4">
      <div class="py-3 text-2xl text-center text-black bg-primary font-bold">
        {{ date ? date : 'Item List' }}
      </div>
      <div class="p-8 divide-y">
        <Item v-for="(item, index) in products" :item="item" :key="index" @click="$inertia.visit(route('seller.product.detail', { id: item.id, date: date }))" />
      </div>
      <div class="fixed bottom-0 right-0 left-0 text-white bg-primary font-bold text-center">
        <button class="flex justify-center mx-auto py-3" @click="showDateList = !showDateList">
          <font-awesome-icon v-if="!showDateList" icon="chevron-up" class="mr-2 mt-1" />
          <font-awesome-icon v-if="showDateList" icon="chevron-down" class="mr-2 mt-1" />
          Monthly Archive
        </button>
        <DateList v-if="showDateList" />
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Item from '@/Components/Product/Item'
import DateList from '@/Components/Product/DateList'

export default {
  props: ['products', 'date'],

  components: {
    DateList,
    Item,
    AppLayout
  },

  data: () => ({
    showDateList: false
  })
}
</script>
