<template>
  <div class="change-password">
    <ChangePassword></ChangePassword>
  </div>
</template>

<script>

import ChangePassword from "./components/Forms/ChangePassword";
export default {
  name: 'ResetApp',

  components: {
    ChangePassword,
  },
  data() {
    return {

    }
  }
}
</script>

<style lang="scss" scoped>
  .change-password {
    padding: 90px 0 110px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #F2F5F9;
    background-image: url(../../images/account/reset-pass-bg.png);
    background-position: center;
    background-size: cover;
  }
</style>

<style lang="scss">
  .page-template-classy-change-password {
    .content {
      padding: 45px 0 0 0;
    }
  }
</style>