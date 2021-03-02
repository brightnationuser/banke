<template>
  <router-link :to="{ name: to }" v-slot="{href, navigate}" custom>
    <a :href="href" @click="navigate">
      <slot></slot>
    </a>
  </router-link>
</template>

<script>

import { mapState } from 'vuex';

export default {
  name: 'RouterLinkCustom',
  props: [
    'to',
    'classes'
  ],

  components: {
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