<template>
  <div class="divide-y bg-white welcome flex flex-wrap flex-col">
    <inertia-link :href="route('seller.products.list')" class="h-1/2 flex-auto flex flex-col items-center justify-center text-primary">
      <span class="text-4xl font-bold">
        View
      </span>
      <font-awesome-icon icon="bars" size="5x" />
    </inertia-link>

    <inertia-link :href="route('seller.product.add')" class="h-1/2 flex-auto flex flex-col items-center justify-center text-primary">
      <span class="text-4xl font-bold">
        Put
      </span>
      <font-awesome-icon icon="plus-circle" size="5x" />
    </inertia-link>
  </div>
</template>

<script>
export default {
  name: 'Welcome'
}
</script>

<style lang="scss" scoped>
$navbar-size: 65px;
.welcome {
  min-height: calc(100vh - #{$navbar-size});
  min-height: calc(var(--vh, 1vh) * 100 - #{$navbar-size});
}
</style>
