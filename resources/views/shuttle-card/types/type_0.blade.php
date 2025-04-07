@if(!$line['required'])
@php
$shouldDisplayTable = false;
$parents = App\Models\DLineResponse::where('d_project_id', $line['d_project_id'])
            ->where('parent', $line['title'])->get();

foreach ($parents as $parent) {
    if (!in_array($parent['input_type'], [4, 5])) {
        foreach ($parent->content['fields'] as $field) {
            if (!empty($field['value'])) {
                $shouldDisplayTable = true;
                break 2;
            }
        }
    }
    else{
        if(count($parent->content))
        {
            $shouldDisplayTable = true;
            break;
        }
    } 
}
@endphp 
@if ($shouldDisplayTable)
<h5>{{$line['title']}}</h5>
@endif
@else
<h5>{{$line['title']}}</h5>
@endif