<template>
  <VuePopup
      root-classes="vue-popup--account vue-popup--register"
      :is-opened="isOpened"
      @close="close()"
  >
    <div class="account-form account-form--register">
      <div class="account-form__title">Sign In</div>
      <div class="account-form__content">
        <div class="account-form__column">
          <div class="account-form__row">
            <TextInput
              :validation="validation"
              :valid="name.valid"
              v-model="name.val"
              label="Name"
              placeholder="Enter your name"
              name="user-name"
              error-text="This field is required"
              @change="name.valid = true"
            ></TextInput>
          </div>
          <div class="account-form__row">
            <TextInput
                :validation="validation"
                :valid="company.valid"
                v-model="company.val"
                label="Company"
                placeholder="Enter company name"
                name="user-company"
                error-text="This field is required"
                @change="company.valid = true"
            ></TextInput>
          </div>
          <div class="account-form__row">
            <TextInput
                :validation="validation"
                :valid="position.valid"
                v-model="position.val"
                label="Job Position"
                placeholder="Enter job position"
                name="user-position"
                error-text="This field is required"
                @change="position.valid = true"
            ></TextInput>
          </div>
        </div>
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
          <div class="account-form__row">
            <PasswordInput
                :validation="validation"
                :valid="confirmPassword.valid"
                v-model="confirmPassword.val"
                label="Confirm password"
                placeholder="Confirm your password"
                name="user-password-repeat"
                error-text="Passwords dont match"
                @change="confirmPassword.valid = true"
            >
            </PasswordInput>
          </div>
        </div>
      </div>
      <div class="account-form__row account-form__row--buttons">
        <div class="button button--account account-form__button" @click="submit()">
          Create account
        </div>
        <div class="button button--account button--stroke account-form__button" @click="switchForm('SignIn')">
          Sign In
        </div>
      </div>

      <div class="vue-popup__close">
        <i class="icon-close" @click="close()"></i>
      </div>
    </div>
  </VuePopup>
</template>

<script>
import {mapState} from 'vuex';

import VuePopup from "../Popup/VuePopup";
import TextInput from "./Fields/TextInput";
import EmailInput from "./Fields/EmailInput";
import PasswordInput from "./Fields/PasswordInput";

export default {
  name: 'SignUp',
  props: [
    'isOpened'
  ],

  components: {
    VuePopup,
    TextInput,
    EmailInput,
    PasswordInput
  },

  data() {
    return {
      validated: false,
      validation: false,
      name: {
        val: '',
        valid: false
      },
      company: {
        val: '',
        valid: false
      },
      position: {
        val: '',
        valid: false
      },
      email: {
        val: '',
        valid: false
      },
      password: {
        val: '',
        valid: false,
      },
      confirmPassword: {
        val: '',
        valid: false,
      },
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
      this.validated = this.validate()
    },

    close() {
      this.$emit('close')
    },

    switchForm(formName) {
      this.$emit('switchForm', formName)
    },

    validate() {
      this.validation = true

      if(!this.name.val.trim().length) {
        this.name.valid = false
      }

      if(!this.company.val.trim().length) {
        this.company.valid = false
      }

      if(!this.position.val.trim().length) {
        this.position.valid = false
      }

      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      this.email.valid = re.test(this.email.val.trim().toLowerCase())

      if(this.password.val.trim().length < 4) {
        this.password.valid = false
      }

      if(this.password.val.trim() !== this.confirmPassword.val.trim()) {
        this.confirmPassword.valid = false
      }

      return this.name.valid &&
          this.company.valid &&
          this.position.valid &&
          this.email.valid &&
          this.password.valid &&
          this.confirmPassword.valid
    }
  },

  watch: {},

  computed: {
    ...mapState({})
  }
}
</script>

<style lang="scss" scoped>

</style>