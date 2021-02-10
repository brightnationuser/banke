<template>
  <div class="personal-main">
    <Menu/>
    <PersonalVideo />
    Video Gallery
<!--    <youtube  :video-id="videoId" ref="youtube" @playing="playing" />-->
<!--    <button @click="playVideo">play</button>-->
    <!--    <youtube video-id="1231231" player-vars="1234" ></youtube>-->
  </div>
</template>

<script>

import {mapState} from 'vuex';

import Menu from "../components/Global/Menu";
import PersonalMain from "../components/PersonalEntities/PersonalMain";
import PersonalVideo from "../components/PersonalEntities/PersonalVideo";

// import {Youtube} from 'vue-youtube'
// Vue.use(VueYoutube)

export default {
  name: 'Video-gallery',
  props: [],

  components: {
    PersonalVideo,
    Menu,
    PersonalMain
  },

  data() {
    return {
      videoId: '5CWzYgGcCGg'

    }
  },

  mounted() {
  },

  created() {
  },

  updated() {
  },

  methods: {
    playVideo() {
      this.videoId = '8L2-ockdcPU'
      setTimeout(() => {
        this.player.playVideo()
      }, 0)


    },
    playing() {
      console.log('\o/ we are watching!!!')
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

</style>