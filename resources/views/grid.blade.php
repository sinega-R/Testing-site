@extends('include.app')
@section('title', 'Grid')
<style>
    .table-hover tbody tr:hover {
        background-color: #f5f5f5;
    }
</style>
@section('content')
<div class="container mt-5">

    <h5 class="mb-4">Available columns are name,date,status and activity</h5>

    <!-- Input box and Update button -->
    <div class="mb-3">
        <input type="text" id="column-input" class="form-control" value="Name,Date,Status,Activity">
        <button class="btn btn-primary mt-2" onclick="updateTable()"><i class="fa-solid fa-arrows-rotate"></i>Update</button>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr id="table-header">
                <th data-column="Name">Name</th>
                <th data-column="Date">Date</th>
                <th data-column="Status">Status</th>
                <th data-column="Activity">Activity</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <tr>
                <td data-column="Name">Smith Ashley</td>
                <td data-column="Date">2024-08-26</td>
                <td data-column="Status">QUALIFIED</td>
                <td data-column="Activity">64</td>
            </tr>
            <tr>
                <td data-column="Name">Greenwood Aika</td>
                <td data-column="Date">2024-08-21</td>
                <td data-column="Status">RENEWAL</td>
                <td data-column="Activity">38</td>
            </tr>
            <tr>
                <td data-column="Name">Lionel David</td>
                <td data-column="Date">2024-08-13</td>
                <td data-column="Status">NEGOTIATION</td>
                <td data-column="Activity">29</td>
            </tr>
            <tr>
                <td data-column="Name">Salvatore Claire</td>
                <td data-column="Date">2024-08-05</td>
                <td data-column="Status">NEW</td>
                <td data-column="Activity">92</td>
            </tr>
            <tr>
                <td data-column="Name">Jennifer Murillo</td>
                <td data-column="Date">2024-08-17</td>
                <td data-column="Status">RENEWAL</td>
                <td data-column="Activity">70</td>
            </tr>
            <tr>
                <td data-column="Name">Mujtaba Emily</td>
                <td data-column="Date">2024-08-11</td>
                <td data-column="Status">PROPOSAL</td>
                <td data-column="Activity">24</td>
            </tr>
            <tr>
                <td data-column="Name">Morrow Leon</td>
                <td data-column="Date">2024-08-22</td>
                <td data-column="Status">PROPOSAL</td>
                <td data-column="Activity">26</td>
            </tr>
            <tr>
                <td data-column="Name">Rodrigues Jennifer</td>
                <td data-column="Date">2024-08-31</td>
                <td data-column="Status">PROPOSAL</td>
                <td data-column="Activity">42</td>
            </tr>
            <tr>
                <td data-column="Name">Faith Ivar</td>
                <td data-column="Date">2024-08-25</td>
                <td data-column="Status">NEGOTIATION</td>
                <td data-column="Activity">39</td>
            </tr>
            <tr>
                <td data-column="Name">Darci Greenwood</td>
                <td data-column="Date">2024-08-09</td>
                <td data-column="Status">UNQUALIFIED</td>
                <td data-column="Activity">66</td>
            </tr>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function updateTable() {
        // Get the input value and split it into an array of column names
        const input = document.getElementById('column-input').value;
        const columnsToShow = input.split(',').map(col => col.trim());

        // Array of all possible columns
        const allColumns = ['Name', 'Date', 'Status', 'Activity'];

        // Loop through all columns
        allColumns.forEach(column => {
            const header = document.querySelector(`#table-header th[data-column="${column}"]`);
            const cells = document.querySelectorAll(`#table-body td[data-column="${column}"]`);

            // Show or hide columns based on input
            if (columnsToShow.includes(column)) {
                header.style.display = '';
                cells.forEach(cell => cell.style.display = '');
            } else {
                header.style.display = 'none';
                cells.forEach(cell => cell.style.display = 'none');
            }
        });
    }
</script>
@endsection
