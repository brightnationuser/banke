<template>
  <div>
    Hello world
    <router-view></router-view>
  </div>
</template>

<script>

import {mapState} from 'vuex';

export default {
  name: 'App',
  props: [],

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
.personal {
  display: flex;

  &-container {
    background-color: #F2F5F9;
  }

  &__filter {
    padding: 59px 0 41px 0;
  }
}
</style>