// WUNDERLIST+ JAVASCRIPT

//SHOW/HIDE CHECKLIST FORM SECTION
const button = document.querySelector('.checklist-wrapper button');
const checklistForm = document.querySelector('.checklist-form');
const addButton = document.querySelector('.checklist-form button');

//put this in an if-statement since I got error messages in dev tools ('Cannot read properties of null (reading 'addEventListener')').
if (button) {
  button.addEventListener('click', () => {
    checklistForm.classList.toggle('hidden');
  });
}

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
