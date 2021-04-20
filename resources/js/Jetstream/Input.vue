<template>
    <input
      class="border-b-2 border-gray-500 focus:outline-none shadow-sm w-full py-1"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      ref="input"
      :placeholder="placeholder"
    >
</template>

<script>
export default {
  props: ['modelValue', 'placeholder'],

  emits: ['update:modelValue'],

  methods: {
    focus () {
      this.$refs.input.focus()
    }
  }
}
</script>
