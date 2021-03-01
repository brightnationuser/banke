<template>
  <div class="personal-video">
    <div class="personal-video__card">
      <div class="personal-video__preview">
        <img :src="'http://img.youtube.com/vi/' + id + '/0.jpg'" alt="">
      </div>
      <div class="personal-video__button" @click="playVideo()">
        <img src="/wp-content/themes/classy/images/icons/play-news.svg" alt="play">
      </div>
    </div>

    <VuePopup
        class="personal-video__popup"
        v-show="isOpened"
        root-classes="vue-popup--account"
        :is-opened="isOpened"
        @close="close()"
    >
      <div class="personal-video__popup-inner">
        <div class="personal-video__popup-title">
          {{ videoTitle }}
        </div>

        <div class="personal-video__popup-frame">
          <youtube
              :video-id="id"
              :ref="'youtube-' + id"
              :resize="true"
              :width="iframeWidth"
              :height="iframeHeight"
          ></youtube>
        </div>

        <div class="vue-popup__close">
          <i class="icon-close" @click="close()"></i>
        </div>
      </div>
    </VuePopup>
  </div>
</template>

<script>

import { mapState } from 'vuex';
import VuePopup from "../Popup/VuePopup";

export default {
  name: 'PersonalVideo',
  props: {
    videoTitle: {
      type: String
    },
    id: {
      type: String
    }
  },

  components: {
    VuePopup
  },

  data() {
    return {
      isOpened: false,
      iframeWidth: 640,
      iframeHeight: 360
    }
  },

  mounted () {
    if(window.innerWidth < 768) {
      this.iframeWidth = 380
      this.iframeHeight = 230
    }

    if(window.innerWidth < 400) {
      this.iframeWidth = 320
      this.iframeHeight = 180
    }
  },

  created () {},

  updated () {},

  methods: {
    close() {
      this.isOpened = false
      this.player.stopVideo();
    },

    playVideo() {
      this.isOpened = true
      this.player.playVideo()
    },
  },

  watch: {},

  computed: {
    player() {
      return this.$refs['youtube-' + this.id].player
    },

    ...mapState({

    })
  }
}
</script>

<style lang="scss" scoped>
  .personal-video {
    max-width: 290px;
    max-height: 200px;
    margin-right: 18px;
    margin-bottom: 18px;
    position: relative;

    &__preview {
      overflow: hidden;
      height: 200px;

      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    }

    &__button {
      opacity: 0;
      visibility: hidden;
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: rgba(2, 49, 89, .7);
      transition: all .4s ease;
      cursor: pointer;
    }

    &__popup {
      z-index: 100;
    }

    &__popup-inner {
      padding: 15px 10px 10px 10px;
      background-color: #FFFFFF;
      box-shadow: 0 0 40px rgba(0, 0, 0, 0.25);
      border-radius: 4px;
      background-image: url(../../../../images/account/account-popup-bg.png);
      background-position: center;
      background-size: cover;
      position: relative;
    }

    &__popup-title {
      font-weight: bold;
      font-size: 20px;
      line-height: 27px;
      text-align: center;
      color: #003462;
      margin-bottom: 6px;
    }

    &__popup-frame {
      display: flex;
      justify-content: center;
      align-items: center;

      iframe {
        max-width: 100%;
      }
    }

    &:hover {
      .personal-video {
        &__button {
          opacity: 1;
          visibility: visible;
        }
      }
    }

    .vue-popup__close {
      top: 16px;
      right: 16px;
    }
  }

  @media screen and (max-width: 800px) {
    .personal-video {
      margin: 0 0 18px 0;
      max-width: 500px;
    }
  }

  @media screen and (max-width: 768px) {
    .personal-video {

      &__popup-inner {
        padding-top: 20px;
      }

      &__popup-title {
        font-size: 16px;
      }
    }
  }
</style>
