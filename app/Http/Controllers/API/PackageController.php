<?php

namespace App\Http\Controllers\API;

use App\Package;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\PackageRequest;

/**
 * @group  Package Controller
 *
 * APIs for Packages
 */
class PackageController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/package",
     *     tags={"package"},
     *     summary="Returns all Package response",
     *     description="A sample get request to test out the API",
     *     operationId="package1",
     *     @OA\Response(
     *         response="200",
     *         description="Packages retrieved successfully."
     *     )
     * )
     */
    public function index()
    {
        $packages = Package::latest()->paginate(10);

        return $this->sendResponse($packages->toArray(), 'Packages retrieved successfully.', 200);
    }


    /**
     * @OA\Post(
     *     path="/api/package",
     *     tags={"package"},
     *     summary="Create new Package",
     *     operationId="package2",
     *     @OA\Response(
     *         response=201,
     *         description="Package created successfully.",
     *         @OA\JsonContent(
     *          
     *          ),
     *     ),
     *     @OA\RequestBody(
     *         description="Create new Package",
     *         required=true,
     *         @OA\JsonContent(
     *              
     *          )
     *     )
     * )
     */
    public function store(PackageRequest $request)
    {
        $input = $request->json()->all();

        $package = Package::create($input);

        return $this->sendResponse($package->toArray(), 'Package created successfully.', 201);
    }

    /**
     * @OA\Get(
     *     path="/api/package/{packageId}",
     *     tags={"package"},
     *     summary="Details of the Package",
     *     operationId="package3",
     *     @OA\Parameter(
     *         name="packageId",
     *         in="path",
     *         description="ID of Package",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Package retrieved successfully.",
     *         @OA\JsonContent(
     *          
     *          ),
     *     ),
     * )
     */
    public function show($id)
    {
        $package = Package::find($id);

        return $this->sendResponse($package->toArray(), 'Package retrieved successfully.', 200);
    }

    /**
     * @OA\Patch(
     *     path="/api/package/{packageId}",
     *     tags={"package"},
     *     summary="Update a Package",
     *     operationId="package4",
     *     @OA\Parameter(
     *         name="packageId",
     *         in="path",
     *         description="ID of Package",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Package updated successfully.",
     *         @OA\JsonContent(
     *          
     *          ),
     *     ),
     *     @OA\RequestBody(
     *         description="Create new Package",
     *         required=true,
     *         @OA\JsonContent(
     *              
     *          )
     *     )
     * )
     */
    public function update(PackageRequest $request, Package $package)
    {
        $input = $request->json()->all();

        $package->update($input);

        return $this->sendResponse($package->toArray(), 'Package updated successfully.', 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/package/{packageId}",
     *     tags={"package"},
     *     summary="Update a Package",
     *     operationId="package5",
     *     @OA\Parameter(
     *         name="packageId",
     *         in="path",
     *         description="ID of Package",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Package updated successfully.",
     *         @OA\JsonContent(
     *          
     *          ),
     *     )
     * )
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return $this->sendResponse($package->toArray(), 'Package deleted successfully.', 200);
    }
}
