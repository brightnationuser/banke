<template>
    <div class="personal-main">
      <Menu/>
      <div class="personal-entities__container">
        <div class="personal-entities__container-inner">
          <PersonalFilter class="personal-entities__filter"
            :showFilter="true"
          />
          <div class="personal-entities__title">
            E-PTO Systems
          </div>
          <div class="personal-entities__list">
            <PersonalBlock
              v-for="manual in manuals"
              :key="manual.id"
              :title="manual.title"
              :subtitle="manual.category.description"
              :image="manual.image.url"
              :files="manual.files"
            />
          </div>
        </div>
      </div>
    </div>
</template>

<script>

import { mapState } from 'vuex';

import Menu from "../components/Global/Menu";
import PersonalFilter from "../components/PersonalEntities/PersonalFilter";
import PersonalBlock from "../components/PersonalEntities/PersonalBlock";

export default {
  name: 'Manuals',
  props: [

  ],

  components: {
    Menu,
    PersonalFilter,
    PersonalBlock
  },

  data() {
    return {
      manuals: []
    }
  },

  mounted () {
    this.getManuals()
  },

  created () {},

  updated () {},

  methods: {
    getManuals() {
      this.validation = true

      let data = new FormData();

      data.append('action', 'user_get__manuals');

      this.showLoader = true

      axios.post('/wp-admin/admin-ajax.php', data)
          .then((response) => {
            console.log(response.data)
            this.manuals = response.data
          })
    }
  },

  watch: {},

  computed: {
    ...mapState({

    })
  }
}
</script>

<style lang="scss" scoped>


</style>