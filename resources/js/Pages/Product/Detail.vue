<template>
  <app-layout>
    <div class="product-detail-page mb-4">
      <div class="py-3 text-2xl text-center text-black bg-primary font-bold">
        Item Detail
      </div>
      <div class="p-4">
        <div class="flex items-center cursor-pointer" @click="$inertia.visit(route('seller.products.list', { date: date }))">
          <font-awesome-icon icon="chevron-left" class="mr-2" />
          <span class="font-semibold">Back</span>
        </div>
        <div class="product-image flex justify-center mt-3" :class="{'sold': item.is_sold === 1}">
          <img :src="item.image || ImagePlaceholder" alt="Image" />
        </div>
        <div class="flex flex-col px-6 mt-3">
          <span class="font-bold text-xl">
            {{ item.name }}
          </span>
          <span class="text-sm mt-3">
            {{ item.memo }}
          </span>
          <span class="text-2xl font-bold text-center mt-4">
            {{ currency(item.price) }}
          </span>
        </div>

        <div v-if="item.is_sold === 1" class="flex justify-center items-center">
          <span class="font-bold mr-2">Buyer: </span>
          <span class="text-primary mr-2">{{ item.buyer.name }}</span>
          <div>
            <font-awesome-icon :icon="['fab', 'facebook-messenger']" />
          </div>
        </div>

        <div class="flex justify-around mt-3">
          <button class="rounded-full bg-primary px-4 py-1 text-white text-sm">
            View on Facebook
          </button>
          <button class="rounded-full bg-gray px-4 py-1 text-white text-sm">
            <font-awesome-icon icon="trash-alt" class="mr-3" />
            Delete
          </button>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import numeral from 'numeral'
import AppLayout from '@/Layouts/AppLayout'

export default {
  props: ['item', 'date'],

  components: {
    AppLayout
  },

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
.product-detail-page {
  .product-image {
    img {
      width: 300px;
      height: 300px;
    }
    &.sold {
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
        font-size: 36px;
        font-weight: bold;
      }
    }
  }
}
</style>
