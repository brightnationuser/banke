<template>
  <div class="filter">

    <div class="filter__left">
      <div class="filter__title">
        Search
      </div>
      <template v-if="showFilter">
        <div class="filter__line"></div>
        <PersonalFilterList
            :filterList="options"
            :selectedFilterOption="selectedOption"
            @select="eventSelectedOption"
        />
      </template>
    </div>
    <div class="filter__right">
      <div class="filter__right__first">
        <vSelect
            v-if="showFilter"
            :options="options"
            :selectedOption="selectedOption"
            @select="eventSelectedOption"
        />
        <NeedHelpLink class="filter__link"/>
      </div>
      <div class="filter__right__second">
        <Search/>
      </div>
    </div>
  </div>
</template>

<script>
import NeedHelpLink from "../Global/NeedHelpLink";
import Search from "../Global/Search";
import PersonalFilterList from "../../components/PersonalEntities/PersonalFilterList";
import vSelect from "../Global/vSelect";

export default {
  name: 'PersonalFilter',
  components: {
    PersonalFilterList,
    Search,
    NeedHelpLink,
    vSelect
  },

  props: {
    showFilter: {
      type: Boolean,
      default: false
    }
  },

  methods: {
    eventSelectedOption(options) {
      this.selectedOption = options
    }
  },

  data() {
    return {
      searchFilesValue: '',

      selectedOption: {
        name: 'All'
      },
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
}

@media (max-width: 1320px) and (min-width: 1170px) {
  .filter {
    align-items: start;
    &__right {
      flex-direction: column;
      align-items: flex-end;
      &__first {
        order: 2;
      }
    }

    &__link {
      margin: 14px 0 0 0;
    }
  }
}

@media (max-width: 1170px) {
  .filter {
    &__left {
      display: none;
    }

    &__right {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      width: 100%;

      &__first {
        display: flex;
        justify-content: space-between;
        width: 100%;
      }

      &__second {
        margin-top: 13px;
        width: 100%;
      }
    }
    &__link {
      margin: 0 0 0 auto;
    }
  }
}

</style>
