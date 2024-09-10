@extends('include.app')
@section('title','TextBox')
      <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 40px;
        }
        .input-container {
            margin-bottom: 20px;
        }
        .input-label {
            font-weight: bold;
        }
        .textarea-editor {
            height: 150px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }
        .btn-group {
            margin-top: 10px;
        }
        .custom-textbox {
            position: relative;
        }
        .custom-textbox input {
            width: 100%;
        }
        .custom-textbox .placeholder-text {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #6c757d;
            pointer-events: none;
            transition: all 0.2s ease-in-out;
        }
        .custom-textbox input:not(:placeholder-shown) + .placeholder-text,
        .custom-textbox input:focus + .placeholder-text {
            top: -10px;
            font-size: 12px;
            color: #007bff;
        }
        .editor-container {
            margin-top: 20px;
        }
        .column {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .custom-toolbar {
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            background: #f9f9f9;
        }
        .custom-toolbar button,
        .custom-toolbar select {
            margin-right: 10px;
        }
        .form-label {
            display: block;
            margin-bottom: 10px;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        #keyboardMessage {
            margin-top: 10px;
        }
        #sliderValue {
            margin-top: 10px;
        }
        .form-range {
            width: 100%;
        }
        .text-danger {
            color: #dc3545;
        }
        #errorMessage {
            font-size: 16px;
        }



        .editor-container {
            background-color: #fff; /* Background color for the entire editor container */
            padding: 10px; /* Optional padding for better spacing */
            border: 1px solid #ddd; /* Optional border for visual distinction */
            border-radius: 4px; /* Optional rounded corners */
        }
        #editor {
            height: 300px;
            background-color: #fff; /* Background color for the editor content area */
        }
        #toolbar {
            background-color: #f1f1f1; /* Background color for the toolbar */
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        /* New CSS for Username Text Field */
        .input-container.username-field {
            position: relative;
        }
        .input-container.username-field label {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            transition: all 0.2s ease-in-out;
            font-weight: normal;
            color: #6c757d;
            pointer-events: none;
        }
        .input-container.username-field input:focus + label,
        .input-container.username-field input:not(:placeholder-shown) + label {
            top: -10px;
            font-size: 12px;
            color: #007bff;
        }

        .section-heading{
            font-weight: 700;
            font-size:14px;
            color: #495057;
            margin-bottom: 15px;
            /* margin-left: 10px; */

        }

        .keyboard {
    display: none; /* Hidden by default */
    position: absolute;
    border: 1px solid #ccc;
    background: #f0f0f0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: auto; /* Auto width based on content */
    max-width: 500px; /* Adjusted maximum width */
    height: auto; /* Auto height based on content */
    border-radius: 8px;
    padding: 5px; /* Padding inside the keyboard */
    box-sizing: border-box; /* Include padding in width and height calculations */
    overflow: hidden; /* Hide overflow to prevent scrollbars */
    z-index: 1000; /* Ensure it's on top of other elements */
}

.keyboard .row {
    display: flex;
    flex-wrap: nowrap; /* Prevent wrapping to keep rows compact */
    margin-bottom: 2px; /* Space between rows */
}

.keyboard .row.spacebar {
    justify-content: center; /* Center spacebar in the row */
}

.keyboard button {
    flex: 1; /* Make buttons fill the row equally */
    margin: 2px; /* Space between buttons */
    padding: 8px; /* Padding inside buttons */
    border: none;
    background: #ffffff;
    color: #333;
    font-size: 12px; /* Smaller font size for a compact layout */
    border-radius: 4px; /* Rounded corners */
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); /* Small shadow */
    transition: background 0.2s, box-shadow 0.2s; /* Smooth transition */
    text-align: center;
    white-space: nowrap; /* Prevent text from wrapping */
}

.keyboard button.wide {
    flex: 2; /* Double width for the spacebar */
}

.keyboard button:hover {
    background: #e0e0e0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.keyboard button:active {
    background: #d0d0d0;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

#closeKeyboard {
    width: 100%;
    background: #ff4d4d;
    color: #ffffff;
    border: none;
    font-size: 12px; /* Smaller font size */
    padding: 8px; /* Padding inside button */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    margin-top: 5px; /* Space above the button */
    text-align: center; /* Center text */
}

#closeKeyboard:hover {
    background: #ff3333;
}

#closeKeyboard:active {
    background: #cc0000;
}


</style>

@section('content')
    <div class="container">
        <div class="row">
            <!-- First Column -->
            <div class="col-md-6">
                <!-- Text Input for Name -->
                <div class="input-container">
                    <label for="nameInput" class="form-label input-label">Type your name</label>
                    <input type="text" class="form-control" id="nameInput" placeholder="John Peter">
                </div>

                <div class="input-container">
                    <label for="nameInput2" class="form-label input-label">Type your name</label>
                    <input type="text" class="form-control" id="nameInput2" value="John Peter">
                </div>

                <!-- Disabled Text Input -->
                <div class="input-container">
                    <label for="disabledInput" class="form-label input-label">Verify if text box is disabled</label>
                    <input type="text" class="form-control" id="disabledInput" value="Disabled" disabled>
                </div>

                <!-- Clear Text Button -->
                <div class="input-container">
                    <label for="clearableInput" class="form-label input-label">Clear the typed text</label>
                    <input type="text" class="form-control" id="clearableInput" value="Can you clear me, Please?">
                </div>

                 <!-- Retrieve Text -->
                <div class="input-container">
                    <label for="RetriveInput" class="form-label input-label">Retrive Input</label>
                    <input type="text" class="form-control" id="RetriveInput" value="Retrive Input">
                </div>

                <!-- Email Input -->
                <div class="input-container">
                    <label for="emailInput" class="form-label input-label">Type email and Tab. Confirm control moved to next element</label>
                    <input type="email" class="form-control" id="emailInput" placeholder="Enter email">
                </div>

                <!-- About Yourself -->
                <div class="input-container">
                    <label for="aboutTextarea" class="form-label input-label">Type about yourself</label>
                    <textarea class="form-control" id="aboutTextarea" rows="4" placeholder="About yourself"></textarea>
                </div>

                <!-- Quill Editor -->
                <label for="aboutTextarea" class="form-label input-label">Text Editor</label>
                <div class="editor-container">
                    <div id="toolbar">
                        <span class="ql-formats">
                            <select class="ql-font">
                                <option value="sans-serif">Sans Serif</option>
                                <option value="serif">Serif</option>
                                <option value="monospace">Monospace</option>
                            </select>
                            <select class="ql-size">
                                <option value="small">Small</option>
                                <option value="medium" selected>Medium</option>
                                <option value="large">Large</option>
                                <option value="huge">Huge</option>
                            </select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-bold">Bold</button>
                            <button class="ql-italic">Italic</button>
                            <button class="ql-underline">Underline</button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-list" value="ordered">Ordered List</button>
                            <button class="ql-list" value="bullet">Bullet List</button>
                            <button class="ql-blockquote">Blockquote</button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-link">Link</button>
                            <button class="ql-image">Image</button>
                        </span>
                    </div>
                    <div id="editor">
                        <p>Start typing here...</p>
                    </div>
                </div>
            </div>

            <!-- Second Column -->
            <div class="col-md-6">
                <!-- Error Message on Enter -->
                <div class="input-container">
                    <label for="errorInput" class="form-label input-label">Just Press Enter and confirm error message*</label>
                    <input type="text" class="form-control" id="errorInput" placeholder="Press Enter">
                    <div id="errorMessage" class="text-danger mt-2" style="display: none;">It's mandatory, Please fill it! </div>
                </div>

               <!-- Username Text Field -->
               <h6 class="section-heading">Click and Confirm Label Position Changes </h6>
                <div class="input-container username-field">

                    <div class="input-wrapper">
                        <input type="text" class="form-control" id="usernameInput" placeholder=" ">
                        <label for="usernameInput" class="form-label input-label">Username</label>
                    </div>
                </div>

                {{-- <div class="dropdown-container">
                    <label for="courseDropdown" class="form-label">Select Course</label>
                    <div class="input-group">
                        <input type="text" class="form-control custom-dropdown-input" id="courseDropdown" placeholder="Select or type a course">
                        <div class="caret-wrapper">
                            <span class="custom-dropdown-caret">&#9660;</span> <!-- Caret symbol -->
                        </div>
                    </div>
                    <div class="custom-dropdown-list" id="dropdownList">
                        <!-- Options will be dynamically inserted here -->
                    </div>
                </div> --}}



                <!-- Date Picker -->
                <div class="input-container">
                    <label for="dateInput" class="form-label input-label">Type your DOB (mm/dd/yyyy) and confirm date chosen</label>
                    <input type="date" class="form-control" id="dateInput">
                </div>

                <!-- Number Spinner -->
                <div class="input-container">
                    <label for="numberInput" class="form-label input-label">Type number and spin to confirm value changed</label>
                    <input type="number" class="form-control" id="numberInput" value="0">
                </div>

                <!-- Slider -->
                <div class="input-container">
                    <label for="sliderInput" class="form-label input-label">Slider</label>
                    <input type="range" class="form-range" id="sliderInput" min="0" max="100"> <br>
                    <input type="text" class="form-control" id="textInput">
                </div>

                <!-- Keyboard Visibility Confirmation -->

                <div class="input-container">
                    <label for="sliderInput" class="form-label input-label">Click and Confirm Keyboard appears</label>
                    <input type="text" id="inputField" class="form-control" placeholder="Click here to type...">
                    <div id="keyboard" class="keyboard">
                        <div class="row">
                            <button data-key="Q">Q</button>
                            <button data-key="W">W</button>
                            <button data-key="E">E</button>
                            <button data-key="R">R</button>
                            <button data-key="T">T</button>
                            <button data-key="Y">Y</button>
                            <button data-key="U">U</button>
                            <button data-key="I">I</button>
                            <button data-key="O">O</button>
                            <button data-key="P">P</button>
                        </div>
                        <div class="row">
                            <button data-key="A">A</button>
                            <button data-key="S">S</button>
                            <button data-key="D">D</button>
                            <button data-key="F">F</button>
                            <button data-key="G">G</button>
                            <button data-key="H">H</button>
                            <button data-key="J">J</button>
                            <button data-key="K">K</button>
                            <button data-key="L">L</button>
                        </div>
                        <div class="row">
                            <button data-key="Z">Z</button>
                            <button data-key="X">X</button>
                            <button data-key="C">C</button>
                            <button data-key="V">V</button>
                            <button data-key="B">B</button>
                            <button data-key="N">N</button>
                            <button data-key="M">M</button>
                        </div>
                        <div class="row">
                            <button data-key="1">1</button>
                            <button data-key="2">2</button>
                            <button data-key="3">3</button>
                            <button data-key="4">4</button>
                            <button data-key="5">5</button>
                            <button data-key="6">6</button>
                            <button data-key="7">7</button>
                            <button data-key="8">8</button>
                            <button data-key="9">9</button>
                            <button data-key="0">0</button>
                        </div>
                        <div class="row">
                            <button data-key="!">!</button>
                            <button data-key="@">@</button>
                            <button data-key="#">#</button>
                            <button data-key="$">$</button>
                            <button data-key="%">%</button>
                            <button data-key="^">^</button>
                            <button data-key="&">&</button>
                            <button data-key="*">*</button>
                            <button data-key="(">(</button>
                            <button data-key=")">)</button>
                            <button data-key="-">-</button>
                            <button data-key="_">_</button>
                            <button data-key="=">=</button>
                            <button data-key="+">+</button>
                            <button data-key="/">/</button>
                            <button data-key="?">?</button>
                            <button data-key=".">.</button>
                            <button data-key=",">,</button>
                            <button data-key="; ?>">;</button>
                            <button data-key=":" >:</button>
                            <button data-key="'">"</button>
                            <button data-key="\"">\\</button>
                            <button id="closeKeyboard">Close</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

       <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        // Quill Editor Initialization
        var quill = new Quill('#editor', {
            modules: {
                toolbar: '#toolbar'
            },
            theme: 'snow'
        });

        // Error Message Display Function
        document.getElementById('errorInput').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent the default form submission
                document.getElementById('errorMessage').style.display = 'block'; // Show the error message
            }
        });

        // Clear Text Function
        function clearText() {
            const clearableInput = document.getElementById('clearableInput');
            clearableInput.value = '';
        }

        // Retrieve Text Function
        function RetriveText() {
            const Retriveinput = document.getElementById('RetriveInput');
            RetriveInput.value = '';
        }

        // Confirm Date Function
        function confirmDate() {
            const dateInput = document.getElementById('dateInput').value;
            alert(`Selected date: ${dateInput}`);
        }

        // Confirm Number Function
        function confirmNumber() {
            const numberInput = document.getElementById('numberInput').value;
            alert(`Selected number: ${numberInput}`);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const slider = document.getElementById('sliderInput');
            const textInput = document.getElementById('textInput');

            // Function to update values
            function updateValues() {
                const value = slider.value;
                textInput.value = value;
            }

            // Update text input and slider when the slider changes
            slider.addEventListener('input', updateValues);

            // Update slider when the text input changes
            textInput.addEventListener('input', () => {
                const value = parseInt(textInput.value, 10);
                if (!isNaN(value) && value >= 0 && value <= 100) {
                    slider.value = value;
                    updateValues();
                } else {
                    textInput.value = slider.value; // Reset text input if invalid
                }
            });

            // Initialize the values on page load
            updateValues();
        });

        document.addEventListener('DOMContentLoaded', () => {
    const keyboard = document.getElementById('keyboard');
    const inputField = document.getElementById('inputField');
    const keys = keyboard.querySelectorAll('button[data-key]');

    // Show keyboard when the input field is focused
    inputField.addEventListener('focus', () => {
        keyboard.style.display = 'block';
    });

    // Hide keyboard when the close button is clicked
    document.getElementById('closeKeyboard').addEventListener('click', () => {
        keyboard.style.display = 'none';
    });

    // Add key press functionality to the input field
    keys.forEach(key => {
        key.addEventListener('click', () => {
            inputField.value += key.dataset.key;
            inputField.focus(); // Keep focus on the input field
        });
    });

    // Hide keyboard when clicking outside
    document.addEventListener('click', (event) => {
        if (!keyboard.contains(event.target) && event.target !== inputField) {
            keyboard.style.display = 'none';
        }
    });
});


</script>


@endsection
