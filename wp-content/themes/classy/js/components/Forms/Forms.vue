<template>
  <div class="sign-in">
    <i class="icon-account"></i>
    <span>Sign In</span>
  </div>
</template>

<script>
export default {
  name: 'Forms',
  props: []
}
</script>

<style lang="scss" scoped>
  .sign-in {
    cursor: pointer;
    display: flex;
    align-items: center;
    color: #003462;
    margin-bottom: -3px;

    i {
      margin-right: 4px;
      color: #005ca9;
    }
  }
</style>