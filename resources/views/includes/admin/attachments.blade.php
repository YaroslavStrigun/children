<div class="field-group-attachment admin-item">
    @foreach($attachments as $attachment)
        @if(!in_array('main', $attachment->roles))
        <div class="form-group">
            <div class="change-image-wrap">
                <div class="change-image">
                    <p>Изменить картинку</p>
                    <img src="{{Voyager::image($attachment->path)}}" class="image">
                    <input type="file" name="attachments[{{$attachment->id}}][image]" onchange="readURL(this, $(this).prev());" >

                    @foreach($attachment->roles as $role)
                        <input type="hidden" name="attachments[{{$attachment->id}}][roles][]" value="{{ $role }}">
                    @endforeach
                        <input type="button" value="Удалить" class="btn btn-danger custom-delete-attachment">
                </div>
                <!-- /.change-image -->
            </div>
            <!-- /.change-image-wrap -->
        </div>
        @endif
    @endforeach
        <div class="attachments-block"></div>
        <button type="button" class="btn btn-primary add-btn add-attachment">Добавить блок</button>
</div>

<script type="text/template" id="attachments-repeater">
    <div class="field-group-attachment admin-item" data-id="{?}">
        <div class="change-image-wrap">
            <div class="change-image">
                <div>
                    <p>Добавить картинку: </p>
                    <img src="#" class="image">
                    <input type="file" name="attachments_new[{?}][0][image]" required onchange="readURL(this, $(this).prev());" >
                    <input type="hidden" name="attachments_new[{?}][0][roles][]" value="slider">
                </div>
                <input type="button"  value="Удалить" class="btn btn-danger delete delete-attachment">
            </div>
        </div>
    </div>
</script>
