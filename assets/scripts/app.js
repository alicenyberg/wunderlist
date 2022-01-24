// WUNDERLIST+ JAVASCRIPT

//SHOW/HIDE CHECKLIST FORM SECTION
const button = document.querySelector('.checklist-wrapper button');
const checklistForm = document.querySelector('.checklist-form');
const addButton = document.querySelector('.checklist-form button');

button.addEventListener('click', () => {
  checklistForm.classList.toggle('hidden');
});

// UPDATE OF CHECKLIST ITEM STATUS IN DATABASE ON CHECKBOX CLICK
const checklistItems = document.querySelectorAll('.checklist-item');

checklistItems.forEach((checklistItem) => {
  const checklistForms = checklistItem.querySelectorAll('.checklist-item form');

  checklistForms.forEach((checklistForm) => {
    const checkboxes = checklistForm.querySelectorAll('input[type=checkbox]');
    checkboxes.forEach((checkbox) => {
      checkbox.addEventListener('click', () => {
        checklistForm.submit();
      });
    });
  });
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
