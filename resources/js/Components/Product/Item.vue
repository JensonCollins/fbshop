<template>
  <div class="product-item flex py-2">
    <div class="item-image" :class="{ 'sold': item.is_sold === 1 }">
      <img :src="item.image || ImagePlaceholder" alt="Image" />
    </div>
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

<style lang="scss" scoped>
.product-item {
  .sold {
    position: relative;
    img {
      opacity: 0.5;
    }
    &:before {
      content: 'SOLD';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 24px;
      font-weight: bold;
    }
  }
  .item-image {
    min-width: 100px;
    width: 100px;
    height: 100px;
  }
}
</style>
