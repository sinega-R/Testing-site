
@extends('include.app')
@section('title','Dropdown')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1j2Irr1OrYj2KDhYV+HusO8CwDSfmdJd1QfW8NxAdGx4oRSttxBxXFRgFEaAq8D8" crossorigin="anonymous">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }
    .container {
        margin-top: 30px;
    }
    .form-label {
        font-size: 18px;
        color: #007bff;
    }
    .dropdown-container {
        margin-top: 20px;
    }
    .form-select,
    .form-control {
        border-radius: 0.375rem;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.125);
        width: 100%; /* Ensure full-width */
        height: 2.75rem; /* Set a consistent height */
    }
    .form-select:focus,
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }
    .typeahead-wrapper {
        position: relative;
    }
    .typeahead-wrapper .form-control {
        border-radius: 0.375rem 0 0 0.375rem;
        height: 2.75rem; /* Match height of the select dropdown */
    }
    .typeahead-wrapper .btn {
        border-radius: 0 0.375rem 0.375rem 0;
        position: absolute;
        top: 0;
        right: 0;
        z-index: 2;
        height: 100%;
    }
    .typeahead-menu {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        max-height: 200px;
        overflow-y: auto;
        border: 1px solid #ddd;
        border-top: none;
        background-color: #fff;
        display: none; /* Hide menu initially */
        z-index: 1000;
    }
    .typeahead-menu .dropdown-item {
        cursor: pointer;
        padding: 8px;
    }
    .typeahead-menu .dropdown-item:hover {
        background-color: #e9ecef;
    }
    .custom-dropdown-input {
        width: 100%;
        padding-right: 2.5rem;
        box-sizing: border-box;
    }
    .caret-wrapper {
        position: absolute;
        top: 50%;
        right: 0.5rem;
        transform: translateY(-50%);
        pointer-events: none; /* So that caret does not intercept clicks */
    }
    .custom-dropdown-caret {
        font-size: 1.25rem;
        color: #6c757d;
    }
    .custom-dropdown-list {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        z-index: 1000;
        background: white;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
        box-shadow: 0 0 0.125rem rgba(0, 0, 0, 0.075);
        display: none;
        max-height: 200px;
        overflow-y: auto;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .custom-dropdown-list button {
        border: none;
        background: transparent;
        width: 100%;
        text-align: left;
        padding: 0.375rem 0.75rem;
        cursor: pointer;
    }
    .custom-dropdown-list button:hover {
        background-color: #f8f9fa;
    }
    .custom-dropdown-list button:focus {
        outline: none;
        box-shadow: none;
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <!-- First Column -->
            <div class="col-md-6">
                <!-- Basic Dropdown -->
                <div class="dropdown-container">
                    <label for="courseDropdown" class="form-label">Select Course</label>
                    <select class="form-select" id="courseDropdown">
                        <option value="">Select Course</option>
                        <option value="course1">Java</option>
                        <option value="course2">Selenium</option>
                        <option value="course3">Python</option>
                        <option value="course4">Php</option>
                    </select>
                </div>

                <!-- State Dropdown -->
                <div class="dropdown-container">
                    <label for="stateDropdown" class="form-label">Select State</label>
                    <select class="form-select" id="stateDropdown">
                        <option value="">Select State</option>
                        <option value="tamil-nadu">Tamil Nadu</option>
                        <option value="kerala">Kerala</option>
                        <option value="karnataka">Karnataka</option>
                        <option value="andhra-pradesh">Andhra Pradesh</option>
                    </select>
                </div>

                <!-- District Dropdown -->
                <div class="dropdown-container">
                    <label for="districtDropdown" class="form-label">Select District</label>
                    <select class="form-select" id="districtDropdown">
                        <option value="">Select District</option>
                    </select>
                </div>
            </div>

            <!-- Second Column -->
            <div class="col-md-6">

                <!-- Language Dropdown -->
                <div class="dropdown-container">
                    <label for="languageDropdown" class="form-label">Select Language</label>
                    <select class="form-select" id="languageDropdown">
                        <option value="">Select Language</option>
                        <option value="tamil">Tamil</option>
                        <option value="telugu">Telugu</option>
                        <option value="malayalam">Malayalam</option>
                        <option value="hindi">Hindi</option>
                    </select>
                </div>

                <!-- Language Options Dropdown -->
                <div class="dropdown-container">
                    <label for="languageOptionsDropdown" class="form-label">Select Option</label>
                    <select class="form-select" id="languageOptionsDropdown">
                        <option value="">Select Option</option>
                    </select>
                </div>

                <!-- Custom Dropdown -->
                <div class="dropdown-container">
                    <label for="customCourseDropdown" class="form-label">Choose the Course</label>
                    <div class="input-group">
                        <input type="text" class="form-control custom-dropdown-input" id="customCourseDropdown" placeholder="Select or type a course">
                        <div class="caret-wrapper">
                            <span class="custom-dropdown-caret">&#9660;</span> <!-- Caret symbol -->
                        </div>
                    </div>
                    <div class="custom-dropdown-list" id="customDropdownList">
                        <!-- Options will be dynamically inserted here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-5AOK3/3X6fQY1ZgjG+xkF3nd3w+lFkPxYXK4GfNpZ2st5K1w6l9LsUqcbjfW0OdG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-9QmU4ZhHcZ4COUsO7iBy0tKxP2k7TVVRHGeEyygG8jwG71s8b7RIwXUrd8vJ40jX3" crossorigin="anonymous"></script>

<script>
        // Sample courses data
        const courses = [
            { value: "course1", text: "Java" },
            { value: "course2", text: "Selenium" },
            { value: "course3", text: "Python" },
            { value: "course4", text: "Php" }
        ];

        const languages = {
        'tamil': ['ஒன்று', 'இரண்டு', 'மூன்று', 'நான்கு', 'ஐந்து'], // Tamil numbers
        'telugu': ['ఒకటి', 'రెండు', 'మూడు', 'నాలుగు', 'ఐదు'], // Telugu numbers
        'malayalam': ['ഒന്ന്', 'രണ്ട്', 'മൂന്ന്', 'നാല്', 'അഞ്ച്'], // Malayalam numbers
        'hindi': ['एक', 'दो', 'तीन', 'चार', 'पांच'] // Hindi numbers
    };
        const customInput = document.getElementById('customCourseDropdown');
        const customDropdownList = document.getElementById('customDropdownList');
        const caretWrapper = document.querySelector('.caret-wrapper');

        function populateCustomDropdown() {
            customDropdownList.innerHTML = '';
            courses.forEach(course => {
                const button = document.createElement('button');
                button.textContent = course.text;
                button.className = 'dropdown-item';
                button.onclick = () => {
                    customInput.value = course.text;
                    customDropdownList.style.display = 'none';
                };
                customDropdownList.appendChild(button);
            });

            // Add an option to allow adding new items
            const newOptionButton = document.createElement('button');
            newOptionButton.textContent = 'Add new option';
            newOptionButton.className = 'dropdown-item';
            newOptionButton.onclick = () => {
                const newOption = prompt('Enter new course:');
                if (newOption) {
                    const newValue = 'course' + (courses.length + 1);
                    courses.push({ value: newValue, text: newOption });
                    populateCustomDropdown();
                }
            };
            customDropdownList.appendChild(newOptionButton);
        }

        customInput.addEventListener('focus', () => {
            customDropdownList.style.display = 'block';
        });

        customInput.addEventListener('blur', () => {
            // Hide dropdown after a short delay to allow click on dropdown items
            setTimeout(() => {
                customDropdownList.style.display = 'none';
            }, 200);
        });

        caretWrapper.addEventListener('click', () => {
            customDropdownList.style.display = customDropdownList.style.display === 'block' ? 'none' : 'block';
        });

        // Populate custom dropdown initially
        populateCustomDropdown();

        // State and District dropdowns logic
        const stateDropdown = document.getElementById('stateDropdown');
        const districtDropdown = document.getElementById('districtDropdown');

        const districtsData = {
            'tamil-nadu': [
                'Chennai', 'Coimbatore', 'Cuddalore', 'Dharmapuri', 'Dindigul', 'Erode', 'Kancheepuram', 'Kanyakumari',
                'Karur', 'Krishnagiri', 'Madurai', 'Nagapattinam', 'Namakkal', 'Perambalur', 'Pudukkottai', 'Ramanathapuram',
                'Salem', 'Sivagangai', 'Thanjavur', 'Theni', 'Thoothukudi', 'Tiruchirappalli', 'Tirunelveli', 'Tirupur',
                'Vellore', 'Viluppuram', 'Virudhunagar'
            ],
            'kerala': [
                'Alappuzha', 'Ernakulam', 'Idukki', 'Kannur', 'Kasaragod', 'Kollam', 'Kottayam', 'Kozhikode', 'Malappuram',
                'Palakkad', 'Pathanamthitta', 'Thiruvananthapuram', 'Thrissur', 'Wayanad'
            ],
            'karnataka': [
                'Bagalkot', 'Ballari', 'Bangalore Rural', 'Bangalore Urban', 'Belagavi', 'Bellary', 'Bidar', 'Chamarajanagar',
                'Chikballapur', 'Chikkamagaluru', 'Chitradurga', 'Dakshina Kannada', 'Davangere', 'Dharwad', 'Gadag',
                'Hassan', 'Haveri', 'Kodagu', 'Kolar', 'Koppal', 'Mandya', 'Mysuru', 'Raichur', 'Ramanagara', 'Shimoga',
                'Tumkur', 'Udupi', 'Uttara Kannada', 'Yadgir'
            ],
            'andhra-pradesh': [
                'Chittoor', 'East Godavari', 'Guntur', 'Krishna', 'Kurnool', 'Nellore', 'Srikakulam', 'Visakhapatnam',
                'Vizianagaram', 'West Godavari', 'YSR Kadapa'
            ]
        };

        function updateDistricts() {
            const selectedState = stateDropdown.value;
            districtDropdown.innerHTML = '<option value="">Select District</option>';

            if (selectedState) {
                const districts = districtsData[selectedState] || [];
                districts.forEach(district => {
                    const option = document.createElement('option');
                    option.value = district.toLowerCase().replace(/\s+/g, '-');
                    option.textContent = district;
                    districtDropdown.appendChild(option);
                });
            }
        }

        stateDropdown.addEventListener('change', updateDistricts);

        // Initialize district dropdown based on default or initially selected state
        updateDistricts();

        // Language dropdown logic
        const languageDropdown = document.getElementById('languageDropdown');
        const languageOptionsDropdown = document.getElementById('languageOptionsDropdown');

        function updateLanguageOptions() {
            const selectedLanguage = languageDropdown.value;
            languageOptionsDropdown.innerHTML = '<option value="">Select Option</option>';

            if (selectedLanguage) {
                const options = languages[selectedLanguage] || [];
                options.forEach(option => {
                    const optionElement = document.createElement('option');
                    optionElement.value = option.toLowerCase().replace(/\s+/g, '-');
                    optionElement.textContent = option;
                    languageOptionsDropdown.appendChild(optionElement);
                });
            }
        }

        languageDropdown.addEventListener('change', updateLanguageOptions);

        // Initialize language options dropdown based on default or initially selected language
        updateLanguageOptions();
</script>
@endsection


