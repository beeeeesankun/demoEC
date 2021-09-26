<template>
  <div class="select">
    <h3 v-if="isTitle" class="select-title">{{ title }}</h3>
    <ul class="select-lists">
      <li class="select-lists-item">women</li>
      <li class="select-lists-item">men</li>
      <li class="select-lists-item">kids</li>
    </ul>
  </div>
</template>

<script>
  export default {
    name: 'select-gender',
    data() {
      return {};
    },
    props: {
      title: String,
    },
    computed: {
      isTitle: function () {
        if (this.title == '') {
          return false;
        }
        return true;
      },
    },
  };
</script>

<style lang="scss" scoped>
  .select {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem;
    &-title {
      margin-bottom: -10px;
    }
    &-lists {
      display: flex;
      padding: 0;
      &-item {
        border-radius: 10px;
        &:first-child {
          border-bottom: 2px solid #d7003a;
        }
        &:nth-child(2) {
          border-bottom: 2px solid #5999e8;
          margin: 0 0.5rem;
        }
        &:last-child {
          border-bottom: 2px solid #fff352;
        }
      }
    }
  }
</style>
