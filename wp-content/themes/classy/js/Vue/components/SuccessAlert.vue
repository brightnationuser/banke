<template>
  <VuePopup
      root-classes="vue-popup--account vue-popup--success"
      :is-opened="isOpened"
      @close="close()"
  >
    <div class="success-alert" :class="classes">
      <div class="success-alert__icon">
        <i class="icon-verified"></i>
      </div>
      <div class="success-alert__text">
        {{ alertText }}
      </div>

      <div class="vue-popup__close">
        <i class="icon-close" @click="close()"></i>
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
    'alertText',
    'classes'
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
  .vue-popup--success {
    z-index: 10;
  }

  .success-alert {
    position: relative;
    background-color: #ffffff;
    background-image: url(../../../images/account/account-popup-bg.png);
    background-position: center;
    background-size: cover;
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.25);
    border-radius: 4px;
    height: 384px;
    max-width: 426px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

    &__text {
      color: #003462;
      font-size: 24px;
      line-height: 33px;
      text-align: center;
      max-width: 322px;
      font-weight: 400;
      margin-top: 22px;
    }

    &__icon {
      width: 84px;

      i {
        font-size: 84px;
        color: #005ca9;
      }
    }

    &--text-small {

      .success-alert {
        &__text {
          font-size: 20px;
          line-height: 27px;
          max-width: 300px;
        }
      }
    }
  }
</style>
