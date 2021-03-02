<template>
  <div class="reset-password-from-outer">
    <VuePopup
        v-if="!success"
        root-classes="vue-popup--account vue-popup--register"
        :is-opened="isOpened"
        @close="close()"
    >
      <div class="account-form account-form--forgot">
        <div class="account-form__title">{{translations.titles.forgot_password}}</div>
        <div class="account-form__text">
          {{translations.texts.forgot_password_form}}
        </div>
        <div class="account-form__content">
          <div class="account-form__column">
            <div class="account-form__row">
              <EmailInput
                  :validation="validation"
                  :valid="email.valid"
                  :val="email.val"
                  :label="translations.fields.email"
                  :placeholder="translations.fields.enter_your_email"
                  name="user-email"
                  :error-text="translations.errors.incorrect_email"
                  @keyupenter="submit()"
                  @input="email.val = $event"
              ></EmailInput>
            </div>
          </div>
        </div>
        <div class="account-form__row account-form__row--buttons">
          <div class="button button--account account-form__button" @click="submit()">
            {{translations.buttons.reset_password}}
          </div>
        </div>
        <div class="account-form__row account-form__row--text-link">
          <div class="button button--text" @click="switchForm('SignIn')">
            {{translations.buttons.back_to_sign_in}}
          </div>
        </div>

        <div class="account-form__loader" v-if="showLoader">
          <img src="../../../../images/oval.svg" alt="loader">
        </div>

        <div class="vue-popup__close">
          <i class="icon-close" @click="close()"></i>
        </div>
      </div>
    </VuePopup>
    <SuccessAlert
        classes="success-alert--text-small"
        v-if="success"
        :alert-text="translations.texts.reset_email_success"
        :is-opened="success"
        @close="closeSuccess()"
    >
    </SuccessAlert>
  </div>
</template>

<script>

import { mapState } from 'vuex';

import VuePopup from "../Popup/VuePopup";
import EmailInput from "./Fields/EmailInput";
import SuccessAlert from "../SuccessAlert";

export default {
  name: 'ResetPassword',
  props: [
    'isOpened'
  ],

  components: {
    VuePopup,
    EmailInput,
    SuccessAlert
  },

  data() {
    return {
      success: false,
      showLoader: false,
      validation: false,
      email: {
        val: '',
        valid: false
      },
    }
  },

  mounted () {},

  created () {},

  updated () {},

  methods: {
    submit() {

      let data = new FormData();

      data.append('action', 'user_account__restore_password');
      data.append('email', this.email.val);

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            this.showLoader = false

            if (response.data.success) {
              this.success = true
            }
            else {
              this.email.valid = false
              this.validation = true
            }
          })
    },

    close() {
      this.$emit('close')
    },

    switchForm(formName) {
      this.$emit('switchForm', formName)
    },

    closeSuccess() {
      this.success = false
      this.switchForm(false)
    }
  },

  watch: {},

  computed: {
    ...mapState({

    })
  }
}
</script>

<style lang="scss" scoped>
  .reset-password-from-outer {
    width: 100%;
  }
</style>

