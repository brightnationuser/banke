<template>
  <div class="menu">
    <div class="menu__info">
      <div class="menu__avatar">
        <div class="menu__avatar-img">
          <img src="../assets/icons/profile.svg" alt="Profile">
          <div class="menu__avatar-icon">
            <img  src="../assets/icons/plus.svg" alt="Plus">
          </div>
        </div>
      </div>
      <div class="menu__name fz-20 c-dark-blue">
        John Doe
      </div>
      <div class="menu__email fz-14 c-grey">
        JohnDoe@gmail.com
      </div>
    </div>
    <div class="menu__list fz-14 c-blue">
      <router-link class="menu__elem menu__elem--active" :to="{ name: 'specification' }">Specifications</router-link>
      <router-link class="menu__elem" :to="{ name: 'three-models' }">3D Models</router-link>
      <router-link class="menu__elem" :to="{ name: 'manuals' }">Manuals</router-link>
      <router-link class="menu__elem" :to="{ name: 'video-gallery' }">Video Gallery</router-link>
    </div>
    <div class="menu__logout fz-14 c-dark-blue">
      Log Out
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
  max-width: 300px;
  width: 100%;
  box-shadow: 5px 0 5px -5px #cecece;
  &__info {
    display: flex;
    flex-direction: column;
    padding: 30px 0 28px 66px;
    border-bottom: solid  1px #EFEFEF;
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
  }

  &__email {
    padding-top: 4px;
  }

  &__list {
    padding-top: 40px;
    display: flex;
    flex-direction: column;
  }

  &__elem {
    padding: 12px 0 12px 66px;
    &--active {
      background-color: #F2F8FF;
    }
  }
}
</style>