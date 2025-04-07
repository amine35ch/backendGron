@if (true)
    <table width="100%" style="padding-left: 50px;padding-right: 25px">
        <tr>
            @php
                $modifiedHtml = '';
                try {
                    $html = html_entity_decode($line['content']['data']['fields'][0]['value']);

                    $chunks = preg_split('/<\/p>/', $html, -1, PREG_SPLIT_DELIM_CAPTURE);

                    $count = 0;
                    $first = 20;
                    $modifiedHtml = '';

                    foreach ($chunks as $chunk) {
                        $modifiedHtml .= $chunk;
                        $count++;
                        if ($count >= $first) {
                            $modifiedHtml .= '<div style="page-break-before:always;"></div>';
                            $count = 0;
                            $first = 25;
                        }
                    }
                } catch (\Throwable $th) {
                }
            @endphp
            {!! $modifiedHtml !!}
        </tr>
    </table>
@elseif ($line['display_type'] == 2)
    <table width="100%" style="padding-left: 50px;padding-right: 25px">
        <tr>
            <td width="100%"style="text-align: left;color:rgb(56, 83, 116)">
                <span>{{ $line['content']['data']['fields'][0]['title'] }}</span>
            </td>
        </tr>
        <tr>
            @php
                $modifiedHtml = '';
                try {
                    $html = html_entity_decode($line['content']['data']['fields'][0]['value']);

                    $chunks = preg_split('/<\/p>/', $html, -1, PREG_SPLIT_DELIM_CAPTURE);

                    $count = 0;
                    $first = 20;
                    $modifiedHtml = '';

                    foreach ($chunks as $chunk) {
                        $modifiedHtml .= $chunk;
                        $count++;

                        if ($count >= $first) {
                            $modifiedHtml .= '<div style="page-break-before:always;"></div>';
                            $count = 0;
                            $first = 25;
                        }
                    }
                } catch (\Throwable $th) {
                }
            @endphp
            {!! $modifiedHtml !!}
        </tr>
    </table>
@endif
