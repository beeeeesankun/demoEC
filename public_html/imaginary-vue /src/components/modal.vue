<template>
  <div class="modal-wrap">
    <span v-on:click="show" class="show-btn"><i class="header-menu-list-item fas fa-shopping-cart" aria-hidden="true"></i></span>
    <modal name="v-modal" class="modal" :draggable="true" :scrollable="true" width="85%" height="auto">
      <div class="modal-head">
        <h1 class="modal-head-title">カート</h1>
        <button @click="hide" class="modal-head-btn">
          <i id="closeCart" class="fas fa-times" aria-hidden="true"></i>
        </button>
      </div>
      <hr class="modal-hr" />
      <div class="modal-body">
        <ol class="modal-body-lists">
          <li v-for="item in items" :key="item.id" class="card-wrap">
            <figure class="card">
              <div class="card-img-wrap">
                <img class="card-img" :src="item.src" alt="" />
              </div>
              <figcaption class="card-ditile">
                <p class="card-ditile-name">{{ item.name }}</p>
                <p class="card-ditile-price">単価：{{ item.price }}</p>
                <p class="card-ditile-quantity">個数：{{ item.quantity }}</p>
              </figcaption>
            </figure>
          </li>
          <li v-if="!items.length" class="modal-body-lists-empty-cart">カートの中は空です。</li>
        </ol>
      </div>
      <div class="modal-foot">
        <hr class="modal-foot-hr" />
        <div class="modal-foot-check">
          <button class="modal-foot-check-btn" type="submit">check out ￥{{ total }}</button>
        </div>
      </div>
    </modal>
  </div>
</template>

<script>
  export default {
    data() {
      return {};
    },
    methods: {
      show() {
        this.$modal.show('v-modal');
      },
      hide() {
        this.$modal.hide('v-modal');
      },
    },
    computed: {
      items() {
        return this.$store.getters.displayItemsInCart;
      },
      total() {
        return this.$store.getters.totalInCart;
      },
    },
  };
</script>

<style lang="scss" scoped>
  @use 'baseSet' as aset;

  .show-btn {
    font-family: aset.$font-en;
    transition: all 200ms;
    &:hover {
      cursor: pointer;
      color: rgba(aset.$main-txt, 30%);
    }
  }
  .modal {
    &-body {
      &-lists {
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        &-empty-cart {
          text-align: center;
        }
      }
    }
    &-head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 2rem;
      &-title {
        margin: 0.5rem 0;
      }
      &-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        background: inherit;
        font-size: 1.5rem;
        width: 2.5rem;
        height: 2.5rem;
        transition: all 200ms;
        &:hover {
          cursor: pointer;
          background: #333;
          color: #fff;
        }
      }
    }
    &-foot {
      width: 100%;
      bottom: 0;
      padding: 0 0 2rem 0;
      &-hr {
        margin: 2rem 0;
      }
      &-check {
        display: flex;
        justify-content: center;
        &-btn {
          width: 25%;
          font-size: 1.1rem;
          font-family: aset.$font-ja;
        }
      }
    }
    &-hr {
      margin: 0 0 2rem;
    }
  }
  .card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    &-wrap {
      width: 50%;
    }
    &-img-wrap {
      width: max(20%, 160px);
    }
    &-ditile {
      padding: 20px;
    }
  }
</style>
