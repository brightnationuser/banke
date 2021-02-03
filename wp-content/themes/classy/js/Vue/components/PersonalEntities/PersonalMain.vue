<template>
  <div class="personal-entities__container">
    <div class="personal-entities__container-inner">
      <PersonalFilter class="personal-entities__filter"/>
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

  &__title {
    margin: 33px 0 18px 0;
    font-size: 14px;
    color: #4A4A49;
    font-weight: 600;
  }

  &__list {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -18px 0;
  }
}

@media (max-width: 1024px) {
  .personal-entities {
    &__container {

    }

    &__container-inner {
      margin: 0 auto;
      width: 100%;
      max-width: 700px;
    }

    &__list {
      margin: 0;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    &__elem {

    }
  }
}

@media (max-width: 800px) {
  .personal-entities {
    &__list {
      flex-direction: column;
    }
  }
}

</style>