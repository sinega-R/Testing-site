@extends('include.app')
@section('title', 'Drag')
<!-- Optional: Include jQuery UI CSS for better styling -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="{{asset('css/drag.css')}}">
<style>

        .progress-value {
    height: 20px;
    width: 0;
    background-color: rgb(13, 165, 224); /* Green */
    border-radius: 4px;
    transition: width 0.5s;
    }
    .ui-widget-header{
        background: rgb(64, 173, 236) !important;
    }
</style>
@section('content')
<div class="container pb-5 mt-3">

    <div class="row">
        <div class="col-md-6">
            <div class="card p-3">
                <h4>
                    Draggable
                </h4>
                <div class="card-body p-5 ">
                    <div class="draggable-box">
                        <p style="font-weight: bold;">Drag and Drop</p> <hr>
                        <p>Drag me around!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h4>
                    Draggable
                </h4>
                <div class="card-body p-1 ">
                     <!-- Droppable Target -->
                <div id="form:drop" class="ui-panel ui-widget ui-widget-content ui-corner-all ui-droppable" style="width:150px;height:110px;border:2px solid;background:#00D986;">
                    <div id="form:drop_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all">
                        <span class="ui-panel-title">Droppable Target</span>
                    </div>
                    <div id="form:drop_content" class="ui-panel-content ui-widget-content">
                        <p class="ui-widget-header" style="margin: 0; padding: 5px;">Drop here</p>
                        <div id="form:j_idt106" style="display: none;"></div>
                    </div>
                </div>

                <!-- Draggable Box -->
                <div id="form:drag" class="ui-panel ui-widget ui-widget-content ui-corner-all ui-draggable ui-draggable-handle" style="width:90px;height:80px;border:2px solid;background:#273F52;position:relative;top:20px; margin-left:300px;">
                    <div id="form:drag_content" class="ui-panel-content ui-widget-content">
                        <p>Drag to target</p>
                        <div id="form:j_idt108" style="display: none;"></div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>


</div>


<div class="container mb-5 pb-5">
    <div class="row">
           <div class="card col-md-5 col-12 p-2 m-1 ">
               <h4>Resize Image</h4>
               <div id="image-wrapper" class="ui-wrapper" style="overflow: hidden; position: relative; width: 200px; height: auto;">
                   <img id="resizable-image" src="{{ asset('img/Magic Softwar Solution Logo.jpg')}}" alt="Resizable Image" class="shadow-1 ui-resizable" style="width: 100%; height: auto; border: 0.5px solid; background: rgb(255, 255, 255); margin: 0; display: block;">
                   <div class="ui-resizable-handle ui-resizable-e"></div>
                   <div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se"></div>
               </div>
           </div>


           <div class="card col-md-6 col-12 p-2 m-1">
               <div class="card-body">
                   <h5>Progress Bar</h5>
               <button id="startButton" class="button start-button" onclick="startProgress()">Start</button>
               <button id="cancelButton" class="button cancel-button" onclick="cancelProgress()">Cancel</button>
               <div id="progressBar" class="progress-bar">
                   <div id="progressValue" class="progress-value"></div>
                   <div id="progressLabel" class="progress-label">0%</div>
                   </div>
               </div>

       </div>
    </div>
    <div class="row">
    <div class="card p-3 mt-3 col-md-6 col-12">
       <h4 class="mb-3">Range Slider</h4>
       <div class="d-flex justify-content-between mb-2">
           <span id="displayRange">Between 30 and 100</span>
       </div>
       <div id="slider" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"  style="background-color:#c0ddd2;">
           <div class="ui-slider-range ui-corner-all ui-widget-header"  ></div>
           <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"  ></span>
           <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
       </div>
       <input id="minValue" type="hidden" name="minValue" value="30">
       <input id="maxValue" type="hidden" name="maxValue" value="100">
   </div>
</div>
</div>
<!-- Dialog for Completion -->
<div id="completionDialog" title="Progress Completed" style="display: none;">
   <p>The progress is completed. Click OK to continue.</p>
</div>

<div class="container">
    <h3>Draggable Columns</h3>
    <div class="col-12">
<div id="form:j_idt94" class="ui-datatable ui-widget ui-datatable-striped ui-datatable-sm ui-datatable-gridlines " style="border-radius: 15px; overflow: hidden; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="ui-datatable-tablewrapper" style="border-radius: 15px;">
        <table role="grid" style="width: 100%; border-collapse: collapse;">
            <thead id="form:j_idt94_head" style="background-color: #f7f7f7; border-bottom: 2px solid #ddd;">
                <tr role="row">
                    <th id="form:j_idt94:j_idt95" class="ui-state-default ui-draggable-column" role="columnheader" aria-label="Name" scope="col" style="padding: 10px; text-align: left;">
                        <span class="ui-column-title" style="color: #555; font-weight: bold;">Name</span>
                    </th>
                    <th id="form:j_idt94:j_idt99" class="ui-state-default ui-draggable-column" role="columnheader" aria-label="Quantity" scope="col" style="padding: 10px; text-align: left;">
                        <span class="ui-column-title" style="color: #555; font-weight: bold;">Quantity</span>
                    </th>
                    <th id="form:j_idt94:j_idt97" class="ui-state-default ui-draggable-column" role="columnheader" aria-label="Category" scope="col" style="padding: 10px; text-align: left;">
                        <span class="ui-column-title" style="color: #555; font-weight: bold;">Category</span>
                    </th>
                </tr>
            </thead>
            <tbody id="form:j_idt94_data" class="ui-datatable-data ui-widget-content">
                <tr data-ri="0" class="ui-widget-content ui-datatable-even" role="row" style="background-color: #fff;">
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Bamboo Watch</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">24</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Accessories</td>
                </tr>
                <tr data-ri="1" class="ui-widget-content ui-datatable-odd" role="row" style="background-color: #f9f9f9;">
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Black Watch</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">61</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Accessories</td>
                </tr>
                <tr data-ri="2" class="ui-widget-content ui-datatable-even" role="row" style="background-color: #fff;">
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Blue Band</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">2</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Fitness</td>
                </tr>
                <tr data-ri="3" class="ui-widget-content ui-datatable-odd" role="row" style="background-color: #f9f9f9;">
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Blue T-Shirt</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">25</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Clothing</td>
                </tr>
                <!-- Additional rows -->
                <tr data-ri="4" class="ui-widget-content ui-datatable-even" role="row" style="background-color: #fff;">
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Bracelet</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">73</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Accessories</td>
                </tr>
                <tr data-ri="5" class="ui-widget-content ui-datatable-odd" role="row" style="background-color: #f9f9f9;">
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Brown Purse</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">0</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Accessories</td>
                </tr>
                <tr data-ri="6" class="ui-widget-content ui-datatable-even" role="row" style="background-color: #fff;">
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Chakra Bracelet</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">5</td>
                    <td role="gridcell" style="padding: 10px; border-bottom: 1px solid #eee;">Accessories</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

<div class="container mt-4">
    <div class="w-100" style=" border-radius: 0.25rem;">
        <div id="notification" class="notification" style="display: none;"></div>


 <h3>Draggable Rows</h3>
        <div class="" style="padding: 1.5rem;border:none;">
            <div id="sortable-table" class="ui-datatable ui-widget ui-datatable-striped ui-datatable-sm ui-datatable-gridlines" style="border-radius: 0.25rem; overflow: hidden; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="ui-datatable-tablewrapper">
                    <table role="grid" style="width: 100%; border-collapse: collapse;">
                        <thead id="table-header">
                            <tr role="row">
                                <th class="ui-state-default" role="columnheader" aria-label="Name" scope="col" style="background-color: #f1f1f1; color: #333; padding: 0.75rem; text-align: left; border-bottom: 2px solid #ddd;">
                                    <span class="ui-column-title">Name</span>
                                </th>
                                <th class="ui-state-default" role="columnheader" aria-label="Category" scope="col" style="background-color: #f1f1f1; color: #333; padding: 0.75rem; text-align: left; border-bottom: 2px solid #ddd;">
                                    <span class="ui-column-title">Category</span>
                                </th>
                                <th class="ui-state-default" role="columnheader" aria-label="Quantity" scope="col" style="background-color: #f1f1f1; color: #333; padding: 0.75rem; text-align: left; border-bottom: 2px solid #ddd;">
                                    <span class="ui-column-title">Quantity</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="table-body" class="ui-datatable-data ui-widget-content" style="font-size: 0.875rem;">
                            <tr class="ui-widget-content ui-datatable-even" data-ri="0" style="background-color: #f9f9f9;">
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Bamboo Watch</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Accessories</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">24</td>
                            </tr>
                            <tr class="ui-widget-content ui-datatable-odd" data-ri="1" style="background-color: #ffffff;">
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Black Watch</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Accessories</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">61</td>
                            </tr>
                            <tr class="ui-widget-content ui-datatable-even" data-ri="2" style="background-color: #f9f9f9;">
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Galaxy Earrings</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Accessories</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">23</td>
                            </tr>
                            <tr class="ui-widget-content ui-datatable-odd" data-ri="3" style="background-color: #ffffff;">
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Blue Band</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Fitness</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">2</td>
                            </tr>
                            <tr class="ui-widget-content ui-datatable-even" data-ri="4" style="background-color: #f9f9f9;">
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Blue T-Shirt</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Clothing</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">25</td>
                            </tr>
                            <tr class="ui-widget-content ui-datatable-odd" data-ri="5" style="background-color: #ffffff;">
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Bracelet</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Accessories</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">73</td>
                            </tr>
                            <tr class="ui-widget-content ui-datatable-even" data-ri="6" style="background-color: #f9f9f9;">
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Brown Purse</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Accessories</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">0</td>
                            </tr>
                            <tr class="ui-widget-content ui-datatable-odd" data-ri="7" style="background-color: #ffffff;">
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Chakra Bracelet</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Accessories</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">5</td>
                            </tr>
                            <tr class="ui-widget-content ui-datatable-even" data-ri="8" style="background-color: #f9f9f9;">
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Game Controller</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Electronics</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">2</td>
                            </tr>
                            <tr class="ui-widget-content ui-datatable-odd" data-ri="9" style="background-color: #ffffff;">
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Gaming Set</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">Electronics</td>
                                <td role="gridcell" style="padding: 0.75rem; border-bottom: 1px solid #ddd;">63</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>






{{-- ...slider  --}}
<div class="container">

</div>



<!-- Include jQuery and jQuery UI -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
    $(function() {
        $(".draggable-box").draggable({
            containment: ".card-body" // Contain the dragging within the card body
        });
    });
</script>
<script>
    $(function() {
        // Make the draggable box draggable
        $("#form\\:drag").draggable({
            revert: "invalid", // Revert if not dropped on the target
            start: function(event, ui) {
                $(this).css("background-color", "#FFC107"); // Change color on drag start
            }
        });

        // Make the target droppable
        $("#form\\:drop").droppable({
            accept: "#form\\:drag",
            drop: function(event, ui) {
                $(this).css("background-color", "red"); // Change color on drop
                $(this).find("p").text("Dropped!"); // Show drop message
                $(ui.draggable).css("background-color", "#9E9E9E"); // Change color of dragged item after drop
            },
            over: function(event, ui) {
                $(this).css("background-color", "#81C784"); // Change color when draggable is over target
            },
            out: function(event, ui) {
                $(this).css("background-color", "#00D986"); // Revert color when draggable leaves target
            }
        });
    });
</script>
</script>

<!-- Optional: Include jQuery UI CSS for better styling -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">
<script>
    $(function () {
        var table = $("#form\\:j_idt94 table");

        // Make headers draggable
        table.find("thead th").draggable({
            helper: "clone",
            axis: "x",
            start: function (event, ui) {
                ui.helper.addClass("dragging");
                var index = $(this).index();
                $(this).data("dragIndex", index);
                table.find("tbody tr").each(function () {
                    $(this).find("td").eq(index).addClass("dragging");
                });
            },
            stop: function (event, ui) {
                $(".dragging").removeClass("dragging");
            }
        });

        // Allow headers to be droppable
        table.find("thead th").droppable({
            accept: "th.ui-draggable-column",
            drop: function (event, ui) {
                var dragIndex = ui.draggable.data("dragIndex");
                var dropIndex = $(this).index();

                // Swap columns
                swapColumns(dragIndex, dropIndex);

                // Show notification
                showNotification("Column moved from position " + (dragIndex + 1) + " to " + (dropIndex + 1) + ".");
            }
        });

        function swapColumns(dragIndex, dropIndex) {
            var rows = table.find("tr");
            rows.each(function () {
                var $row = $(this);
                var $draggedCell = $row.children().eq(dragIndex);
                var $droppedCell = $row.children().eq(dropIndex);

                if (dragIndex < dropIndex) {
                    $droppedCell.after($draggedCell);
                } else {
                    $droppedCell.before($draggedCell);
                }
            });

            // Update hidden input value (optional)
            updateColumnOrder();
        }

        function updateColumnOrder() {
            var order = [];
            table.find("thead th").each(function () {
                order.push(this.id);
            });
            $("#form\\:j_idt94_columnOrder").val(order.join(','));
        }

        function showNotification(message) {
            var notificationElement = $("#notification");
            notificationElement.text(message).fadeIn(400).delay(2000).fadeOut(400);
        }
    });

</script>
{{-- ..row  --}}
<script>

$(function() {
        $("#table-body").sortable({
            placeholder: "ui-state-highlight",
            update: function(event, ui) {
                // Get the row that was moved
                var movedRow = ui.item;
                var rowData = movedRow.children('td').map(function() {
                    return $(this).text();
                }).get();

                // Create a notification message
                var notificationMessage = 'Row moved! New position: ' + (ui.item.index() + 1) +
                    ' - Name: ' + rowData[0] + ', Category: ' + rowData[1] + ', Quantity: ' + rowData[2];

                // Show the notification
                var notificationElement = $("#notification");
                notificationElement.text(notificationMessage).fadeIn(400).delay(2000).fadeOut(400);
            }
        }).disableSelection();
    });
</script>

{{-- ..image resize..  --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageWrapper = document.getElementById('image-wrapper');
        const resizableImage = document.getElementById('resizable-image');
        const handles = imageWrapper.querySelectorAll('.ui-resizable-handle');

        let isResizing = false;
        let startX, startWidth;

        handles.forEach(handle => {
            handle.addEventListener('mousedown', function(e) {
                isResizing = true;
                startX = e.clientX;
                startWidth = parseInt(window.getComputedStyle(imageWrapper).width, 10);

                document.addEventListener('mousemove', resize);
                document.addEventListener('mouseup', stopResize);
            });
        });

        function resize(e) {
            if (!isResizing) return;

            const newWidth = startWidth + (e.clientX - startX);
            imageWrapper.style.width = `${Math.max(newWidth, 10)}px`;
        }

        function stopResize() {
            isResizing = false;
            document.removeEventListener('mousemove', resize);
            document.removeEventListener('mouseup', stopResize);
        }
    });
</script>
{{-- ..progres..  --}}
<script>
     let interval;
 let progress = 0;

 function startProgress() {
    document.getElementById('startButton').disabled = true;
    document.getElementById('cancelButton').disabled = false;

    interval = setInterval(() => {
        if (progress < 100) {
            progress += 1;
            updateProgressBar(progress);
        } else {
            clearInterval(interval);
            document.getElementById('startButton').disabled = false;
            document.getElementById('cancelButton').disabled = true;
        }
    }, 100); // Adjust the interval time as needed
 }

 function cancelProgress() {
    clearInterval(interval);
    document.getElementById('startButton').disabled = false;
    document.getElementById('cancelButton').disabled = true;
    progress = 0;
    updateProgressBar(progress);
 }

 function updateProgressBar(value) {
    document.getElementById('progressValue').style.width = value + '%';
    document.getElementById('progressLabel').textContent = value + '%';
 }

</script>
{{-- ...slider ..  --}}
<script>
  $(function() {
    $("#slider").slider({
        range: true,
        min: 1,
        max: 100,
        values: [30, 100],
        slide: function(event, ui) {
            $("#displayRange").text("Between " + ui.values[0] + " and " + ui.values[1]);
            $("#minValue").val(ui.values[0]);
            $("#maxValue").val(ui.values[1]);
        }
    });

    // Set initial display
    $("#displayRange").text("Between " + $("#slider").slider("values", 0) + " and " + $("#slider").slider("values", 1));
});

</script>


@endsection
