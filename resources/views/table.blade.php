@extends('include.app')
@section('title', 'Table')

@section('content')
<style>
    /* Table styles */
    #dataTable {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    #dataTable th, #dataTable td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    #dataTable th {
        background-color: #f4f4f4;
        color: #333;
    }

    #dataTable tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    #dataTable tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Sort button styles */
    #dataTable th button {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 0.9rem;
        color: #007bff;
    }

    #dataTable th button:hover {
        color: #0056b3;
    }

    /* Progress bar styles */
    .progress {
        /* background-color: #e9ecef; */
        border-radius: 5px;
        height: 10px;
        overflow: hidden;
    }

    .progress-bar {
        background-color: #1e90ee;
        height: 100%;
        width: 0;
        transition: width 0.4s;
    }

    /* Flag icon styles */
    .flag {
        display: inline-block;
        width: 30px;
        height: 20px;
        background-size: cover;
        vertical-align: middle;
        margin-right: 0.5rem;
    }

    /* Badge styles */
    .customer-badge {
        display: inline-block;
        padding: 0.2rem 0.6rem;
        font-size: 0.8rem;
        color: #fff;
        border-radius: 0.2rem;
    }

    .status-negotiation { background-color: #f39c12; }
    .status-qualified { background-color: #2ecc71; }
    .status-proposal { background-color: #3498db; }
    .status-renewal { background-color: #e74c3c; }
    .status-unqualified { background-color: #95a5a6; }

    .ui-datatable-scrollable-body {
        max-height: 500px;
        overflow-y: auto;
    }

    .ui-progressbar {
        height: 0.5rem;
        margin: 0.5rem 0;
    }
     /* Pagination styles */
     .pagination {
        display: flex;
        justify-content: center;
        margin: 20px 0;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination a {
        text-decoration: none;
        background-color: #1b79d6;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        display: inline-block;
        cursor: pointer;
    }

    .pagination a:hover {
        background-color: #5587bd;
    }

    .pagination .disabled {
        background-color: #c8d1d8;
        cursor: not-allowed;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.7/css/flag-icon.min.css">



<table id="dataTable">

    <thead>
        <tr class="collapsible">
            <th colspan="6">
                Customer Analytics Table
 &nbsp;&nbsp;
           <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Search...">
            </th> <!-- Make sure colspan matches the number of columns -->

        </tr>
        <tr>
            <th>Name
                <button onclick="sortTable(0, 'asc')"><i class="fa-solid fa-arrow-up"></i></button>
                <button onclick="sortTable(0, 'desc')"><i class="fa-solid fa-arrow-down"></i></button>
            </th>
            <th>Country
                <button onclick="sortTable(1, 'asc')"><i class="fa-solid fa-arrow-up"></i></button>
                <button onclick="sortTable(1, 'desc')"><i class="fa-solid fa-arrow-down"></i></button>
            </th>
            <th>Representative
                <button onclick="sortTable(2, 'asc')"><i class="fa-solid fa-arrow-up"></i></button>
                <button onclick="sortTable(2, 'desc')"><i class="fa-solid fa-arrow-down"></i></button>
            </th>
            <th>Join Date
                <button onclick="sortTable(3, 'asc')"><i class="fa-solid fa-arrow-up"></i></button>
                <button onclick="sortTable(3, 'desc')"><i class="fa-solid fa-arrow-down"></i></button>
            </th>
            <th>Status
                <button onclick="sortTable(4, 'asc')"><i class="fa-solid fa-arrow-up"></i></button>
                <button onclick="sortTable(4, 'desc')"><i class="fa-solid fa-arrow-down"></i></button>
            </th>
            <th>Activity
                <button onclick="sortTable(5, 'asc')"><i class="fa-solid fa-arrow-up"></i></button>
                <button onclick="sortTable(5, 'desc')"><i class="fa-solid fa-arrow-down"></i></button>
            </th>
        </tr>
    </thead>
 <tbody  id="tableBody">
    <tr>
    <td>John Doe</td>
    <td><img src="{{ asset('img/india.png')}}" style="width:20px;"> USA </td>
    <td>Jane Smith</td>
    <td>2023-01-15</td>
    <td><span class="customer-badge status-qualified">NEW</span></td>
    <td>
        <div class="progress">
            <div class="progress-bar" style="width: 70%;"></div>
        </div>
    </td>
    </tr>
    <!-- Add more rows as needed -->
    <tr>
    <td>Onyama Limba</td>
    <td><img src="{{ asset('img/argentina.png')}}" style="width:20px;"> Argentina </td>
    <td><img src="{{ asset('img/onyamalimba.png.png')}}" style="width: 30px;border-radies:50%;">  Onyama Limba</td>
    <td>2024-08-22</td>
    <td><span class="customer-badge status-qualified bg-danger">NEGOTITAION</span></td>
    <td>
        <div class="progress">
            <div class="progress-bar" style="width: 30%;"></div>
        </div>
    </td>
    </tr>
    {{-- ..2  --}}
    <tr>
    <td>Nicolas Ashley</td>
    <td><img src="{{ asset('img/australia.png')}}" style="width:20px;"> Australia</td>
    <td><img src="{{ asset('img/xuxuefeng.png.png')}}" style="width: 30px;border-radies:50%;">  Onyama Limba</td>
    <td>2024-08-22</td>
    <td><span class="customer-badge status-qualified bg-warning">    UNQUALIFIED</span></td>
    <td>
        <div class="progress">
            <div class="progress-bar" style="width: 40%;"></div>
        </div>
    </td>
    </tr>
    {{-- ...3 ..  --}}

    <tr>
    <td>Munro Misaki</td>
    <td><img src="{{ asset('img/russia.png')}}" style="width:20px;"> Russia</td>
    <td><img src="{{ asset('img/asiyajavayant.png.png')}}" style="width: 30px;border-radies:50%;">  Asiya Javayant</td>
    <td>2024-08-21</td>
    <td><span class="customer-badge status-qualified bg-primary"> New</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 80%;"></div>
    </div>
    </td>
    </tr>
    {{-- .. 4 --}}

    <tr>
    <td>Kadeem Kaitlin</td>
    <td><img src="{{ asset('img/australia.png')}}" style="width:20px;">Australia</td>
    <td><img src="{{ asset('img/asiyajavayant.png.png')}}" style="width: 30px;border-radies:50%;">  Asiya Javayant</td>
    <td>2024-08-04</td>
    <td><span class="customer-badge status-qualified bg-success"> PROPOSAL</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 100%;"></div>
    </div>
    </td>
    </tr>
    {{-- ..5.  --}}
    <tr>
    <td>Isabel Faith</td>
    <td><img src="{{ asset('img/australia.png')}}" style="width:20px;"> Spain</td>
    <td><img src="{{ asset('img/annafali.png.png')}}" style="width: 30px;border-radies:50%;"> Anna Fali</td>
    <td>2024-08-02</td>
    <td><span class="customer-badge status-qualified bg-danger"> PROPOSAL</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 10%;"></div>
    </div>
    </td>
    </tr>
    {{-- ..6.  --}}
    <tr>
    <td>Salvatore Juan</td>
    <td><img src="{{ asset('img/india.png')}}" style="width:20px;"> India</td>
    <td><img src="{{ asset('img/stephenshaw.png.png')}}" style="width: 30px;border-radies:50%;"> Stephen Shaw</td>
    <td>2024-08-08</td>
    <td><span class="customer-badge status-qualified bg-primary"> UNQUALIFIED</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 40%;"></div>
    </div>
    </td>
    </tr>
    {{-- ..7..  --}}
    <tr>
    <td>Marorow Silvio </td>
    <td><img src="{{ asset('img/france.png')}}" style="width:20px;"> France</td>
    <td><img src="{{ asset('img/asiyajavayant.png.png')}}" style="width: 30px;border-radies:50%;"> Stephen Shaw</td>
    <td>2024-08-08</td>
    <td><span class="customer-badge status-qualified bg-warning"> RENEWAL</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 40%;"></div>
    </div>
    </td>
    </tr>
    <tr>
        <td>John Doe</td>
        <td><img src="{{ asset('img/india.png')}}" style="width:20px;"> USA </td>
        <td>Jane Smith</td>
        <td>2023-01-15</td>
        <td><span class="customer-badge status-qualified">NEW</span></td>
        <td>
            <div class="progress">
                <div class="progress-bar" style="width: 70%;"></div>
            </div>
        </td>
        </tr>
        <!-- Add more rows as needed -->
        <tr>
        <td>Onyama Limba</td>
        <td><img src="{{ asset('img/argentina.png')}}" style="width:20px;"> Argentina </td>
        <td><img src="{{ asset('img/onyamalimba.png.png')}}" style="width: 30px;border-radies:50%;">  Onyama Limba</td>
        <td>2024-08-22</td>
        <td><span class="customer-badge status-qualified bg-danger">NEGOTITAION</span></td>
        <td>
            <div class="progress">
                <div class="progress-bar" style="width: 30%;"></div>
            </div>
        </td>
        </tr>
        {{-- ..2  --}}
        <tr>
        <td>Nicolas Ashley</td>
        <td><img src="{{ asset('img/australia.png')}}" style="width:20px;"> Australia</td>
        <td><img src="{{ asset('img/xuxuefeng.png.png')}}" style="width: 30px;border-radies:50%;">  Onyama Limba</td>
        <td>2024-08-22</td>
        <td><span class="customer-badge status-qualified bg-warning">    UNQUALIFIED</span></td>
        <td>
            <div class="progress">
                <div class="progress-bar" style="width: 40%;"></div>
            </div>
        </td>
        </tr>
        {{-- ...3 ..  --}}

        <tr>
        <td>Munro Misaki</td>
        <td><img src="{{ asset('img/russia.png')}}" style="width:20px;"> Russia</td>
        <td><img src="{{ asset('img/asiyajavayant.png.png')}}" style="width: 30px;border-radies:50%;">  Asiya Javayant</td>
        <td>2024-08-21</td>
        <td><span class="customer-badge status-qualified bg-primary"> New</span></td>
        <td>
        <div class="progress">
        <div class="progress-bar" style="width: 80%;"></div>
        </div>
        </td>
        </tr>
        {{-- .. 4 --}}

        <tr>
        <td>Kadeem Kaitlin</td>
        <td><img src="{{ asset('img/australia.png')}}" style="width:20px;">Australia</td>
        <td><img src="{{ asset('img/asiyajavayant.png.png')}}" style="width: 30px;border-radies:50%;">  Asiya Javayant</td>
        <td>2024-08-04</td>
        <td><span class="customer-badge status-qualified bg-success"> PROPOSAL</span></td>
        <td>
        <div class="progress">
        <div class="progress-bar" style="width: 100%;"></div>
        </div>
        </td>
        </tr>
        {{-- ..5.  --}}
        <tr>
        <td>Isabel Faith</td>
        <td><img src="{{ asset('img/australia.png')}}" style="width:20px;"> Spain</td>
        <td><img src="{{ asset('img/annafali.png.png')}}" style="width: 30px;border-radies:50%;"> Anna Fali</td>
        <td>2024-08-02</td>
        <td><span class="customer-badge status-qualified bg-danger"> PROPOSAL</span></td>
        <td>
        <div class="progress">
        <div class="progress-bar" style="width: 10%;"></div>
        </div>
        </td>
        </tr>
        {{-- ..6.  --}}
        <tr>
        <td>Salvatore Juan</td>
        <td><img src="{{ asset('img/india.png')}}" style="width:20px;"> India</td>
        <td><img src="{{ asset('img/stephenshaw.png.png')}}" style="width: 30px;border-radies:50%;"> Stephen Shaw</td>
        <td>2024-08-08</td>
        <td><span class="customer-badge status-qualified bg-primary"> UNQUALIFIED</span></td>
        <td>
        <div class="progress">
        <div class="progress-bar" style="width: 40%;"></div>
        </div>
        </td>
        </tr>
        {{-- ..7..  --}}
        <tr>
        <td>Marorow Silvio </td>
        <td><img src="{{ asset('img/france.png')}}" style="width:20px;"> France</td>
        <td><img src="{{ asset('img/asiyajavayant.png.png')}}" style="width: 30px;border-radies:50%;"> Stephen Shaw</td>
        <td>2024-08-08</td>
        <td><span class="customer-badge status-qualified bg-warning"> RENEWAL</span></td>
        <td>
        <div class="progress">
        <div class="progress-bar" style="width: 40%;"></div>
        </div>
        </td>
        </tr>
    <tr>
    <td>John Doe</td>
    <td><img src="{{ asset('img/india.png')}}" style="width:20px;"> USA </td>
    <td>Jane Smith</td>
    <td>2023-01-15</td>
    <td><span class="customer-badge status-qualified">NEW</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 70%;"></div>
    </div>
    </td>
    </tr>
    <!-- Add more rows as needed -->
    <tr>
    <td>Onyama Limba</td>
    <td><img src="{{ asset('img/argentina.png')}}" style="width:20px;"> Argentina </td>
    <td><img src="{{ asset('img/onyamalimba.png.png')}}" style="width: 30px;border-radies:50%;">  Onyama Limba</td>
    <td>2024-08-22</td>
    <td><span class="customer-badge status-qualified bg-danger">NEGOTITAION</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 30%;"></div>
    </div>
    </td>
    </tr>
    {{-- ..2  --}}
    <tr>
    <td>Nicolas Ashley</td>
    <td><img src="{{ asset('img/australia.png')}}" style="width:20px;"> Australia</td>
    <td><img src="{{ asset('img/xuxuefeng.png.png')}}" style="width: 30px;border-radies:50%;">  Onyama Limba</td>
    <td>2024-08-22</td>
    <td><span class="customer-badge status-qualified bg-warning">    UNQUALIFIED</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 40%;"></div>
    </div>
    </td>
    </tr>
    {{-- ...3 ..  --}}

    <tr>
    <td>Munro Misaki</td>
    <td><img src="{{ asset('img/russia.png')}}" style="width:20px;"> Russia</td>
    <td><img src="{{ asset('img/asiyajavayant.png.png')}}" style="width: 30px;border-radies:50%;">  Asiya Javayant</td>
    <td>2024-08-21</td>
    <td><span class="customer-badge status-qualified bg-primary"> New</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 80%;"></div>
    </div>
    </td>
    </tr>
    {{-- .. 4 --}}

    <tr>
    <td>Kadeem Kaitlin</td>
    <td><img src="{{ asset('img/australia.png')}}" style="width:20px;">Australia</td>
    <td><img src="{{ asset('img/asiyajavayant.png.png')}}" style="width: 30px;border-radies:50%;">  Asiya Javayant</td>
    <td>2024-08-04</td>
    <td><span class="customer-badge status-qualified bg-success"> PROPOSAL</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 100%;"></div>
    </div>
    </td>
    </tr>
    {{-- ..5.  --}}
    <tr>
    <td>Isabel Faith</td>
    <td><img src="{{ asset('img/australia.png')}}" style="width:20px;"> Spain</td>
    <td><img src="{{ asset('img/annafali.png.png')}}" style="width: 30px;border-radies:50%;"> Anna Fali</td>
    <td>2024-08-02</td>
    <td><span class="customer-badge status-qualified bg-danger"> PROPOSAL</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 10%;"></div>
    </div>
    </td>
    </tr>
    {{-- ..6.  --}}
    <tr>
    <td>Salvatore Juan</td>
    <td><img src="{{ asset('img/india.png')}}" style="width:20px;"> India</td>
    <td><img src="{{ asset('img/stephenshaw.png.png')}}" style="width: 30px;border-radies:50%;"> Stephen Shaw</td>
    <td>2024-08-08</td>
    <td><span class="customer-badge status-qualified bg-primary"> UNQUALIFIED</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 40%;"></div>
    </div>
    </td>
    </tr>
    {{-- ..7..  --}}
    <tr>
    <td>Marorow Silvio </td>
    <td><img src="{{ asset('img/france.png')}}" style="width:20px;"> France</td>
    <td><img src="{{ asset('img/asiyajavayant.png.png')}}" style="width: 30px;border-radies:50%;"> Stephen Shaw</td>
    <td>2024-08-08</td>
    <td><span class="customer-badge status-qualified bg-warning"> RENEWAL</span></td>
    <td>
    <div class="progress">
    <div class="progress-bar" style="width: 40%;"></div>
    </div>
    </td>
    </tr>

</tbody>

</table>

<ul class="pagination">
    <li><a id="firstPage" onclick="changePage(1)"><<</a></li>
    <li><a id="prevPage" onclick="changePage(-1)"><</a></li>
    <!-- Page numbers will be injected by JavaScript -->
    <li><a id="nextPage" onclick="changePage(1)">></a></li>
    <li><a id="lastPage" onclick="changePage('last')">>></a></li>
</ul>
<script>
    const rowsPerPage = 6; // Number of rows per page
    const tableData = [
        ['John Doe', '<img src="{{ asset('img/india.png') }}" style="width:20px;"> USA',   '<img src="{{ asset('img/xuxuefeng.png.png') }}" style="width: 30px; border-radius: 50%;">Jane Smith', '2023-01-15', '<span class="customer-badge status-qualified">NEW</span>', '<div class="progress"><div class="progress-bar" style="width: 70%;"></div></div>'],
        ['Onyama Limba', '<img src="{{ asset('img/argentina.png') }}" style="width:20px;"> Argentina', '<img src="{{ asset('img/onyamalimba.png.png') }}" style="width: 30px; border-radius: 50%;"> Onyama Limba', '2024-08-22', '<span class="customer-badge status-qualified bg-danger">NEGOTIATION</span>', '<div class="progress"><div class="progress-bar" style="width: 30%;"></div></div>'],
        ['Nicolas Ashley', '<img src="{{ asset('img/australia.png') }}" style="width:20px;"> Australia', '<img src="{{ asset('img/xuxuefeng.png.png') }}" style="width: 30px; border-radius: 50%;"> Nicolas Ashley', '2024-08-22', '<span class="customer-badge status-qualified bg-warning">UNQUALIFIED</span>', '<div class="progress"><div class="progress-bar" style="width: 40%;"></div></div>'],
        ['Munro Misaki', '<img src="{{ asset('img/russia.png') }}" style="width:20px;"> Russia', '<img src="{{ asset('img/asiyajavayant.png.png') }}" style="width: 30px; border-radius: 50%;"> Asiya Javayant', '2024-08-21', '<span class="customer-badge status-qualified bg-primary">NEW</span>', '<div class="progress"><div class="progress-bar" style="width: 80%;"></div></div>'],
        ['Kadeem Kaitlin', '<img src="{{ asset('img/australia.png') }}" style="width:20px;"> Australia', '<img src="{{ asset('img/asiyajavayant.png.png') }}" style="width: 30px; border-radius: 50%;"> Asiya Javayant', '2024-08-04', '<span class="customer-badge status-qualified bg-success">PROPOSAL</span>', '<div class="progress"><div class="progress-bar" style="width: 100%;"></div></div>'],
        ['Isabel Faith', '<img src="{{ asset('img/australia.png') }}" style="width:20px;"> Spain', '<img src="{{ asset('img/annafali.png.png') }}" style="width: 30px; border-radius: 50%;"> Anna Fali', '2024-08-02', '<span class="customer-badge status-qualified bg-danger">PROPOSAL</span>', '<div class="progress"><div class="progress-bar" style="width: 10%;"></div></div>'],
        ['Salvatore Juan', '<img src="{{ asset('img/india.png') }}" style="width:20px;"> India', '<img src="{{ asset('img/stephenshaw.png.png') }}" style="width: 30px; border-radius: 50%;"> Stephen Shaw', '2024-08-08', '<span class="customer-badge status-qualified bg-primary">UNQUALIFIED</span>', '<div class="progress"><div class="progress-bar" style="width: 40%;"></div></div>'],
        ['Marorow Silvio', '<img src="{{ asset('img/france.png') }}" style="width:20px;"> France', '<img src="{{ asset('img/asiyajavayant.png.png') }}" style="width: 30px; border-radius: 50%;"> Stephen Shaw', '2024-08-08', '<span class="customer-badge status-qualified bg-warning">RENEWAL</span>', '<div class="progress"><div class="progress-bar" style="width: 40%;"></div></div>'],
        ['John Doee', '<img src="{{ asset('img/india.png') }}" style="width:20px;"> USA', '<img src="{{ asset('img/xuxuefeng.png.png') }}" style="width: 30px; border-radius: 50%;">Jane Smith', '2023-01-15', '<span class="customer-badge status-qualified">NEW</span>', '<div class="progress"><div class="progress-bar" style="width: 70%;"></div></div>'],
        ['Onyama Limbaa', '<img src="{{ asset('img/argentina.png') }}" style="width:20px;"> Argentina', '<img src="{{ asset('img/onyamalimba.png.png') }}" style="width: 30px; border-radius: 50%;"> Onyama Limba', '2024-08-22', '<span class="customer-badge status-qualified bg-danger">NEGOTIATION</span>', '<div class="progress"><div class="progress-bar" style="width: 30%;"></div></div>'],
        ['Nicolas Ashleyy', '<img src="{{ asset('img/australia.png') }}" style="width:20px;"> Australia', '<img src="{{ asset('img/xuxuefeng.png.png') }}" style="width: 30px; border-radius: 50%;"> Nicolas Ashley', '2024-08-22', '<span class="customer-badge status-qualified bg-warning">UNQUALIFIED</span>', '<div class="progress"><div class="progress-bar" style="width: 40%;"></div></div>'],
        ['Munro Misakii', '<img src="{{ asset('img/russia.png') }}" style="width:20px;"> Russia', '<img src="{{ asset('img/asiyajavayant.png.png') }}" style="width: 30px; border-radius: 50%;"> Asiya Javayant', '2024-08-21', '<span class="customer-badge status-qualified bg-primary">NEW</span>', '<div class="progress"><div class="progress-bar" style="width: 80%;"></div></div>'],
        ['Kadeem Kaitlinn', '<img src="{{ asset('img/australia.png') }}" style="width:20px;"> Australia', '<img src="{{ asset('img/asiyajavayant.png.png') }}" style="width: 30px; border-radius: 50%;"> Asiya Javayant', '2024-08-04', '<span class="customer-badge status-qualified bg-success">PROPOSAL</span>', '<div class="progress"><div class="progress-bar" style="width: 100%;"></div></div>'],
        ['Isabel Faithh', '<img src="{{ asset('img/australia.png') }}" style="width:20px;"> Spain', '<img src="{{ asset('img/annafali.png.png') }}" style="width: 30px; border-radius: 50%;"> Anna Fali', '2024-08-02', '<span class="customer-badge status-qualified bg-danger">PROPOSAL</span>', '<div class="progress"><div class="progress-bar" style="width: 10%;"></div></div>'],
        ['Salvatore Juann', '<img src="{{ asset('img/india.png') }}" style="width:20px;"> India', '<img src="{{ asset('img/stephenshaw.png.png') }}" style="width: 30px; border-radius: 50%;"> Stephen Shaw', '2024-08-08', '<span class="customer-badge status-qualified bg-primary">UNQUALIFIED</span>', '<div class="progress"><div class="progress-bar" style="width: 40%;"></div></div>'],
        ['Marorow Silvioo', '<img src="{{ asset('img/france.png') }}" style="width:20px;"> France', '<img src="{{ asset('img/asiyajavayant.png.png') }}" style="width: 30px; border-radius: 50%;"> Stephen Shaw', '2024-08-08', '<span class="customer-badge status-qualified bg-warning">RENEWAL</span>', '<div class="progress"><div class="progress-bar" style="width: 40%;"></div></div>'],
        ['Onyama Limbaj', '<img src="{{ asset('img/argentina.png') }}" style="width:20px;"> Argentina', '<img src="{{ asset('img/onyamalimba.png.png') }}" style="width: 30px; border-radius: 50%;"> Onyama Limba', '2024-08-22', '<span class="customer-badge status-qualified bg-danger">NEGOTIATION</span>', '<div class="progress"><div class="progress-bar" style="width: 30%;"></div></div>'],
        ['Nicolas Ashleya', '<img src="{{ asset('img/australia.png') }}" style="width:20px;"> Australia', '<img src="{{ asset('img/xuxuefeng.png.png') }}" style="width: 30px; border-radius: 50%;"> Nicolas Ashley', '2024-08-22', '<span class="customer-badge status-qualified bg-warning">UNQUALIFIED</span>', '<div class="progress"><div class="progress-bar" style="width: 40%;"></div></div>'],
        ['Munro Misakia', '<img src="{{ asset('img/russia.png') }}" style="width:20px;"> Russia', '<img src="{{ asset('img/asiyajavayant.png.png') }}" style="width: 30px; border-radius: 50%;"> Asiya Javayant', '2024-08-21', '<span class="customer-badge status-qualified bg-primary">NEW</span>', '<div class="progress"><div class="progress-bar" style="width: 80%;"></div></div>'],
        ['Kadeem Kaitlins', '<img src="{{ asset('img/australia.png') }}" style="width:20px;"> Australia', '<img src="{{ asset('img/asiyajavayant.png.png') }}" style="width: 30px; border-radius: 50%;"> Asiya Javayant', '2024-08-04', '<span class="customer-badge status-qualified bg-success">PROPOSAL</span>', '<div class="progress"><div class="progress-bar" style="width: 100%;"></div></div>'],


    ];

    let currentPage = 1;
    const totalPages = Math.ceil(tableData.length / rowsPerPage);

    function renderTable() {
        const startIndex = (currentPage - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;
        const rows = tableData.slice(startIndex, endIndex);

        const tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = rows.map(row => `
            <tr>
                ${row.map(cell => `<td>${cell}</td>`).join('')}
            </tr>
        `).join('');

        updatePaginationControls();
    }

    function updatePaginationControls() {
        document.getElementById('prevPage').classList.toggle('disabled', currentPage === 1);
        document.getElementById('nextPage').classList.toggle('disabled', currentPage === totalPages);
        document.getElementById('firstPage').classList.toggle('disabled', currentPage === 1);
        document.getElementById('lastPage').classList.toggle('disabled', currentPage === totalPages);

        const pageNumbers = Array.from({ length: totalPages }, (_, i) => i + 1);
        const paginationControls = document.querySelector('.pagination');
        paginationControls.querySelectorAll('li.page-number').forEach(el => el.remove());

        pageNumbers.forEach(num => {
            const pageItem = document.createElement('li');
            pageItem.className = 'page-number';
            const pageLink = document.createElement('a');
            pageLink.textContent = num;
            pageLink.onclick = () => {
                currentPage = num;
                renderTable();
            };
            if (num === currentPage) {
                pageLink.style.backgroundColor = 'white';
            }
            pageItem.appendChild(pageLink);
            paginationControls.insertBefore(pageItem, document.getElementById('nextPage').parentNode);
        });
    }

    function changePage(direction) {
        if (direction === 'last') {
            currentPage = totalPages;
        } else if (direction === 'first') {
            currentPage = 1;
        } else {
            currentPage += direction;
        }
        currentPage = Math.max(1, Math.min(totalPages, currentPage));
        renderTable();
    }

    function sortTable(order) {
        const table = document.getElementById('dataTable');
        const rows = Array.from(table.querySelectorAll('tbody tr'));
        const index = 0; // Index of the column to sort (Name column)

        rows.sort((a, b) => {
            const nameA = a.cells[index].textContent.toLowerCase();
            const nameB = b.cells[index].textContent.toLowerCase();

            if (order === 'asc') {
                return nameA.localeCompare(nameB);
            } else {
                return nameB.localeCompare(nameA);
            }
        });

        const tbody = table.querySelector('tbody');
        rows.forEach(row => tbody.appendChild(row));
    }

    renderTable(); // Initial render
</script>
<script>
     function sortTable(columnIndex, order) {
        const table = document.getElementById("dataTable");
        const tbody = table.querySelector("tbody");
        const rowsArray = Array.from(tbody.querySelectorAll("tr"));

        rowsArray.sort((a, b) => {
            const cellA = a.children[columnIndex].innerText || a.children[columnIndex].textContent;
            const cellB = b.children[columnIndex].innerText || b.children[columnIndex].textContent;

            let valueA, valueB;

            // Determine the type of content in the column
            if (columnIndex === 5) { // Sorting by "Activity" column which has progress bars
                valueA = parseFloat(a.querySelector(".progress-bar").style.width);
                valueB = parseFloat(b.querySelector(".progress-bar").style.width);
            } else if (columnIndex === 3) { // Sorting by "Join Date"
                valueA = new Date(a.children[columnIndex].innerText);
                valueB = new Date(b.children[columnIndex].innerText);
            } else { // For other columns, treat as text
                valueA = cellA.trim().toLowerCase();
                valueB = cellB.trim().toLowerCase();
            }

            if (order === 'asc') {
                return (valueA > valueB) ? 1 : (valueA < valueB) ? -1 : 0;
            } else {
                return (valueA < valueB) ? 1 : (valueA > valueB) ? -1 : 0;
            }
        });

        // Append sorted rows to tbody
        rowsArray.forEach(row => tbody.appendChild(row));
    }
</script>
{{-- ..search..  --}}
<script>
    function filterTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        let row = rows[i];
        let cells = row.getElementsByTagName('td');
        let found = false;

        for (let j = 0; j < cells.length; j++) {
            let cell = cells[j];
            if (cell.textContent.toLowerCase().indexOf(filter) > -1) {
                found = true;
                break;
            }
        }

        row.style.display = found ? '' : 'none';
    }
}

</script>

@endsection
