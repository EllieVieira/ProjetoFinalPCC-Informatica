const modal = document.querySelector('.modal-container1')
const moda2 = document.querySelector('.modal-container2')
const moda3 = document.querySelector('.modal-container3')

function openModal() {
  modal.classList.add('active')
}
function openModal2() {
  moda2.classList.add('active')
}
function openModal3() {
  moda3.classList.add('active')
}
function closeModal() {
  modal.classList.remove('active')
  moda2.classList.remove('active')
  moda3.classList.remove('active')
  moda4.classList.remove('active')
}