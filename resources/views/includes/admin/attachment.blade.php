<div class="field-group-attachment admin-item">
    @php $attachment = $dataTypeContent->getAttachment('main'); @endphp
    @if (!is_null($attachment->roles))
        <div class="form-group">
            <p>Изменить главную картинку</p>
            <img src="{{Voyager::image($attachment->path)}}" class="image">
            <input type="file" name="main_attachment[{{$attachment->id}}][file]" onchange="readURL(this, $(this).prev());">

            @foreach($attachment->roles as $role)
                <input type="hidden" name="main_attachment[{{$attachment->id}}][roles][]" value="{{ $role }}">
            @endforeach
        </div>
    @else
        <div class="form-group">
            <p>Добавить главную картинку</p>
            <img src="" class="image">
            <input type="file" name="main_attachment[0][file]" onchange="readURL(this, $(this).prev());">

            <input type="hidden" name="main_attachment[0][roles][]" value="main">
        </div>
    @endif
</div>
