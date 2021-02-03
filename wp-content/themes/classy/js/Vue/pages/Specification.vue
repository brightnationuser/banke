<template>
    <div class="personal-main">
      <Menu/>
      <PersonalMain />
    </div>
</template>

<script>

import { mapState } from 'vuex';
import Menu from "../components/Global/Menu";
import PersonalMain from "../components/PersonalEntities/PersonalMain";


export default {

  name: 'Specification',
  props: [

  ],

  components: {
    Menu,
    PersonalMain
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