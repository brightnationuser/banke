<template>
  <div class="personal-main account-form__v-loader">
    <Menu/>
    <div v-if="vShowLoader">
      <vLoader />
    </div>
    <div v-else class="personal-entities__container">
      <div class="personal-entities__container-inner">
        <PersonalFilter class="personal-entities__filter"
          :title="translations.titles.specifications"
          @runSearch="runSearch"
          @cancelSearch="cancelSearch"
        />
        <div class="personal-entities__list-specification " v-if="!searchInProcess" v-for="(elemEntities, index) in data" :key="index">
          <div class="personal-entities__title">
            {{ index }}
          </div>
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
        <div class="personal-entities__list" v-if="searchInProcess">
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
import vLoader from "../components/Global/vLoader";

export default {
  name: 'Specification',
  props: [],

  components: {
    vLoader,
    Menu,
    PersonalFilter,
    PersonalBlock
  },

  data() {
    return {
      vShowLoader: true,
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
            this.vShowLoader = false
          })
    },

    runSearch(val) {

      let data = new FormData();

      data.append('action', 'user_run_search');
      data.append('search', val);

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