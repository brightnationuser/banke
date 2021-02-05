<template>
  <div class="personal-block">
    <img class="personal-block__format" src="../../assets/icons/pdf.svg" alt="Format icon">
    <div class="personal-block__inner">
      <div class="personal-block__image">
        <img src="../../assets/specifications/track@2x.png" alt="Block">

      </div>
      <div class="personal-block__headline">
        <div class="personal-block__title">
          {{ title }}
        </div>
        <div class="personal-block__subtitle">
          {{ subtitle }}
        </div>
        <div v-if="langs" class="personal-block__langs">
          <a
              :href="elemLang.link"
              v-for="(elemLang, index) in langs"
              :key="index"
              class="personal-block__langs-elem"
              target="_blank">
            {{  elemLang.name }}
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import {mapState} from 'vuex';

export default {
  name: 'PersonalBlock',
  props: {
    title: {
      type: String,
      default: 'Not found'
    },
    subtitle: {
      type: String,
      default: 'Not found'
    },
    langs: Array
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
  height: 190px;
  margin: 9px;
  width: calc(25% - 20px);
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
      object-fit: cover;
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
    padding-top: 5px;
    font-size: 12px;
    color: #959595;
  }

  &__langs {
    display: flex;
    justify-content: center;
  }

  &__langs-elem {
    position: relative;
    margin: 7px 7px 0;
    font-size: 10px;
    color: #959595;
    &:first-child {
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
      right: -10px;
      top: 0.4px;
      color: #cac5c5;
      font-size: 8px;
    }

  }
}

@media (max-width: 1300px) {
  .personal-block {
    width: calc(33% - 20px);
  }
}

@media (max-width: 1024px) {
  .personal-block {
    max-width: 319px;
    width: 100%;
  }
}

@media (max-width: 800px) {
  .personal-block {
    margin: 10px 0;
    padding: 16px 0 17px 0;
    max-width: 100%;
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

    &__langs-elem {
      &:first-of-type {
        margin-left: 0;
      }
    }
  }
}

</style>