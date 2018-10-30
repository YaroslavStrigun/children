<div class="field-group-video admin-item">
    @foreach($videos as $video)
        <div class="form-group">
            <div class="change-image-wrap">
                <div class="change-image">
                    <p>Изменить ссылку</p>
                    <iframe width="972" height="547" src="{{ $video->iframe_link }}" frameborder="0"
                            allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <input style="width: 100%" type="text" name="videos[{{$video->id}}][link]" value="{{ $video->link }}">

                    <input type="button" value="Удалить" class="btn btn-danger custom-delete-attachment">
                </div>
                <!-- /.change-image -->
            </div>
            <!-- /.change-image-wrap -->
        </div>
    @endforeach

        <div class="videos-block"></div>
        <button type="button" class="btn btn-primary add-btn add-video">Добавить видео-блок</button>
</div>

<script type="text/template" id="videos-repeater">
    <div class="field-group-video admin-item" data-id="{?}">
        <div class="change-image-wrap">
            <div class="change-video">
                <div>
                    <p>Добавить видео: </p>
                    <label for="videos_new[{?}][link]"> Ссылка </label>
                    <input type="text" style="width: 200%" class="form-control" name="videos_new[{?}][link]" required >
                </div>
                <input type="button"  value="Удалить" class="btn btn-danger delete delete-video">
            </div>
        </div>
    </div>
</script>
