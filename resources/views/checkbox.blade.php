@extends('include.app')
@section('title', 'CheckBox')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<style>
    .popup-notification {
        position: fixed;
        bottom: 500px;
        right: 20px;
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        display: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;

    }
    .notification {
        display: none;
        position: fixed;
        bottom: 300px;
        right: 10px;
        left: 200px;
        background-color: #007bff;
        color: white;
        padding: 30px;
        /* margin-top: 230px; */
       width: 200px !important;
       height: 50px !important;

         border-radius: 5px;
        display: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 2001;

        }

    .checkbox-group input[type="checkbox"] {
    margin-right: 10px;
    transform: scale(1.2);
    accent-color: #007BFF;
    padding: 3px;
    }

    .custom-checkbox-container {
        position: relative;
        display: inline-block;
    }

    .custom-checkbox-container input[type="checkbox"] {
        width: 20px;
        height: 20px;
        appearance: none;
        background-color: white;
        border: 2px solid #007bff;
        border-radius: 3px;
        position: absolute;
        cursor: pointer;
        padding: 10px;
    }

    .custom-checkbox-container input[type="checkbox"]::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 14px;
        height: 14px;
        border-radius: 3px;
        background: transparent;
    }

    .custom-checkbox-container input[type="checkbox"]:checked::before {
        content: '\2713'; /* Unicode for tick symbol */
        color: #008000;
        font-size: 22px;
        font-weight: bold;
        top: 1px;
        left: 9px;
    }

    .custom-checkbox-container input[type="checkbox"].indeterminate::before {
        content: 'x'; /* Unicode for square symbol */
        color: red;
        font-size: 22px;
        font-weight: bold;
        top: 0px;
    padding-top: 0px;
        left: 10px;
    }

    .multi-select {
            position: relative;
            display: inline-block;

        }
        .select-box {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            padding: 0.5rem;
            cursor: pointer;
            background: white;
        }
        .select-box input {
            border: none;
            outline: none;
            width: calc(100% - 20px);
        }
        .options-list {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            border: 1px solid #ced4da;
            border-top: none;
            background: white;
            z-index: 1000;
            display: none;
            max-height: 200px;
            overflow-y: auto;
        }
        .options-list label {
            display: block;
            padding:10px;
            cursor: pointer;
            align-items: center;
        }
        .options-list label:hover {
            background: #f0f0f0;
        }
        .options-list input[type="checkbox"] {
            margin-right: 0 px;
        }
        /* Styling for the search input container */
    .search-container {
        position: relative;
        width: 100%;
    }

    .search-input {
        width: 100%;
        padding-right: 30px; /* Space for the clear icon */
    }

    .clear-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 16px;
        color: #999;
    }

            .form-switch {
                cursor: pointer;
            }
            .notification-popup {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px 20px;
        border-radius: 5px;
        z-index: 1000;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }
    .selected-cities {
        display: flex;
        flex-wrap: wrap;
    }

    .selected-item {
        background-color: #e0e0e0;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin: 2px;
        padding: 5px 10px;
        display: flex;
        align-items: center;
    }

    .close-icon {
        margin-left: 5px;
        cursor: pointer;
        font-size: 12px;
        color: #f00;
    }
    input[type=radio], input[type=checkbox] {
        box-sizing: border-box;
    height: 20px;
    position: absolute;
        /* margin-top: 20px; */
    }

</style>

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-6 col-12 p-1">
            <div class="card p-1">
                <h5 class="p-1">Basic Checkbox</h5>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="basicCheckbox" >
                        <label class="form-check-label" for="basicCheckbox">
                            Basic
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 p-1">
            <div class="card p-1">
                <h5 class="p-1">Notification</h5>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="notificationCheckbox" >
                        <label class="custom-control-label" for="notificationCheckbox">Ajax</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Row 2 --}}
    <div class="row">
        <div class="col-md-6 col-12 p-1">
            <div class="card p-1">
            <h5 class="p-1">Choose Your Favorite Language(s)</h5>
            <div class="card-body">
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" name="language" value="Java">  &nbsp;&nbsp;&nbsp; Java
                </label>&nbsp;
                <label>
                    <input type="checkbox" name="language" value="Python">&nbsp;&nbsp;&nbsp;&nbsp;Python
                </label>&nbsp;
                <label>
                    <input type="checkbox" name="language" value="Javascript">&nbsp;&nbsp;&nbsp;&nbsp;Javascript
                </label>&nbsp;
                <label>
                    <input type="checkbox" name="language" value="C-Sharp">&nbsp;&nbsp;&nbsp;&nbsp;C-Sharp
                </label>&nbsp;
                <label>
                    <input type="checkbox" name="language" value="Others">&nbsp;&nbsp;&nbsp;&nbsp;Others
                </label>
            </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-12 p-1">
            <div class="card p-1">
                <h5 class="p-1">Tri-State Checkbox</h5>
                <div class="card-body">
                    <div class="custom-checkbox-container">
                        <input type="checkbox" id="triStateCheckbox">
                        <label for="triStateCheckbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tri-State Checkbox</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-12 p-1">
            <div class="card p-1">
                <h5 class="p-1">Verify if check box is disabled</h5>
                <div class="card-body">
                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox"  name="language" value="Java" disabled style="padding: 10px;"> &nbsp;&nbsp;&nbsp;&nbsp;Disabled
                        </label>

                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-6 col-12 p-1">
            <div class="card p-1">
                <h5 class="p-1"> Select Multiple</h5>
            <div class="multi-select w-100 p-1">
                <div class="select-box">
                    <div id="selectedCities" class="selected-cities p-1" readonly>
                        <!-- Selected items will be displayed here -->
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="options-list" id="optionsList">
                        <div class="search-container">
                            <input type="text" id="searchInput" class="search-input " placeholder="Search cities...">
                            <span id="clearSearch" class="clear-icon">&times;</span>
                        </div>
                        <hr>
                         <label><input type="checkbox" value="Miami" > Miami</label>
                        <label><input type="checkbox" value="London"> London</label>
                        <label><input type="checkbox" value="Paris"> Paris</label>
                        <label><input type="checkbox" value="Istanbul"> Istanbul</label>
                        <label><input type="checkbox" value="Berlin"> Berlin</label>
                        <label><input type="checkbox" value="Barcelona"> Barcelona</label>
                        <label><input type="checkbox" value="Rome"> Rome</label>
                        <label><input type="checkbox" value="Brasilia"> Brasilia</label>
                        <label><input type="checkbox" value="Amsterdam"> Amsterdam</label>
                    </div>
                </div>
            </div>
        </div>
            </div>
        <div class="col-md-6 col-12 p-1">
            <div class="card p-1">
                <h5 class="p-1">Toggle Switch</h5>
                <div class="card-body">

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="toggleSwitch">
                        <label class="form-check-label" for="toggleSwitch">Default switch checkbox input</label>
                    </div>

            </div>
        </div>
        </div>

        <div id="notification" class="alert alert-info notification" role="alert">
            <i class="fa-solid fa-circle-info"></i> &nbsp;<span id="notificationText"> Switch is Off</span>
        </div>
</div>
</div>

{{-- Popup for Tri-State Checkbox --}}
<div id="popupNotificationn" class="popup-notification">
    <span id="notificationMessage"></span>
    <span class="close" onclick="closeNotification()">&times;</span>
</div>
{{-- Popup for Basic Notification --}}
<div id="popupNotification" class="popup-notification">

    <span id="popupMessage"> <i class="fa-solid fa-circle-exclamation"></i>
        Notification enabled.</span>
</div>


<script>
 document.getElementById('toggleSwitch').addEventListener('change', function() {
    let popup = document.getElementById('notificationPopup');
    let message = document.getElementById('popupMessage');

    if (this.checked) {
        popup.style.backgroundColor = 'green';  // Color for "ON"
        message.textContent = 'Switch is ON';
    } else {
        popup.style.backgroundColor = 'red';  // Color for "OFF"
        message.textContent = 'Switch is OFF';
    }

    popup.style.display = 'block';

    setTimeout(function() {
        popup.style.display = 'none';
    }, 3000); // Hide after 3 seconds
});


</script>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
    const checkbox = document.getElementById('notificationCheckbox');
        const popupNotification = document.getElementById('popupNotification');

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                showPopup('Notifications enabled.');
            } else {
                showPopup('Notifications disabled.');
            }
        });

        function showPopup(message) {
            const popupMessage = document.getElementById('popupMessage');
    popupMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation"></i> ${message}`;
           popupNotification.style.display = 'block';
            setTimeout(() => {
                popupNotification.style.display = 'none';
            }, 3000); // Popup disappears after 3 seconds
        }
</script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const triStateCheckbox = document.getElementById('triStateCheckbox');
    const popupNotificationn = document.getElementById('popupNotificationn');
    const notificationMessage = document.getElementById('notificationMessage');
    const closeNotification = document.getElementById('closeNotification');

    let triState = 0; // 0: unchecked, 1: checked, 2: indeterminate

    // Initial state setup
    triStateCheckbox.checked = false;

    triStateCheckbox.addEventListener('click', function() {
        if (triState === 0) {
            triState = 1;
            triStateCheckbox.checked = true;
            triStateCheckbox.classList.remove('indeterminate');
            showTriPopup('State has been changed. State = 1 (Checked)');
        } else if (triState === 1) {
            triState = 2;
            triStateCheckbox.classList.add('indeterminate');
            triStateCheckbox.checked = false;
            showTriPopup('State has been changed. State = 2 (Indeterminate)');
        } else {
            triState = 0;
            triStateCheckbox.classList.remove('indeterminate');
            triStateCheckbox.checked = false;
            showTriPopup('State has been changed. State = 0 (Unchecked)');
        }
    });

    function showTriPopup(message) {
        notificationMessage.textContent = message;
        popupNotificationn.style.display = 'block';
        setTimeout(() => {
            popupNotificationn.style.display = 'none';
        }, 3000);
    }

    closeNotification.addEventListener('click', () => {
        popupNotificationn.style.display = 'none';
    });
});

</script>
{{-- ..switch..  --}}
<script>
        const toggleSwitch = document.getElementById('toggleSwitch');
        const notification = document.getElementById('notification');
        const notificationText = document.getElementById('notificationText');

        toggleSwitch.addEventListener('change', () => {
            if (toggleSwitch.checked) {
                notificationText.textContent = 'Switch is On';
                notification.classList.remove('alert-info');
                notification.classList.add('alert-success');
            } else {
                notificationText.textContent = 'Switch is Off';
                notification.classList.remove('alert-success');
                notification.classList.add('alert-info');
            }
            notification.style.display = 'block';

            // Hide notification after 3 seconds
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000); // Adjust time as needed (3000 milliseconds = 3 seconds)
        });
</script>
{{-- ..select..  --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const selectBox = document.querySelector('.select-box');
    const optionsList = document.getElementById('optionsList');
    const selectedCities = document.getElementById('selectedCities');
    const searchInput = document.getElementById('searchInput');
    const checkboxes = optionsList.querySelectorAll('input[type="checkbox"]');

    // Toggle options list visibility
    selectBox.addEventListener('click', () => {
        optionsList.style.display = optionsList.style.display === 'block' ? 'none' : 'block';
    });

    // Update selected cities with close option
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const selectedValues = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            // Clear the selected cities display
            selectedCities.innerHTML = '';

            // Create and display selected items with close icons
            selectedValues.forEach(value => {
                const span = document.createElement('span');
                span.classList.add('selected-item');
                span.innerHTML = `${value} <span class="close-icon" data-value="${value}">&times;</span>`;
                selectedCities.appendChild(span);
            });
        });
    });

    // Remove item when close icon is clicked
    selectedCities.addEventListener('click', (event) => {
        if (event.target.classList.contains('close-icon')) {
            const valueToRemove = event.target.getAttribute('data-value');

            // Uncheck the corresponding checkbox
            const checkboxToUncheck = Array.from(checkboxes).find(checkbox => checkbox.value === valueToRemove);
            if (checkboxToUncheck) {
                checkboxToUncheck.checked = false;
            }

            // Remove the item from display
            event.target.parentElement.remove();
        }
    });

  // Filter options based on search input
  searchInput.addEventListener('input', () => {
        const filter = searchInput.value.toLowerCase();
        checkboxes.forEach(checkbox => {
            const label = checkbox.parentElement;
            const text = label.textContent.toLowerCase();
            label.style.display = text.includes(filter) ? 'block' : 'none';
        });
    });

    // Clear search input when close icon is clicked
    clearSearch.addEventListener('click', () => {
        searchInput.value = '';
        searchInput.focus();
        // Trigger input event to filter options
        searchInput.dispatchEvent(new Event('input'));
    });

    // Close options list when clicking outside
    document.addEventListener('click', (event) => {
        if (!selectBox.contains(event.target)) {
            optionsList.style.display = 'none';
        }
    });

    // Prevent closing of the dropdown when clicking inside it
    optionsList.addEventListener('click', (event) => {
        event.stopPropagation();
    });
});


</script>

{{-- ..toogle..  --}}

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

@endsection
