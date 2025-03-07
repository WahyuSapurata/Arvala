<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Models\Kategori;

class KategoriController extends BaseController
{
    public function index()
    {
        $module = 'Kategori';
        return view('admin.kategori.index', compact('module'));
    }

    public function get()
    {
        $data = Kategori::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add(StoreKategoriRequest $storeKategoriRequest)
    {
        $data = array();
        try {
            $data = new Kategori();
            $data->nama_kategori = $storeKategoriRequest->nama_kategori;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add event success');
    }

    public function show($params)
    {
        $data = array();
        try {
            $data = kategori::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function edit(StoreKategoriRequest $storeKategoriRequest, $params)
    {
        $data = Kategori::where('uuid', $params)->first();
        try {
            $data->nama_kategori = $storeKategoriRequest->nama_kategori;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add event success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = Kategori::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Event success');
    }
}
