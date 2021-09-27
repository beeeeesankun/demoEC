async function callApi() {
  const res = await fetch("./json.php");

  const product = await res.json();
  console.log(product);
}

callApi();
