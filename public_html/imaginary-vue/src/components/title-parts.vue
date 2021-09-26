<template>
  <div class="title">
    <h2 class="en">{{ titleEn }}</h2>
    <h3 class="ja">{{ titleJa }}</h3>
  </div>
</template>

<script>
  export default {
    name: 'section-title',
    props: {
      titleEn: String,
      titleJa: String,
    },
  };
</script>

<style lang="scss" scoped>
  @use 'baseSet' as aset;
  .title {
    margin: 0 0 1.2rem;
  }
  .en {
    font-family: aset.$font-en;
    text-transform: uppercase;
    text-align: center;
    margin: 0;
  }
  .ja {
    font-family: aset.$font-ja;
    font-size: 0.8rem;
    margin: 0 0 0;
    text-align: center;
  }
</style>
