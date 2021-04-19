<template>
  <jet-authentication-card>
    <div class="text-8xl text-center font-extrabold">
      {{ $page.props.app_name }}
    </div>
    <div class="flex items-center justify-end mt-32">
      <a class="btn rounded-full text-center block w-full p-2 text-white bg-primary" href="/auth/facebook">
        Facebook Login
      </a>
    </div>
  </jet-authentication-card>
</template>

<script>
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'

export default {
  components: {
    JetAuthenticationCard
  }
}
</script>
