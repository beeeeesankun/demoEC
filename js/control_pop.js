window.addEventListener("load", (event) => {
  const el = document.getElementById("alert");
  el.classList.add("moved");
  setTimeout(function () {
    el.classList.remove("moved");
  }, 2000);
});
