console.log('Hello World');

// WUNDERLIST+ JAVASCRIPT
const button = document.querySelector('.checklist-wrapper button');
const checklistForm = document.querySelector('.checklist-form');
const addButton = document.querySelector('.checklist-form button');

button.addEventListener('click', () => {
  checklistForm.classList.toggle('hidden');
});

// USELESS JAVASCRIPT
// const ul = document.querySelector('.checklist-form ul');
// const li = document.querySelector('checklist-form li');
// const saveButton = document.querySelector('.save-button');
// const checklistItems = [];

// function getVal() {
//   return document.querySelector('.checklist-form input').value;
// }
// addButton.addEventListener('click', () => {
//   const li = document.createElement('li');
//   const content = getVal();
//   console.log(content);

//   li.textContent = content;

//   ul.appendChild(li);
//   checklistItems.push(content);
//   console.log(checklistItems);
// });
// saveButton.addEventListener('click', () => {
//   console.log('hello there');
//   console.log(checklistItems);
//   const myJSON = JSON.stringify(checklistItems);
//   localStorage.setItem('taskChecklist', myJSON);
//   const writable = JSON.parse(localStorage.getItem('taskChecklist'));
//   document.body.textContent = writable;
// });
