<div class="field-group-attachment admin-item">
    @foreach($attachments as $attachment)
        <div class="form-group">
            <div class="change-image-wrap">
                <div class="change-image">
                    <p>Изменить картинку</p>
                    <img src="{{Voyager::image($attachment->path)}}" class="image">
                    <input type="file" name="attachments[{{$attachment->id}}][image]" onchange="readURL(this, $(this).prev());" >

                    @foreach($attachment->roles as $role)
                        <input type="hidden" name="attachments[{{$attachment->id}}][roles][]" value="{{ $role }}">
                    @endforeach

                    @if($repeatable)
                        <input type="button" value="Удалить" class="btn btn-danger custom-delete-attachment">
                    @endif
                </div>
                <!-- /.change-image -->
            </div>
            <!-- /.change-image-wrap -->
        </div>
    @endforeach

    @if($repeatable || $dataTypeContent->getAttachments('slide_', false, true)->isEmpty())
        <div class="attachments-block"></div>
        <button type="button" class="btn btn-primary add-btn add-attachment">Добавить блок</button>
    @endif


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
                    {{--<input type="hidden" name="slides_new[{?}][0][roles][]" value="slide_{?}">--}}
                </div>
                <input type="button"  value="Удалить" class="btn btn-danger delete delete-attachment">
            </div>
        </div>
    </div>
</script>
