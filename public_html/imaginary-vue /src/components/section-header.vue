<template>
  <header class="header">
    <div class="header-logo-wrap">
      <img src="../assets/others/logo.png" alt="" class="header-logo-wrap-img" />
    </div>
    <ul class="header-menu">
      <li class="header-menu-list">
        <input class="header-menu-list-input" type="text" name="serch" id="" />
        <i class="header-menu-list-item fas fa-search" aria-hidden="true"></i>
      </li>
      <li class="header-menu-list"><i class="header-menu-list-item fas fa-user" aria-hidden="true"></i></li>
      <li class="header-menu-list"><i class="header-menu-list-item fas fa-heart" aria-hidden="true"></i></li>
      <li class="header-menu-list">
        <span class="header-menu-list-val">{{ val }}</span>
        <v_modal></v_modal>
      </li>
    </ul>
  </header>
</template>

<script>
  import v_modal from './modal.vue';

  export default {
    name: 'sectio-header',
    data() {
      return {};
    },
    computed: {
      val() {
        return this.$store.state.count;
      },
    },
    methods: {},
    components: {
      v_modal,
    },
  };
</script>

<style lang="scss" scoped>
  @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 1rem;
    position: sticky;
    top: 0;
    z-index: 10;
    background: #fff;
    &-logo-wrap {
      display: flex;
      &-img {
        width: 120px;
      }
    }
    &-menu {
      display: flex;
      align-items: center;
      list-style: none;
      margin: 0;
      &-list {
        padding: 1rem 0.75rem;
        font-size: 1.2rem;
        position: relative;
        &-input {
          margin-right: 1rem;
        }
        &-val {
          position: absolute;
          top: 5%;
          right: -10%;
          background: red;
          color: aliceblue;
          border-radius: 50%;
          padding: 0.1rem 0.5rem;
        }
      }
    }
  }
</style>
