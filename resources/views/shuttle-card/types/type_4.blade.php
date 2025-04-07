<div style="width: 100%; margin-top: 10px;">
  <table style="border-collapse: collapse;">
    <thead>
      @if(count($line['content']))
      @if(str_contains($line['title'],'AJOUTER DES'))
      <div style="width: 100%;page-break-before: always">
        <h5 style="display: inline-block; width: 200px; margin: 0;">Images des chantiers :</h5>
      </div>
      @endif
      @foreach ($line['content'] as $key => $image)
      @if ($key % 3 == 0)
      <tr>
        @endif
        <td>
          <div style="background-color: #f4f4ea; display: inline-block; padding: 5px;">
            <img style="width: 220px; height: 140px;" src="{{ storage_path('app/'.$image['path']) }}"
              alt="image-{{ $key }}">
          </div>
        </td>
        @if (($key + 1) % 3 == 0)
      </tr>
      @endif
      @endforeach
      @if (count($line['content']) % 3 != 0)
      </tr>
      @endif
      @endif
    </thead>
  </table>
</div>
