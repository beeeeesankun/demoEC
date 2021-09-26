function toggleImg(tgt, noneEl, blockEl) {
  tgt.addEventListener("click", (event) => {
    noneEl.style.display = "none";
    blockEl.style.display = "block";
  });
}
