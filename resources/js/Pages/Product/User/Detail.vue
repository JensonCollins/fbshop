<template>
  <app-layout>
    <div class="product-detail-page mb-4">
      <div class="py-3 text-2xl text-center text-black bg-primary font-bold">
        Item Detail
      </div>
      <div class="p-4">
        <div class="flex items-center cursor-pointer" @click="$inertia.visit(route('products.list'))">
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
          <span v-if="item.is_sold === 0" class="text-2xl font-bold text-center mt-4">
            {{ currency(item.price) }}
          </span>
        </div>

        <div v-if="item.is_sold === 1 && bought_by_me" class="flex flex-col bg-primary justify-center items-center -mx-4 py-3 mt-2">
          <span class="text-secondary text-3xl">
            {{ currency(item.price) }}
          </span>
          <span class="text-white text-xl">
            You bought
          </span>
        </div>

        <div v-if="item.is_sold === 0" class="flex justify-center mt-3 px-6">
          <button class="w-full rounded-full bg-primary px-4 py-2 text-white text-lg font-semibold" @click="buyItem = item">
            Buy It!
          </button>
        </div>
        <div v-if="item.is_sold === 1 && bought_by_me" class="mt-5 flex justify-center">
          <a class="flex items-center cursor-pointer" href="https://m.me/Angus.Kortln0918" target="_blank">
            <span class="text-black mr-2">Talk with Seller</span>
            <font-awesome-icon :icon="['fab', 'facebook-messenger']" class="text-black" />
          </a>
        </div>
      </div>

      <buy-modal :item="buyItem" @update:item="buyItem = $event" />
    </div>
  </app-layout>
</template>

<script>
import numeral from 'numeral'
import AppLayout from '@/Layouts/AppLayout'
import BuyModal from '@/Components/Product/BuyModal'

export default {
  props: ['item', 'date'],

  components: {
    BuyModal,
    AppLayout
  },

  computed: {
    bought_by_me () {
      if (this.$page.props.user && (this.item.buyer_id === this.$page.props.user.id)) {
        return true
      }
      return false
    }
  },

  data: () => ({
    buyItem: null,
    ImagePlaceholder: 'https://via.placeholder.com/100'
  }),

  methods: {
    currency (value) {
      if (!value || parseInt(value) === 0) return '-'
      return numeral(value).format('0,0') + 'P'
    }
  },

  head () {
    return {
      title: 'LodyShopping',
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: this.item.memo
        },
        {
          hid: 'og-title',
          property: 'og:title',
          content: this.item.name
        },
        {
          hid: 'og-description',
          property: 'og:description',
          content: this.item.memo
        },
        {
          hid: 'og-image',
          property: 'og:image',
          content: this.item.image
        }
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
.product-detail-page {
  .product-image {
    img {
      max-width: 300px;
      max-height: 300px;
      height: 300px;
      width: auto;
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
