<template>
  <div>
    Hello world4
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