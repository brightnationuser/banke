<template>
  <div class="personal-main">
    <Menu/>
    <div v-if="vShowLoader">
      <vLoader />
    </div>
    <div v-else class="personal-entities__container">
      <div class="personal-entities__container-inner">
        <PersonalFilter class="personal-entities__filter"
          :title="translations.titles.video_gallery"
          @runSearch="runSearch"
          @cancelSearch="cancelSearch"
        />
        <div class="personal-entities__list" v-if="!searchInProcess">
          <PersonalVideo
              v-for="(video, index) in videos"
              :key="video.id + index"
              :id="video.id"
              :video-title="video.title"
          />
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
import PersonalVideo from "../components/PersonalEntities/PersonalVideo";
import PersonalBlock from "../components/PersonalEntities/PersonalBlock";
import vLoader from '../components/Global/vLoader'

export default {
  name: 'Video-gallery',
  props: [],

  components: {
    PersonalVideo,
    Menu,
    PersonalFilter,
    PersonalBlock,
    vLoader
  },

  data() {
    return {
      searchInProcess: false,
      vShowLoader: true,
      videos: []
    }
  },

  mounted() {
    this.getVideos()
  },

  created() {
  },

  updated() {
  },

  methods: {
    getVideos() {
      let data = new FormData();

      data.append('action', 'user_get__videos');

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            this.searchInProcess = false
            this.videos = response.data
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
            this.data = response.data
            this.searchInProcess = true
          })
    },

    cancelSearch() {
      this.getVideos()
    }
  },


  watch: {},

  computed: {
    player() {
      return this.$refs.youtube.player
    }
  },
}
</script>

<style lang="scss" scoped>
  .personal-entities {
    &__list {
      margin-top: 27px;
    }
  }
</style>