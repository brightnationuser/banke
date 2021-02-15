<template>
    <div class="personal-main">
      <Menu/>
      <div class="personal-entities__container">
        <div class="personal-entities__container-inner">
          <PersonalFilter class="personal-entities__filter"
            :showFilter="true"
            title="Manuals"
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

export default {
  name: 'Manuals',
  props: [

  ],

  components: {
    Menu,
    PersonalFilter,
    PersonalBlock
  },

  data() {
    return {
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