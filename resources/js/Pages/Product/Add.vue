<template>
  <app-layout>
    <div class="product-add-page mb-4">
      <div class="py-3 text-2xl text-center text-black bg-primary font-bold">
        Put
      </div>
      <div class="p-4">
        <div v-if="!form.image" class="flex justify-around text-primary py-10">
          <div class="rounded-full bg-primary p-6">
            <label class="flex flex-col items-center p-4 rounded-full tracking-wide uppercase cursor-pointer">
              <font-awesome-icon icon="image" size="4x" class="text-white" />
              <input type="file" accept="image/*;" class="hidden" @change="onFileChange('image', $event.target.files)" />
            </label>
          </div>
          <div class="rounded-full bg-primary p-6">
            <label class="flex flex-col items-center p-4 rounded-full tracking-wide uppercase cursor-pointer">
              <font-awesome-icon icon="camera" size="4x" class="text-white" />
              <input type="file" accept="image/*;capture=camera" class="hidden" capture="camera" @change="onFileChange('image', $event.target.files)" />
            </label>
          </div>
        </div>
        <div v-else class="product-image flex justify-center py-10">
          <img :src="form.image" />
        </div>

        <div>
          <Input v-model="form.name" placeholder="Item name" />
          <textarea v-model="form.memo" placeholder="Item information" rows="4" class="mt-3 border-0 pl-0 border-b-2 border-gray-500 shadow-sm w-full py-1 focus:outline-none resize-none" />
          <Input v-model="form.price" placeholder="Price" class="mt-3" />

          <div class="flex justify-center mt-4">
            <button class="text-white bg-primary px-10 py-3 text-2xl rounded-full" @click="onSubmit">
              Enter
            </button>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import FileInput from '@/Mixins/FileInput'
import AppLayout from '@/Layouts/AppLayout'
import Input from '@/Jetstream/Input'

export default {
  mixins: [FileInput],

  components: {
    Input,
    AppLayout
  },

  data () {
    return {
      ImagePlaceholder: 'https://via.placeholder.com/100',
      form: this.$inertia.form({
        image: null,
        name: null,
        memo: null,
        price: null
      })
    }
  },

  methods: {
    onSubmit () {
      this.form.post(this.route('seller.product.save'))
    }
  }
}
</script>

<style lang="scss" scoped>
.product-add-page {
  textarea {
    &:focus {
      outline: none !important;
      border-color: #6B7280;
      box-shadow: none;
    }
  }
  .product-image {
    img {
      width: 250px;
      height: 250px;
    }
  }
}
</style>
