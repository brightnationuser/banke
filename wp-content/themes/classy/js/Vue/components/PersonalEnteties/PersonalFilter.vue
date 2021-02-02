<template>
  <div class="filter">
    <div class="filter__left">
      <div class="filter__title fz-18 c-dark-blue">
        Search
      </div>
      <div class="filter__line"></div>
      <PersonalFilterList/>
    </div>
    <div class="filter__right">
      <Link/>
      <Search/>
    </div>
  </div>
</template>

<script>
import Link from "../Link";
import Search from "../../components/Search";
import PersonalFilterList from "../../components/PersonalEnteties/PersonalFilterList";

export default {
  name: 'PersonalFilter',
  components: {
    PersonalFilterList,
    Search,
    Link
  }
}
</script>

<style lang="scss">
.filter {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 53px;

  &__left {
    display: flex;
    align-items: center;
  }

  &__right {
    display: flex;
    align-items: center;
  }

  &__title {

  }

  &__line {
    margin: 0 9px 0 18px;
    height: 18px;
    width: 1px;
    background-color: #D6D6D6;
  }

}
</style>
