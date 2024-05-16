const searchInput = document.querySelector('.search-input');
const optionsContainer = document.querySelector('.options-containers');
const options = document.querySelectorAll('.option');


searchInput.addEventListener('input', function() {
  const searchText = searchInput.value.toLowerCase();

  options.forEach(option => {
    const text = option.textContent.toLowerCase();
    if (text.includes(searchText)) {
      option.style.display = 'block';
    } else {
      option.style.display = 'none';
    }
  });
});

options.forEach(option => {
  option.addEventListener('click', function() {
    searchInput.value = option.textContent;
    optionsContainer.style.display = 'none';
  });
});

document.addEventListener('click', function(e) {
  if (!optionsContainer.contains(e.target) && e.target !== searchInput) {
    optionsContainer.style.display = 'none';
  }
});

searchInput.addEventListener('click', function() {
  optionsContainer.style.display = 'block';
});

// =================================================================================

const searchsearchInput = document.querySelector('.search-search-input');
const searchoptionsContainer = document.querySelector('.search-options-container');
const searchoptions = document.querySelectorAll('.search-option');



searchsearchInput.addEventListener('input', function() {
  const searchText = searchsearchInput.value.toLowerCase();

  searchoptions.forEach(option => {
    const text = option.textContent.toLowerCase();
    if (text.includes(searchText)) {
      option.style.display = 'block';
    } else {
      option.style.display = 'none';
    }
  });
});

searchoptions.forEach(option => {
  option.addEventListener('click', function() {
    searchsearchInput.value = option.textContent;
    searchoptionsContainer.style.display = 'none';
  });
});

document.addEventListener('click', function(e) {
  if (!searchoptionsContainer.contains(e.target) && e.target !== searchsearchInput) {
    searchoptionsContainer.style.display = 'none';
  }
});

searchsearchInput.addEventListener('click', function() {
  searchoptionsContainer.style.display = 'block';
});
// ================================================================================================

const dayssearchInput = document.querySelector('.days-search-input');
const daysoptionsContainer = document.querySelector('.days-options-container');
const daysoptions = document.querySelectorAll('.days-option');



dayssearchInput.addEventListener('input', function() {
  const searchText = dayssearchInput.value.toLowerCase();

  daysoptions.forEach(option => {
    const text = option.textContent.toLowerCase();
    if (text.includes(searchText)) {
      option.style.display = 'block';
    } else {
      option.style.display = 'none';
    }
  });
});

daysoptions.forEach(option => {
  option.addEventListener('click', function() {
    dayssearchInput.value = option.textContent;
    daysoptionsContainer.style.display = 'none';
  });
});

document.addEventListener('click', function(e) {
  if (!daysoptionsContainer.contains(e.target) && e.target !== dayssearchInput) {
    daysoptionsContainer.style.display = 'none';
  }
});

dayssearchInput.addEventListener('click', function() {
  daysoptionsContainer.style.display = 'block';
});


// =======================================================================
const monthsearchInput = document.querySelector('.month-search-input');
const monthoptionsContainer = document.querySelector('.month-options-containers');
const monthoptions = document.querySelectorAll('.month-option');

monthsearchInput.addEventListener('input', function() {
  const searchText = monthsearchInput.value.toLowerCase();

  monthoptions.forEach(option => {
    const text = option.textContent.toLowerCase();
    if (text.includes(searchText)) {
      option.style.display = 'block';
    } else {
      option.style.display = 'none';
    }
  });
});

monthoptions.forEach(option => {
  option.addEventListener('click', function() {
    monthsearchInput.value = option.textContent;
    monthoptionsContainer.style.display = 'none';
  });
});

document.addEventListener('click', function(e) {
  if (!monthoptionsContainer.contains(e.target) && e.target !== monthsearchInput) {
    monthoptionsContainer.style.display = 'none';
  }
});

monthsearchInput.addEventListener('click', function() {
  monthoptionsContainer.style.display = 'block';
});
