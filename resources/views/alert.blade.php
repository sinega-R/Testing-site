@extends('include.app')
@section('title', 'Alert')
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .container {
        margin-top: 40px;
    }
    .row {
        margin-bottom: 20px;
    }
    .col-md-6 {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }
    .button-container {
        background-color: #e9ecef;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
    }
    .btn {
        margin: 5px 0;
    }
    .popup {
        display: none;
        position: fixed;
        top: 20%;
        left: 20%;
        width: 300px;
        height: 200px;
        border: 1px solid #000;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        resize: both;
        overflow: auto;
        transition: all 0.3s ease;
    }
    .popup-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: grab;
        user-select: none;
    }
    .popup-header:active {
        cursor: grabbing;
    }
    .control-btn {
        background: none;
        border: none;
        color: #fff;
        cursor: pointer;
        font-size: 14px;
        padding: 0 10px;
    }
    .popup-content {
        padding: 10px;
    }
    .popup.minimized .popup-content {
        display: none;
    }
    .message {
        margin-left: 10px;
        color: green;
        font-weight: bold;
    }
    body.fullscreen-mode {
    overflow: hidden;
 }

 .dialog {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 400px;
    padding: 20px;
    background-color: white;
    border: 1px solid #ccc;
    z-index: 1000;
    display: none;
    }

    .dialog-header {
        display: flex;
        justify-content: flex-end;

        padding-top: 0px;

    }

    .dialog-header button {
        margin-left: 5px;
    }

    .dialog-minimized {
        width: 200px;
        height: 120px;
        top: 390px;
        bottom: 70px;
        left: 340px;
        transform: none;
        padding: 30px;
    }


    .dialog-maximized {
        top: 100px;
        left: 290px;
        width: 70%;
        height: 100%;
        transform: none;
        padding: 0;
        border: none;
        /* z-index: 9999;s */
        background-color: rgba(255, 255, 255, 0.95);
    }
    @media only screen and (max-width: 767px) {
        .dialog-maximized {
            left: 100px; /* Set left to 200px only on mobile devices */
            width: calc(100% - 200px); /* Adjust width accordingly */
        }
    }
    .dialog-content{
        height: calc(100% - 40px); /* Adjust to keep space for header */
        overflow: auto;
    }

    .dialog-maximized .dialog-content {
        z-index: 10000;
        height: calc(100% - 40px); /* Adjust to keep space for header */
    }

    .dialog-maximized .dialog-header {
        position: relative;

    padding-top: 20px;
        right: 0;
        /* background-color: rgba(255, 255, 255, 0.9); */
        width: 100%;
        display: flex;
        justify-content: flex-end;
    }


</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="button-container mb-2">
                <p>Alert (Simple Dialog)</p>
                <button type="button" class="btn btn-primary" onclick="showAlert()"> <i class="fa-solid fa-arrow-up-right-from-square"></i> Show</button>
                <span id="alert-message" class="message"></span>
            </div>

            <div class="button-container mb-2">
                <p>Alert (Confirm Dialog)</p>
                <button type="button" class="btn btn-secondary" onclick="showConfirm()"><i class="fa-solid fa-arrow-up-right-from-square"></i> Show</button>
                <span id="confirm-message" class="message"></span>
            </div>

            <div class="button-container mb-2">
                <p>Sweet Alert (Simple Dialog)</p>
                <button type="button" class="btn btn-success" onclick="showSweetAlert()"><i class="fa-solid fa-arrow-up-right-from-square"></i> Show</button>
            </div>
            <div class="button-container mb-2">
                <p>Sweet Modal Dialog</p>
                <button type="button" class="btn btn-info" onclick="showSweetModal()"><i class="fa-solid fa-arrow-up-right-from-square"></i> Show</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="button-container mb-2">
                <p>Alert (Prompt Dialog)</p>
                <button type="button" class="btn btn-warning" onclick="showPrompt()"><i class="fa-solid fa-arrow-up-right-from-square"></i> Show</button>
                <span id="prompt-message" class="message"></span>
            </div>
            <div class="button-container mb-2">
                <p>Sweet Alert (Confirmation)</p>
                <button type="button" class="btn btn-danger" onclick="showSweetConfirmation()"><i class="fa-solid fa-trash"></i> Delete</button>
            </div>
            <div class="button-container mb-2">
                <p>Minimize and Maximize</p>
                <div id="customDialog" class="dialog">
                    <div class="dialog-header">
                        <h6>Min and Max</h6>
                        <button id="minimizeButton" onclick="toggleMinimize()"><i class="fas fa-window-minimize"></i></button>
                        <button id="maximizeButton" onclick="toggleMaximize()"><i class="fas fa-window-maximize"></i></button>
                        <button onclick="closeDialog()" style="background-color: red;">X</button>
                    </div>
                    <div class="dialog-content">
                        <!-- Your dialog content goes here -->
                     <p>I am Sweet Alert and can be maximized or minimized. By the way, am not a new window.</p>
                    </div>
                </div>

                <button onclick="openDialog()" style="border: 1px solid blue;color:blue;"> <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    Show</button>
                 </div>





        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    function showAlert() {
        alert("This is a simple alert!");
        document.getElementById('alert-message').textContent = "You have successfully clicked an alert!";
    }

    function showConfirm() {
        const userConfirmed = confirm("Do you want to proceed?");
        const messageElement = document.getElementById('confirm-message');
        if (userConfirmed) {
            messageElement.textContent = "User clicked OK";
            messageElement.style.color = "green";
        } else {
            messageElement.textContent = "User clicked Cancel";
            messageElement.style.color = "red";
        }
    }

    function showSweetAlert() {
        Swal.fire('This is a SweetAlert simple dialog!');
    }

    function showSweetModal() {
        Swal.fire({
            title: 'Modal Dialog',
            text: 'This is a SweetAlert modal dialog!',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel'
        });
    }

    function showPrompt() {
        const userInput = prompt("Please enter your name:");
        const messageElement = document.getElementById('prompt-message');
        if (userInput === null) {
            messageElement.textContent = "User cancelled the prompt";
            messageElement.style.color = "red";
        } else if (userInput.trim() === "") {
            messageElement.textContent = "You did not enter anything";
            messageElement.style.color = "red";
        } else {
            messageElement.textContent = `User entered name as: ${userInput}`;
            messageElement.style.color = "green";
        }
    }

    function showSweetConfirmation() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelled', 'Your file is safe :)', 'error');
            }
        });
    }
 // Improved Draggable Popup
    let isDragging = false;
    let offsetX = 0, offsetY = 0;

    const dragStart = (e) => {
        isDragging = true;
        offsetX = e.clientX - popup.getBoundingClientRect().left;
        offsetY = e.clientY - popup.getBoundingClientRect().top;
        e.preventDefault(); // Prevent default action to avoid issues with other elements
    };

    const dragMove = (e) => {
        if (isDragging) {
            popup.style.left = `${e.clientX - offsetX}px`;
            popup.style.top = `${e.clientY - offsetY}px`;
        }
    };

    const dragEnd = () => {
        isDragging = false;
    };

    document.querySelector('.popup-header').addEventListener('pointerdown', dragStart);
    document.addEventListener('pointermove', dragMove);
    document.addEventListener('pointerup', dragEnd);
</script>
<script>
    let isMinimized = false;
    let isMaximized = false;

    function openDialog() {
        const dialog = document.getElementById('customDialog');
        dialog.style.display = 'block';
        // Reset dialog state
        isMinimized = false;
        isMaximized = false;
        resetButtons();
    }

    function closeDialog() {
        const dialog = document.getElementById('customDialog');
        dialog.style.display = 'none';
        document.body.classList.remove('fullscreen-mode');
        isMaximized = false;
        isMinimized = false;
        resetButtons();
    }

    function toggleMinimize() {
        const dialog = document.getElementById('customDialog');
        const minimizeButton = document.getElementById('minimizeButton');
        const content = dialog.querySelector('.dialog-content');

        if (isMaximized) {
            toggleMaximize(); // Restore to normal state before minimizing
        }

        if (!isMinimized) {
            dialog.classList.add('dialog-minimized');
            content.style.display = 'none';
            isMinimized = true;
            minimizeButton.innerHTML = '<i class="fas fa-window-restore"></i>'; // Change button to indicate maximizing
        } else {
            dialog.classList.remove('dialog-minimized');
            content.style.display = 'block';
            isMinimized = false;
            minimizeButton.innerHTML = '<i class="fas fa-window-minimize"></i>'; // Change button back to minimize symbol
        }
    }

    function toggleMaximize() {
        const dialog = document.getElementById('customDialog');
        const minimizeButton = document.getElementById('minimizeButton');
        const maximizeButton = document.getElementById('maximizeButton');

        if (isMinimized) {
            toggleMinimize(); // Restore to normal state before maximizing
        }

        if (!isMaximized) {
            dialog.classList.add('dialog-maximized');
            document.body.classList.add('fullscreen-mode');
            isMaximized = true;
            content.style.display = 'block';
            maximizeButton.innerHTML = '<i class="fas fa-window-restore"></i>'; // Change button to indicate restoring
        } else {
            dialog.classList.remove('dialog-maximized');
            document.body.classList.remove('fullscreen-mode');
            isMaximized = false;
            maximizeButton.innerHTML = '<i class="fas fa-window-maximize"></i>'; // Change button back to maximize symbol
        }
    }

    function resetButtons() {
        const minimizeButton = document.getElementById('minimizeButton');
        const maximizeButton = document.getElementById('maximizeButton');
        minimizeButton.innerHTML = '<i class="fas fa-window-minimize"></i>';
        maximizeButton.innerHTML = '<i class="fas fa-window-maximize"></i>';
    }

    </script>
@endsection
