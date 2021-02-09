<template>
  <div class="account-form account-form--forgot">
    <div class="account-form__title">Reset Password</div>
    <div class="account-form__content">
      <div class="account-form__column">
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
        Save Password
      </div>
    </div>

    <div class="account-form__loader" v-if="showLoader">
      <img src="../../../../images/oval.svg" alt="loader">
    </div>

    <SuccessAlert
      v-if="success"
      alert-text="Your password has been successfully changed"
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
      success: true,
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
      this.validation = true

      let data = new FormData();

      data.append('action', 'user_account__set_new_password');
      data.append('password', this.password.val);
      data.append('key', this.key);
      data.append('username', this.username);

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            this.showLoader = false

            if (response.data.success) {
              this.success = true
            }
          })
    },

    switchForm(formName) {
      this.$emit('switchForm', formName)
    },

    closeSuccess() {
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
  .account-form {
    background-image: none;
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.04);
    border-radius: 8px;

    &__title {
      font-size: 24px;
    }
  }
</style>

