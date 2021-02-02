<template>
  <div>
    Hello world9
    {{ testText }}
  </div>
</template>

<script>
  export default {
    name: 'Test',
    props: {
      testText: String
    },
  }
</script>