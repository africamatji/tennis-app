import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    Vue.use(plugin)

    new Vue({
      render: h => h(App, props),
    }).$mount(el)
  },
})