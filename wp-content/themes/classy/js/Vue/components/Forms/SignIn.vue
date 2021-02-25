<template>
  <VuePopup
      root-classes="vue-popup--account vue-popup--login"
      :is-opened="isOpened"
      @close="close()"
  >
    <div class="account-form account-form--login">
<!--      <div v-if="creationSuccess" class="user-create-success">Your account has been successfully created</div>-->
      <div class="account-form__title">{{ translations.titles.sign_in }}</div>
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
                @change="email.valid = true"
                @input="email.val = $event"
                @keyupenter="submit()"
            ></EmailInput>
          </div>
          <div class="account-form__row">
            <PasswordInput
                :validation="validation"
                :valid="password.valid"
                :val="password.val"
                :label="translations.fields.password"
                :placeholder="translations.fields.enter_your_password"
                name="user-password"
                :error-text="translations.errors.incorrect_password"
                @change="password.valid = true"
                @input="password.val = $event"
                @keyupenter="submit()"
            >
            </PasswordInput>
          </div>
        </div>
      </div>
      <div class="account-form__row account-form__row--buttons">
        <div class="button button--account account-form__button" @click="submit()">
          {{ translations.buttons.login }}
        </div>
        <div class="button button--account button--stroke account-form__button" @click="switchForm('SignUp')">
          {{ translations.buttons.sign_up }}
        </div>
      </div>
      <div class="account-form__row account-form__row--text-link">
        <div class="button button--text" @click="switchForm('ResetPassword')">
          {{ translations.titles.forgot_password }}
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
    'isOpened',
    'creationSuccess'
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
      userData: {
        username: '',
        email: '',
        photo: '',
        company: '',
        position: ''
      },
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
              this.userData = response.data.user
              this.logIn()
            } else {
              this.email.valid = false
              this.password.valid = false
            }
          })
    },

    logIn() {
      this.$store.commit('setLoggedIn', true)
      this.$store.commit('setUser', this.userData)
      // window.location.href = '/account/specification'
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
      loggedIn: state => state.loggedIn,
      user: state => state.user
    })
  }
}
</script>

<style lang="scss" scoped>
  .user-create-success {
    font-weight: 600;
    font-size: 14px;
    line-height: 140%;
    color: #005CA9;
    margin-bottom: 10px;
  }
</style>
