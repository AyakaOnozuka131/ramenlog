import './bootstrap'
import Vue from 'vue'
import ShopLike from './components/ShopLike'
import ReviewSelect from './components/ReviewSelect'

const app = new Vue({
  el: '#app',
  data: {
    isActive: false,
    isOpen: false,
  },
  methods: {
    drawer: function () {
      this.isActive = !this.isActive,
      this.isOpen = !this.isOpen
    },
  },
  components: {
    ShopLike,
    ReviewSelect
  }
})
