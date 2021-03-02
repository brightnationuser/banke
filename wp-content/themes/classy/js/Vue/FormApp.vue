<template>
  <div class="form-app-wrapper">
    <Forms></Forms>
  </div>
</template>

<script>

import { mapState } from 'vuex';

import Forms from "./components/Forms/Forms";

export default {
  name: 'FormApp',

  props: [],

  components: {
    Forms
  },

  data() {
    return {

    }
  },

  mounted () {},

  created () {},

  updated () {},

  methods: {},

  watch: {},

  computed: {
    ...mapState({

    })
  }
}
</script>

<style lang="scss" scoped>
  @media screen and (max-width: 1200px) {
    .form-app-wrapper {
      width: 100%;
    }
  }
</style>
