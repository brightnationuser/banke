<template>
  <div class="personal-entities__container">
    <div class="personal-entities__container-inner">
      <PersonalFilter class="personal-entities__filter"
      />
      <div class="personal-entities__title">
        E-PTO Systems
      </div>
      <div class="personal-entities__list">
        <PersonalBlock/>
        <PersonalBlock/>
        <PersonalBlock/>
        <PersonalBlock/>
        <PersonalBlock/>
        <PersonalBlock/>
        <PersonalBlock/>
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
