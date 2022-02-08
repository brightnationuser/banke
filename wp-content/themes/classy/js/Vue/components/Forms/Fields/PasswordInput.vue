<template>
  <div class="account-form__field" :class="{'account-form__field--has-error' : validation && !valid}">
    <label class="field__label" :for="name">{{ label }}</label>
    <div class="field__input-wrap">
      <input class="field__input" :id="name" :name="name" :placeholder="placeholder"
             :type="visible ? 'text' : 'password'"
             @input="$emit('input', $event.target.value)"
             @change="change()"
             @keyup.enter="keyupEnter()"
      >
      <i class="field__input-action field__input-action--error icon-warning"
         v-if="validation && !valid"
         @click="togglePasswordVisibility"
      ></i>
      <i class="field__input-action icon-eye js-password-toggle"
         v-if="!(validation && !valid)"
         @click="togglePasswordVisibility"
      ></i>
    </div>
    <div class="field__error">{{ errorText }}</div>
  </div>
</template>

<script>

import {mapState} from 'vuex';

export default {
  name: 'TextInput',
  props: [
    'validation',
    'valid',
    'val',
    'label',
    'placeholder',
    'name',
    'errorText'
  ],

  components: {},

  data() {
    return {
      visible: false
    }
  },

  mounted() {
  },

  created() {
  },

  updated() {
  },

  methods: {
    keyupEnter() {
      this.$emit('keyupenter')
    },

    change() {
      this.$emit('change')
    },

    togglePasswordVisibility() {
      this.visible = !this.visible
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
