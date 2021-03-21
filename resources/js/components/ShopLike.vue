<template>
  <button class="c-shop__head__favorite"
    :class="{'is-liked':this.isLikedBy}"
    @click="clickLike"
  >
    <span class="material-icons">favorite</span>
    {{ toggleText }}
  </button>
</template>

<script>
export default {
  props:{
    initialIsLikedBy:{
      type: Boolean,
      default: false,
    },
    authorized: {
      type: Boolean,
      default: false,
    },
    endpoint: {
      type: String,
    },
  },
  data(){
    return{
      isLikedBy: this.initialIsLikedBy,
    }
  },
  computed: {
    toggleText(){
      if(this.isLikedBy){
        return 'お気に入りに登録済み'
      }else{
        return 'お気に入りに登録する';
      }
    }
  },
  methods:{
    clickLike() {
      if (!this.authorized) {
        alert('いいね機能はログイン中のみ使用できます')
        return
      }
      this.isLikedBy //いいね済みであればunlikeメソッド、いいねしていなければlikeメソッドを実行
      ? this.unlike()
      : this.like()
    },
    async like(){
      const response = await axios.put(this.endpoint)
      this.isLikedBy = true
    },
    async unlike(){
      const response = await axios.delete(this.endpoint)
      this.isLikedBy = false
    }
  }
}
</script>
