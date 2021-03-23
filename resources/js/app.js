import './bootstrap'
import Vue from 'vue'
import ShopLike from './components/ShopLike'

const app = new Vue({
  el: '#app',
  data: {
    isActive: false,
    isOpen: false,
    tab: 1,
    preview: null,
    showContent: false,
    reviewModalId: 1,
    shopModalId: 1,
  },
  methods: {
    drawer: function () {
      this.isActive = !this.isActive,
      this.isOpen = !this.isOpen
    },
    onFileChange (event) {
      if (event.target.files.length === 0) {
        return false
      }

      if (! event.target.files[0].type.match('image.*')) {
        return false
      }
      const reader = new FileReader()
      reader.onload = e => {
        this.preview = e.target.result
      }
      reader.readAsDataURL(event.target.files[0])
    },
    reviewCloseModal: function(){
      this.reviewModalId = 0;
    },
    shopCloseModal: function(){
      this.shopModalId = 0;
    },
  },
  components: {
    ShopLike,
  }
})
