<template>
  <VuePopup
      root-classes="vue-popup--account vue-popup--register"
      :is-opened="isOpened"
      @close="close()"
  >
    <div class="success-alert">
      <div class="success-alert__icon">
        <i class="icon-verified"></i>
      </div>
      <div class="success-alert__text">
        {{ alertText }}
      </div>
    </div>
  </VuePopup>
</template>

<script>

import { mapState } from 'vuex';
import VuePopup from "./Popup/VuePopup";

export default {
  name: 'SuccessAlert',
  props: [
    'isOpened',
    'alertText'
  ],

  components: {
    VuePopup
  },

  data() {
    return {

    }
  },

  mounted () {},

  created () {},

  updated () {},

  methods: {
    close() {
      this.$emit('close')
    },
  },

  watch: {},

  computed: {
    ...mapState({

    })
  }
}
</script>

<style lang="scss" scoped>

</style>