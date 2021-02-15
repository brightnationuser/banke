<template>
  <div class="personal-main">
    <Menu/>
    <div class="personal-entities__container">
      <div class="personal-entities__container-inner">
        <PersonalFilter
            class="personal-entities__filter"
        />
        <div class="personal-entities__title">
          E-PTO Systems
        </div>
        <div class="personal-entities__list">
          <PersonalBlock/>
          <PersonalBlock/>
        </div>
        <div class="personal-entities__title">
          Test
        </div>
        <div class="personal-entities__list">
          <PersonalBlock/>
          <PersonalBlock/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import {mapState} from 'vuex';

import Menu from "../components/Global/Menu";
import PersonalFilter from "../components/PersonalEntities/PersonalFilter";
import PersonalBlock from "../components/PersonalEntities/PersonalBlock";

export default {
  name: 'ThreeModels',
  props: [],

  components: {
    Menu,
    PersonalFilter,
    PersonalBlock
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

  methods: {},

  watch: {},

  computed: {
    ...mapState({})
  }
}
</script>

<style lang="scss" scoped>


</style>