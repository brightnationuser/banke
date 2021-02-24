<template>
  <div class="user-profile">
    <div class="container">
      <div class="user-profile__wrapper">
        <div class="user-profile__info">
          <div class="user-profile__photo">
            <UserAvatar
                :image="user.photo"
            ></UserAvatar>
          </div>
          <div class="user-profile__name">
            {{ user.username }}
          </div>
          <div class="user-profile__email">
            {{ user.email }}
          </div>
          <div class="user-profile__change-password button button--account" @click="resetPassword">
            {{ translations.buttons.change_password }}
          </div>
        </div>

        <div class="user-profile__fields">
          <div class="account-form account-form--register">
            <div class="account-form__need-help">
              <NeedHelpLink></NeedHelpLink>
            </div>
            <div class="account-form__title">{{ translations.titles.edit_profile }}</div>
            <div class="account-form__content">
              <div class="account-form__column">
                <div class="account-form__column-title">
                  {{ translations.titles.personal_information }}
                </div>
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
              </div>
              <div class="account-form__column">
                <div class="account-form__column-title">
                  {{ translations.titles.company_information }}
                </div>
                <div class="account-form__row">
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
              </div>
            </div>
            <div class="account-form__loader" v-if="showLoader">
              <img src="../../../images/oval.svg" alt="loader">
            </div>

            <div class="account-form__row account-form__row--buttons">
              <div class="button button--account button--stroke account-form__button" @click="cancel()">
                {{ translations.buttons.cancel }}
              </div>
              <div class="button button--account account-form__button" @click="submit()">
                {{ translations.buttons.save_changes }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import {mapState} from 'vuex';
import UserAvatar from "../components/Global/UserAvatar";
import TextInput from "../components/Forms/Fields/TextInput";
import EmailInput from "../components/Forms/Fields/EmailInput";
import NeedHelpLink from "../components/Global/NeedHelpLink";

export default {
  name: 'Profile',
  props: [],

  components: {
    UserAvatar,
    TextInput,
    EmailInput,
    NeedHelpLink
  },

  data() {
    return {
      showLoader: false,
      validated: false,
      validation: false,
      userData: {},
      name: {
        val: '',
        valid: true,
        errorMessage: 'This field is required'
      },
      company: {
        val: '',
        valid: true
      },
      position: {
        val: '',
        valid: true
      },
      email: {
        val: '',
        valid: true,
        errorMessage: 'Incorrect email address'
      },
    }
  },

  mounted() {
    this.userData = this.user
    this.name.val = this.user.username
    this.company.val = this.user.company
    this.position.val = this.user.position
    this.email.val = this.user.email
  },

  created() {
    this.email.errorMessage = this.translations.errors.email_already_used
    this.name.errorMessage = this.translations.errors.name_already_used
  },

  updated() {
  },

  methods: {
    resetPassword() {
      window.location.href = '/reset-password/'
    },

    submit() {
      this.validated = this.validate()

      let data = new FormData();
      data.append('action', 'user_account__update');
      data.append('name', this.name.val);
      data.append('company', this.company.val);
      data.append('position', this.position.val);
      data.append('email', this.email.val);

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

              if (response.data.success) {
                this.userData.username = response.data.user.username
                this.userData.company = response.data.user.company
                this.userData.position = response.data.user.position
                this.userData.email = response.data.user.email

                this.$store.commit('setUser', this.userData)
              }
            })
      }
    },

    cancel() {
      this.name.val = this.user.username
      this.company.val = this.user.company
      this.position.val = this.user.position
      this.email.val = this.user.email
    },

    validate() {
      this.validation = true

      console.log('this.name.val', this.name.val)
      console.log('this.name.val', this.name.val.trim().length)

      if (!this.name.val.trim().length) {
        this.name.valid = false
      }

      console.log('this.company.val', this.company.val)
      if (!this.company.val.trim().length) {
        this.company.valid = false
      }

      console.log('this.position.val', this.position.val)
      if (!this.position.val.trim().length) {
        this.position.valid = false
      }

      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      this.email.valid = re.test(this.email.val.trim().toLowerCase())

      return this.name.valid &&
          this.company.valid &&
          this.position.valid &&
          this.email.valid
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

.user-profile {
  margin: -50px 0 -80px 0;
  padding: 51px 0 113px 0;
  background-color: #f2f5f9;
  background-image: url(../../../images/account/reset-pass-bg.png);
  background-size: cover;
  background-position: center;

  &__wrapper {
    display: flex;
    align-items: flex-start;
  }

  &__fields {
    width: 100%;
  }

  &__info {
    width: 100%;
    background-color: #fff;
    max-width: 271px;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.04);
    border-radius: 8px;
    padding: 40px 15px;
    margin-right: 38px;
  }

  &__name {
    padding-top: 12px;
    font-size: 20px;
    color: #003462;
    font-weight: bold;
    cursor: pointer;
  }

  &__email {
    padding-top: 4px;
    font-size: 14px;
    color: #4A4A49;
    opacity: 0.9;
    cursor: pointer;
  }

  &__change-password {
    padding: 8px 27px;
    margin-top: 13px;
  }
}

.account-form {
  background-image: none;
  background-color: #fff;
  box-shadow: 0 12px 20px rgba(0, 0, 0, 0.04);
  border-radius: 8px;

  &__need-help {
    position: absolute;
    top: 32px;
    right: 53px;
  }

  &__title {
    font-size: 24px;
    margin-bottom: 20px;
  }

  &__column-title {
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    margin-bottom: -5px;
  }

  &__row {
    &--buttons {
      justify-content: flex-end;

      .button + .button {
        margin-left: 28px;
      }
    }
  }
}

@media screen and (max-width: 992px) {
  .user-profile {
    &__wrapper {
      margin: 0 auto;
      max-width: 400px;
      width: 100%;
      flex-direction: column;
    }

    &__info {
      width: 100%;
      max-width: unset;
      margin-bottom: 30px;
      margin-right: 0;
    }

    .account-form__content {
      flex-direction: column;
    }

    .account-form {
      &__row--buttons {
        justify-content: flex-start;
        align-items: baseline;

      }

      .button--account {
        &:last-of-type {
          margin-left: 14px;
        }

      }
    }
  }
}

@media screen and (max-width: 480px) {
  .account-form {
    padding: 50px 30px;

    &__need-help {
      top: 15px;
      right: 30px;
    }

    &__title {
      font-size: 22px;
      margin-bottom: 15px;
    }

    &__row--buttons {
      //flex-direction: column;
      //align-items: flex-start;

      .button + .button {
        margin-left: 0;
        margin-top: 15px;
      }
    }
  }
}

@media screen and (max-width: 350px) {
  .user-profile {
    .account-form {
      &__row--buttons {
        flex-direction: column-reverse;
        .button--account {
          width: 100%;
          margin: 0 0 10px 0;
          &:last-of-type {
            margin-left: 0;
          }
        }

      }
    }
  }
}
</style>
