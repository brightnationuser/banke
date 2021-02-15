<template>
  <div class="link">
    <img class="link__icon" src="../../assets/icons/help.svg" alt="help">
    <div class="link__help link__help-circle title fz-14 c-blue">
      Need a Help?
    </div>
  </div>
</template>

<script>
export default {
  name: 'NeedHelpLink'
}
</script>

<style lang="scss">
.link {
  display: flex;
  align-items: center;
  cursor: pointer;
  &__help {
    position: relative;
    padding-bottom: 4px;
    margin-left: 6px;
    font-weight: bold;
    &-circle::before {
      position: absolute;
      bottom: 0;
      width: 100%;
      content: '';
      border-bottom: dotted 1px #005CA8;
    }
  }

  &__icon {
    margin-top: -4px;
  }

}
</style>
