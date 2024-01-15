let styleElement = document.createElement('style');
styleElement.innerHTML = `
    /* Add styling for the buttons */
    .soul-button {
        display: block;
        padding: 8px 12px;
        font-size: 14px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        cursor: pointer;
        margin-top: 10px;
        margin-right: 10px;
    }

    .soul-button:hover {
        background-color: #45a049;
    }

    /* Add styling for the dropdown */
    .dropdown {
        display: inline-block;
    }

    .dropdown select {
        padding: 8px 12px;
        font-size: 14px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        cursor: pointer;
        margin-top: 10px;
        margin-right: 10px;
        width: 125px;
    }

    .dropdown select:hover {
        background-color: #45a049;
    }
`;
document.head.appendChild(styleElement);

let transparencyStates = [];

function toggleTransparency(element, soulNumber) {
    let currentOpacity = parseFloat(element.style.opacity) || 1;
    element.style.opacity = currentOpacity === 1 ? '0.3' : '1';

    transparencyStates[soulNumber - 1] = currentOpacity !== 1;
}

function highlightSoulImage(soulNumber) {
    let allSoulImages = document.querySelectorAll('.fairysoul');

    allSoulImages.forEach(function(element) {
        element.style.boxShadow = 'none';
    });

    let soulImage = document.querySelector('.soul-' + soulNumber);
    soulImage.style.boxShadow = '0 0 0 2px red';

    setTimeout(function() {
        soulImage.style.boxShadow = 'none';
    }, 7000);
}

function loadButtons() {
    let fairysoulElements = document.querySelectorAll('.fairysoul');
    let numberOfSoulImages = fairysoulElements.length;

    transparencyStates = new Array(numberOfSoulImages).fill(false); // Initialize with all elements as false

    let buttonsContainer = document.getElementById('buttons-container');

    let dropdown = document.createElement('div');
    dropdown.className = 'dropdown';

    let select = document.createElement('select');

    for (let i = 1; i <= numberOfSoulImages; i++) {
        let option = document.createElement('option');
        option.textContent = 'Fairy Soul ' + i;

        option.value = i;
        select.appendChild(option);
    }

    select.addEventListener('change', function () {
        let selectedValue = parseInt(select.value);
        if (!isNaN(selectedValue)) {
            highlightSoulImage(selectedValue);

            let soulImage = document.querySelector('.soul-' + selectedValue);
            let isTransparent = parseFloat(soulImage.style.opacity) === 0.3;

            transparencyStates[selectedValue - 1] = isTransparent; // Update transparency state
        }
    });

    dropdown.appendChild(select);
    buttonsContainer.appendChild(dropdown);
}

loadButtons();
