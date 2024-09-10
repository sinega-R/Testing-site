@extends('include.app')
@section('title', 'Window')
@section('content')
<div class="layout-main-content">
    <div class="container mt-5">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="mb-3 card">
                    <h5 class="p-2">Click and Confirm new Window Opens</h5>
                    <div class="card-body">
                        <button id="openWindow" class="btn btn-primary">Open New Window</button>
                    </div>
                </div>
                <div class="mb-3 card">
                    <h5 class="p-2">Find the number of opened tabs</h5>
                    <div class="card-body">
                        <button id="openMultiple" class="btn btn-warning">Open Multiple Tabs</button>
                    </div>
                </div>
                <div id="tabCount" class="mt-3"></div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="mb-3 card">
                    <h5 class="p-2">Wait for 2 new tabs to open</h5>
                    <div class="card-body">
                        <button id="openWithDelay" class="btn btn-info">Open Tabs with Delay</button>
                    </div>
                </div>
                <div class="mb-3 card">
                        <h5 class="p-2">Close all windows except Primary</h5>
    <div class="card-body">
        <button id="openTwoWindows" class="btn btn-danger"> Close All Except Primary</button>
    </div>
    </div>
    {{-- <div id="status" class="mt-3"></div>
    <div id="tabCount" class="mt-3"></div> --}}
            </div>
        </div>
    </div>

<script>
        // Array to keep track of opened windows
        var openedWindows = [];

        document.getElementById('openWindow').addEventListener('click', function() {
            var newWindow = window.open("{{ route('frames') }}", '_blank');
            if (newWindow) openedWindows.push(newWindow);
        });

        document.getElementById('openMultiple').addEventListener('click', function() {
            openMultipleWindows();
        });

        document.getElementById('openWithDelay').addEventListener('click', function() {
            openWindowsWithDelay();
        });

        function openMultipleWindows() {
            var win1 = window.open("{{ route('index') }}", '', 'toolbar=no,menubar=no,location=yes,height=450,width=450,left=1');
            var win2 = window.open("{{ route('frames') }}", '', 'toolbar=no,menubar=no,location=yes,height=450,width=450,left=455');
            var win3 = window.open("{{ route('index') }}", '', 'toolbar=yes,menubar=yes,location=no,height=600,width=450,left=910');

            if (win1) openedWindows.push(win1);
            if (win2) openedWindows.push(win2);
            if (win3) openedWindows.push(win3);
        }

        function openWindowsWithDelay() {
            var now = new Date().getTime();
            while ((now + 4000) > new Date().getTime()) {}
            var win1 = window.open("{{ route('frames') }}", '', 'toolbar=no,menubar=no,location=yes,height=450,width=900,left=1');
            var win2 = window.open("{{ route('index') }}", '', 'toolbar=yes,menubar=yes,location=no,height=600,width=450,left=910');

            if (win1) openedWindows.push(win1);
            if (win2) openedWindows.push(win2);
        }
        var openedWindows = [];
    // Function to open 2 new windows
       // Function to open 2 new windows
       function openTwoWindows() {
            var win1 = window.open("{{ route('index') }}", '', 'toolbar=no,menubar=no,location=yes,height=450,width=450,left=1');
            var win2 = window.open("{{ route('frames') }}", '', 'toolbar=no,menubar=no,location=yes,height=450,width=450,left=455');

            if (win1) openedWindows.push(win1);
            if (win2) openedWindows.push(win2);
        }

        // Button action: open two windows when "Open 2 Windows" button is clicked
        document.getElementById('openTwoWindows').addEventListener('click', function() {
    openTwoWindows();
});
</script>
@endsection
{{-- ...selected ..  --}}
