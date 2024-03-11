// basket.js

let basketItems = [];

function addToBasket(menuName) {
  basketItems.push({ name: menuName});
  updateBasketDisplay();

  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'update_session.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send(`menuName=${menuName}`);
}

function updateBasketDisplay() {
  let basketElement = document.getElementById("basket");

  basketElement.innerHTML = "";

  basketItems.forEach(item => {
    let itemElement = document.createElement("div");
    itemElement.innerHTML = `
      <p class="text-black text-pretty">${item.name}</p>
      <hr class="my-2">
    `;
    basketElement.appendChild(itemElement);
  });
}
