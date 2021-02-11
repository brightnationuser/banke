<template>
  <div class="personal-main">
    <Menu/>
    <div class="personal-entities__container">
      <div class="personal-entities__container-inner">
        <PersonalFilter class="personal-entities__filter"
          title="Specifications"
        />
        <div v-for="(elemEntities, index) in data" :key="index">
          <div class="personal-entities__title">
            {{ index }}
            <div class="personal-entities__list">
              <PersonalBlock
                v-for="(elem, index) in elemEntities" :key="elem.id"
                :title="elem.title"
                subtitle="Specification"
                :image="elem.image.url"
                :files="elem.files"
              />
            </div>
          </div>
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

      ]
    }
  },

  mounted() {
    this.getSpecifications()
  },

  created() {
  },

  updated() {
  },

  methods: {
    getSpecifications() {

      let data = new FormData();

      data.append('action', 'user_get__specifications');

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            console.log(response.data)
            this.data = response.data
          })
    },
  },

  watch: {},

  computed: {
    ...mapState({})
  }
}
</script>

<style lang="scss" scoped>


</style>