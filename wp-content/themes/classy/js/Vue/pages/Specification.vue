<template>
  <div class="personal-main">
    <Menu/>
    <div class="personal-entities__container">
      <div class="personal-entities__container-inner">
        <PersonalFilter class="personal-entities__filter"
          title="Specifications"
          @runSearch="runSearch"
          @cancelSearch="cancelSearch"
        />
        <div v-if="!searchInProcess" v-for="(elemEntities, index) in data" :key="index">
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
        <div class="personal-entities__list rrr" v-if="searchInProcess">
          <PersonalBlock
              v-for="(elem, index) in data" :key="elem.id"
              :title="elem.title"
              :subtitle="elem.category.description"
              :image="elem.image.url"
              :files="elem.files"
          />
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
      data: [],
      searchInProcess: false,
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
            this.searchInProcess = false
            this.data = response.data
          })
    },

    runSearch(val) {
      let data = new FormData();

      data.append('action', 'user_run_search');
      data.append('search', val);

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            console.log('response.data', response.data)
            this.data = response.data
            this.searchInProcess = true
          })
    },

    cancelSearch() {
      this.getSpecifications()
    }
  },

  watch: {},

  computed: {
    ...mapState({})
  }
}
</script>

<style lang="scss" scoped>


</style>