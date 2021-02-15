<template>
    <div class="drop-down-card">
      <div class="drop-down-card__top">
        <UserAvatar
            :image="user.photo"
            :add-icon="false"
            :classes="'user-avatar--small'"
        ></UserAvatar>
        <div class="drop-down-card__user-info">
          <div class="drop-down-card__user-name">
            {{user.username}}
          </div>
          <a href="/account/profile" class="drop-down-card__user-edit">
            edit profile
          </a>
        </div>
      </div>
      <div class="drop-down-card__categories">
        <a href="/account/specification/" class="drop-down-card__link">
          Specifications
        </a>
<!--        <a href="/account/three-models" class="drop-down-card__link">
          3D Models
        </a>-->
        <a href="/account/manuals" class="drop-down-card__link">
          Manuals
        </a>
        <a href="/account/video-gallery" class="drop-down-card__link">
          Video Gallery
        </a>
      </div>
      <div class="drop-down-card__actions" @click="logOut">
        Log Out
      </div>
    </div>
</template>

<script>

import { mapState } from 'vuex';
import UserAvatar from "../Global/UserAvatar";

export default {
  name: 'DropDownCard',
  props: [

  ],

  components: {
    UserAvatar
  },

  data() {
    return {

    }
  },

  mounted () {},

  created () {},

  updated () {},

  methods: {
    logOut(e) {
      e.preventDefault()

      let data = new FormData();

      data.append('action', 'user_account__log_out');

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            this.showLoader = false

            if (response.data.success) {
              this.$store.commit('setDefault')
              window.location.href = '/'
            }
            else {
              console.log('error: ', response.data.message)
            }
          })
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
  .drop-down-card {
    background: #FFFFFF;
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.04);
    border-radius: 0 0 8px 8px;
    border-top: 2px solid #005CA9;

    &__top {
      display: flex;
      align-items: center;
      padding: 16px 24px;
      border-bottom: 1px solid #EEEEEE;
    }

    &__user-info {
      margin-left: 10px;
    }

    &__user-name {
      font-weight: bold;
      font-size: 14px;
      line-height: 19px;
      text-align: center;
      text-transform: capitalize;
      color: #003462;
    }

    &__user-edit {
      font-weight: 600;
      font-size: 12px;
      line-height: 100%;
      color: #005CA9;
      opacity: 0.9;
      padding-bottom: 1px;
      border-bottom: 1px dotted #005CA9;
      text-decoration: none;
    }

    &__categories {
      padding: 16px 24px;
    }

    &__link {
      margin-bottom: 8px;
      line-height: 1;
      font-weight: 600;
      font-size: 12px;
      color: #4A4A49;
      display: block;
      text-decoration: none;
      transition: all .3s ease;

      &:visited {
        color: #4A4A49;
      }

      &:hover {
        color: #005CA8;
      }
    }

    &__actions {
      border-top: 1px solid #EEEEEE;
      font-weight: 600;
      font-size: 12px;
      line-height: 16px;
      color: #4A4A49;
      padding: 10px 24px 15px 24px;
    }
  }
</style>