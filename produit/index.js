
let img = document.querySelector('img');
let option1 = document.querySelector('#option1');
let option2 = document.querySelector('#option2');
let option3 = document.querySelector('#option3');
let option4 = document.querySelector('#option4');

option1.addEventListener('click', () => {
  img.src = 'image/TerreShop/mug/04-Eau.jpg';
})

option2.addEventListener('click', () => {
  img.src = 'image/TerreShop/mug/03-Terre.jpg';
})

option3.addEventListener('click', () => {
  img.src = 'image/TerreShop/mug/01-Feu.jpg';
})

option4.addEventListener('click', () => {
  img.src = 'image/TerreShop/mug/02-Air.jpg';
})

