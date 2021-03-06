<template>
  <div>
    <jet-banner/>

    <div class="min-h-screen bg-gray-100">
      <nav class="bg-black border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex items-center">
              <inertia-link :href="route('seller.product.add')" :class="{'hidden': showLinks}">
                <font-awesome-icon class="text-white" icon="plus-circle" size="lg" />
              </inertia-link>
            </div>

            <!-- Logo -->
            <div class="flex items-center">
              <inertia-link :href="route('seller.dashboard')">
                <h1 class="text-5xl text-white">{{ $page.props.app_name }}</h1>
              </inertia-link>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
              <!-- Settings Dropdown -->
              <div class="ml-3 relative">
                <jet-dropdown align="right" width="48">
                  <template #trigger>
                    <span class="inline-flex rounded-md">
                      <button type="button"
                              class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                          {{ $page.props.user ? $page.props.user.name : '' }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                      </button>
                    </span>
                  </template>

                  <template #content>
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                      Manage Account
                    </div>

                    <jet-dropdown-link :href="route('profile.show')">
                      Profile
                    </jet-dropdown-link>

                    <div class="border-t border-gray-100"></div>

                    <!-- Authentication -->
                    <form @submit.prevent="logout">
                      <jet-dropdown-link as="button">
                        Log Out
                      </jet-dropdown-link>
                    </form>
                  </template>
                </jet-dropdown>
              </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden text-white">
              <button @click="showingNavigationDropdown = ! showingNavigationDropdown"
                      class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition"
                      :class="{'hidden': showLinks}">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                  <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden bg-white">
          <!-- Responsive Settings Options -->
          <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
              <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3">
                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url"/>
              </div>

              <div>
                <div class="font-medium text-base text-gray-800">{{ $page.props.user ? $page.props.user.name : '' }}</div>
                <div class="font-medium text-sm text-gray-500">{{ $page.props.user ? $page.props.user.email : '' }}</div>
              </div>
            </div>

            <div class="mt-3 space-y-1">
              <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                Profile
              </jet-responsive-nav-link>

              <!-- Authentication -->
              <form method="POST" @submit.prevent="logout">
                <jet-responsive-nav-link as="button">
                  Log Out
                </jet-responsive-nav-link>
              </form>
            </div>
          </div>
        </div>
      </nav>

      <!-- Page Content -->
      <main class="page_wrapper">
        <slot></slot>
      </main>
    </div>
  </div>
</template>

<script>
import JetBanner from '@/Jetstream/Banner'
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

export default {
  components: {
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetResponsiveNavLink
  },

  computed: {
    showLinks () {
      return route().current() === 'seller.dashboard'
    }
  },

  data () {
    return {
      showingNavigationDropdown: false
    }
  },

  mounted () {
    this.setProperty()
    window.addEventListener('resize', this.setProperty)
  },

  methods: {
    setProperty () {
      const vh = window.innerHeight * 0.01
      document.documentElement.style.setProperty('--vh', `${vh}px`)
    },

    logout () {
      this.$inertia.post(route('logout'))
    }
  },

  unmounted () {
    window.removeEventListener('resize', this.setProperty)
  }
}
</script>
