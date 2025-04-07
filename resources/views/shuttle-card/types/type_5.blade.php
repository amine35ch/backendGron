<div style="width: 100%; margin-top: 10px;">
  <table>
    <tr>
      @if(str_contains($line['title'],'SIGNATURE '))
      <div style="width: 100%;">
        <h6 style="display: inline-block; width: 200px; margin: 0;">{{ $line['title'] }}</h6>
      </div>
      @else
    <tr>
      @endif
      @if(count($line['content']))
      @foreach ($line['content'] as $key => $image)
      <td style="padding: 5px; border: 1px solid #000; background-color: #f4f4ea; text-align: center;">
        <div style="display: inline-block; padding: 5px;">
          <img style="width: 220px; height: 140px;" src="{{ storage_path('app/'.$image['path']) }}"
            alt="image-{{ $key }}">
        </div>
      </td>
      @endforeach
      @endif
    </tr>
    </ta ble>
</div>