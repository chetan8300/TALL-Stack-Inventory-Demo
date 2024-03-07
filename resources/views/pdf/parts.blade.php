<!DOCTYPE html>
<html>
    <head>
        <title>Part Export</title>
        <style>
            .table_component {
                overflow: auto;
                width: 100%;
            }

            .table_component table {
                border: 1px solid #dededf;
                height: 100%;
                width: 100%;
                table-layout: fixed;
                border-collapse: collapse;
                border-spacing: 1px;
                text-align: left;
            }

            .table_component caption {
                caption-side: top;
                text-align: left;
            }

            .table_component th {
                border: 1px solid #dededf;
                background-color: #eceff1;
                color: #000000;
                padding: 5px;
            }

            .table_component td {
                border: 1px solid #dededf;
                background-color: #ffffff;
                color: #000000;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <h1>Parts</h1>
        <div class="table_component" role="region" tabindex="0">
            <table>
                <thead>
                    <tr>
                        <th>Part Name</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Bin/Shelf</th>
                        <th>Unit Price</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parts as $part)
                        <tr>
                            <td>{{ $part->part_name }}</td>
                            <td>{{ $part->part_number }}</td>
                            <td>{{ $part->quantity }}</td>
                            <td>{{ $part->bin_location }}</td>
                            <td>{{ $part->unit_price }}</td>
                            <td>{{ $part->active ? 'Yes' : 'No' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
