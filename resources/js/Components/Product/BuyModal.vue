<template>
  <div class="fixed z-10 inset-0 overflow-y-auto" :class="{'hidden': !show, 'block': show }" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-4 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="close"></div>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full px-10 py-6">
        <div class="bg-white px-4 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg text-bold leading-6 font-medium text-gray-900" id="modal-title">
                Are you going to buy this?
              </h3>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" class="w-full rounded-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="onSubmit">
            Yes
          </button>
          <button type="button" class="mt-3 w-full rounded-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-400 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="close">
            No
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'BuyModal',

  props: ['item'],

  watch: {
    item (val) {
      if (val) {
        this.show = true
        this.form.id = val.id
      }
    }
  },

  data () {
    return {
      show: false,
      form: this.$inertia.form({
        id: null
      })
    }
  },

  methods: {
    close () {
      this.show = false
      this.$emit('update:item', null)
    },

    onSubmit () {
      this.form.post(route('product.buy'), {
        onFinish: () => this.close()
      })
    }
  }
}
</script>
