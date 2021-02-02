<template>
  <div>
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

</style>