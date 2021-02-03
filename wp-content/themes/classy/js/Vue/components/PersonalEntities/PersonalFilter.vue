<template>
  <div class="filter">
    <vSelect
      :options="options"
    />
    <div class="filter__left">
      <div class="filter__title">
        Search
      </div>
      <div class="filter__line"></div>
      <PersonalFilterList/>
    </div>
    <div class="filter__right">
      <Link class="filter__link"/>
      <Search/>
    </div>
  </div>
</template>

<script>
import Link from "../Global/Link";
import Search from "../Global/Search";
import PersonalFilterList from "../../components/PersonalEntities/PersonalFilterList";
import vSelect from "../Global/vSelect";

export default {
  name: 'PersonalFilter',
  components: {
    PersonalFilterList,
    Search,
    Link,
    vSelect
  },

  data() {
    return {
      options: [
        {
          name: 'All',
          value: 1
        },
        {
          name: 'Installation',
          value: 2
        },
        {
          name: 'Users',
          value: 3
        },
        {
          name: 'Service',
          value: 4
        },
        {
          name: 'Specific Repair Instruction',
          value: 5
        }
      ],
    }
  }
}
</script>

<style lang="scss" scoped>
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
    font-size: 18px;
    color: #003462;
    font-weight: 700;
  }

  &__line {
    margin: 0 9px 0 18px;
    height: 18px;
    width: 1px;
    background-color: #D6D6D6;
  }

  &__link {
    margin: 0 34px 0 0;
  }

  @media (max-width: 1024px) {
    .filter {
      &__left {
        display: none;
      }
    }
  }

}
</style>
