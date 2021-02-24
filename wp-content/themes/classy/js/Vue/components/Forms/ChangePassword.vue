<template>
  <div class="change-password-form">
    <div class="account-form account-form--forgot" v-if="!success">
      <div class="account-form__title">{{translations.titles.reset_password}}</div>
      <div class="account-form__content">
        <div class="account-form__column">
          <div class="account-form__row">
            <PasswordInput
                :validation="validation"
                :valid="password.valid"
                v-model="password.val"
                :label="translations.fields.password"
                :placeholder="translations.fields.enter_your_password"
                name="user-password"
                :error-text="translations.errors.incorrect_password"
                @change="password.valid = true"
            >
            </PasswordInput>
          </div>
          <div class="account-form__row">
            <PasswordInput
                :validation="validation"
                :valid="confirmPassword.valid"
                v-model="confirmPassword.val"
                :label="translations.fields.confirm_password"
                :placeholder="translations.fields.confirm_your_password"
                name="user-password-repeat"
                :error-text="translations.errors.passwords_dont_match"
                @change="confirmPassword.valid = true"
            >
            </PasswordInput>
          </div>
        </div>
      </div>
      <div class="account-form__row account-form__row--buttons">
        <div class="button button--account account-form__button" @click="submit()">
          {{translations.buttons.save_password}}
        </div>
      </div>

      <div class="account-form__loader" v-if="showLoader">
        <img src="../../../../images/oval.svg" alt="loader">
      </div>
    </div>
    <SuccessAlert
        v-if="success"
        :alert-text="translations.texts.reset_password_complete"
        :is-opened="success"
        @close="closeSuccess()"
    >
    </SuccessAlert>
  </div>
</template>

<script>

import { mapState } from 'vuex';

import VuePopup from "../Popup/VuePopup";
import PasswordInput from "./Fields/PasswordInput";
import SuccessAlert from "../SuccessAlert";

export default {
  name: 'ChangePassword',

  components: {
    VuePopup,
    PasswordInput,
    SuccessAlert
  },

  data() {
    return {
      username: '',
      key: '',
      showLoader: false,
      validation: false,
      success: false,
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

  mounted () {
    this.key = this.getParameterByName('key')
    this.username = this.getParameterByName('username')

    if(this.username === '' || typeof this.username === "undefined") {
      this.username = this.user.username
    }
  },

  created () {},

  updated () {},

  methods: {
    submit() {
      this.validated = this.validate()

      let data = new FormData();

      data.append('action', 'user_account__set_new_password');
      data.append('password', this.password.val);
      data.append('key', this.key);
      data.append('username', this.username);

      if(this.validated) {
        this.showLoader = true
        axios.post('/wp-admin/admin-ajax.php', data)
            .then((response) => {
              this.showLoader = false

              if (response.data.success) {
                this.success = true
              }
            })
      }

    },

    validate() {
      this.validation = true

      if (!this.password.val.trim().length) {
        this.password.valid = false
      }

      if (!this.confirmPassword.val.trim().length) {
        this.confirmPassword.valid = false
      }
      return this.password.valid && this.confirmPassword.valid

    },

    switchForm(formName) {
      this.$emit('switchForm', formName)
    },

    closeSuccess() {
      this.success = false
      window.location.href = '/'
    },

    getParameterByName(name, url = window.location.href) {
      name = name.replace(/[\[\]]/g, '\\$&');
      let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
          results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
  },

  watch: {},

  computed: {
    ...mapState({
      user: state => state.user
    })
  }
}
</script>

<style lang="scss" scoped>
  .change-password-form {
    min-height: 400px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
  }

  .account-form {
    background-image: none;
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.04);
    border-radius: 8px;

    &__title {
      font-size: 24px;
    }
  }
</style>

