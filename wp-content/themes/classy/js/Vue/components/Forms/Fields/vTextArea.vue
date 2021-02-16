<template>
  <div class="account-form__field" :class="{'account-form__field--has-error' : validation && !valid}">
    <div class="textarea__label">
      Your question
    </div>
    <div class="field__input-wrap">
    <textarea class="field__textarea textarea-inner" :id="name" :name="name" :placeholder="placeholder" :value="val"
              placeholder="Write your question here"
              @input="$emit('input', $event.target.value)"
              @change="change()"
    >
    </textarea>
      <i class="field__textarea-action field__textarea-action--error icon-warning"
         v-if="validation && !valid"
      ></i>
      <div class="field__error">{{ errorText }}</div>
    </div>


  </div>

</template>

<script>

import {mapState} from 'vuex';

export default {
  name: 'TextAreaFields',
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
.textarea {
  &-inner {
    font-family: 'Open Sans';
    font-weight: 400;
    width: 100%;
    min-height: 120px;
    resize: none;
    outline: 0;
    border: solid 1px #E8F0F7;
    border-radius: 4px;
    padding: 14px 10px 16px 14px;
    color: #757575;
    background-color: #F6F6F6;
  }

  &__label {
    margin-bottom: 4px;
    font-size: 10px;
    font-weight: 600;
    color: #5E5E5E;
  }

}
</style>