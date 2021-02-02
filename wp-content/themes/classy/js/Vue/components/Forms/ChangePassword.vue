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
              this.switchForm('Success')
            }
          })
    },

    switchForm(formName) {
      this.$emit('switchForm', formName)
    },

    closeSuccess() {

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

</style>

