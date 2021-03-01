import './bootstrap'
import Vue from 'vue'
import ShopLike from './components/ShopLike'
import ReviewSelect from './components/ReviewSelect'

const app = new Vue({
  el: '#app',
  components: {
    ShopLike,
    ReviewSelect
  }
})
