<template>
  <div class="menu">
    <div class="menu__upper">
      <div class="menu__info" @click="$router.push('/profile')">
        <div class="menu__avatar">
          <div class="menu__avatar-img">
            <img src="../../assets/icons/profile.svg" alt="Profile">
            <div class="menu__avatar-icon">
              <img src="../../assets/icons/plus.svg" alt="Plus">
            </div>
          </div>
        </div>
        <div class="menu__headline">
          <div class="menu__name">
            John Doe
          </div>
          <div class="menu__email">
            JohnDoe@gmail.com
          </div>
        </div>
        <router-link :to="{ name: 'Specification' }" custom v-slot="{href, navigate}">
          <a class="menu__logout-mobile" :href="href" @click="navigate">
            Log Out
          </a>
        </router-link>
      </div>
      <div class="menu__list">
        <RouterLinkCustom
            to="Specification"
            classes="menu__elem"
        ></RouterLinkCustom>
        <router-link :to="{ name: 'Specification' }" custom v-slot="{href, navigate, isActive}">
          <a class="menu__elem" :class="{'menu__elem--active' : isActive}" :href="href" @click="navigate">
            Specification
          </a>
        </router-link>
        <router-link :to="{ name: 'Three-models' }" custom v-slot="{href, navigate, isActive}">
          <a class="menu__elem" :class="{'menu__elem--active' : isActive}" :href="href" @click="navigate">
            3D Models
          </a>
        </router-link>
        <router-link :to="{ name: 'Manuals' }" custom v-slot="{href, navigate, isActive}">
          <a class="menu__elem" :class="{'menu__elem--active' : isActive}" :href="href" @click="navigate">
            Manuals
          </a>
        </router-link>
        <router-link :to="{ name: 'Video-gallery' }" custom v-slot="{href, navigate, isActive}">
          <a class="menu__elem" :class="{'menu__elem--active' : isActive}" :href="href" @click="navigate">
            Video Gallery
          </a>
        </router-link>
      </div>
    </div>
    <div class="menu__under">
      <div class="menu__logout" @click="logOut">
        Log Out
      </div>
    </div>
  </div>
</template>

<script>
import RouterLinkCustom from "./RouterLinkCustom";
import {mapState} from "vuex";

export default {
  name: 'Menu',

  props: [

  ],

  components: {
    RouterLinkCustom
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
    cursor: pointer;
    display: flex;
    flex-direction: column;
    padding: 30px 0 28px 66px;
    border-bottom: solid 1px #EFEFEF;
  }

  &__avatar-img {
    cursor: pointer;
    max-width: 70px;
    width: 100%;
    position: relative;
  }

  &__avatar-icon {
    bottom: 0;
    right: 0;
    position: absolute;
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
}

@media (max-width: 1024px) {
  .menu {
    max-width: 100%;
    &__info {
      margin: 0 auto;
      max-width: 500px;
      flex-direction: row;
    }

    &__headline {
      margin-left: 20px;
    }

    &__list {
      margin: 0 auto;
      padding: 0;
      max-width: 500px;
      flex-direction: row;
      justify-content: space-around;
    }

    &__elem {
      padding: 16px 14px;
    }

    &__logout {
      display: none;
    }
    &__logout-mobile {
      border-top: unset;
      margin-left: auto;
      padding: 12px 28px 0 0;
    }
  }
}

</style>