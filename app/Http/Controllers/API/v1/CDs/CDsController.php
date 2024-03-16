<?php

namespace App\Http\Controllers\API\v1\CDs;

use App\Http\Controllers\Controller;
use App\Http\Repository\CDs\CDsRepository;
use App\Http\Requests\StoreCDsRequest;
use App\Http\Requests\UpdateCDsRequest;
use App\Http\Resources\CDs\CDsResource;
use App\Models\CDs;

class CDsController extends Controller
{

    public $repository;

    public function __construct(CDsRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cds = CDs::paginate(10);
        return CDsResource::collection($cds);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCDsRequest $request)
    {
        $this->repository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(CDs $cd)
    {
        return new CDsResource($cd);
    }

    /**
     * Update the specified resource in storage.
     */
    
    // ! The CDs $cds not working for some reason :c
    public function update(UpdateCDsRequest $request, string $id)
    {   
        $this->repository->update($request, $id);

        return response()->json([
            'status' => 'Success',
            'message' => ' CD Successfully Updated' 
        ]);
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CDs $cd)
    {
        $this->repository->destroy($cd);

        return response()->json([
            'status' => 'Success',
            'message' => ' CD Successfully Deleted' 
        ]);
    }
}
