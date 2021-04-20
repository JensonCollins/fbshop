import { createApp, h } from 'vue'
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

import { library } from '@fortawesome/fontawesome-svg-core'
import { faPlusCircle, faBars, faChevronUp, faChevronDown, faChevronLeft, faTrashAlt, faImage, faCamera } from '@fortawesome/free-solid-svg-icons'
import { faFacebookMessenger } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import './bootstrap'

library.add(faPlusCircle, faBars, faChevronUp, faChevronDown, faChevronLeft, faTrashAlt, faFacebookMessenger, faImage, faCamera)

const el = document.getElementById('app')

createApp({
  render: () =>
    h(InertiaApp, {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: (name) => require(`./Pages/${name}`).default
    })
})
  .mixin({ methods: { route } })
  .use(InertiaPlugin)
  .component('font-awesome-icon', FontAwesomeIcon)
  .mount(el)

InertiaProgress.init({ color: '#6796ff' })
