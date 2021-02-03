<template>
  <div class="user-avatar">
    <div class="user-avatar__img">
      <div class="user-avatar__img-wrap">
        <img :src="profileImage" alt="Profile">
      </div>
      <div class="user-avatar__icon">
        <i class="icon-plus-bold"></i>
      </div>
    </div>
  </div>
</template>

<script>

import { mapState } from 'vuex';

export default {
  name: 'UserAvatar',
  props: [
    'image'
  ],

  components: {

  },

  data() {
    return {
      profileImage: ''
    }
  },

  mounted () {
    if(this.image === '' || typeof this.image === "undefined") {
      this.profileImage = require('../../assets/icons/profile.svg')
    }
    else {
      this.profileImage = this.image
    }
  },

  created () {},

  updated () {},

  methods: {},

  watch: {},

  computed: {
    ...mapState({

    })
  }
}
</script>

<style lang="scss" scoped>
  .user-avatar {

    &__img {
      cursor: pointer;
      max-width: 70px;
      width: 100%;
      position: relative;
    }

    &__img-wrap {
      background-color: #ededed;
      border-radius: 50%;
      width: 70px;
      height: 70px;
    }

    &__icon {
      width: 20px;
      height: 20px;
      border-radius: 50%;
      border: 2px solid #fff;
      color: #ffffff;
      font-size: 8px;
      background-color: #005CA9;
      bottom: 0;
      right: 0;
      position: absolute;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: all .2s ease;

      &:hover {
        border: 2px solid #effdfd;
        color: #effdfd;
        background-color: darken(#005CA9, 10%);
      }
    }
  }
</style>