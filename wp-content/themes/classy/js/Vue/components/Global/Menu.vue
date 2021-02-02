<template>
  <div class="menu">
    <div class="menu__upper">
      <div class="menu__info">
        <div class="menu__avatar">
          <div class="menu__avatar-img">
            <img src="../../assets/icons/profile.svg" alt="Profile">
            <div class="menu__avatar-icon">
              <img src="../../assets/icons/plus.svg" alt="Plus">
            </div>
          </div>
        </div>
        <div class="menu__name">
          John Doe
        </div>
        <div class="menu__email">
          JohnDoe@gmail.com
        </div>
      </div>
      <div class="menu__list fz-14 c-blue">
        <router-link :to="{ name: 'Specification' }" custom v-slot="{href, navigate}">
          <a class="menu__elem menu__elem--active" :href="href" @click="navigate">
            Specifications
          </a>
        </router-link>
        <router-link :to="{ name: 'Three-models' }" custom v-slot="{href, navigate}">
          <a class="menu__elem" :href="href" @click="navigate">
            3D Models
          </a>
        </router-link>
        <router-link :to="{ name: 'Manuals' }" custom v-slot="{href, navigate}">
          <a class="menu__elem" :href="href" @click="navigate">
            Manuals
          </a>
        </router-link>
        <router-link :to="{ name: 'Video-gallery' }" custom v-slot="{href, navigate}">
          <a class="menu__elem" :href="href" @click="navigate">
            Video Gallery
          </a>
        </router-link>
      </div>
    </div>
    <div class="menu__under">
      <router-link :to="{ name: 'Specification' }" custom v-slot="{href, navigate}">
        <a class="menu__logout" :href="href" @click="navigate">
          Log Out
        </a>
      </router-link>
    </div>
  </div>
</template>

<script>

export default {
  name: 'Menu'
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
  }

  &__email {
    padding-top: 4px;
    font-size: 14px;
    color: #4A4A49;
    opacity: 0.9;
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

  &__logout {
    display: block;
    padding: 16px 0 16px 66px;
    border-top: solid 1px #EFEFEF;
    font-size: 14px;
    font-weight: 600;
    color: #003462;
  }
}
</style>