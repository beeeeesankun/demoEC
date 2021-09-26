<template>
  <swiper ref="mySwiper" :options="swiperOptions">
    <swiper-slide v-for="image in images" :key="image.id">
      <img :src="image" alt="" />
    </swiper-slide>
    <div class="swiper-pagination" slot="pagination"></div>
  </swiper>
</template>

<script>
  export default {
    name: 'Carousel',
    data() {
      return {
        images: [
          require('../assets/recommend/for-you01.jpg'),
          require('../assets/recommend/for-you02.jpg'),
          require('../assets/recommend/for-you03.jpg'),
          require('../assets/recommend/for-you04.jpg'),
          require('../assets/recommend/for-you05.jpg'),
          require('../assets/recommend/for-you06.jpg'),
          require('../assets/recommend/for-you07.jpg'),
        ],
        swiperOptions: {
          pagination: {
            el: '.swiper-pagination',
          },
          // Some Swiper option/callback...
          loop: true, //無限ループ
          slidesPerView: 3, //画面に何枚表示させるか
          spaceBetween: 10, //スライド間隔
          speed: 1000,
          autoplay: {
            delay: 1000,
            disableOnInteraction: true, //何らかのアクション後の自動切り替えを再開
          },
        },
      };
    },
    computed: {
      swiper() {
        return this.$refs.mySwiper.$swiper;
      },
    },
    mounted() {
      console.log('Current Swiper instance object', this.swiper);
      this.swiper.slideTo(3, 1000, false);
    },
  };
</script>
