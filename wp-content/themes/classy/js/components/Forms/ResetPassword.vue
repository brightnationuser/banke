<template>
  <VuePopup
      root-classes="vue-popup--account vue-popup--register"
      :is-opened="isOpened"
      @close="close()"
  >
    <div class="account-form account-form--forgot">
      <div class="account-form__title">Forgot Password?</div>
      <div class="account-form__text">
        Enter your email address and a link to reset your password will be sent to that address
      </div>
      <div class="account-form__content">
        <div class="account-form__column">
          <div class="account-form__row">
            <EmailInput
                :validation="validation"
                :valid="email.valid"
                v-model="email.val"
                label="Email"
                placeholder="Enter your email"
                name="user-email"
                error-text="Incorrect email address"
            ></EmailInput>
          </div>
        </div>
      </div>
      <div class="account-form__row account-form__row--buttons">
        <div class="button button--account account-form__button" @click="submit()">
          Reset Password
        </div>
      </div>
      <div class="account-form__row account-form__row--text-link">
        <div class="button button--text" @click="switchForm('SignIn')">
          Back to sign in
        </div>
      </div>

      <div class="account-form__loader" v-if="showLoader">
        <img src="../../../images/oval.svg" alt="loader">
      </div>

      <div class="vue-popup__close">
        <i class="icon-close" @click="close()"></i>
      </div>
    </div>
  </VuePopup>
</template>

<script>

import { mapState } from 'vuex';

import VuePopup from "../Popup/VuePopup";
import EmailInput from "./Fields/EmailInput";

export default {
  name: 'ResetPassword',
  props: [
    'isOpened'
  ],

  components: {
    VuePopup,
    EmailInput
  },

  data() {
    return {
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
      this.validation = true

      let data = new FormData();

      data.append('action', 'user_account__restore_password');
      data.append('email', this.email.val);

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            this.showLoader = false

            if (response.data.success) {
              this.switchForm(false)
            }
            else {
              this.email.valid = false
            }
          })
    },

    close() {
      this.$emit('close')
    },

    switchForm(formName) {
      this.$emit('switchForm', formName)
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

