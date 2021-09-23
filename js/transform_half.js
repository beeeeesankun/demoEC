const className = "half";

const targets = Array.from(document.getElementsByClassName(className));
function transformFullToHalf(str) {
  return str.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function (s) {
    return String.fromCharCode(s.charCodeAt(0) - 0xfee0);
  });
}

targets.forEach((tgt) => {
  tgt.addEventListener("blur", (event) => {
    const val = tgt.value;
    tgt.value = transformFullToHalf(val);
  });
});
