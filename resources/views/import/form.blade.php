<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import JSON</title>
</head>
<body>
    <h1>Import JSON</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="json_file" accept=".json" required>
        <button type="submit">Import</button>
    </form>
    @if(isset($importedData) && count($importedData) > 0)
    <h2>Imported Data</h2>
    <table border="1">
        <thead>
            <tr>
            <th>ID</th>
        <th>Name</th>
        <th>KVK Naam</th>
        <th>KVK Nummer</th>
        <th>KVK Vestigingsnummer</th>
        <th>Bedrijfsindeling</th>
        <th>Bedrijfsgrootte</th>
        <th>Capaciteit</th>
        <th>Created At</th>
        <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($importedData as $item)
                <tr>
                <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->kvk_naam }}</td>
        <td>{{ $item->kvk_nummer }}</td>
        <td>{{ $item->kvk_vestigingsnummer }}</td>
        <td>{{ $item->bedrijfsindeling }}</td>
        <td>{{ $item->bedrijfsgrootte }}</td>
        <td>{{ $item->capaciteit }}</td>
        <td>{{ $item->created_at }}</td>
        <td>{{ $item->updated_at }}</td>
                    <!-- Add more columns based on your StagemarktProfiel model fields -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
</body>
</html>