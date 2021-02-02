<template>
  <div class="search">
    <div class="search__input">
      <input class="search__inner-input" type="text">
      <img class="search__icon" src="../assets/icons/search.svg" alt="Search icon">

    </div>
  </div>
</template>

<script>
export default {
  name: 'Search',
  components: {}
}
</script>

<style lang="scss">
.search {
  &__input {
    position: relative;
  }

  &__inner-input {
    outline: 0;
    padding: 10px 20px 10px 10px;
    background: #FFFFFF;
    border-radius: 4px;
    border: 0;
  }

  &__icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translate(0, -50%);
    padding: 6px;
    cursor: pointer;
  }
}
</style>