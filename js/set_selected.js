function setSelected(str) {
  const ops = Array.from(document.getElementsByTagName("option"));
  const thisOp = ops.find((op) => {
    if (op.value == str) {
      return op;
    }
  });
  thisOp.setAttribute("selected", "selected");
}
