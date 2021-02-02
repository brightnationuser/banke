<template>
  <div>
    <div class="sign-in" @click="setForm('SignIn')" v-if="!loggedIn">
      <i class="icon-account"></i>
      <span>Sign In</span>
    </div>
    <div class="sign-in" v-else>
      <i class="icon-account"></i>
      <span>
        <router-link :to="{ name: 'Specification' }" custom v-slot="{href, navigate}">
          <a class="menu__elem menu__elem--active" :href="href" @click="navigate">
            {{ user.username }}
          </a>
        </router-link>
      </span>
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
import {mapState} from "vuex";

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
      userData: {
        username: '',
        email: '',
        photo: '',
        company: '',
        position: ''
      },
      showForm: false
    }
  },

  mounted() {

    let data = new FormData();
    data.append('action', 'user_account__check');

    axios.post('/wp-admin/admin-ajax.php', data)
        .then((response) => {
          if(response.data.success) {
            this.userData = response.data.user
            this.logIn()
          }
          else {
            this.$store.commit('setDefault')
          }
        })
  },

  methods: {
    setForm(formName) {
      this.showForm = formName
    },

    switchForm(formName) {
      this.showForm = formName
    },

    logIn() {
      this.$store.commit('setLoggedIn', true)
      this.$store.commit('setUser', this.userData)
    },
  },

  watch: {},

  computed: {
    ...mapState({
      loggedIn: 'loggedIn',
      user: 'user'
    }),
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