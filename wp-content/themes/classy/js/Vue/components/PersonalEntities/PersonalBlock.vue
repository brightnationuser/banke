<template>
  <a :href=files[0].link class="personal-block" download>
    <img class="personal-block__format" src="../../assets/icons/pdf.svg" alt="Format icon" v-if="!model">
    <img class="personal-block__format" src="../../assets/icons/stp.svg" alt="Format icon" v-if="model">
    <div class="personal-block__inner">
      <div class="personal-block__image">
        <img :src="image" alt="Block">
      </div>
      <div class="personal-block__headline">
        <div class="personal-block__title">
          {{ title }}
        </div>
        <div class="personal-block__subtitle">
          {{ subtitle }}
        </div>
        <div v-if="files && files.length > 1" class="personal-block__files">
          <a
              download
              :href="elemFile.link"
              v-for="(elemFile, index) in files"
              :key="index"
              class="personal-block__files-elem">
            {{ elemFile.lang }}
          </a>
        </div>
      </div>
    </div>
  </a>
</template>

<script>

import {mapState} from 'vuex';

export default {
  name: 'PersonalBlock',
  props: {
    image: {
      type: String,
      default: '/wp-content/themes/classy/js/Vue/assets/specifications/track@2x.png'
    },
    model: {
      type: Boolean,
      default: false
    },
    title: {
      type: String,
      default: 'Not found'
    },
    subtitle: {
      type: String,
      default: 'Not found'
    },
    files: {
      type: Array
    }
  },

  components: {},

  data() {
    return {}
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
.personal-block {
  position: relative;
  text-decoration: unset;
  height: 190px;
  margin: 9px 18px 9px 0;
  width: calc(25% - 18px);
  background-color: #fff;
  border: solid 1px #D6D6D6;
  border-radius: 6px;
  cursor: pointer;

  &__inner {
    padding-top: 32px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  &__format {
    top: 18px;
    right: 18px;
    position: absolute;
  }

  &__image {
    max-width: 150px;
    max-height: 66px;

    img {
      object-fit: contain;
      display: block;
      width: 100%;
      height: 57px;

    }
  }

  &__headline {
    text-align: center;
  }

  &__title {
    padding-top: 10px;
    font-size: 14px;
    color: #005CA9;
    font-weight: bold;
  }

  &__subtitle {
    font-weight: 400;
    padding-top: 5px;
    font-size: 12px;
    color: #959595;
  }

  &__files {
    display: flex;
    justify-content: center;
    text-transform: uppercase;
  }

  &__files-elem {
    position: relative;
    padding: 7px 7px 0;
    font-size: 10px;
    color: #959595;
    text-decoration: unset;
    transition: color 0.4s ease-in;

    &:hover {
      color: #005CA9;
    }

    &:last-child {
      &::after {
        content: '';
      }
    }

    &::after {
      content: "|";
      position: absolute;
      right: -3px;
      top: 8px;
      color: #cac5c5;
      font-size: 8px;
    }

  }
}

@media (max-width: 1300px) {
  .personal-block {
    width: calc(33% - 16px);
  }
}

@media (max-width: 800px) {
  .personal-block {
    margin: 4px 0;
    padding: 16px 0 17px 0;
    width: 100%;
    height: auto;
    &__inner {
      margin-left: 24px;
      padding: 0;
      flex-direction: row;
      align-items: center;
    }

    &__headline {
      text-align: left;
      margin-left: 20px;
    }

    &__title {
      padding-top: 0;
    }

    &__subtitle {

    }

    &__image {
      max-width: 70px;
    }

    &__files {
      justify-content: flex-start;
      margin-left: -7px;
    }

    &__files-elem {
      &:first-of-type {
        margin-left: 0;
      }
    }
  }
}

@media (max-width: 360px) {
  .personal-block {
    &__inner {
      margin-left: 10px;
    }

    &__headline {
      margin-left: 10px;
    }

    &__title {
      font-size: 12px;
    }

    &__subtitle {
      font-size: 11px;
    }
  }
}

</style>
