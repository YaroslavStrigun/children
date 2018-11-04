<?php

namespace App\Http\Controllers\Admin;


use App\Repositories\AttachmentRepository;
use App\Repositories\VideoRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class BaseController extends VoyagerBaseController
{
    public $attachmentRepository;
    public $videoRepository;

    public function __construct(AttachmentRepository $attachmentRepository, VideoRepository $videoRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
        $this->videoRepository = $videoRepository;
    }

    public function update(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {
            $data = $this->insertUpdateData($request, $slug, $dataType->editRows, $data);
            $attachments = $data->attachments->keyBy('id');
            // update or store main image
            if ($request->file('main_attachment')) {
                $this->attachmentRepository->updateOrCreateMainAttachment($request, $attachments, $data);
            }

            //start operations with slides
            $this->attachmentRepository->deleteAttachments($request, $attachments, ['attachments', 'main_attachment']);

            $this->attachmentRepository->updateAttachments($request, $attachments);

            $this->attachmentRepository->saveAttachments($request, $data);

            $videos = $data->videos->keyBy('id');

            $this->videoRepository->deleteVideos($request, $videos, ['videos']);

            $this->videoRepository->updateVideos($request, $videos, 'videos');

            $this->videoRepository->saveVideos($request, $data);

            event(new BreadDataUpdated($dataType, $data));

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->has('_validate')) {
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());
            $attachments = $data->attachments->keyBy('id');

            if (!$request->ajax()) {
                $this->attachmentRepository->saveAttachments($request, $data);

                $this->videoRepository->saveVideos($request, $data, 'videos_new');
                // update or store main image
                if ($request->file('main_attachment')) {
                    $this->attachmentRepository->updateOrCreateMainAttachment($request, $attachments, $data);
                }
            }
            event(new BreadDataAdded($dataType, $data));

            if ($request->ajax()) {
                return response()->json(['success' => true, 'data' => $data]);
            }

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_added_new')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('delete', app($dataType->model_name));

        // Init array of IDs
        $ids = [];
        if (empty($id)) {
            // Bulk delete, get IDs from POST
            $ids = explode(',', $request->ids);
        } else {
            // Single item delete, get ID from URL
            $ids[] = $id;
        }
        foreach ($ids as $id) {
            $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

            foreach ($data->attachments as $attachment){
                $this->attachmentRepository->deleteAttachment($attachment);
            }

            foreach ($data->videos as $video) {
                $video->delete();
            }

            $this->cleanup($dataType, $data);
        }

        $displayName = count($ids) > 1 ? $dataType->display_name_plural : $dataType->display_name_singular;

        $res = $data->destroy($ids);
        $data = $res
            ? [
                'message'    => __('voyager::generic.successfully_deleted')." {$displayName}",
                'alert-type' => 'success',
            ]
            : [
                'message'    => __('voyager::generic.error_deleting')." {$displayName}",
                'alert-type' => 'error',
            ];

        if ($res) {
            event(new BreadDataDeleted($dataType, $data));
        }

        return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
    }

}
