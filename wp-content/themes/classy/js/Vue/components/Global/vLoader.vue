<template>
  <div class="account-form__loader">
    <img src="../../../../images/oval.svg" alt="loader">
  </div>
</template>

<script>

import { mapState } from 'vuex';

export default {
  name: 'vLoader',
  props: [
    'showLoader'
  ],

  components: {

  },

  data() {
    return {

    }
  },

  mounted () {},

  created () {},

  updated () {},

  methods: {},

  watch: {},

  computed: {
    ...mapState({

    })
  }
}
</script>

<style lang="scss" scoped>

</style>