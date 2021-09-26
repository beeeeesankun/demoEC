<template>
  <div class="topic">
    <parts title="新作商品"></parts>
    <parts title="期間限定"></parts>
    <parts title="人気商品"></parts>
  </div>
</template>

<script>
  import parts from './select-gender.vue';
  export default {
    name: 'section-topic',
    components: {
      parts,
    },
  };
</script>

<style lang="scss" scoped>
  .topic {
    display: flex;
    justify-content: space-around;
    max-width: 880px;
    margin: 0 auto;
    padding: 60px 0;
  }
</style>
