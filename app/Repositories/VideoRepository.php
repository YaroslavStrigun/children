<?php

namespace App\Repositories;


use App\Models\Video;
use Bosnadev\Repositories\Eloquent\Repository;
use Illuminate\Http\Request;

class VideoRepository extends Repository
{
    public function model()
    {
        return Video::class;
    }

    public function saveVideos(Request $request, $model, string $input_type = 'videos_new')
    {
        foreach ($request->input($input_type, []) as $key => $video) {
            if (!is_null($video['link'])) {
                $link = $video['link'];
                $video = Video::create([
                    'post_id' => $model->id,
                    'link' => $link,
                ]);

                return $video;
            }
        }
    }

    public function updateVideos(Request $request, $videos, string $input_type = 'videos')
    {
        foreach ($request->input($input_type, []) as $video_id => $video_data) {
            $video = $videos->get($video_id);
            $link = $video_data['link'];

            if (!is_null($link)) {
                $video->update([
                    'link' => $link
                ]);
            };
        }
    }

    public function deleteVideos(Request $request, $videos, array $input_types = [])
    {
        $exists_videos = [];
        foreach ($input_types as $input_type) {
            $exists_videos += $request->input($input_type, []);
        }

        foreach($videos->diffKeys($exists_videos) as $deleting_video) {
            $deleting_video->delete();
        };
    }

}
