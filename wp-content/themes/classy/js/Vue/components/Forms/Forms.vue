<template>
  <div>
    <div class="sign-in" @click="setForm('SignIn')">
      <i class="icon-account"></i>
      <span>Sign In</span>
    </div>
    <SignIn
        v-if="showForm === 'SignIn'"
        @close="setForm(false)"
        @switchForm="switchForm"
    ></SignIn>
    <SignUp
        v-if="showForm === 'SignUp'"
        @close="setForm(false)"
        @switchForm="switchForm"
    ></SignUp>
    <ResetPassword
        v-if="showForm === 'ResetPassword'"
        @close="setForm(false)"
        @switchForm="switchForm"
    ></ResetPassword>
  </div>
</template>

<script>

import SignIn from "./SignIn";
import SignUp from "./SignUp";
import ResetPassword from "./ResetPassword";

export default {
  name: 'Forms',
  props: [

  ],
  components: {
    SignIn,
    SignUp,
    ResetPassword
  },
  data() {
    return {
      showForm: false
    }
  },

  watch: {
    showForm: function (val) {
      console.log('val', val)
    }
  },

  methods: {
    setForm(formName) {
      this.showForm = formName
    },

    switchForm(formName) {
      this.showForm = formName
    }
  },

  computed: {

  }
}
</script>

<style lang="scss" scoped>
  .sign-in {
    cursor: pointer;
    display: flex;
    align-items: center;
    color: #003462;
    margin-bottom: -3px;

    i {
      margin-right: 4px;
      color: #005ca9;
    }
  }
</style>