<template>
    <div class="personal-main">
      <Menu/>
      <div v-if="vShowLoader">
        <vLoader />
      </div>
      <div v-else class="personal-entities__container">
        <div class="personal-entities__container-inner">
          <PersonalFilter class="personal-entities__filter"
            :showFilter="true"
            :title="translations.titles.manuals"
            @runSearch="runSearch"
            @cancelSearch="getManuals"
            @select="getManualsByTerm"
          />
          <div class="personal-entities__list-manuals">
            <div class="personal-entities__list">
              <PersonalBlock
                v-for="manual in manuals"
                :key="manual.id"
                :title="manual.title"
                :subtitle="manual.category.description"
                :image="manual.image.url"
                :files="manual.files"
              />
          </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>

import { mapState } from 'vuex';

import Menu from "../components/Global/Menu";
import PersonalFilter from "../components/PersonalEntities/PersonalFilter";
import PersonalBlock from "../components/PersonalEntities/PersonalBlock";
import vLoader from '../components/Global/vLoader'

export default {
  name: 'Manuals',
  props: [

  ],

  components: {
    Menu,
    PersonalFilter,
    PersonalBlock,
    vLoader
  },

  data() {
    return {
      vShowLoader: true,
      manuals: []
    }
  },

  mounted () {
    this.getManuals()
  },

  created () {},

  updated () {},

  methods: {
    getManuals() {

      let data = new FormData();

      data.append('action', 'user_get__manuals');

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            console.log(response.data)
            this.manuals = response.data
            this.vShowLoader = false
          })
    },

    getManualsByTerm(term) {

      let data = new FormData();

      data.append('action', 'user_get__manuals_by_term');
      data.append('term_slug', term.slug);

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            console.log(response.data)
            this.manuals = response.data
            this.vShowLoader = false
          })
    },

    runSearch(val) {
      let data = new FormData();

      data.append('action', 'user_run_search');
      data.append('search', val);

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            this.manuals = response.data
          })
    }
  },

  watch: {},

  computed: {
    ...mapState({

    })
  }
}
</script>

<style lang="scss" scoped>


</style>