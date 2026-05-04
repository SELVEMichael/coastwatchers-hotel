document.addEventListener("DOMContentLoaded", () => {
  let current = 0;
  const images = document.querySelectorAll("section img");

  function showNext() {
    images[current].style.display = "none";
    current = (current + 1) % images.length;
    images[current].style.display = "block";
  }

  // Hide all except first
  images.forEach((img, i) => {
    if (i !== 0) img.style.display = "none";
  });

  setInterval(showNext, 3000);
});
