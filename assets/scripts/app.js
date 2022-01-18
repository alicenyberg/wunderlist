console.log('Hello World');

// WUNDERLIST+ JAVASCRIPT
const button = document.querySelector('.checklist-wrapper button');
const checklistForm = document.querySelector('.checklist-form');
const addButton = document.querySelector('.checklist-form button');
const ul = document.querySelector('.checklist-form ul');
const li = document.querySelector('checklist-form li');
const checklistItems = [];

function getVal() {
  return document.querySelector('.checklist-form input').value;
}

button.addEventListener('click', () => {
  checklistForm.classList.toggle('hidden');
});

addButton.addEventListener('click', () => {
  const li = document.createElement('li');
  const content = getVal();
  console.log(content);

  li.textContent = content;

  ul.appendChild(li);
  checklistItems.push(content);
  console.log(checklistItems);
});
