<template>
  <div class="personal-entities__container">
      <div class="personal-entities__container-inner">
        <PersonalFilter class="personal-entities__filter"/>
        <div class="personal-entities__list">
          <PersonalBlock />
          <PersonalBlock />
          <PersonalBlock />
          <PersonalBlock />
          <PersonalBlock />
          <PersonalBlock />
          <PersonalBlock />
        </div>
      </div>
    </div>
</template>

<script>

import {mapState} from 'vuex';
import PersonalFilter from "./PersonalFilter";
import PersonalBlock from "./PersonalBlock";


export default {
  name: 'Specification',
  props: [],

  components: {
    PersonalBlock,
    PersonalFilter
  },

  data() {
    return {

    }
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
.personal-entities {
  &__container {
    background-color: #F2F5F9;
    padding: 0 64px 80px 64px;
    width: 100%;
  }

  &__container-inner {
    margin: 0 auto;
    max-width: 1291px;
  }

  &__list {
    display: flex;
    flex-wrap: wrap;
    margin: 41px -18px 0;
  }
}
</style>