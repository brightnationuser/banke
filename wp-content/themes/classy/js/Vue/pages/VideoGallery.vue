<template>
  <div class="personal-main">
    <Menu/>
    <PersonalMain/>
  </div>
</template>

<script>

import {mapState} from 'vuex';

import Menu from "../components/Global/Menu";
import PersonalMain from "../components/PersonalEnteties/PersonalMain";

export default {
  name: 'Video-gallery',
  props: [],

  components: {
    Menu,
    PersonalMain
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