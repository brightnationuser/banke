<template>
  <div class="account-form__field" :class="{'account-form__field--has-error' : validation && !valid}">
    <label class="field__label" :for="name">{{ label }}</label>
    <div class="field__input-wrap">
      <input class="field__input" type="text" :id="name" :name="name" :placeholder="placeholder" :value="val"
             @input="$emit('input', $event.target.value)"
             @change="change()"
      >
      <i class="field__input-action field__input-action--error icon-warning"
         v-if="validation && !valid"
      ></i>
    </div>
    <div class="field__error">{{ errorText }}</div>
  </div>
</template>

<script>

import {mapState} from 'vuex';

export default {
  name: 'TextInput',
  inheritAttrs: false,
  props: [
    'validation',
    'valid',
    'val',
    'label',
    'placeholder',
    'name',
    'errorText',
    'required'
  ],

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

  methods: {
    change() {
      this.$emit('change')
    }
  },

  watch: {},

  computed: {
    ...mapState({})
  }
}
</script>

<style lang="scss" scoped>

</style>