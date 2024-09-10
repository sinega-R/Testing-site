@extends('include.app')
@section('title', 'Frame')

@section('content')
<div class="container">
    <div class="row">
        <!-- Column for Iframes -->
        <div class="col-md-6 col-12">
            <!-- "Click Me (Inside frame)" Section -->
            <h5>Click Me (Inside frame)</h5>
            <div class="card p-5">
                <iframe srcdoc="
                    <html>
                        <head>
                            <script>
                                function change(){
                                    var change = document.getElementById('Click');
                                    if (change.innerHTML === 'Click Me'){
                                        change.innerHTML = 'Hurray! You Clicked Me.';
                                    } else {
                                        change.innerHTML = 'Click Me';
                                    }
                                }
                            </script>
                            <style>
                                #Click{
                            background: linear-gradient(45deg, #ff6b6b, #eb8251);
                            color: white;
                            border: none;
                            padding: 10px 20px;
                            font-size: 17px;
                            cursor: pointer;
                            font-weight: bold;
                            }

                            #Click:hover{
                                    background: linear-gradient(45deg, #f03232, #e75613);
                                }
                            </style>
                        </head>
                        <body style='margin:0; padding:20px;'>
                            <button id='Click' class='ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left ui-button-warning' onclick='change()'>
                                Click Me
                            </button>
                        </body>
                    </html>
                " frameborder="0" width="100%" height="100px" scrolling="no">
                </iframe>
            </div>
        </div>
 <div class="col-md-6 col-12">
            <!-- "How many frames in this page?" Section -->
            <h5>How many frames in this page?</h5>
            <div class="card p-5">
                <iframe srcdoc="
                    <html>
                        <head>
                            <script>

                            </script>
                            <style>
                                #Count{
                            background: linear-gradient(45deg, #87CEFA, #00BFFF); /* Sky blue gradient */
                            color: white;
                            border: none;
                            padding: 10px 20px;
                            font-size: 17px;
                            cursor: pointer;
                            font-weight: bold;

                        }

                        #Count:hover{
                            background: linear-gradient(45deg, #2495db, #1792bb); /* Sky blue gradient */
                        }
                         </style>
                        </head>
                        <body style='margin:0; padding:20px;'>
                            <button id='Count' class='ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left ui-button-warning' onclick='countFrames()'>
                                Count Frames
                            </button>
                        </body>
                    </html>
                " frameborder="0" width="100%" height="100px" scrolling="no">
                </iframe>
            </div>
        </div>

    </div>
    <div class="row pt-3">
        <div class="col-md-6 col-12">


       <!-- "Click Me (Inside Nested frame)" Section -->
<h5>Click Me (Inside Nested frame)</h5>
<div class="card p-4">
    <iframe srcdoc="
        <html>
            <head>
                <style>


                     </style>
                <script>
                    function change() {
                        var change = document.getElementById('Click');
                        if (change.innerHTML === 'Click Me'){
                            change.innerHTML = 'Hurray! You Clicked Me.';
                        } else {
                            change.innerHTML = 'Click Me';
                        }
                    }
                </script>

            </head>
            <body style='margin:0; padding:20px;'>
                <iframe srcdoc=&quot;
                    &lt;html&gt;
                        &lt;head&gt;
                            &lt;script&gt;
                                function changeNested(){
                                    var change = document.getElementById('ClickNested');
                                    if (change.innerHTML === 'Click Me'){
                                        change.innerHTML = 'Hurray! You Clicked Me.';
                                    } else {
                                        change.innerHTML = 'Click Me';
                                    }
                                }
                            &lt;/script&gt;

                        &lt;/head&gt;
                        &lt;body style='margin:0; padding:20px;'&gt;
                            &lt;button id='ClickNested' style='  background: linear-gradient(45deg, #603ff0, #836bee);  color: white;border: none;  padding: 10px 20px;  font-size: 17px;  cursor: pointer;  font-weight: bold;'   class='ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left ui-button-warning'  onclick='changeNested()'&gt;
                                Click Me
                            &lt;/button&gt;
                        &lt;/body&gt;
                    &lt;/html&gt;
                &quot; frameborder='0' width='100%' height='100px' scrolling='no'>
                </iframe>
            </body>
        </html>
    " frameborder="0" width="100%" height="150px" scrolling="no">
    </iframe>
</div>
</div>
</div>

@endsection
