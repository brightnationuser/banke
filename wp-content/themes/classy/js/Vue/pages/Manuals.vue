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
                v-for="elem in manuals"
                v-if="elem.type !== 'video'"
                :key="elem.id"
                :title="elem.title"
                :model="elem.type === 'models3d'"
                :subtitle="elem.category.description"
                :image="elem.image.url"
                :files="elem.files"
              />
              <PersonalVideo
                  classes="personal-video--search"
                  v-for="(elem, index) in manuals"
                  v-if="elem.type === 'video'"
                  :key="elem.video.youtube_id + index"
                  :id="elem.video.youtube_id"
                  :video-title="elem.video.title"
              ></PersonalVideo>
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
import PersonalVideo from "../components/PersonalEntities/PersonalVideo";
import vLoader from '../components/Global/vLoader'

export default {
  name: 'Manuals',
  props: [

  ],

  components: {
    Menu,
    PersonalFilter,
    PersonalBlock,
    vLoader,
    PersonalVideo
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
            console.log('user_get__manuals', response.data)
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
