<template>
  <div class="personal-main">
    <Menu/>
    <div class="personal-entities__container">
      <div class="personal-entities__container-inner">
        <PersonalFilter class="personal-entities__filter"/>
<!--        <div class="personal-entities__title">-->
<!--          E-PTO Systems-->
<!--        </div>-->
        <div v-for="(elemEntities, index) in data" :key="index">
          <div class="personal-entities__title">
            {{ elemEntities.name }}
            <div
                class="personal-entities__list"

            >
              <PersonalBlock
                v-for="(elem,index) in elemEntities.list" :key="index"
                :title="elem.title"
                :subtitle="elem.subtitle"
              />
            </div>
          </div>
        </div>
<!--        <div class="personal-entities__list">-->
<!--          <PersonalBlock/>-->
<!--          <PersonalBlock/>-->
<!--          <PersonalBlock/>-->

<!--        </div>-->
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
  name: 'Specification',
  props: [],

  components: {
    Menu,
    PersonalFilter,
    PersonalBlock
  },

  data() {
    return {
      data: [
        {
          name: 'E-PTO Systems',
          list: [
            {
              title: 'Title text',
              subtitle: 'Subtitle text'
            },
            {
              title: 'Title text',
              subtitle: 'Subtitle text'
            },
            {
              title: 'Title text',
              subtitle: 'Subtitle text'
            },
            {
              title: 'Title text',
              subtitle: 'Subtitle text'
            },
            {
              title: 'Title text',
              subtitle: 'Subtitle text'
            },
            {
              title: 'Title text',
              subtitle: 'Subtitle text'
            },

          ]
        },
        {
          name: 'E-PTO Systems',
          list: [
            {
              title: 'Title text',
              subtitle: 'Subtitle text'
            },
            {
              title: 'Title text',
              subtitle: 'Subtitle text'
            },
            {
              title: 'Title text',
              subtitle: 'Subtitle text'
            },
            {
              title: 'Title text',
              subtitle: 'Subtitle text'
            }
          ]
        },
      ]
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


</style>