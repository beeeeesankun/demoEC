<template>
  <div class="recommend-wrap">
    <titleParts class="recommend-title" titleEn="recommend for" titleJa="あなたへのおすすめ"></titleParts>
    <Carousel></Carousel>
  </div>
</template>

<script>
  import Carousel from './carousel.vue';
  import titleParts from './title-parts.vue';

  export default {
    name: 'recommend',
    components: {
      Carousel,
      titleParts,
    },
  };
</script>

<style lang="scss" scoped>
  .recommend {
    &-wrap {
      padding: 80px 0;
    }
  }
</style>
