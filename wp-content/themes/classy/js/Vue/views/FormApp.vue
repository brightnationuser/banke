<template>
  <div>
    <Forms></Forms>
  </div>
</template>

<script>

import Forms from "../components/Forms/Forms";

export default {
  name: 'FormApp',

  components: {
    Forms
  },
  data() {
    return {
      test: 'Test'
    }
  }
}
</script>