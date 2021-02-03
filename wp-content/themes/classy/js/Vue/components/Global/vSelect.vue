<template>
  <div class="v-select">
    <div class="v-select__title">
      Select
    </div>
    <div class="v-select__list">
      <div
          class="v-select__elem"
          v-for="option in options"
          :key="option.value"
      >
        {{ option.name }}
      </div>
    </div>
  </div>
</template>

<script>

import {mapState} from 'vuex';

export default {
  name: 'vSelect',
  props: {
    options: {
      type: Array,
      default() {
        return []
      }
    }
  },

  components: {},

  data() {
    return {}
  },

  mounted() {
  },

  created() {
  },

  updated() {
  },

  methods: {},

  watch: {},

  computed: {
    ...mapState({})
  }
}
</script>

<style lang="scss" scoped>
.v-select {
  letter-spacing: 0.01em;
  font-size: 12px;
  font-weight: 400;
  cursor: pointer;

  &__title {
    background-color: #FFFFFF;
    padding: 6px 0 6px 14px;
    max-width: 114px;
    border-radius: 4px;
  }

  &__list {
    padding: 8px 0;
    margin-top: 4px;
    border-radius: 4px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #FFFFFF;
    max-width: 177px;
    width: 100%;

  }

  &__elem {
    &:hover {
      color: #5E5E5E;
      background-color: #F2F8FF;
    }

    background-color: #FFFFFF;
    padding: 6px 14px 6px 14px;

  }
}
</style>