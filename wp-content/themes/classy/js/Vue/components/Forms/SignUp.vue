<template>
  <div class="sign-up-outer">
    <VuePopup
        v-if="!success"
        root-classes="vue-popup--account vue-popup--register"
        :is-opened="isOpened"
        @close="close()"
    >
      <div class="account-form account-form--register">
        <div class="account-form__title">{{ translations.titles.sign_up }}</div>
        <div class="account-form__content">
          <div class="account-form__column">
            <div class="account-form__row">
              <TextInput
                  :validation="validation"
                  :valid="name.valid"
                  :val="name.val"
                  :label="translations.fields.name"
                  :placeholder="translations.fields.enter_your_name"
                  name="user-name"
                  :error-text="name.errorMessage"
                  @change="name.valid = true"
                  @input="name.val = $event"
              ></TextInput>
            </div>
            <div class="account-form__row">
              <TextInput
                  :validation="validation"
                  :valid="company.valid"
                  :val="company.val"
                  :label="translations.fields.company"
                  :placeholder="translations.fields.enter_company_name"
                  name="user-company"
                  :error-text="translations.errors.required_field"
                  @change="company.valid = true"
                  @input="company.val = $event"
              ></TextInput>
            </div>
            <div class="account-form__row">
              <TextInput
                  :validation="validation"
                  :valid="position.valid"
                  :val="position.val"
                  :label="translations.fields.job_position"
                  :placeholder="translations.fields.enter_job_position"
                  name="user-position"
                  :error-text="translations.errors.required_field"
                  @change="position.valid = true"
                  @input="position.val = $event"
              ></TextInput>
            </div>
          </div>
          <div class="account-form__column">
            <div class="account-form__row">
              <EmailInput
                  :validation="validation"
                  :valid="email.valid"
                  :val="email.val"
                  :label="translations.fields.email"
                  :placeholder="translations.fields.enter_your_email"
                  name="user-email"
                  :error-text="email.errorMessage"
                  @change="email.valid = true"
                  @input="email.val = $event"
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
                  :error-text="password.errorMessage"
                  @change="password.valid = true"
                  @input="password.val = $event"
                  @keyupenter="submit()"
              >
              </PasswordInput>
            </div>
            <div class="account-form__row">
              <PasswordInput
                  :validation="validation"
                  :valid="confirmPassword.valid"
                  :val="confirmPassword.val"
                  :label="translations.fields.confirm_password"
                  :placeholder="translations.fields.confirm_your_password"
                  name="user-password-repeat"
                  :error-text="translations.errors.passwords_dont_match"
                  @change="confirmPassword.valid = true"
                  @input="confirmPassword.val = $event"
                  @keyupenter="submit()"
              >
              </PasswordInput>
            </div>
          </div>
        </div>
        <div class="account-form__row account-form__row--buttons">
          <div class="button button--account account-form__button" @click="submit()">
            {{ translations.buttons.create_account }}
          </div>
          <div class="button button--account button--stroke account-form__button" @click="switchForm('SignIn')">
            {{ translations.buttons.sign_in }}
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
        v-if="success"
        :alert-text="translations.texts.account_successfully_created"
        :is-opened="success"
        @close="closeSuccess"
    >
    </SuccessAlert>
  </div>
</template>

<script>
import {mapState} from 'vuex';

import VuePopup from "../Popup/VuePopup";
import TextInput from "./Fields/TextInput";
import EmailInput from "./Fields/EmailInput";
import PasswordInput from "./Fields/PasswordInput";
import SuccessAlert from  "../SuccessAlert"
import store from "../../store";

export default {
  name: 'SignUp',
  props: [
    'isOpened'
  ],

  components: {
    VuePopup,
    TextInput,
    EmailInput,
    PasswordInput,
    SuccessAlert
  },

  data() {
    return {
      success: false,
      showLoader: false,
      validated: false,
      validation: false,
      userData: {
        username: '',
        email: '',
        photo: '',
        company: '',
        position: ''
      },
      name: {
        val: '',
        valid: false,
        errorMessage: 'This field is required'
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
        valid: false,
        errorMessage: 'Incorrect email address'
      },
      password: {
        val: '',
        valid: false,
        errorMessage: 'Incorrect password'
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
    this.email.errorMessage = this.translations.errors.required_field
    this.name.errorMessage = this.translations.errors.required_field
    this.password.errorMessage = this.translations.errors.required_field
  },

  updated() {
  },

  methods: {
    submit() {
      this.validated = this.validate()

      let data = new FormData()
      data.append('action', 'user_account__create')
      data.append('name', this.name.val)
      data.append('company', this.company.val)
      data.append('position', this.position.val)
      data.append('email', this.email.val)
      data.append('password', this.password.val)

      if (this.validated) {
        this.showLoader = true

        axios.post('/wp-admin/admin-ajax.php', data)
            .then((response) => {
              this.showLoader = false

              if (response.data.error !== '' && response.data.error.hasOwnProperty('existing_user_login')) {
                this.name.valid = false
                this.name.errorMessage = this.translations.errors.name_already_used
              }

              if (response.data.error !== '' && response.data.error.hasOwnProperty('existing_user_email')) {
                this.email.valid = false
                this.email.errorMessage = this.translations.errors.email_already_used
              }

              if (response.data.user_created) {
                this.success = true
                this.userData = response.data.user
                this.logIn()
                // this.switchForm('SignIn', true)
              }
            })
      }
    },

    close() {
      this.$emit('close')
    },

    switchForm(formName, additionalParam = false) {
      this.$emit('switchForm', formName, additionalParam)
    },

    validate() {
      this.validation = true

      if (!this.name.val.trim().length) {
        this.name.valid = false
      }

      if (!this.company.val.trim().length) {
        this.company.valid = false
      }

      if (!this.position.val.trim().length) {
        this.position.valid = false
      }

      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      this.email.valid = re.test(this.email.val.trim().toLowerCase())

      if (this.password.val.trim().length < 4) {
        this.password.valid = false
        this.password.errorMessage = this.translations.errors.password_too_short
      }

      if (this.password.val.trim() !== this.confirmPassword.val.trim()) {
        this.confirmPassword.valid = false
      }

      return this.name.valid &&
          this.company.valid &&
          this.position.valid &&
          this.email.valid &&
          this.password.valid &&
          this.confirmPassword.valid
    },

    logIn() {
      this.$store.commit('setLoggedIn', true)
      this.$store.commit('setUser', this.userData)
      // window.location.href = '/account/specification'
    },

    closeSuccess() {
      this.success = false
      this.$emit('close')
    }
  },

  watch: {},

  computed: {
    ...mapState({})
  }
}
</script>

<style lang="scss" scoped>

.sign-up-outer {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

@media screen and(max-width: 767px) {
  .account-form {
    max-width: 500px;

    &__content {
      flex-direction: column;
    }
  }
}

@media screen and(max-width: 480px) {
  .account-form {
    padding: 30px;

    &__row {
      margin-top: 10px;
    }

    &__column {
      margin-bottom: 15px;
    }
  }
}

@media screen and(max-width: 350px) {

  .account-form {
    &__column {
      margin-bottom: 0;
    }
    &__button {
      padding: 8px 14px;
      button {

       }
    }
  }
}

</style>
