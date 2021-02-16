<template>
  <div v-if="statePopup" class="need-help">
    <div class="need-help-wrapper" @click="hidePopup"></div>
    <div class="need-help-inner">
      <div class="need-help__close" @click="hidePopup">
        <img src="../../assets/icons/close-blue.svg" alt="Close">
      </div>
      <div class="need-help__headline">
        <div class="need-help__title">Need a help?</div>
        <div class="need-help__subtitle">Write your question and we answer you shortly on email address</div>
        <div class="need-help__question">
          <div class="need-help__question-text">
            Your question
          </div>
          <div class="need-help__question-textarea">
            <textarea class="need-help__question-textarea-inner" name="Need help" id="need-help"
                      placeholder="Write your question here">
            </textarea>
          </div>
          <div class="need-help__buttons">
            <div class="need-help__button need-help__button-send button">Send</div>
            <div class="need-help__button need-help__button-cancel button button--stroke">Cancel</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import {mapState} from 'vuex';

export default {
  name: 'NeedHelpPopup',
  props: {
    statePopup: {
      type: Boolean,
      default: false
    }
  },

  components: {},

  data() {
    return {}
  },

  mounted() {
  },

  created() {
  },

  updated() {
  },

  methods: {
    showPopup() {

    },

    hidePopup() {
      console.log('test')
    }
  },

  watch: {},

  computed: {
    ...mapState({})
  }
}
</script>

<style lang="scss">
.need-help {
  &-inner {
    background-image: url('../../assets/global/bg-need-help.png');
    background-repeat: no-repeat;
    background-size: cover;
    position: absolute;
    z-index: 1000;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 430px;
    max-height: 423px;
    background-color: #fff;
    padding: 62px 52px 56px 52px;
    border-radius: 6px;
  }

  &__close {
    position: absolute;
    cursor: pointer;
    top: 26px;
    right: 26px;
  }

  &__title {
    font-weight: bold;
    font-size: 32px;
    color: #003462;

  }

  &__subtitle {
    font-weight: 400;
    margin-top: 10px;
    font-size: 14px;
    color: #4A4A49;
  }

  &__question {
    margin-top: 18px;
  }

  &__question-text {
    font-size: 10px;
    font-weight: 600;
    color: #5E5E5E;
  }

  &__question-textarea {
    margin-top: 4px;
    width: 100%;
  }

  &__question-textarea-inner {
    font-family: 'Open Sans';
    font-weight: 400;
    width: 100%;
    min-height: 120px;
    resize: none;
    outline: 0;
    border: solid 1px #E8F0F7;
    border-radius: 4px;
    padding: 14px 10px 16px 14px;
    color: #757575;
    background-color: #F6F6F6;
  }

  &__buttons {
    display: flex;
    margin-top: 24px;
  }

  &__button {
    font-weight: 600;
    font-size: 14px;
    line-height: 24px;
    border-radius: 8px;
    text-transform: none;
    padding: 8px 40px;

    &:hover {
      padding: 8px 40px;
    }
  }

  &__button-send {
    border: 1px solid #005CA9;
  }

  &__button-cancel {
    margin-left: 18px;

    &:hover {
      margin-left: 17px;
    }
  }
}

@media (max-width: 500px) {
  .need-help {
    &-inner {
      width: 100%;
      max-width: 400px;
      padding: calc(62px/1.6) calc(52px/1.6) calc(56px/1.6) calc(52px/1.6);
    }
  }
}

@media (max-width: 420px) {
  .need-help {
    &-inner {
      max-width: 340px;
    }
  }
}

@media (max-width: 360px) {
  .need-help {
    &-inner {
      max-width: 300px;
    }

    &__button {
      padding: 6px 34px;
    }
  }
}

</style>