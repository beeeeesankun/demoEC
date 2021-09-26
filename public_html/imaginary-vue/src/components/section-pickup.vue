<template>
  <div class="wrap">
    <div class="pickup">
      <titleParts class="pickup-title" titleEn="pick up" titleJa="今週の特集"></titleParts>
      <ul class="pickup-lists">
        <li class="pickup-lists-item">
          <img class="pickup-lists-item-img" src="../assets/others/pick-up1.jpg" alt="" />
        </li>
        <li class="pickup-lists-item">
          <img class="pickup-lists-item-img" src="../assets/others/pick-up2.jpg" alt="" />
        </li>
      </ul>
      <div class="pickup-bottom">
        <button class="pickup-bottom-btn">特集をすべて見る</button>
      </div>
    </div>
  </div>
</template>

<script>
  import titleParts from './title-parts.vue';
  export default {
    name: 'pickup',
    components: {
      titleParts,
    },
  };
</script>

<style lang="scss" scoped>
  @use 'baseSet' as aset;
  .wrap {
    background: #f5f5f5;
  }
  .pickup {
    max-width: 880px;
    margin: 0 auto;
    padding: 80px 0;
    &-lists {
      display: flex;
      justify-content: space-between;
      padding: 0;
      &-item {
        width: calc(50% - 10px);
      }
    }
    &-bottom {
      text-align: center;
      margin: 2rem 0 0;
      &-btn {
        @include aset.btnStyle;
      }
    }
  }
</style>
