<template>
  <div id="app">
    <sectionHeader></sectionHeader>
    <div class="kv">
      <img src="./assets/others/hero.jpg" alt="" />
    </div>
    <sectionTopic></sectionTopic>
    <sectionPick></sectionPick>
    <sectionRecommend></sectionRecommend>
    <sectionLook></sectionLook>
  </div>
</template>

<script>
  import sectionHeader from './components/section-header.vue';
  import sectionTopic from './components/section-topic.vue';
  import sectionPick from './components/section-pickup.vue';
  import sectionRecommend from './components/section-recommend.vue';
  import sectionLook from './components/section-look.vue';

  export default {
    name: 'App',
    components: {
      sectionHeader,
      sectionTopic,
      sectionPick,
      sectionRecommend,
      sectionLook,
    },
  };
</script>

<style lang="scss">
  @use 'components/baseSet' as aset;

  body {
    color: aset.$main-txt;
    font-family: aset.$font-ja;
  }
  ul,
  ol {
    list-style: none;
  }
  img {
    width: 100%;
  }
</style>
