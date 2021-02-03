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
      max-height: 66px;

    }
  }

  &__headline {
    text-align: center;
  }

  &__title {
    padding-top: 17px;
    font-size: 14px;
    color: #005CA9;
    font-weight: bold;
  }

  &__subtitle {
    padding-top: 5px;
    font-size: 12px;
    color: #959595;
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
      margin-left: 20px;
    }

    &__title {
      padding-top: 0;
    }

    &__subtitle {
      text-align: left;
    }
  }
}

</style>