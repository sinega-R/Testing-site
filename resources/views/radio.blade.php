@extends('include.app')
@section('title', 'Radio')

<!-- Add Custom CSS for Styling -->
<style>
    /* Style the radio buttons */
    .form-check-input {
        width: 24px;
        height: 24px;
        accent-color: #007bff;
    }

    .form-check-label {
        font-size: 16px;
        margin-left: 8px;
        display: inline-flex;
        align-items: center;
    }

    .form-check {
        margin-bottom: 12px;
    }


    .form-check-input:checked + .form-check-label {
        color: #007bff;
        font-weight: bold;
    }

    p {
        font-size: 20px;

    }

    /* Background colors */
    #first-column {
        background-color: #fbfdff; /* Light gray */
        padding: 15px;
        border-radius: 5px;
    }

    #second-column {
        background-color: #fbfdff; /* Lightgray */
        padding: 15px;
        border-radius: 5px;
    }

    .form-check {
        margin-bottom: 10px; /* Adjust spacing */
    }
</style>

@section('content')
    <!-- Content specific to this page -->
    <div class="container mt-4">
        <div class="row">
            <!-- First Column -->
            <div class="col-md-6" id="first-column">
                <div class="mb-3">
                    <p>Your most favorite browser</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="first-group" id="first-option1" value="option1">
                        <label class="form-check-label" for="first-option1">Chrome</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="first-group" id="first-option2" value="option2">
                        <label class="form-check-label" for="first-option2">Firefox</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="first-group" id="first-option3" value="option3">
                        <label class="form-check-label" for="first-option3">Safari</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="first-group" id="first-option4" value="option4">
                        <label class="form-check-label" for="first-option4">Edge</label>
                    </div>
                </div>
                <div class="mb-3">
                    <p>UnSelectable</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="second-group" id="second-option1" value="option1">
                        <label class="form-check-label" for="second-option1">Chennai</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="second-group" id="second-option2" value="option2">
                        <label class="form-check-label" for="second-option2">Bangalore</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="second-group" id="second-option3" value="option3">
                        <label class="form-check-label" for="second-option3">Hyderabad</label>
                    </div>
                </div>
            </div>

            <!-- Second Column -->
            <div class="col-md-6" id="second-column">
                <div class="mb-3">
                    <p>Find the default select radio button</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="third-group" id="third-option1" value="option1" checked>
                        <label class="form-check-label" for="third-option1">Chrome</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="third-group" id="third-option2" value="option2">
                        <label class="form-check-label" for="third-option2">Safari</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="third-group" id="third-option3" value="option3">
                        <label class="form-check-label" for="third-option3">Firefox</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="third-group" id="third-option4" value="option4">
                        <label class="form-check-label" for="third-option4">Edge</label>
                    </div>
                </div>
                <div class="mb-3">
                    <p>Select the age group (only if not selected)</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fourth-group" id="fourth-option1" value="option1" checked>
                        <label class="form-check-label" for="fourth-option1">1-20 Years</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fourth-group" id="fourth-option2" value="option2">
                        <label class="form-check-label" for="fourth-option2">21-40 Years</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fourth-group" id="fourth-option3" value="option3">
                        <label class="form-check-label" for="fourth-option3">41-60 Years</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fourth-group" id="fourth-option4" value="option4">
                        <label class="form-check-label" for="fourth-option4">61+ Years</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle functionality for the 'second-group' radio buttons
        document.querySelectorAll('input[type="radio"][name="second-group"]').forEach(radio => {
            radio.addEventListener('click', function(event) {
                if (this.hasAttribute('data-toggled') && this.checked) {
                    this.checked = false;
                    this.removeAttribute('data-toggled');
                } else {
                    document.querySelectorAll('input[type="radio"][name="second-group"]').forEach(r => {
                        r.checked = false;
                        r.removeAttribute('data-toggled');
                    });
                    this.checked = true;
                    this.setAttribute('data-toggled', 'true');
                }
            });
        });

        // Toggle functionality for the 'fourth-group' radio buttons
        document.querySelectorAll('input[type="radio"][name="fourth-group"]').forEach(radio => {
            radio.addEventListener('click', function(event) {
                if (this.hasAttribute('data-toggled') && this.checked) {
                    this.checked = false;
                    this.removeAttribute('data-toggled');
                } else {
                    document.querySelectorAll('input[type="radio"][name="fourth-group"]').forEach(r => {
                        r.checked = false;
                        r.removeAttribute('data-toggled');
                    });
                    this.checked = true;
                    this.setAttribute('data-toggled', 'true');
                }
            });
        });
    </script>
@endsection
