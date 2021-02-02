<template>
  <div>
    Hello
    {{ test }}
    <Test
        testText="testText"
    />

  </div>
</template>

<script>
  import Test from './components/Test'

  export default {
    name: 'App',

    components: {
      Test
    },
    data() {
      return {
        test: 'Test'
      }
    }
  }
</script>