<template>
  <div class="product-item flex py-2">
    <img class="item-image" :src="item.image || ImagePlaceholder" alt="Image" />
    <div class="pl-4 flex flex-col">
      <span class="text-lg font-bold">{{ item.name }}</span>
      <p class="my-2 text-sm">{{ item.memo }}</p>
      <span class="text-lg font-bold">
        {{ currency(item.price) }}
      </span>
    </div>
  </div>
</template>

<script>
import numeral from 'numeral'

export default {
  name: 'Item',

  props: ['item'],

  data: () => ({
    ImagePlaceholder: 'https://via.placeholder.com/100'
  }),

  methods: {
    currency (value) {
      if (!value || parseInt(value) === 0) return '-'
      return numeral(value).format('0,0') + 'P'
    }
  }
}
</script>
