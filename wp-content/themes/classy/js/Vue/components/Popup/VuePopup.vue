<template>
  <div class="vue-popup" :class="rootClasses">
    <div class="vue-popup__close-layer" @click="close()"></div>
    <div class="vue-popup__inner">
      <slot></slot>
    </div>
  </div>
</template>

<script>

export default {
  name: 'VuePopup',
  props: [
      'rootClasses',
      'isOpened'
  ],
  components: {

  },
  data() {
    return {
    }
  },

  watch: {

  },

  methods: {
    close() {
      this.$emit('close')
    }
  },

  computed: {

  }
}
</script>

<style lang="scss" scoped>

</style>