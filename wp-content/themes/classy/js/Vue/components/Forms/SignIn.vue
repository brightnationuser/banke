<template>
  <VuePopup
      root-classes="vue-popup--account vue-popup--login"
      :is-opened="isOpened"
      @close="close()"
  >
    <div class="account-form account-form--login">
      <div class="account-form__title">Sign In</div>
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
                @change="email.valid = true"
            ></EmailInput>
          </div>
          <div class="account-form__row">
            <PasswordInput
                :validation="validation"
                :valid="password.valid"
                v-model="password.val"
                label="Password"
                placeholder="Enter your password"
                name="user-password"
                error-text="Incorrect password"
                @change="password.valid = true"
            >
            </PasswordInput>
          </div>
        </div>
      </div>
      <div class="account-form__row account-form__row--buttons">
        <div class="button button--account account-form__button" @click="submit()">
          Login
        </div>
        <div class="button button--account button--stroke account-form__button" @click="switchForm('SignUp')">
          Sign up
        </div>
      </div>
      <div class="account-form__row account-form__row--text-link">
        <div class="button button--text" @click="switchForm('ResetPassword')">
          Forgot password?
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
</template>

<script>
import {mapState} from "vuex";

import VuePopup from "../Popup/VuePopup";
import EmailInput from "./Fields/EmailInput";
import PasswordInput from "./Fields/PasswordInput";

export default {
  name: 'SignIn',
  props: [
    'isOpened'
  ],
  components: {
    VuePopup,
    EmailInput,
    PasswordInput
  },
  data() {
    return {
      showLoader: false,
      validation: false,
      email: {
        val: '',
        valid: false
      },
      password: {
        val: '',
        valid: false,
      }
    }
  },

  mounted() {
  },

  created() {
  },

  updated() {
  },

  methods: {
    submit() {
      this.validation = true

      let data = new FormData();

      data.append('action', 'user_account__login');
      data.append('email', this.email.val);
      data.append('password', this.password.val);

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            this.showLoader = false

            if (response.data.success) {
              this.switchForm(false)
            }
            else {
              this.email.valid = false
              this.password.valid = false
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
    ...mapState({})
  }
}
</script>

<style lang="scss" scoped>

</style>