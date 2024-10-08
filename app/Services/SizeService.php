<?php

namespace App\Services;

use App\Models\Size;

class SizeService
{
    public function findAll()
    {
        return Size::all();
    }

    public function findById($id)
    {
        return Size::find($id);
    }

    public function addSize($request)
    {
        $size = [
            'name' => $request['name'],
        ];

        Size::create($size);
        return ['status' => 'success', 'message' => 'Product Size is stored.'];
    }

    public function updateSize($request, $id)
    {
        try {
            $size = [
                'name' => $request->name
            ];
    
            Size::where('id', $id)->update($size);
            $res = ['status' => 'success', 'message' => 'Product Size is udpated.'];
        } catch (\Throwable $e) {
            $res = ['status' => 'error', 'message' => $e->getMessage()];
        }

        return $res;
    }

    public function deleteRecordById($id)
    {
        try {
            Size::where('id', $id)->delete();
            $res = ['status' => 'success', 'message' => 'Product Size is deleted.'];
        } catch (\Throwable $e) {
            $res = ['status' => 'error', 'message' => $e->getMessage()];
        }
        return $res;
    }
}