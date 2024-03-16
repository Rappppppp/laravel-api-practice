<?php

namespace App\Http\Repository\CDs;

use App\Models\CDs;

class CDsRepository
{
    public function store($request)
    {
        CDs::createOrFirst([
            'title' => $request->title,
            'artist' => $request->artist,
            'genre' => $request->genre,
            'release_year' => $request->release_year
        ]);
    }

    public function update($request, $id)
    {
        $isAccepted = CDs::find($id)->update([
            'title' => $request->title,
            'artist' => $request->artist,
            'genre' => $request->genre,
            'release_year' => $request->release_year
        ]);

        return $isAccepted == false ? // is this a good/bad practice sir?
        response()->json([
            'status' => 'Success',
            'message' => 'CDs Successfully Stored in the Database'
        ], 200) : 
        response()->json([
            'status' => 'error',
            'message' => ' Somethings Wrong'
        ], 500);
    }

    public function destroy($cds)
    {
        $cds->delete();
    }
}