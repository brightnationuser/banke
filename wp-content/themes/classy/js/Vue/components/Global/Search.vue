<template>
  <div class="search">
    <div class="search__input">
      <input
          :value="searchFilesValue"
          @input="$emit('update', $event.target.value)"
          @keyup="emitSearchByKeyup"
          class="search__inner-input"
          type="text"
          placeholder="Search files">
      <img class="search__icon" src="../../assets/icons/search.svg" alt="Search icon">
    </div>
  </div>
</template>

<script>
export default {
  name: 'Search',

  components: {},

  props: {
    searchFilesValue: String
  },

  methods: {
    emitSearchByKeyup(e) {
      if (e.keyCode === 13) {
        this.$emit('runSearch', this.searchFilesValue)
      }
    }
  }
}
</script>

<style lang="scss">
.search {
  &__input {
    position: relative;
  }

  &__inner-input::-webkit-input-placeholder {
    color: gray;
    -webkit-transition: all 0.2s ease;
    -ms-transition: all 0.2s ease;
    -moz-transition: all 0.2s ease;
    -o-transition: all 0.2s ease;
    transition: all 0.2s ease;
  }

  &__inner-input::-moz-placeholder {
    color: gray;
    -webkit-transition: all 0.2s ease;
    -ms-transition: all 0.2s ease;
    -moz-transition: all 0.2s ease;
    -o-transition: all 0.2s ease;
    transition: all 0.2s ease;
  }

  &__inner-input:-moz-placeholder {
    color: gray;
    -webkit-transition: all 0.2s ease;
    -ms-transition: all 0.2s ease;
    -moz-transition: all 0.2s ease;
    -o-transition: all 0.2s ease;
    transition: all 0.2s ease;
  }

  &__inner-input:focus::-webkit-input-placeholder {
    color: transparent;
  }

  &__inner-input:focus::-moz-placeholder {
    color: transparent;
  }

  &__inner-input:-moz-placeholder {
    color: transparent;
  }

  &__inner-input {
    outline: 0;
    width: 100%;
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
    background: #ffffff;
    cursor: pointer;
  }
}
</style>