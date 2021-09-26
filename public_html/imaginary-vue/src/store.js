import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import shop from './api/shop';

export default new Vuex.Store({
  state: {
    count: 0,
    allProducts: [],
    itemsInCart: [],
    keyGender: null,
    keyItem: null,
    showProduct: [],
  },
  mutations: {
    increment(state) {
      state.count++;
    },
    toCart(state, item) {
      state.itemsInCart.push({
        id: item.id,
        name: item.name,
        price: item.price,
        quantity: item.quantity,
        src: item.src,
      });
    },
    incrementItemQuantity(state, sameItem) {
      const cartItem = state.itemsInCart.find((item) => item.id === sameItem.id);
      cartItem.quantity++;
    },
    setProducts(state, products) {
      state.allProducts = products;
    },
    assignCategory(state, txt) {
      state.keyGender = txt;
    },
    assignItem(state, txt) {
      state.keyItem = txt;
    },
    filtering(state) {
      if (state.keyGender == null || state.keyItem == null) return;
      const array = state.allProducts.filter((item) => {
        return item.gender == state.keyGender && item.itemCategory == state.keyItem;
      });
      state.showProduct = array;
    },
  },
  actions: {
    addItemToCart({ state, commit }, item) {
      const sameItem = state.itemsInCart.find((itemInCart) => itemInCart.id === item.id);
      if (sameItem) {
        commit('incrementItemQuantity', sameItem);
      } else {
        commit('toCart', item);
      }
      commit('increment');
    },
    getAllItems(context) {
      shop.getProducts((products) => {
        context.commit('setProducts', products);
      });
    },
    assignTxt(context, txt) {
      txt.match(/[^A-Za-z0-9]+/) ? context.commit('assignItem', txt) : context.commit('assignCategory', txt);
      context.commit('filtering');
    },
  },
  getters: {
    displayItems: (state) => {
      return state.showProduct;
    },
    displayItemsInCart: (state) => {
      return state.itemsInCart;
    },
    totalInCart: (state) => {
      const result = state.itemsInCart.map((item) => {
        return item.price * item.quantity;
      });
      if (!result.length) return 0;
      const sum = result.reduce((a, b) => {
        return a + b;
      });
      return sum;
    },
  },
});
