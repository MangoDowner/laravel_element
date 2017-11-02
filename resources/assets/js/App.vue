<template>
  <div>
    <example></example>
    <lists></lists>
  </div>
</template>
<script>
  import Example from './components/Example.vue';
  import Lists from './components/Lists.vue';

  export default {
    name: 'app',
    components: {
      Example,
      Lists
    }
  };
</script>
