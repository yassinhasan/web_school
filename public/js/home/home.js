


function findNCenter() {
  var center_vertical = document.querySelector('.center-vertical');
  center_vertical.style.marginTop = (center_vertical.parentNode.offsetHeight - center_vertical.offsetHeight) / 2 + 'px';
};

// findNCenter()


function loadText() {
  let inner = document.querySelector(".inner");
  let inner_p = document.querySelectorAll(".inner p");

  var count = inner_p.length;
  console.log(count)
  var i = 1;
  setInterval(function () {
    if (i < count) {
      inner.style.transform = 'translate3d(0,-' + i + '00%,0)';
      i++;
    }
  }, 800);
}

loadText()




