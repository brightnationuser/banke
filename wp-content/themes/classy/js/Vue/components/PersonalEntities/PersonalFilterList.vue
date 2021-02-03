<template>
  <div class="personal-filter-list__list">
    <div
        :class="{ 'personal-filter-list__elem--active' : selectedFilterOption.name === elem.name  }"
        class="personal-filter-list__elem"
        v-for="(elem, index) in filterList"
        :key="index"
        @click="eventSelectedOption(elem)"
    >
      {{ elem.name }}
    </div>
  </div>
</template>

<script>
export default {
  name: 'PersonalFilterList',

  computed: {
    getActiveList() {

      return true
    }
  },

  props: {
    filterList: {
      type: Array,
      default() {
        return []
      }
    },
    selectedFilterOption: Object,
  },

  data() {
    return { }
  },

  methods: {
    eventSelectedOption(option) {
      this.$emit('select', option)
    },
  }
}
</script>

<style lang="scss">
.personal-filter-list {
  &__list {
    display: flex;
  }

  &__elem {
    cursor: pointer;
    font-size: 12px;
    font-weight: 400;
    margin: 0 8px;
    padding: 6px 8px;
  }

  &__elem--active {
    background-color: #005CA9;
    color: #ffffff;
    border-radius: 6px;
  }
}
</style>