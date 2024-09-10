@extends('include.app')
@section('title', 'Button')
<style>
    #colorButton:hover {
        background-color: yellow; /* Default color */
        color: rgb(17, 16, 16);
    }
    .hover-color {
        background-color: #45a049; /* Hover color */
        color: white;
    }
    #imageButtonContainer{
        position: absolute;
        z-index: 1000;

    }
    #imageButtonContainer .img-fluid{
    height: 130px;
    width: 100%;

    }
    .hidden {
        display: none;
    }
</style>

@section('content')
<div class="grid button-demo">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card m-1 p-1">
                <h5 class="p-1">Click and Confirm title.</h5>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" onclick="window.open('{{ route('index') }}', '_self')">Click</button>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card m-1 p-1">
                <h5 class="p-1">Confirm if the button is disabled.</h5>
                <div class="card-body">
                    <button type="button" class="btn btn-secondary" disabled>Disabled</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card m-1 p-1">
                <h5 class="p-1">Find the position of the Submit button</h5>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" onclick="window.open('{{ route('alert') }}', '_self')">
                        <span class="fa-solid fa-bookmark"></span> Submit
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card m-1 p-1">
                <h5>Find the Save button color</h5>
                <div class="card-body">
                    <button type="button" class="btn btn-secondary" >
                        <span class="fa-solid fa-floppy-disk"></span> Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card m-1 p-1">
                <h5 class="p-1">Find the height and width of this button</h5>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" onclick="window.open('/button.xhtml', '_self')">
                        <span class="fa-solid fa-bookmark"></span> Submit
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card m-1 p-1">
                <h5 class="p-1">Click Image Button and Click on any hidden button</h5>
                <div class="card-body">
                    <button id="showImageButton" type="button" class="btn btn-warning w-50 text-white" onclick="toggleImage()">
                        <span class="fa-solid fa-bookmark"></span> Image
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12 order-md-1 order-2">
            <div class="card m-1 p-1">
                <h5 class="p-1">Mouse over and confirm the color changed</h5>
                <div class="card-body">
                    <button id="colorButton" type="button" class="btn btn-success" onmouseover="changeColor()" onmouseout="changeBack()" onclick="window.open('/button.xhtml', '_self')">
                        Success
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12 order-md-2 order-1">
            <div class="card m-1 p-1">
                <h5 class="p-1">How many rounded buttons are there?</h5>
                <div class="card-body">
                    <div id="imageButtonContainer" class="hidden">
                        <button id="imageButton" type="button" class="btn btn-success" onclick="hideImage()">
                            <img src="{{ asset('img/selenium.png') }}" alt="Image Button" class="img-fluid">
                        </button>
                    </div>
                    <button class="btn btn-info">Primary</button>
                    <button class="btn btn-danger">Secondary</button>
                    <button class="btn btn-success">Success</button>
                    <button class="btn btn-warning">Info</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let isImageVisible = false;

function toggleImage() {
    const imageButtonContainer = document.getElementById('imageButtonContainer');
    if (isImageVisible) {
        imageButtonContainer.classList.add('hidden');
    } else {
        imageButtonContainer.classList.remove('hidden');
    }
    isImageVisible = !isImageVisible;
}

function hideImage() {
    document.getElementById('imageButtonContainer').classList.add('hidden');
    isImageVisible = false;
}
</script>
@endsection
