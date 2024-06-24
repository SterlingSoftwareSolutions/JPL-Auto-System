// popup view +add
document.addEventListener('DOMContentLoaded', function () {
    var popup = document.getElementById('popupForm');
    var openBtn = document.getElementById('openPopupBtn');
    var closeBtn = document.querySelector('.close');

    if (openBtn) {
        openBtn.addEventListener('click', function () {
            popup.style.display = 'flex';
            document.querySelector('.popup-content').classList.add('show');
        });
    }

    closeBtn.addEventListener('click', function () {
        document.querySelector('.popup-content').classList.remove('show');
        document.querySelector('.popup-content').classList.add('hide');
        setTimeout(function () {
            popup.style.display = 'none';
            document.querySelector('.popup-content').classList.remove('hide');
        }, 400);
    });

    window.addEventListener('click', function (event) {
        if (event.target == popup) {
            document.querySelector('.popup-content').classList.remove('show');
            document.querySelector('.popup-content').classList.add('hide');
            setTimeout(function () {
                popup.style.display = 'none';
                document.querySelector('.popup-content').classList.remove('hide');
            }, 400);
        }
    });
});

// edit function
function edit(id, categoryName, type, workout, link) {
    document.getElementById('workoutId').value = id;
    document.getElementById('workout').value = workout;
    document.getElementById('link').value = link;

    // Set the correct category option
    var categorySelect = document.getElementById('category');
    for (var i = 0; i < categorySelect.options.length; i++) {
        if (categorySelect.options[i].text === categoryName) {
            categorySelect.selectedIndex = i;
            break;
        }
    }

    // Set the correct type option
    var typeSelect = document.getElementById('type');
    for (var i = 0; i < typeSelect.options.length; i++) {
        if (typeSelect.options[i].value === type) {
            typeSelect.selectedIndex = i;
            break;
        }
    }

    var popup = document.getElementById('popupForm');

    var addButton = document.getElementById('addButton');
    var updateButton = document.getElementById('updateButton');

    addButton.hidden = true;
    updateButton.hidden = false;


    popup.style.display = 'flex';
    document.querySelector('.popup-content').classList.add('show');
}

//  close popup
function closePopup() {
    var popup = document.getElementById('popupForm');
    document.querySelector('.popup-content').classList.remove('show');
    document.querySelector('.popup-content').classList.add('hide');
    setTimeout(function () {
        popup.style.display = 'none';
        document.querySelector('.popup-content').classList.remove('hide');
    }, 400);
}

document.querySelector('.close').addEventListener('click', closePopup);


