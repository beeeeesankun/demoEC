<template>
  <ul class="card-area">
    <li v-if="!items.length">{{ emptyItem }}</li>
    <li v-for="item in items" :key="item.id" class="card-wrap">
      <figure class="card">
        <div class="img-wrap">
          <img class="card-img" :src="item.src" alt="" />
        </div>
        <figcaption class="card-ditile">
          <small class="card-ditile-gender">{{ item.gender }}</small>
          <p class="card-ditile-name">{{ item.name }}</p>
          <p class="card-ditile-price">{{ item.price }}</p>
          <button @click="addItemToCart(item)" v-if="!item.quantity == 0" class="card-btn">
            <i class="fas fa-cart-plus" aria-hidden="true"></i>
          </button>
        </figcaption>
      </figure>
    </li>
  </ul>
</template>

<script>
  export default {
    name: 'item-card',
    data() {
      return {
        emptyItem: 'キーワードを入力してください。',
      };
    },
    methods: {
      addItemToCart(item) {
        this.$store.dispatch('addItemToCart', item);
      },
    },
    computed: {
      items() {
        return this.$store.getters.displayItems;
      },
    },
    created() {
      this.$store.dispatch('getAllItems');
    },
  };
</script>

<style lang="scss" scoped>
  .card {
    margin: 0;
    &-area {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      padding: 1rem 2rem;
    }
    &-wrap {
      width: calc((100% - 60px) / 3);
    }
    &-ditile {
      padding: 1rem 0.5rem;
      position: relative;
      p {
        margin: 0 0 0.5rem;
      }
    }
    &-btn {
      background-color: #fff;
      border-radius: 50%;
      bottom: 10%;
      box-shadow: 0 3px 5px rgb(0 0 0 / 30%);
      font-size: 1.5rem;
      height: 3rem;
      line-height: 1.2;
      padding: 0;
      position: absolute;
      right: 5%;
      width: 3rem;
    }
  }
</style>
