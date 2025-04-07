<table width="100%" style="border-collapse: collapse;">
    <thead>
        @php
            $headers = $line['content']['headers'];
            $headersCount = count($headers);
            $firstRow = $line['content']['fields'][0]['rows'][0] ?? [];
        @endphp
        <tr>
            @foreach ($headers as $header)
                <td style="border: 1px solid black; background-color: #859f37;">
                    <p class="table-title">{{ $header['title'] }}</p>
                </td>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($line['content']['fields'][0]['rows'] as $row)
            <tr>
                @foreach ($headers as $header)
                    @php
                        $key = $header['title'];
                    @endphp
                    <td style="border: 1px solid black;">
                        <p>{{ $row[$key] ?? '' }}</p>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
