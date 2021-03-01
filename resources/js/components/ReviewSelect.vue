<template>
  <v-select name="shop_select" :options="options" v-model="selected">
     <template #no-options>
        選択肢が見つかりません。
    </template>
  </v-select>
</template>

<script>
import vSelect from 'vue-select';

export default {
  components: {
    vSelect,
  },
  props: {
    shopData: {
      type: Array //配列形式のデータのみ受け取り許可
    }
  },
  data() { 
    return{
      selected: '',
      options: this.shopData,
    }
  },

}
</script>
