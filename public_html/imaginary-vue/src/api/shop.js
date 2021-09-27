async function callApi() {
  const res = await fetch('../../../../json.php');

  const product = await res.json();
  console.log(product);
  return product;
}

const _products = callApi();

// const _products = [
//   {
//     id: 1,
//     name: 'チェスターコート',
//     src: require('@/assets/outer-women/outer-women-item1.jpg'),
//     gender: 'women',
//     itemCategory: 'アウター',
//     price: '3980',
//     quantity: 1,
//   },
// ];

export default {
  getProducts(cb) {
    cb(_products);
  },
  // getProducts(cb) {
  //   setTimeout(() => cb(_products), 100);
  // },
  // buyProducts(products, cb, errorCb) {
  //   setTimeout(() => {
  //     // simulate random checkout failure.
  //     Math.random() > 0.5 || navigator.userAgent.indexOf('PhantomJS') > -1 ? cb() : errorCb();
  //   }, 100);
  // },
};
