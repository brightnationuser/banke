<template>
  <div class="v-select">
    <div
        class="v-select__title"
        @click="optionsVisible = !optionsVisible"
    >
      {{ selectedOption.name ? selectedOption.name : 'Not found' }}
      <img class="v-select__arrow" :class="{ 'v-select__arrow--active' : optionsVisible }" src="../../assets/icons/arrow.svg" alt="Arrow">
    </div>
    <div
        v-if="optionsVisible"
        class="v-select__list"
    >
      <div
          class="v-select__elem"
          v-for="option in options"
          :key="option.value"
          @click="eventSelectedOption(option)"
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
    },
    selectedOption: Object
  },

  components: {},

  data() {
    return {
      optionsVisible: false
    }
  },

  mounted() {
    document.addEventListener('click', this.hideSelect.bind(this), true)
  },

  created() {
  },

  updated() {
  },

  beforeDestroy() {
    document.addEventListener('click', this.hideSelect)
  },

  methods: {
    eventSelectedOption(option) {
      this.$emit('select', option)
    },
    hideSelect() {
      this.optionsVisible = false
    }
  },

  watch: {},

  computed: {
    ...mapState({})
  }
}
</script>

<style lang="scss" scoped>
.v-select {
  display: none;
  position: relative;
  letter-spacing: 0.01em;
  font-size: 12px;
  font-weight: 400;
  cursor: pointer;

  &__title {
    position: relative;
    background-color: #FFFFFF;
    padding: 6px 10px 6px 14px;
    width: 104px;
    border-radius: 4px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
  }

  &__arrow {
    position: absolute;
    top: 50%;
    transform: translate(0, -50%);
    right: 8px;
    transition: transform 0.1s linear;
  }

  &__arrow--active {
    transform: translate(0, -50%) rotate(180deg);
  }

  &__list {
    position: absolute;
    top: 28px;
    z-index: 10;
    padding: 8px 0;
    margin-top: 4px;
    border-radius: 4px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #FFFFFF;
    width: 177px;
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

@media (max-width: 1170px) {
  .v-select {
    display: block;
  }
}
</style>