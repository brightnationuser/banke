<template>
  <div>
    <VuePopup
        v-if="isOpened"
        root-classes="need-help"
        @close="closePopupNeedHelp"
    >
      <div class="need-help-wrapper"></div>
      <div class="need-help-inner account-form">
        <div class="need-help__close" @click="closePopupNeedHelp">
          <img src="../../assets/icons/close-blue.svg" alt="Close">
        </div>
        <div class="need-help__headline">
          <div class="need-help__title">{{translations.buttons.need_a_help}}</div>
          <div class="need-help__subtitle">{{ translations.texts.need_heelp_text }}</div>
          <div class="need-help__question">
            <vTextArea
                class="need-help__question-textarea"
                :validation="validation"
                :valid="help.valid"
                :val="help.val"
                :label="translations.fields.your_question"
                :placeholder="translations.fields.write_your_question_here"
                name="question"
                :error-text="translations.errors.required_field"
                @input="help.val = $event"
            />
            <div class="need-help__buttons">
              <div class="need-help__button need-help__button-send button" @click="submitPopupNeedHelp">Send</div>
              <div class="need-help__button need-help__button-cancel button button--stroke" @click="closePopupNeedHelp">Cancel</div>
            </div>
          </div>

          <div class="account-form__loader" v-if="showLoader">
            <img src="../../../../images/oval.svg" alt="loader">
          </div>
        </div>
      </div>
    </VuePopup>
    <SuccessAlert
        v-if="success"
        :alert-text="translations.texts.help_email_success"
        :is-opened="success"
        @close="closeSuccess()"
    >
    </SuccessAlert>
    <div class="link" @click="showPopupNeedHelp">
      <img class="link__icon" src="../../assets/icons/help.svg" alt="help">
      <div class="link__help link__help-circle c-blue">
        {{ translations.buttons.need_a_help }}
      </div>
    </div>
  </div>
</template>

<script>

import VuePopup from "../Popup/VuePopup";
import vTextArea from "../Forms/Fields/vTextArea";
import SuccessAlert from "../SuccessAlert";

export default {
  name: 'NeedHelpLink',

  components: {
    vTextArea,
    VuePopup,
    SuccessAlert
  },

  data() {
    return {
      showLoader: false,
      success: false,
      isOpened: false,
      validation: true,
      help: {
        val: '',
        valid: true,
      }
    }
  },

  methods: {
    showPopupNeedHelp() {
      this.isOpened = true
    },

    closePopupNeedHelp() {
      this.isOpened = false
      this.help.valid = true
    },

    submitPopupNeedHelp() {
      if (!this.help.val.trim().length) {
        this.help.valid = false
      }
      else {
        let data = new FormData();

        data.append('action', 'user_account__help_request');
        data.append('message', this.help.val);

        this.showLoader = true

        axios.post('/wp-admin/admin-ajax.php', data)
            .then((response) => {
              this.showLoader = false

              if(response.data.success) {
                this.closePopupNeedHelp()
                this.success = true
              }
              else {
                this.help.valid = false
              }

            })
      }
    },

    closeSuccess() {
      this.success = false
    },

  },


}
</script>

<style lang="scss">
.link {
  display: flex;
  align-items: center;
  cursor: pointer;

  &__help {
    position: relative;
    padding-bottom: 4px;
    margin-left: 6px;
    font-weight: bold;

    &-circle::before {
      position: absolute;
      bottom: 0;
      width: 100%;
      content: '';
      border-bottom: dotted 1px #005CA8;
    }
  }

  &__icon {
    margin-top: -4px;
  }
}

.need-help {
  z-index: 1000;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;

  &-wrapper {
    position: absolute;
    left: 0;
    content: '';
    background-color: rgba(1, 1, 1, 0.5);
    width: 100%;
    height: calc(100vh + 300px);
    z-index: 900;
  }

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
      width: 400px;
      padding: calc(62px / 1.6) calc(52px / 1.6) calc(56px / 1.6) calc(52px / 1.6);
    }
  }
}

@media (max-width: 420px) {
  .need-help {
    &-inner {
      width: 340px;
    }
  }
}

@media (max-width: 360px) {
  .need-help {
    &-inner {
      width: 300px;
    }

    &__button {
      padding: 6px 34px;
    }
  }
}

</style>
