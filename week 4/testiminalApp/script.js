const form = document.getElementById("testForm");
const list = document.getElementById("testimonialList");
const nameInput = document.getElementById("fullName");
const textInput = document.getElementById("testimonial");
const ratingSel = document.getElementById("rating");

// Render a single card
function addCard(name, text, rating) {
  const card = document.createElement("div");
  card.className = "test-card";

  // Build star HTML
  const stars =
    `<i class="fa-solid fa-star"></i>`.repeat(rating) +
    `<i class="fa-regular fa-star"></i>`.repeat(5 - rating);

  card.innerHTML = `
        <h3>${name}</h3>
        <p>${text}</p>
        <div class="stars">${stars}</div>
      `;
  list.prepend(card); // newest on top
}

// Handle submit
form.addEventListener("submit", (e) => {
  e.preventDefault();
  addCard(
    nameInput.value.trim(),
    textInput.value.trim(),
    Number(ratingSel.value)
  );
  form.reset();
});
