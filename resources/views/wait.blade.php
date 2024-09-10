@extends('include.app')
@section('title','Wait')
<style>
/* Background colors for specific cards */
.bg-light-gray {
    background-color: #f8fafa; /* Light gray background color */
}

.bg-primary-color {
    background-color: #d1ecf1; /* Light blue background color */
}

/* Class to hide elements */
.hidden {
    display: none;
}

/* Add Bootstrap Toast CSS styles */
.toast-container {
        position: fixed;
        margin-top: 50px;
        top: 10px;
        right: 10px;
        z-index: 9999;
    }

    .toast {
        margin-top: 10px;
        width: 900px; /* Fixed width */
        height: auto; /* Adjust height to fit content */
        padding: 10px;
        box-sizing: border-box;
    }
    #result{
        position: fixed;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;

    }
    #sentence{
        position: fixed;
    }
</style>

@section('content')

    <div class="container mt-3 ">
        <div class="row">
            <!-- First column with two cards -->
            <div class="col-12 col-md-6">
                <!-- Card for "Wait for Visibility" section -->
                <div class="card bg-light-gray pb-3 h-50">
                    <div class="card-body ">
                        <h5 class="card-title">Wait for Visibility (1-10 Sec)</h5>
                        <button id="clickButton" class="btn-custom hidden btn btn-secondary">Click Me!</button>
                        <div id="result" class="hidden"></div>
                    </div>
                </div>

                <!-- Card for "Wait for Invisibility" section -->
                <div class="card bg-light-gray mt-2 pb-2 h-50">
                    <div class="card-body">
                        <h5 class="card-title">Wait for Invisibility (1-10 Sec)</h5>
                        <button id="hideSentenceButton" class="btn-custom btn btn-success">Click Me For Hide!</button><br>
                        <span id="sentence">This sentence will disappear after clicking the button.</span>
                    </div>
                </div>
            </div>

            <!-- Second column with two cards -->
            <div class="col-12 col-md-6 ">
                <!-- Card for "Wait for Clickability" section -->
                <div class="card bg-primary-color pt-2 pb-2 h-50">
                    <div class="card-body">
                        <h5 class="card-title">Wait for Clickability</h5>
                        <button id="showMessagesBtn" class="btn-custom btn btn-warning pt-2 pb-2 pl-5 pr-5">Click First Button</button> &nbsp; &nbsp; &nbsp;
                        <button id="anotherButton" class="btn-custom btn btn-primary">Click Second</button> <br>
                    </div>
                </div>

                <!-- Card for "Wait for Textchange" section -->
                <div class="card bg-primary-color mt-2 pt-2 pb-3 h-50">
                    <div class="card-body">
                        <h5 class="card-title">Wait for Textchange (1-10 Sec)</h5>
                        <button id="firstButton" class="btn-custom btn btn-danger pl-5 pr-5">Click!</button> &nbsp; &nbsp;&nbsp;
                        <button id="secondButton" class="btn-custom btn btn-primary pl-5 pr-5">I am going to change!</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toast container -->
        <div id="toastContainer" class="toast-container"></div>
    </div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
    const clickButton = document.getElementById('clickButton');
    if (clickButton) clickButton.classList.remove('hidden');
    }, 5000);
    });

    document.getElementById('clickButton').addEventListener('click', () => {
    const sentences = [
    "Character is power.",
    "Opportunities don't happen. You create them.",
    "In order to write about life first you must live it.",
    "A problem is a chance for you to do your best."
    ];

    const delay = Math.floor(Math.random() * 9000) + 1000;

    setTimeout(() => {
    const randomSentence = sentences[Math.floor(Math.random() * sentences.length)];
    const resultElement = document.getElementById('result');
    if (resultElement) {
    resultElement.innerText = randomSentence;
    resultElement.classList.remove('hidden');
    }
    }, delay);
    });

    document.getElementById('hideSentenceButton').addEventListener('click', () => {
    const delay = Math.floor(Math.random() * 5000) + 1000;

    setTimeout(() => {
    const sentenceElement = document.getElementById('sentence');
    if (sentenceElement) sentenceElement.classList.add('hidden');
    }, delay);
    });

    document.getElementById('showMessagesBtn').addEventListener('click', function() {
    createAndShowToasts(); // Show new toasts on each click
    });

    function createAndShowToasts() {
    const toastContainer = document.getElementById('toastContainer');
    const messages = ['Message 1', 'Message 2', 'Message 3'];

    // Clear existing toasts
    toastContainer.innerHTML = '';

    messages.forEach(message => {
    // Create toast element
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.role = 'alert';
    toast.ariaLive = 'assertive';
    toast.ariaAtomic = 'true';

    // Toast HTML with close button
    toast.innerHTML = `
    <div class="toast-header" style="background-color:skyblue;">
    <strong class="mr-auto text-dark">Notification</strong>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="toast-body text-dark" style="background-color:lightgray;">
    ${message}
    </div>
    `;

    // Append toast to container
    toastContainer.appendChild(toast);
    toast.querySelector('.close').addEventListener('click', () => {
        bsToast.hide();
        toast.remove(); // Remove the toast after hiding
    });

    // Initialize and show toast
    const bsToast = new bootstrap.Toast(toast, {
    delay: 5000,
    });
    bsToast.show();
    });

    // Automatically hide all toasts after 5 seconds (same as toast delay)
    setTimeout(() => {
    hideAllToasts();
    }, 5000);
    }

    function hideAllToasts() {
    const toasts = document.querySelectorAll('.toast');
    toasts.forEach(toast => {
    const bsToast = bootstrap.Toast.getInstance(toast);
    if (bsToast) {
    bsToast.hide();
    }
    // Remove the toast from the DOM after hiding
    toast.remove();
    });
    }

    // Handling the text change functionality
    document.getElementById('firstButton').addEventListener('click', () => {
    const secondButton = document.getElementById('secondButton');
    if (secondButton) {
    setTimeout(() => {
    secondButton.textContent = 'Text Changed!';
    }, 2000);
    }
    });

</script>
@endsection
