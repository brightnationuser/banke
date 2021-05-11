<template>
  <div class="filter">

    <div class="filter__left">
      <div class="filter__title" v-if="!searchInProcess">
        {{title}}
      </div>
      <div class="filter__title" v-else>
        {{translations.titles.search}}
      </div>
      <template v-if="showFilter && !searchInProcess">
        <div class="filter__line"></div>
        <transition name="fade-fast">
          <PersonalFilterList
              v-if="options.length > 0"
              :filterList="options"
              :selectedFilterOption="selectedOption"
              @select="eventSelectedOption"
          />
        </transition>
      </template>
    </div>
    <div class="filter__right">
      <div class="filter__right__first">
        <vSelect
            v-if="showFilter && !searchInProcess"
            :options="options"
            :selectedOption="selectedOption"
            @select="eventSelectedOption"
        />
        <NeedHelpLink class="filter__link"/>
      </div>
      <div class="filter__right__second">
        <Search
            :searchFilesValue="search"
            @update="searchUpdate"
            @runSearch="runSearch"
        />
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
    title: String,
    showFilter: {
      type: Boolean,
      default: false
    }
  },

  data() {
    return {
      searchFilesValue: '',
      search: '',
      searchInProcess: false,

      selectedOption: {
        name: 'All'
      },
      options: [],
    }
  },

  mounted() {
    this.getManuals()
  },

  methods: {
    eventSelectedOption(term) {
      this.selectedOption = term
      this.$emit('select', term)
    },

    getManuals() {
      let data = new FormData();

      data.append('action', 'user_get__manuals_tags');

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            this.options = response.data
            this.options.unshift({
              name: 'All',
              slug: '*'
            })
          })
    },

    searchUpdate(val) {
      this.search = val

      if(val.length > 3) {
        this.runSearch()
      }
      else {
        this.cancelSearch()
      }
    },

    cancelSearch() {
      this.searchInProcess = false
      this.$emit('cancelSearch')
    },

    runSearch() {
      this.searchInProcess = true
      this.$emit('runSearch', this.search)
    }
  },

  watch: {
    search: function (val) {
      console.log('val', val)
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
    margin-right: 18px;
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

@media (max-width: 800px) {
  .filter {
    &__right {
      margin-right: 0;
    }
  }
}

</style>
