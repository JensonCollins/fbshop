<template>
  <app-layout>
    <div class="product-add-page mb-4">
      <div class="py-3 text-2xl text-center text-black bg-primary font-bold">
        Put
      </div>
      <div class="p-4">
        <div class="flex justify-around text-primary py-10">
          <div class="rounded-full bg-primary p-6">
            <font-awesome-icon icon="image" size="5x" class="text-white" />
          </div>
          <div class="rounded-full bg-primary p-6">
            <font-awesome-icon icon="camera" size="5x" class="text-white" />
          </div>
        </div>

        <div>
          <Input :modelValue="form.name" placeholder="Item name" />
          <textarea v-model="form.memo" placeholder="Item information" rows="4" class="mt-3 border-0 pl-0 border-b-2 border-gray-500 shadow-sm w-full py-1 focus:outline-none resize-none" />
          <Input :modelValue="form.price" placeholder="Price" class="mt-3" />

          <div class="flex justify-center mt-4">
            <button class="text-white bg-primary px-10 py-3 text-2xl rounded-full">
              Enter
            </button>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Input from '@/Jetstream/Input'
import Button from '@/Jetstream/Button'

export default {
  components: {
    Button,
    Input,
    AppLayout
  },

  data () {
    return {
      ImagePlaceholder: 'https://via.placeholder.com/100',
      form: this.$inertia.form({
        name: null
      })
    }
  },

  methods: {
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
}
</style>
