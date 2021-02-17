<template>
  <div class="menu">
    <div class="menu__upper">
      <div class="menu__info" @click="$router.push('/profile')">
        <UserAvatar
            :image="user.photo"
        ></UserAvatar>
        <div class="menu__headline">
          <div class="menu__name">
            {{ user.username }}
          </div>
          <div class="menu__email">
            {{ user.email }}
          </div>
        </div>
        <div class="menu__logout-mobile" @click="logOut">
          {{translations.buttons.log_out}}
        </div>
      </div>
      <div class="menu__list-wrapper">
        <div class="menu__list">
          <router-link :to="{ name: 'Specification' }" custom v-slot="{href, navigate, isActive}">
            <a class="menu__elem" :class="{'menu__elem--active' : isActive}" :href="href" @click="navigate">
              {{translations.titles.specifications}}
            </a>
          </router-link>
          <!--          <router-link :to="{ name: 'Three-models' }" custom v-slot="{href, navigate, isActive}">
                      <a class="menu__elem" :class="{'menu__elem&#45;&#45;active' : isActive}" :href="href" @click="navigate">
                        {{translations.titles.models_3d}}
                      </a>
                    </router-link>-->
          <router-link :to="{ name: 'Manuals' }" custom v-slot="{href, navigate, isActive}">
            <a class="menu__elem" :class="{'menu__elem--active' : isActive}" :href="href" @click="navigate">
              {{translations.titles.manuals}}
            </a>
          </router-link>
          <router-link :to="{ name: 'Video-gallery' }" custom v-slot="{href, navigate, isActive}">
            <a class="menu__elem" :class="{'menu__elem--active' : isActive}" :href="href" @click="navigate">
              {{translations.titles.video_gallery}}
            </a>
          </router-link>
        </div>
      </div>

    </div>
    <div class="menu__under">
      <div class="menu__logout" @click="logOut">
        {{translations.buttons.log_out}}
      </div>
    </div>
  </div>
</template>

<script>

import {mapState} from "vuex";
import UserAvatar from "./UserAvatar";

export default {
  name: 'Menu',

  props: [],

  components: {
    UserAvatar
  },

  data() {
    return {}
  },

  mounted() {
  },

  created() {
  },

  updated() {
  },

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
            } else {
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
.menu {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  position: relative;
  min-width: 250px;
  max-width: 300px;
  width: 100%;
  box-shadow: 4px 0 5px -2px #dedede;

  &__info {
    display: flex;
    flex-direction: column;
    padding: 30px 0 28px 66px;
    border-bottom: solid 1px #EFEFEF;
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

  &__list {
    padding-top: 40px;
    display: flex;
    flex-direction: column;
  }

  &__elem {
    padding: 12px 0 12px 66px;
    color: #4A4A49;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;

    &--active {
      background-color: #F2F8FF;
      color: #005CA8;
    }
  }

  &__logout, &__logout-mobile {
    cursor: pointer;
    display: block;
    padding: 16px 0 16px 66px;
    border-top: solid 1px #EFEFEF;
    font-size: 14px;
    font-weight: 600;
    color: #003462;
  }

  &__logout-mobile {
    display: none;
  }
}

@media (max-width: 1024px) {
  .menu {
    max-width: 100%;

    &__info {
      border-bottom: unset;
      margin: 0 auto;
      max-width: 760px;
      padding: 56px 30px 26px 30px;
      flex-direction: row;
    }

    &__headline {
      margin-left: 20px;
    }

    &__list-wrapper {
      border-top: solid 1px #EFEFEF;
    }

    &__list {
      margin: 0 auto;
      padding: 0;
      max-width: 700px;
      flex-direction: row;
      justify-content: flex-start;
    }

    &__elem {
      padding: 16px 14px;
    }

    &__logout {
      display: none;
    }

    &__logout-mobile {
      display: block;
      border-top: unset;
      margin-left: auto;
      padding: 12px 28px 0 0;
    }
  }
}

@media (max-width: 500px) {
  .menu {
    &__elem {
      padding: 12px 10px;
      font-size: 12px;
    }

    &__name {
      font-size: 16px;
    }

    &__email {
      font-size: 12px;
    }

    &__logout-mobile {
      padding: 12px 0 0 0;
    }

  }
}

</style>